<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller
{


	private $user_id = '';
	private $data = array();


	function __construct()
	{
		parent::__construct();

		$this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
		$this->methods['index_put']['limit'] = 100; // 100 requests per hour per user/key
		$this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
		$this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key

		$this->load->model('api/api_model');
		$this->load->model('customer/customer_model');

		$this->user_id = $this->rest->user_id;
	}


	public function count_get()
	{
		$param = [
			'deleted' => false
		];
		$result = $this->customer_model->count_by($param);
		$this->response($result, REST_Controller::HTTP_OK);
	}



	public function index_get($code = '')
	{

		$param = [
			'deleted' => false
		];

		$offset = 0;
		$params = json_decode($this->input->raw_input_stream);

		if (isset($params->offset) && $params->offset > 0) {
			$offset = $params->offset;
		}

		if (isset($params->code) && $params->code != '') {
			$param['code'] = $params->code;
			$offset = 0;
		}

		if ($code != '') {
			$param['code'] = $code;
			$offset = 0;
		}

		$result = $this->customer_model->limit(100, $offset)->find_all_by($param);

		if ($result) {

			$data['status'] = true;
			$data['message'] = 'get data success';

			foreach ($result as $key => $value) {

				if ($value->code)
					$customer['code'] = $value->code;

				if ($value->name)
					$customer['name'] = $value->name;

				if ($value->organization)
					$customer['organization'] = $value->organization;

				if ($value->phone)
					$customer['phone'] = $value->phone;

				if ($value->email)
					$customer['email'] = $value->email;

				if ($value->address)
					$customer['address'] = $value->address;

				$data['data']['customer'][] = $customer;
			}

			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Not found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code

		}
	}


	public function index_post()
	{
		$data = $this->_prepare_data();

		if (!$this->customer_model->is_unique('code', $data['code'])) {
			// Set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'Duplicated customer code'
			], REST_Controller::HTTP_FORBIDDEN); // HTTP_NOT_MODIFIED (304) Duplicated customer code
			
			return;
		}

		
		try {
			if ($this->customer_model->insert($data)) {
				$this->response([
					'status' => TRUE,
					'message' => 'Customer was created'
				], REST_Controller::HTTP_CREATED);
			} else {
				$this->response([
					'status' => FALSE,
					'message' => 'Could not create Customer'
				], REST_Controller::HTTP_GONE);
			}
		} catch (Exception $e) {
			log_message('error', print_r('Caught exception:' . $e->getMessage(), true));
		}
	
	}


	public function index_put($code = '')
	{
		$data = $this->_prepare_data();

		$data['modified_by'] = $this->user_id;
		$data['modified_on'] = date("Y-m-d H:i:s");

		$param = [
			'code' => $code,
			'deleted' => false
		];


		$this->db->limit(1)->update('customer', $data, $param);
		$response = $this->db->affected_rows();

		// log_message('error', print_r($param, true));

		if ($response == 0) {
			$this->response([
				'status' => FALSE,
				'message' => 'Could not update'
			], REST_Controller::HTTP_FORBIDDEN);
		} else {

			$this->response([
				'status' => TRUE,
				'message' => 'Customer was updated'
			], REST_Controller::HTTP_ACCEPTED);
		}
	}

	public function index_delete($code = 0)
	{
		/* TODO: Implement "Delete" Method */
	}




	//--------------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------------

	private function _prepare_data()
	{
		$form_data = $this->input->post();

		if ($form_data) {

			if ($form_data['code'])
				$data['code'] = $form_data['code'];  /* Key data **/

			if ($form_data['name'])
				$data['name'] = $form_data['name'];

			if ($form_data['contact'])
				$data['contact_name'] = $form_data['contact'];

			if ($form_data['phone'])
				$data['phone'] = $form_data['phone'];

			if ($form_data['email'])
				$data['email'] = $form_data['email'];

			if ($form_data['taxid'])
				$data['taxid'] = $form_data['taxid'];


			if ($form_data['address']['address'])
				$data['address'] = $form_data['address']['address'];

			if ($form_data['address']['street'])
				$data['street'] = $form_data['address']['street'];

			if ($data['village'] = $form_data['address']['village'])
				$data['village'] = $form_data['address']['village'];


			if ($form_data['address']['zipcode'])
				$data['zipcode'] = $form_data['address']['zipcode'];

			if ($form_data['address']['country'])
				$data['country'] = $form_data['address']['country'];

			if ($form_data['note'])
				$data['note'] = $form_data['note'];

			if ($form_data['geopoint']['coordinates']) {
				$data['latitude'] = $form_data['geopoint']['coordinates'][0] != '' ? $form_data['geopoint']['coordinates'][0] : '0';
				$data['longitude'] = $form_data['geopoint']['coordinates'][1] != '' ? $form_data['geopoint']['coordinates'][1] : '0';
			}


			if ('POST' == $this->input->method(true)) {
				$data['created_on'] = date("Y-m-d H:i:s");
				$data['created_by'] = $this->user_id;
			}

			if ('PUT' == $this->input->method(true)) {
				$data['modified_on'] = date("Y-m-d H:i:s");
				$data['modified_by'] = $this->user_id;
			}

			if ($form_data['credit']['limit'])
				$data['credit_limit'] = $form_data['credit']['limit'];

			if ($form_data['credit']['term'])
				$data['credit_term'] = $form_data['credit']['term'];

			if ($form_data['credit']['available'])
				$data['creditavailable'] = $form_data['credit']['available'];
		} else {

			$form_data = json_decode($this->input->raw_input_stream);

			if ($form_data->code)
				$data['code'] = $form_data->code;  /* Key data **/

			if ($form_data->name)
				$data['name'] = $form_data->name;

			if ($form_data->contact)
				$data['contact_name'] = $form_data->contact;

			if ($form_data->phone)
				$data['phone'] = $form_data->phone;

			if ($form_data->email)
				$data['email'] = $form_data->email;

			if ($form_data->taxid)
				$data['taxid'] = $form_data->taxid;

			if ($form_data->address->address)
				$data['address'] = $form_data->address->address;

			if ($form_data->address->street)
				$data['street'] = $form_data->address->street;

			if ($form_data->address->village)
				$data['village'] = $form_data->address->village;


			if ($form_data->address->zipcode)
				$data['zipcode'] = $form_data->address->zipcode;

			if ($form_data->address->country)
				$data['country'] = $form_data->address->country;

			if ($form_data->note)
				$data['note'] = $form_data->note;

			if ($form_data->geopoint->coordinates) {
				$data['latitude'] = $form_data->geopoint->coordinates[0] != '' ? $form_data->geopoint->coordinates[0] : '0';
				$data['longitude'] = $form_data->geopoint->coordinates[1] != '' ? $form_data->geopoint->coordinates[1] : '0';
			}

			if ('POST' == $this->input->method(true)) {
				$data['created_on'] = date("Y-m-d H:i:s");
				$data['created_by'] = $this->user_id;
			}

			if ('PUT' == $this->input->method(true)) {
				$data['modified_on'] = date("Y-m-d H:i:s");
				$data['modified_by'] = $this->user_id;
			}

			if ($form_data->credit->limit)
				$data['credit_limit'] = $form_data->credit->limit;

			if ($form_data->credit->term)
				$data['credit_term'] = $form_data->credit->term;

			if ($form_data->credit->available)
				$data['creditavailable'] = $form_data->credit->available;
		}

		$data['salesman_id'] = 0;
		// log_message('vansales', print_r($data,true));
		return $data;
	}
}
