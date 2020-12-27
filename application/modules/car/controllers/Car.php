<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Car extends REST_Controller
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
        $this->load->model('mahathuen/sellingcar_model');
        $this->load->model('mahathuen/sellingnewcar_model');
        $this->load->model('mahathuen/sellingcarphoto_model');
        $this->load->model('mahathuen/sellingnewcarphoto_model');
        $this->load->model('mahathuen/sellingmoto_model');
        $this->load->model('mahathuen/sellingnewmoto_model');
        $this->load->model('mahathuen/sellingmotophoto_model');
        $this->load->model('mahathuen/sellingnewmotophoto_model');

        // $this->user_id = $this->rest->user_id;
        // $this->company_id = $this->rest->company_id;
    }
    public function index_get()
    {

        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data'] = 'testnew';

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function sample_post()
    {
        $this->response('OK', REST_Controller::HTTP_OK);
    }

    public function carbyid_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        switch ($data->type) {
            case 0:
                $result = $this->sellingcar_model->find($data->id);
                break;
            case 1:
                $result = $this->sellingmoto_model->find($data->id);
                break;
            default:
                $result = $this->sellingcar_model->find($data->id);
                break;
        }
        // $result = $this->sellingcar_model->find($data->id);
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data'] = $result;
        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function addsellcar_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        // $this->addPhoto_post($data->photo);
        $datainsert = array(
            'topic' => $data->topic,
            'brand' => $data->brand,
            'model' => $data->model,
            'color' => $data->color,
            'yomf' => $data->yomf,
            'gear' => $data->gear,
            'mile' => $data->mile,
            'engine' => $data->engine,
            'price' => $data->price,
            'des' => $data->des,
            'name' => $data->name,
            'email' => $data->email,
            'tel' => $data->tel,
            'facebook' => $data->facebook,
            'prov' => $data->prov,
            'photo' => $data->photo[0],
            'user_id' => $data->user_id,
            'date' => date('Y-m-d H:i:s')
        );
        $this->sellingcar_model->insert($datainsert);
        $last_id = $this->db->insert_id();
        for ($i = 0; $i < count($data->photo); $i++) {

            $dataphotoinsert = array(
                'car_id' => $last_id,
                'photo' => $data->photo[$i]
            );
            $this->sellingcarphoto_model->insert($dataphotoinsert);
        }
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['id'] = $last_id;

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function addsellmoto_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        // $this->addPhoto_post($data->photo);
        $datainsert = array(
            'topic' => $data->topic,
            'brand' => $data->brand,
            'model' => $data->model,
            'color' => $data->color,
            'yomf' => $data->yomf,
            'mile' => $data->mile,
            'gear' => $data->gear,
            'engine' => $data->engine,
            'price' => $data->price,
            'des' => $data->des,
            'name' => $data->name,
            'email' => $data->email,
            'tel' => $data->tel,
            'facebook' => $data->facebook,
            'prov' => $data->prov,
            'photo' => $data->photo[0],
            'user_id' => $data->user_id,
            'date' => date('Y-m-d H:i:s')
        );
        $this->sellingmoto_model->insert($datainsert);
        $last_id = $this->db->insert_id();
        for ($i = 0; $i < count($data->photo); $i++) {
            $dataphotoinsert = array(
                'car_id' => $last_id,
                'photo' => $data->photo[$i]
            );
            $this->sellingmotophoto_model->insert($dataphotoinsert);
        }
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['id'] = $last_id;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function addsellmoto2_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        // $this->addPhoto_post($data->photo);
        $datainsert = array(
            'topic' => $data->topic,
            'brand' => $data->brand,
            'model' => $data->model,
            'color' => $data->color,
            'yomf' => $data->yomf,
            'gear' => $data->gear,
            'engine' => $data->engine,
            'mile' => $data->mile,
            'price' => $data->price,
            'des' => $data->des,
            'name' => $data->name,
            'email' => $data->email,
            'tel' => $data->tel,
            'facebook' => $data->facebook,
            'prov' => $data->prov,
            'photo' => $data->photo[0],
            'user_id' => $data->user_id,
            'date' => date('Y-m-d H:i:s')
        );
        $this->sellingmoto_model->insert($datainsert);
        $last_id = $this->db->insert_id();
        for ($i = 0; $i < count($data->photo); $i++) {
            $dataphotoinsert = array(
                'car_id' => $last_id,
                'photo' => $data->photo[$i]
            );
            $this->sellingmotophoto_model->insert($dataphotoinsert);
        }
        $sendbackdata = $datainsert;
        $sendbackdata['id'] = (string)$last_id;
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data'] = $sendbackdata;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function addsellnewmoto2_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        // $this->addPhoto_post($data->photo);
        $datainsert = array(
            'topic' => $data->topic,
            'brand' => $data->brand,
            'model' => $data->model,
            'color' => $data->color,
            'yomf' => $data->yomf,
            'gear' => $data->gear,
            'engine' => $data->engine,
            'mile' => $data->mile,
            'price' => $data->price,
            'des' => $data->des,
            'name' => $data->name,
            'email' => $data->email,
            'tel' => $data->tel,
            'facebook' => $data->facebook,
            'prov' => $data->prov,
            'photo' => $data->photo[0],
            'user_id' => $data->user_id,
            'date' => date('Y-m-d H:i:s')
        );
        $this->sellingnewmoto_model->insert($datainsert);
        $last_id = $this->db->insert_id();
        for ($i = 0; $i < count($data->photo); $i++) {
            $dataphotoinsert = array(
                'car_id' => $last_id,
                'photo' => $data->photo[$i]
            );
            $this->sellingnewmotophoto_model->insert($dataphotoinsert);
        }
        $sendbackdata = $datainsert;
        $sendbackdata['id'] = (string)$last_id;
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data'] = $sendbackdata;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function addsellcar2_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        // $this->addPhoto_post($data->photo);
        $datainsert = array(
            'topic' => $data->topic,
            'brand' => $data->brand,
            'model' => $data->model,
            'color' => $data->color,
            'yomf' => $data->yomf,
            'gear' => $data->gear,
            'engine' => $data->engine,
            'mile' => $data->mile,
            'price' => $data->price,
            'des' => $data->des,
            'name' => $data->name,
            'email' => $data->email,
            'tel' => $data->tel,
            'facebook' => $data->facebook,
            'prov' => $data->prov,
            'photo' => $data->photo[0],
            'user_id' => $data->user_id,
            'date' => date('Y-m-d H:i:s')
        );
        $this->sellingcar_model->insert($datainsert);
        $last_id = $this->db->insert_id();
        for ($i = 0; $i < count($data->photo); $i++) {

            $dataphotoinsert = array(
                'car_id' => $last_id,
                'photo' => $data->photo[$i]
            );
            $this->sellingcarphoto_model->insert($dataphotoinsert);
        }
        $sendbackdata = $datainsert;
        $sendbackdata['id'] = (string)$last_id;
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data'] = $sendbackdata;
        $this->response($response, REST_Controller::HTTP_OK);
    }


    public function addsellnewcar2_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        // $this->addPhoto_post($data->photo);
        $datainsert = array(
            'topic' => $data->topic,
            'brand' => $data->brand,
            'model' => $data->model,
            'color' => $data->color,
            'yomf' => $data->yomf,
            'gear' => $data->gear,
            'engine' => $data->engine,
            'mile' => $data->mile,
            'price' => $data->price,
            'des' => $data->des,
            'name' => $data->name,
            'email' => $data->email,
            'tel' => $data->tel,
            'facebook' => $data->facebook,
            'prov' => $data->prov,
            'photo' => $data->photo[0],
            'user_id' => $data->user_id,
            'date' => date('Y-m-d H:i:s')
        );
        $this->sellingnewcar_model->insert($datainsert);
        $last_id = $this->db->insert_id();
        for ($i = 0; $i < count($data->photo); $i++) {

            $dataphotoinsert = array(
                'car_id' => $last_id,
                'photo' => $data->photo[$i]
            );
            $this->sellingnewcarphoto_model->insert($dataphotoinsert);
        }
        $sendbackdata = $datainsert;
        $sendbackdata['id'] = (string)$last_id;
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data'] = $sendbackdata;
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function getallcar_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        switch ($data->type) {
            case 0:
                $data = $this->sellingcar_model->find_all();
                break;
            case 1:
                $data = $this->sellingmoto_model->find_all();
                break;
            case 2:
                $data = $this->sellingnewcar_model->find_all();
                break;
            case 3:
                $data = $this->sellingnewmoto_model->find_all();
                break;
            default:
                $data = $this->sellingcar_model->find_all();
                break;
        }
        if ($data == false) {
            $data = [];
        }
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['list'] = $data;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function getfiltercar_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        if ($data->brand != null)
            $this->db->where('brand', $data->brand);
        if ($data->gear != 'all_gear')
            $this->db->where('gear', $data->gear);
        if ($data->color != null)
            $this->db->where('color', $data->color);
        // $this->db->where('price >=',$data->pricestart);
        // $this->db->where('price <=',$data->priceend);
        switch ($data->type) {
            case 0:
                $data = $this->sellingcar_model->find_all();
                break;
            case 1:
                $data = $this->sellingmoto_model->find_all();
                break;
            default:
                $data = $this->sellingcar_model->find_all();
                break;
        }
        if ($data == false) {
            $data = [];
        }
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['list'] = $data;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function getimage_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        switch ($data->type) {
            case 0:
                $result = $this->sellingcarphoto_model->find_all_by('car_id', $data->id);
                break;
            case 1:
                $result = $this->sellingmotophoto_model->find_all_by('car_id', $data->id);
                break;
            case 2:
                $result = $this->sellingnewcarphoto_model->find_all_by('car_id', $data->id);
                break;
            case 3:
                $result = $this->sellingnewmotophoto_model->find_all_by('car_id', $data->id);
                break;
            default:
                $result = $this->sellingcarphoto_model->find_all_by('car_id', $data->id);
                break;
        }
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['list'] = $result;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function getrelated_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        $result = false;
        switch ($data->type) {
            case 0:
                $result = $this->sellingcar_model->find_all_by('brand', $data->brand);
                break;
            case 1:
                $result = $this->sellingmoto_model->find_all_by('brand', $data->brand);
                break;
            case 2:
                break;
            default:
                $result = $this->sellingcar_model->find_all_by('brand', $data->brand);
                break;
        }
        if ($result == false) {
            $result = [];
        }
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['list'] = $result;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function getfuture_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        $result = false;
        switch ($data->type) {
            case 0:
                $result = $this->sellingcar_model->find_all_by('feature', '1');
                break;
            case 1:
                $result = $this->sellingmoto_model->find_all_by('feature', '1');
                break;
            case 2:
                break;
            default:
                $result = $this->sellingcar_model->find_all_by('feature', '1');
                break;
        }
        if ($result == false) {
            $result = null;
        }
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['list'] = $result;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function getpopularcar_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        if ($data == null) {
            $data->type = 0;
        }
        switch ($data->type) {
            case 0:
                $result = $this->sellingcar_model->find_all_by('popular', '1');
                break;
            case 1:
                $result = $this->sellingmoto_model->find_all_by('popular', '1');
                break;
            case 2:
                break;
            default:
                $result = $this->sellingcar_model->find_all_by('popular', '1');
                break;
        }
        if ($result == false) {
            $result = null;
        }
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['list'] = $result;

        $this->response($response, REST_Controller::HTTP_OK);
    }
}
