<?php defined('BASEPATH') || exit('No direct script access allowed');

class moto_used_model extends BF_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_sellingmoto_byid($id)
    {
        $sql = "SELECT * FROM sellingmoto WHERE 1=1 ";
        $sql =  $sql . GetWhereCommandString('id', $id);

        $result = $this->db->query($sql);
        $remaster = $result->row_array();

        $sql = "SELECT * FROM sellingmoto_photo lc WHERE 1=1 ";
        $sql =  $sql . GetWhereCommandString('lc.car_id', $id);
        $reimg = $this->db->query($sql);
        $remaster['image_list'] = $reimg->result_array();
        return $remaster;
    }
}
