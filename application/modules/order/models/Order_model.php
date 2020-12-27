<?php defined('BASEPATH') || exit('No direct script access allowed');

class Order_model extends BF_Model
{
	protected $table_name	= 'salesorder';
    protected $meta_table 	= 'salesorder_meta';
    protected $items_table 	= 'salesorder_items';
	protected $key			= 'id';
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
	protected $before_insert 	= array('before_insert');
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
			'field' => 'status',
			'label' => 'lang:order_field_status',
			'rules' => 'max_length[50]',
		),
		array(
			'field' => 'note',
			'label' => 'lang:order_field_note',
			'rules' => 'max_length[250]',
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
	}

	
	protected function before_insert($row){
        
        //Get last digit of current order
        $this->db->order_by("id","desc");
        $this->db->limit(1);
        $query = $this->db->get($this->table_name);          
        $result = $query->row_array();

        $prefix = 'B';
        $current = $result['order_no'] != "" ? $result['order_no'] : "${prefix}00000000";
        $nextid = $current;

        $newmonth = sprintf($prefix.date('ym')."%'.04d", 1);

        $exp[0] = substr($current, 0, 5);
		$exp[1] = substr($current, -4);

        if(trim($exp[0])!= trim($prefix.date('ym')) )
        {
            $nextid = $newmonth;
        }else{ 
            $nextid = sprintf($prefix.date('ym')."%'.04d", ($exp[1]+1));
        }
		
		$row['order_no'] = $nextid;
		return $row;
    }
    
	


	//--------------------------------------------------------------------------
    // !SALESORDER ITEMS
    //--------------------------------------------------------------------------

    /**
     * Retrieve all items values defined for a user.
     *
     * @param int   $salesorder_id The ID of the user for which the items will be retrieved.
     * @param array $fields  The items_key names to retrieve.
     *
     * @return stdClass An object with the key/value pairs, or an empty object.
     */
    public function find_items_for($salesorder_id = null, $fields = null)
    {
        // Is $salesorder_id the right data type?
        if (! is_numeric($salesorder_id)) {
            $this->error = lang('invalid_salesorder_id');
            return new stdClass();
        }

        // Limiting to certain fields?
        if (! empty($fields) && is_array($fields)) {
            $this->where_in('items_key', $fields);
        }
        $this->where('salesorder_id', $salesorder_id);

        $query = $this->db->get($this->items_table);

        $result = new stdClass();
        foreach ($query->result() as $row) {
            $key = $row->items_key;
            $result->{$key} = $row->items_value;
        }

        return $result;
    }

    /**
     * Locate a single user and the user's items information.
     *
     * @param int $salesorder_id The ID of the user to fetch.
     *
     * @return bool|object An object with the user's profile and meta information,
     * or false on failure.
     */
    public function find_salesorder_and_items($salesorder_id = null)
    {
        // Is $salesorder_id the right data type?
        if (! is_numeric($salesorder_id)) {
            $this->error = lang('invalid_salesorder_id');
            return false;
        }

        // Does a user with this $salesorder_id exist?
        $result = $this->find($salesorder_id);
        if (! $result) {
            $this->error = lang('invalid_salesorder_id');
            return false;
        }

        // Get the meta data for this user and join it to the user profile data.
        $this->where('salesorder_id', $salesorder_id);
        $query = $this->db->get($this->meta_table);
        foreach ($query->result() as $row) {
            $key = $row->meta_key;
            $result->{$key} = $row->meta_value;
        }

        return $result;
    }

    /**
     * Save one or more key/value pairs of meta information for a user.
     *
     * @example
     * $data = array(
     *    'location'    => 'That City, Katmandu',
     *    'interests'   => 'My interests'
     * );
     * $this->user_model->save_meta_for($salesorder_id, $data);
     *
     * @param int   $salesorder_id The ID of the user for which to save the meta data.
     * @param array $data    An array of key/value pairs to save.
     *
     * @return bool True on success, else false.
     */
    public function save_items_for($salesorder_id = null, $data = [])
    {
        // Is $salesorder_id the right data type?
        if (! is_numeric($salesorder_id)) {
            $this->error = lang('invalid_salesorder_id');
            return false;
        }

        // If there's no data, get out of here.
        if (empty($data)) {
            return true;
        }

        $result = false;
		$successCount = 0;

		foreach ($data as $value) {
            $obj = [
                'type'   => $value->type,
                'code' => $value->code,
                'title' => $value->title,
                'color' => $value->color,
                'salesorder_id'    => $salesorder_id,
            ];
            $where = [
                'type' => $value->type,
                'salesorder_id'  => $salesorder_id,
			];

            // Determine whether the data needs to be updated or inserted.
            $this->where($where);
            $query = $this->db->get($this->items_table);
            $row = $query->row();
            if (isset($row)) {
                $result = $this->db->update($this->items_table, $obj, $where);
            } else {
                $result = $this->db->insert($this->items_table, $obj);
            }

            // Count the number of successful insert/update results.
            if ($result) {
                ++$successCount;
            }
        }

        return $successCount == count($data);
    }


    public function save_images($salesorder_id, $images = array())
    {
        if(empty($images)){ return false; }
        
        foreach ($images as $key => $image) {
            $images_batch[] = array(
                'salesorder_id' => $salesorder_id,
                'image' => $image
            );
        }

        if(!empty($images_batch)) {
            $this->db->insert_batch('salesorder_images', $images_batch);
        }
    }


}