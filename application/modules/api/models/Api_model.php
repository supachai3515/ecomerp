<?php defined('BASEPATH') || exit('No direct script access allowed');

class Api_model extends BF_Model
{
    protected $table_name	= 'api_keys';
	protected $key			= 'key';
	protected $date_format	= 'datetime';

	protected $log_user 	= true;
	protected $set_created	= true;
	protected $set_modified = true;
	protected $soft_deletes	= true;

	protected $created_field     = 'created_on';
    protected $created_by_field  = 'created_by';
	protected $modified_field    = 'modified_on';
    protected $modified_by_field = 'modified_by';
    protected $deleted_field     = 'deleted';
    protected $deleted_by_field  = 'deleted_by';

	// Customize the operations of the model without recreating the insert,
    // update, etc. methods by adding the method names to act as callbacks here.
	protected $before_insert 	= array();
	protected $after_insert 	= array();
	protected $before_update 	= array();
	protected $after_update 	= array();
	protected $before_find 	    = array();
	protected $after_find 		= array();
	protected $before_delete 	= array();
	protected $after_delete 	= array();

	// For performance reasons, you may require your model to NOT return the id
	// of the last inserted row as it is a bit of a slow method. This is
    // primarily helpful when running big loops over data.
	protected $return_insert_id = true;

	// The default type for returned row data.
	protected $return_type = 'object';

	// Items that are always removed from data prior to inserts or updates.
	protected $protected_attributes = array();

	// You may need to move certain rules (like required) into the
	// $insert_validation_rules array and out of the standard validation array.
	// That way it is only required during inserts, not updates which may only
	// be updating a portion of the data.
	protected $validation_rules 		= array(
		array(
			'field' => 'user_id',
			'label' => 'lang:api_field_user_id',
			'rules' => 'max_length[11]',
		),
		array(
			'field' => 'company_id',
			'label' => 'lang:api_field_company_id',
			'rules' => 'max_length[11]',
		),
		array(
			'field' => 'key',
			'label' => 'lang:api_field_key',
			'rules' => 'max_length[600]',
		),
		array(
			'field' => 'level',
			'label' => 'lang:api_field_level',
			'rules' => 'max_length[2]',
		),
		array(
			'field' => 'ignore_limits',
			'label' => 'lang:api_field_ignore_limits',
			'rules' => 'max_length[1]',
		),
		array(
			'field' => 'is_private_key',
			'label' => 'lang:api_field_is_private_key',
			'rules' => 'max_length[1]',
		),
		array(
			'field' => 'ip_addresses',
			'label' => 'lang:api_field_ip_addresses',
			'rules' => '',
		),
	);
	protected $insert_validation_rules  = array();
	protected $skip_validation 			= false;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->config->load('rest');
        $this->table_name = config_item('rest_keys_table');
        $this->key = config_item('rest_key_column');
    }

    



    //--------------------------------------------------------------------------
    // Helper Methods
    //--------------------------------------------------------------------------

    public function _generate_key()
    {
        do
        {
            // Generate a random salt
            // $salt = base_convert(bin2hex($this->security->get_random_bytes(64)), 16, 36);
            $salt = $this->_generateRandomString();

            // If an error occurred, then fall back to the previous method
            if ($salt === FALSE)
            {
                $salt = hash('sha256', time() . mt_rand());
            }

            $new_key = substr($salt, 0, config_item('rest_key_length'));
        }
        while ($this->_key_exists($new_key));

        return $new_key;
    }

    private function _generateRandomString($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    //--------------------------------------------------------------------------
    // Data Methods
    //--------------------------------------------------------------------------

    public function _get_key($key)
    {
        return $this->db
            ->where($this->key, $key)
            ->get($this->table_name)
            ->row();
    }

    public function _key_exists($key)
    {
        return $this->db
            ->where($this->key, $key)
            ->count_all_results($this->table_name) > 0;
    }

    public function _insert_key($key, $data)
    {
        $data[$this->key] = $key;
        
        return $this->db
            ->set($data)
            ->insert($this->table_name);
    }

    public function _update_key($key, $data)
    {
        return $this->db
            ->where($this->key, $key)
            ->update($this->table_name, $data);
    }

    public function _delete_key($key)
    {
        return $this->db
            ->where($this->key, $key)
            ->delete($this->table_name);
    }

    public function _delete_user_keys($user_id, $application)
    {
        $this->soft_deletes = false;
        $this->api_model->delete_where(
            array(
                'user_id' => $user_id,
                'application' => $application
            )
        );
    }


}