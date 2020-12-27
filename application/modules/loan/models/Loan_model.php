<?php defined('BASEPATH') || exit('No direct script access allowed');

class Loan_model extends BF_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_loan_byid($id, $type)
    {
        $sql = '';
        switch ($type) {
            case 'cartocash':
                $sql = " SELECT 
                'cartocash' type ,
                'Car to cash' type_name,
                u.display_name ,
                u.username,
                u.banned,
                lc.*
                FROM req_loan_cartocash lc
                LEFT JOIN users u ON u.id = lc.user_id WHERE 1=1 ";
                $sql =  $sql . GetWhereCommandString('lc.id', $id);
                break;

            case 'car_new':
                $sql = "SELECT 
                    'car_new' type ,
                    'New Car' type_name,
                    u.display_name ,u.username,
                u.banned,
                    lc.*
                    FROM req_loan_ncar lc
                    LEFT JOIN users u ON u.id = lc.user_id WHERE 1=1  ";
                $sql =  $sql . GetWhereCommandString('lc.id', $id);
                break;

            case 'car_use':
                $sql = " SELECT
                        'car_use' type,
                        'Use Car' type_name,
                        u.display_name ,u.username,
                u.banned,
                        lc.*
                        FROM req_loan_ucar lc
                        LEFT JOIN users u ON u.id = lc.user_id WHERE 1=1 ";
                $sql =  $sql . GetWhereCommandString('lc.id', $id);
                break;
        }

        $result = $this->db->query($sql);
        $remaster = $result->row_array();
        switch ($type) {
            case 'cartocash':
                $sql = "SELECT * FROM imgloan_cartocash lc WHERE 1=1 ";
                $sql =  $sql . GetWhereCommandString('lc.loan_id', $id);
                break;
            case 'car_new':
                $sql = "SELECT * FROM imgloan_ncar lc WHERE 1=1 ";
                $sql =  $sql . GetWhereCommandString('lc.loan_id', $id);
                break;

            case 'car_use':
                $sql = "SELECT * FROM imgloan_ucar lc WHERE 1=1 ";
                $sql =  $sql . GetWhereCommandString('lc.loan_id', $id);
                break;
        }
        $reimg =$this->db->query($sql);
        $remaster['image_list'] = $reimg->result_array();
        return $remaster;
    }
}
