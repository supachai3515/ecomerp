<?php defined('BASEPATH') || exit('No direct script access allowed');

class Member_model extends BF_Model
{
    public function __construct()
    {
        parent::__construct();
	}

	public function get_users_byid($id)
    {
        $sql = "SELECT * FROM users WHERE deleted = 0 ";
        $sql =  $sql . GetWhereCommandString('id', $id);
        $result = $this->db->query($sql);
        return $result->row_array();
    } 
}