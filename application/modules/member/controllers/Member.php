<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */
class Member extends Admin_Controller
{
    protected $permissionView   = 'Site.Dashboard.View';
    public function __construct()
    {
        parent::__construct();
        $this->auth->restrict($this->permissionView);
        $this->lang->load('application');
        $this->lang->load('member');
        $this->load->model("member_model");
        $this->form_validation->set_error_delimiters("<span class='danger'>", "</span>");
    }

    public function index()
    {
        try {
            //set title
            Template::set('toolbar_title', lang('member_title'));
            Assets::add_module_js('member', 'member.js');
            Assets::add_module_js('dashboard', 'partail.js');
            Template::render();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function search()
    {
        try {
            $draw = $_POST['draw'];
            $row = $_POST['start'];
            $rowperpage = $_POST['length']; // Rows display per page
            $columnIndex = $_POST['order'][0]['column']; // Column index
            $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
            $searchValue = $_POST['search']['value']; // Search value

            //col fucntion
            switch (intval($columnIndex)) {
                case 0:
                    $columnName = "u.created_on";
                    break;
                case 2:
                    $columnName = "u.display_name";
                    break;
                case 3:
                    $columnName = "u.phone";
                    break;
                case 4:
                    $columnName = "u.username";
                    break;
                case 5:
                    $columnName = "u.banned";
                    break;
                default:
                    $columnName = "u.created_on";
                    break;
            }

            $sqlwhere = "";
            if (isset($searchValue) && !empty($searchValue)) {
                $sqlwhere =  $sqlwhere . GetWhereAndLikeString("CONCAT(u.id, IFNULL(u.display_name, '') , IFNULL(u.phone, ''), IFNULL(u.username, ''), IFNULL(u.email, ''))", $searchValue);
            }
            //date search
            $dateSearch =  $this->input->post('date_search');
            if (isset($dateSearch) && !empty($dateSearch)) {
                $split = explode('-', $dateSearch);
                $firstOrDefault = $split[0];
                $lastOrDefault =   $split[1];
                if ($firstOrDefault != null && $lastOrDefault != null) {
                    $fDate = date_create_from_format("d/m/Y", (str_replace(' ', '', $firstOrDefault)));
                    $tDate = date_create_from_format("d/m/Y", (str_replace(' ', '', $lastOrDefault)));
                    $sqlwhere =  $sqlwhere . GetWhereCommandDateTime('u.created_on',  $fDate, $tDate);
                }
            }

            //Total number
            $sql = "SELECT count(*) total   FROM  users u WHERE u.deleted = 0 $sqlwhere";
            $result = $this->db->query($sql);
            $totalRecords = $result->row()->total;
            $sql = "SELECT u.* FROM  users u  WHERE deleted = 0 $sqlwhere ORDER BY  $columnName  $columnSortOrder  limit  $row , $rowperpage ";
            $result = $this->db->query($sql);
            $re_data = $result->result_array();
            $totalRecordwithFilter = $totalRecords;


            $i = 0;
            foreach ($re_data as $item) {
                $re_data[$i]["created_on"] = user_time(strtotime($item['created_on']), null, 'd/m/Y H:i');
                $i++;
            }

            ## Response
            $response = array(
                "draw" => intval($draw),
                "recordsTotal" => (int) $totalRecords,
                "recordsFiltered" =>  $totalRecordwithFilter,
                "data" =>  $re_data
            );

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
    }

    public function view()
    {
        try {
            $id =  $this->input->get('id');
            if (!isset($id) || empty($id))
                throw new Exception("Error ID Request");
            $data['action']  = "view";
            $data['users_data']  = $this->member_model->get_users_byid($id);
            $this->load->view("member_partial", $data);
        } catch (\Throwable $th) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($th->getMessage()));
        }
    }

    //partial
    public function edit()
    {
        try {
            $id =  $this->input->get('id');
            if (!isset($id) || empty($id))
                throw new Exception("Error ID Request");
            $data['action']  = "edit";
            $data['users_data']  = $this->member_model->get_users_byid($id);
            $this->load->view("member_partial", $data);
        } catch (\Throwable $th) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($th->getMessage()));
        }
    }

    public function update()
    {
        try {
            $users_data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'display_name' => $this->input->post('display_name'),
                'banned' => $this->input->post('banned') == NULL ? 0 : 1,
                'ban_message' => $this->input->post('ban_message'),
                'phone' => $this->input->post('phone'),
            );

            $this->db->where('id', $this->input->post('id'));
            $result =  $this->db->update('users', $users_data);
            if (!@$result) {
                $error = $this->db->error();
                throw new Exception($error["code"] . "-" . $error["message"]);
            }
            $response = array(
                "data" => '',
                "message" =>  "Save success",
            );
            $this->output
                ->set_output(json_encode($response));
        } catch (\Throwable $th) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($th->getMessage()));
        }
    }
}
