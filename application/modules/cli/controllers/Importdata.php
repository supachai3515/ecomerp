<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require '/var/www/backoffice/vendor/autoload.php';

require APPPATH . 'libraries/REST_Controller.php';

class Importdata extends REST_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_put']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->load->model('mahathuen/customast_model');
        $this->load->model('mahathuen/armast_model');
    }

    public function index_get()
    {
        echo phpinfo();
    }
    public function import_post()
    {
        $inputFileName = '/var/www/backoffice/sample' . date("Ymd") . '.xlsx';
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        $count = 0;
        foreach ($sheetData as $item) {
            if ($count != 0) {
                $datainsert = array(
                    'CUSCOD' => $item[0],
                    'SNAM' => $item[1],
                    'NAME1' => $item[2],
                    'NAME2' => $item[3],
                    'NICKNM' => $item[4],
                    // 'BIRTHDT' => $item[5],
                    'IDCARD' => $item[6],
                    'IDNO' => $item[7],
                    'ISSUBY' => $item[8],
                    'ISSUDT' => $item[9],
                    // 'EXPDT' => $item[10],
                    'AGE' => $item[11],
                    'NATION' => $item[12],
                    'OFFIC' => $item[13],
                    'MEMBCOD' => $item[14],
                    'ADDR_I' => $item[15],
                    'TUMB_I' => $item[16],
                    'AUMPDES' => $item[17],
                    'PROVDES' => $item[18],
                    'ZIP_I' => $item[19],
                    'TELP_I' => $item[20],
                    // 'USERID' => null,
                );

                $data = $this->customast_model->find_by('CUSCOD', $item[0]);
                if ($data != false) {
                    $this->db->where('CUSCOD', $item[0]);
                    $datass = $this->db->update('mhtl_customast', $datainsert);
                } else {
                    $this->customast_model->insert($datainsert);
                }
                $data = false;
            }
            $count++;
        }
        $response['success'] = true;
        $response['message'] = 'load data success';
        // $response['data'] = $data;
        $response['data'] = $datass;

        $this->response(
            $response,
            REST_Controller::HTTP_OK
        );
    }
    // public function test_post()
    // {

    //     $raw_input_stream = $this->input->raw_input_stream;
    //     $data = json_decode($raw_input_stream);
    //     $datainsert = array(
    //         'CONTNO' => $data->CONTNO,
    //         'CUSCOD' => $data->CUSCOD,
    //         'USERID' => 444,
    //         'Brand' => 'testbrand',
    //         'Model' => 'testmodel',
    //         'Color' => 'testcolor',
    //         'LOCAT' => 'Locat',
    //         'YSTAT' => 'N',
    //         'SDATE' => "2020-01-03",
    //         'TKANG' => "111111",
    //         'T_NOPAY' => '999',
    //         'TOT_UPAY' => '666',
    //         'SUM_DEB_PAID' => '1111111',
    //         'SUM_DEB_UNPAID' => '333333',
    //         'EXP_PRD' => '0',
    //         'EXP_AMT' => '0',
    //         'LPAYD' => "2020-01-03",
    //         'FDATE' => "2020-01-03",
    //         'LDATE' => "2020-01-03",
    //         'BAAB' => 'xxx',
    //         'STRNO' => 'xxx',
    //         'ENGNO' => 'xxx',
    //         'REGNO' => 'xxx',
    //     );
    //     $this->armast_model->insert($datainsert);
    //     $response['success'] = true;
    //     $response['message'] = 'load data success';
    //     $response['data']['paymensch'] = $datainsert;

    //     $this->response($response, REST_Controller::HTTP_OK);
    // }
}
