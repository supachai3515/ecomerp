<?php defined('BASEPATH') || exit('No direct script access allowed');

class new_moto_model extends BF_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_sellingnewmoto_byid($id)
    {
        $sql = "SELECT * FROM sellingnewmoto WHERE 1=1 ";
        $sql =  $sql . GetWhereCommandString('id', $id);

        $result = $this->db->query($sql);
        $remaster = $result->row_array();

        $sql = "SELECT * FROM sellingnewmoto_photo lc WHERE 1=1 ";
        $sql =  $sql . GetWhereCommandString('lc.car_id', $id);
        $reimg = $this->db->query($sql);
        $remaster['image_list'] = $reimg->result_array();
        return $remaster;
    }
}
