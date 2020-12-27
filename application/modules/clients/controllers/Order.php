<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Order extends REST_Controller
{

    private $user_id = '';
    private $company_id = '';

    protected $query_limit = 100;


    function __construct()
    {
        parent::__construct();

        $this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_put']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->load->model('api/api_model');
        $this->load->model('order/order_model');

        $this->user_id = $this->rest->user_id;
        $this->company_id = $this->rest->company_id;
    }


    public function index_get()
    {
        $this->db->select("id, user_id, order_no, name, company, address, phone, email, status, order_qty, note, total_amount, created_on");
        $this->db->order_by('id', 'desc');
        $result = $this->db->get_where('salesorder', array('user_id' => $this->user_id, 'deleted' => false))->result();

        $salesorder = null;
        foreach ($result as $key => $value) {
            $salesorder[] = array(
                'id' => (int) $value->id,
                'user_id' => (int) $value->user_id,
                'order_no' => $value->order_no,
                'name' => $value->name,
                'company' => $value->company,
                'address' => $value->address,
                'phone' => $value->phone,
                'email' => $value->email,
                'status' => $value->status,
                'order_qty' => (int) $value->order_qty,
                'note' => $value->note,
                'total_amount' => (float) $value->total_amount,
                'created_on' => user_time($value->created_on, 'Asia/Bangkok', 'j/m/Y'),
            );
        }


        $data['success'] = true;
        $data['message'] = 'valid success';
        $data['data']['salesorder'] = $salesorder;

        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function order_detail_get($salesorder_id = 0)
    {
        $this->db->select("id, user_id, order_no, name, company, address, phone, email, status, order_qty, note, total_amount, created_on");
        $this->db->select("size_s, size_m, size_l, size_xl, size_mix");
        $this->db->order_by('id', 'desc');

        $result = $this->db->get_where('salesorder', array(
            'id' => $salesorder_id,
            'user_id' => $this->user_id,
            'deleted' => false
        ))->row();

        $salesorder = null;

        $salesorder = array(
            'id' => (int) $result->id,
            'user_id' => (int) $result->user_id,
            'order_no' => $result->order_no,
            'name' => $result->name,
            'company' => $result->company,
            'address' => $result->address,
            'phone' => $result->phone,
            'email' => $result->email,
            'status' => $result->status,
            'size_s' => (int) $result->size_s,
            'size_m' => (int) $result->size_m,
            'size_l' => (int) $result->size_l,
            'size_xl' => (int) $result->size_xl,
            'size_mix' => (int) $result->size_mix,
            'order_qty' => (int) $result->order_qty,
            'note' => $result->note,
            'total_amount' => (float) $result->total_amount,
            'created_on' => user_time($result->created_on, 'Asia/Bangkok', 'j/m/Y'),
        );

        $items = $this->get_salesorder_items($salesorder_id);
        $images = $this->get_salesorder_images($salesorder_id);

        $data['success'] = true;
        $data['message'] = 'valid success';
        $data['data']['salesorder'] = $salesorder;
        $data['data']['items'] = $items;
        $data['data']['image'] = $images;

        $this->response($data, REST_Controller::HTTP_OK);
    }

    private function get_salesorder_items($salesorder_id)
    {
        $item_result = $this->db->get_where('salesorder_items', array(
            'salesorder_id' => $salesorder_id
        ))->result();

        $items = null;
        foreach ($item_result as $key => $value) {
            $items[] = array(
                'id' => (int) $value->id,
                'salesorder_id' => (int) $value->salesorder_id,
                'type' => $value->type,
                'code' => $value->code,
                'title' => $value->title,
                'color' => $value->color
            );
        }
        return $items;
    }

    private function get_salesorder_images($salesorder_id)
    {
        $images_result = $this->db->get_where('salesorder_images', array(
            'salesorder_id' => $salesorder_id
        ))->result();

        $images = null;
        foreach ($images_result as $key => $value) {
            $images[] = array(
                'id' => (int) $value->id,
                'salesorder_id' => (int) $value->salesorder_id,
                'image' => $value->image
            );
        }
        return $images;
    }

    public function index_post()
    {

        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);

        $user   = $data->user;
        $header = $data->header;
        $items  = $data->items;
        $size   = $data->size;
        $images = $data->images;

        // log_message('vansales', print_r($data, true));
        $size_s = (int) $size->size_s ?? 0;
        $size_m = (int) $size->size_m ?? 0;
        $size_l = (int) $size->size_l ?? 0;
        $size_xl = (int) $size->size_xl ?? 0;
        $size_mix = (int) $size->size_mix ?? 0;
        $order_qty = ($size_s + $size_m + $size_l + $size_xl + $size_mix);

        $order = array(
            'name'      => $header->name,
            'company'   => $header->company,
            'address'   => $header->address,
            'user_id'   => $user->id,
            'email'     => $header->email,
            'phone'     => $header->phone,
            'note'      => $header->note,
            'size_s'    => $size_s,
            'size_m'    => $size_m,
            'size_l'    => $size_l,
            'size_xl'   => $size_xl,
            'size_mix'  => $size_mix,
            'order_qty' => $order_qty,
            'status'    => 'ใหม่',
            'created_by' => $user->id,
            'created_on' => date('Y-m-d H:i:s')
        );

        /// Save Salesorder
        $salesorder_id = $this->order_model->insert($order);

        /// Save Salesorder items
        $this->order_model->save_items_for($salesorder_id, $items);

        /// Sales Images Url
        $this->order_model->save_images($salesorder_id, $images);
        
    }

    public function index_put($id = '')
    {
        /* TODO: Implement "Put" Method */
    }

    public function index_delete($code = 0)
    {
        /* TODO: Implement "Delete" Method */
    }
}
