<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */
class Notify extends Admin_Controller
{
    protected $permissionView   = 'Site.Dashboard.View';
    public function __construct()
    {
        parent::__construct();
        $this->auth->restrict($this->permissionView);
        //$this->lang->load('member');
        $this->form_validation->set_error_delimiters("<span class='danger'>", "</span>");
    }

    public function index()
    {

        Template::set('toolbar_title', 'Notification');
        Assets::add_module_js('notify', 'notify.js');
        // Template::set('script_file', "notify/action_js");
        Template::render();
    }
    public function get_users_list()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $sql = "SELECT username as text,fcmtoken as id FROM users WHERE fcmtoken IS NOT NULL AND fcmtoken != '' ";

            if (isset($data["name"]) && !empty($data["name"])) {
                $sql =  $sql . "AND username LIKE '%" . $data["name"] . "%' ";
            }

            // $sql =  $sql . GetWhereCommandStringInt('product_type_id', $data["type_id"]);
            // if (isset($data["name"])) { 
            //     $sql =  $sql . GetWhereAndLikeString('CONCAT(sku,`name`)',  $data["name"]);
            // }

            $result = $this->db->query($sql);
            $re["data"] = $result->result_array();

            echo json_encode($re);
        } catch (\Throwable $e) {
            $re["data"] =  "";
            $re["error"] =  true;
            $re["message"] =  $e->getMessage();
            echo json_encode($re);
        }
    }
    public function send()
    {
        try {
            $token = $this->input->post('users_token');
            $type = $this->input->post('purpose');
            $title = $this->input->post('title');
            $body = $this->input->post('body');

            if (!isset($type) || !isset($title) || !isset($body)) {
                throw new Exception("Error  Request body");
            }

            // echo 'token :' . $token . 'type :' . $type . 'title :' . $title . 'body :' . $body;
            $url = '';
            if ($type == 0) {
                $c_t = 0;
                if (isset($token)) {
                    $c_t = count($token);
                }
                for ($i = 0; $i < $c_t; $i++) {
                    $url = 'https://backoffice.mahathuen.com/apinotification.php?isAdd=true&token=' . $token[$i] . '&title=' . $title . '&body=' . $body;
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_exec($ch);
                    curl_close($ch);
                }
            } else if ($type == 1) {
                $url = 'https://backoffice.mahathuen.com/apinotification.php?isAdd=true&token=' + '/topics/all' + '&title=' + $title + '&body=' + $body;
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_exec($ch);
                curl_close($ch);
            }


            $response["data"] =  "";
            $response["error"] =  false;
            $response["message"] =  'Send success';
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        } catch (\Throwable $e) {
            $response["data"] =  "";
            $response["error"] =  true;
            $response["message"] =  $e->getMessage();

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }



        // $ch = curl_init($url);
        // # Setup request to send json via POST.
        // // $payload = json_encode(array("customer" => $data));
        // // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        // # Return response instead of printing.
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // # Send request.
        // $result = curl_exec($ch);
        // curl_close($ch);
        // # Print response.
        // echo "<pre>$result</pre>";
    }
}
