<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Content controller
 */
class Loan extends Admin_Controller
{
    protected $permissionView   = 'Site.Dashboard.View';
    public function __construct()
    {
        parent::__construct();
        $this->auth->restrict($this->permissionView);
        $this->lang->load('loan');
        $this->load->model("loan_model");
        $this->form_validation->set_error_delimiters("<span class='danger'>", "</span>");
    }

    public function index()
    {
        try {
            //set title
            Template::set('toolbar_title', lang('loan_title'));
            Assets::add_module_js('loan', 'loan.js');
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
                    $columnName = "m.created_date";
                    break;
                case 1:
                    $columnName = "m.type_name";
                    break;
                case 2:
                    $columnName = "m.name";
                    break;
                case 3:
                    $columnName = "m.phone";
                    break;
                case 4:
                    $columnName = "m.amount";
                    break;
                default:
                    $columnName = "m.created_date";
                    break;
            }

            $sqlwhere = "";
            if (isset($searchValue) && !empty($searchValue)) {
                $sqlwhere =  $sqlwhere . GetWhereAndLikeString("CONCAT(m.name, IFNULL(m.display_name, '') , IFNULL(m.phone, ''), IFNULL(m.type_name, ''))", $searchValue);
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
                    $sqlwhere =  $sqlwhere . GetWhereCommandDateTime('m.created_date',  $fDate, $tDate);
                }
            } else {
            }

            //Total number
            $sql = " SELECT count(*) total FROM  ( 
                        SELECT 
                            'cartocash' type ,
                            'Car to cash' type_name,
                            u.display_name ,
                            lc.id,
                            lc.name,
                            lc.phone ,
                            lc.amount ,
                            lc.created_date,
                            lc.active
                            FROM req_loan_cartocash lc
                            LEFT JOIN users u ON u.id = lc.user_id 
                            
                            UNION 
                            
                            SELECT 
                            'car_new' type ,
                            'New Car' type_name,
                            u.display_name ,
                            lc.id,
                            lc.name,
                            lc.phone ,
                            lc.amount ,
                            lc.created_date,
                            lc.active
                            FROM req_loan_ncar lc
                            LEFT JOIN users u ON u.id = lc.user_id 
                            UNION
                            
                            SELECT
                            'car_use' type,
                            'Use Car' type_name,
                            u.display_name ,
                            lc.id,
                            lc.name,
                            lc.phone ,
                            lc.amount ,
                            lc.created_date,
                            lc.active
                            FROM req_loan_ucar lc
                            LEFT JOIN users u ON u.id = lc.user_id 
                 
                            ) m WHERE 1=1 $sqlwhere
                       ";

            $result = $this->db->query($sql);
            $totalRecords = $result->row()->total;
            $sql = " SELECT m.* FROM  ( 

                SELECT 
                'cartocash' type ,
                'Car to cash' type_name,
                u.display_name ,
                lc.id,
                lc.name,
                lc.phone ,
                lc.amount ,
                lc.created_date,
                lc.active
                FROM req_loan_cartocash lc
                LEFT JOIN users u ON u.id = lc.user_id 
                
                UNION 
                
                SELECT 
                'car_new' type ,
                'New Car' type_name,
                u.display_name ,
                lc.id,
                lc.name,
                lc.phone ,
                lc.amount ,
                lc.created_date,
                lc.active
                FROM req_loan_ncar lc
                LEFT JOIN users u ON u.id = lc.user_id 
                UNION
                
                SELECT
                'car_use' type,
                'Use Car' type_name,
                u.display_name ,
                lc.id,
                lc.name,
                lc.phone ,
                lc.amount ,
                lc.created_date,
                lc.active
                FROM req_loan_ucar lc
                LEFT JOIN users u ON u.id = lc.user_id 
                ) m WHERE 1=1 
            $sqlwhere
            ORDER BY  $columnName  $columnSortOrder  limit  $row , $rowperpage ";

            $result = $this->db->query($sql);
            $re_data = $result->result_array();
            $totalRecordwithFilter = $totalRecords;


            $i = 0;
            foreach ($re_data as $item) {
                $re_data[$i]["created_date"] = user_time(strtotime($item['created_date']), null, 'd/m/Y H:i');
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
            $type =  $this->input->get('type');
            if (!isset($id) || empty($id) || !isset($type) || empty($type))
                throw new Exception("Error ID Request");
            $data['action']  = "view";
            $data['loan_data']  = $this->loan_model->get_loan_byid($id, $type);
            $this->load->view("loan_partial", $data);
        } catch (\Throwable $th) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($th->getMessage()));
        }
    }
}
