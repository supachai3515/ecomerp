<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Agreement extends REST_Controller
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
        $this->load->model('mahathuen/customast_model');
        $this->load->model('mahathuen/armast_model');
        $this->load->model('mahathuen/paymentsch_model');
        $this->load->model('mahathuen/reqloan_model');
        $this->load->model('mahathuen/reqloanucar_model');
        $this->load->model('mahathuen/reqloanctoc_model');
        $this->load->model('mahathuen/Imgloan_ncar_model');
        $this->load->model('mahathuen/imgloan_ucar_model');
        $this->load->model('mahathuen/imgloan_cartocash_model');
        $this->user_id = $this->rest->user_id;
        $this->company_id = $this->rest->company_id;
    }


    public function index_get()
    {


        // $result = $this->customast_model->find_all();
        $result = 'result';
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data'] = $result;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function getname_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        $phoneresult = $this->customast_model->find_by('TELP_I', $data->PHONE);
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data'] = $phoneresult;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function armast_get()
    {
        $filter = array(
            'USERID' => $this->user_id,
        );

        $cuscod = $this->armast_model->find_all_by($filter);

        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['armast'] = $cuscod;
        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function addaccount_post()
    {

        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        $phoneresult = $this->customast_model->find_by('TELP_I', $data->PHONE);

        $result1 = $this->armast_model->find_by('CONTNO', $data->CONTNO);
        $cuscod = $result1->CUSCOD;
        $result = $this->armast_model->find_all_by('CUSCOD', $cuscod);
        // $finalresult=array(
        //     ''
        // );
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['armast'] = $result;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function addid_post()
    {

        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        $data_update = array(
            'USERID' => $this->user_id
        );


        for ($i = 0; $i < count($data->CONTNO); $i++) {

            $this->db->where('CONTNO', $data->CONTNO[$i]);
            $this->db->update('mhtl_armast', $data_update);
        }
        $result = $this->armast_model->find_all_by('USERID', $this->user_id);
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['armast'] = $result;

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function clearid_get()
    {

        $data_update = array(
            'USERID' => null
        );
        $this->db->where('USERID', $this->user_id);
        $this->db->update('mhtl_armast', $data_update);
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['armast'] = 'clear success';

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function paymentsch_post()
    {

        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);

        $contno = $this->paymentsch_model->find_all_by('CONTNO', $data->CONTNO);
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['paymensch'] = $contno;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function addloan_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        // $imgid=json_decode($data->imgidverifi);
        $datainsert = array(
            'name' => $data->name,
            'phone' => $data->phone,
            'amount' => $data->amount,
            'imgidverifi' => $data->imgidverifi[0],
            'imgincome' => $data->imgincome[0],
            'model' => $data->model,
        );

        $this->reqloan_model->insert($datainsert);
        $last_id = $this->db->insert_id();
        for ($i = 0; $i < count($data->imgidverifi); $i++) {
            $this->Imgloan_ncar_model->insert(array(
                'loan_id' => $last_id,
                'imgidverifi' => $data->imgidverifi[$i],
                'imgincome' => $data->imgincome[$i]
            ));
        }

        $result = $this->reqloan_model->find_by('id', $last_id);
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data'] = $result;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function addloanucar_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);

        $datainsert = array(
            'name' => $data->name,
            'phone' => $data->phone,
            'amount' => $data->amount,
            'imgidverifi' => $data->imgidverifi[0],
            'imgvhb' => $data->imgvhb[0],
            'imgincome' => $data->imgincome[0],
        );
        $this->reqloanucar_model->insert($datainsert);
        $last_id = $this->db->insert_id();

        for ($i = 0; $i < count($data->imgidverifi); $i++) {
            $this->Imgloan_ncar_model->insert(array(
                'loan_id' => $last_id,
                'imgidverifi' => $data->imgidverifi[$i],
                'imgincome' => $data->imgincome[$i]
            ));
        }
        $result = $this->reqloan_model->find_by('id', $last_id);
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data'] = $result;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function addloanctoc_post()
    {
        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);

        $datainsert = array(
            'name' => $data->name,
            'phone' => $data->phone,
            'amount' => $data->amount,
            'imgidverifi' => $data->imgidverifi[0],
            'imgvhb' => $data->imgvhb[0],
            'imgincome' => $data->imgincome[0],
        );
        $this->reqloanctoc_model->insert($datainsert);
        $last_id = $this->db->insert_id();
        $result = $this->reqloan_model->find_by('id', $last_id);
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data'] = $result;

        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function test_post()
    {

        $raw_input_stream = $this->input->raw_input_stream;
        $data = json_decode($raw_input_stream);
        $datainsert = array(
            'CONTNO' => $data->CONTNO,
            'CUSCOD' => $data->CUSCOD,
            'USERID' => $this->user_id,
            'Brand' => 'testbrand',
            'Model' => 'testmodel',
            'Color' => 'testcolor',
            'LOCAT' => 'Locat',
            'YSTAT' => 'N',
            'SDATE' => "2020-01-03",
            'TKANG' => "111111",
            'T_NOPAY' => '999',
            'TOT_UPAY' => '666',
            'SUM_DEB_PAID' => '1111111',
            'SUM_DEB_UNPAID' => '333333',
            'EXP_PRD' => '0',
            'EXP_AMT' => '0',
            'LPAYD' => "2020-01-03",
            'FDATE' => "2020-01-03",
            'LDATE' => "2020-01-03",
            'BAAB' => 'xxx',
            'STRNO' => 'xxx',
            'ENGNO' => 'xxx',
            'REGNO' => 'xxx',
        );
        $this->armast_model->insert($datainsert);
        $response['success'] = true;
        $response['message'] = 'load data success';
        $response['data']['paymensch'] = $datainsert;

        $this->response($response, REST_Controller::HTTP_OK);
    }
}
