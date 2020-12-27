<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller
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
		$this->load->model('users/user_model');

		$this->user_id = $this->rest->user_id;
		$this->company_id = $this->rest->company_id;
	}

	public function validate_token_get()
	{
		$user = $this->user_model->find($this->user_id);

		$data['success'] = true;
		$data['message'] = 'valid success';
		$data['data'] = [
			'id' => (int) $user->id,
			'company_id' => (int) $user->company_id,
			'email' => $user->email,
			'username' => $user->username,
			'display_name' => $user->display_name,
			'timezone' => $user->timezone,
			'language' => $user->language,
			'phone' => $user->phone,
			'address'=> $user->address,
			'level' => $user->role_name,
			'token' =>  $this->rest->key,
			'provider' => $user->provider,
			'image' => $user->image,
		];

		log_message('VANSALES', print_r($data, true));

		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function profile_get()
	{

		$user = $this->user_model->find($this->user_id);

		$value = array(
			array(
				"title" => "feedback",
				"value" => "97.01%"
			),
			array(
				"title" => "post",
				"value" => "245"
			),
			array(
				"title" => "follower",
				"value" => "92"
			)

		);

		$data['success'] = true;
		$data['message'] = 'get data success';
		$data['data']['user'] = array(
			'id' => (int) $user->id,
			'company_id' => (int) $user->company_id,
			'email' => $user->email,
			'username' => $user->username,
			'display_name' => $user->display_name,
			'timezone' => $user->timezone,
			'language' => $user->language,
			'phone' => $user->phone,
			'address'=> $user->address,
			'level' => $user->role_name,
			'token' =>  $this->rest->key,
			'provider' => $user->provider,
			"image" => $user->image,
      		"tag" => "@steve.garrett",
			"rate" => 4.5,
		);
		$data['data']['value'] = $value;

		$this->response($data, REST_Controller::HTTP_OK);
	}


	public function profile_post()
	{
		$raw_input_stream = $this->input->raw_input_stream;
		$data = json_decode($raw_input_stream);

		log_message('vansales', print_r($data, true));

		$data_update = array(
			'display_name' => $data->display_name,
			'display_name_changed' => date('Y-m-d H:m:s'),
			'email' => $data->email,
			'phone' => $data->phone,
			'address' => $data->address,
			'image' =>$data->image,
		);

		if(!empty($data->image)){
			$data_update['image'] = $data->image;
		}
		
		$this->db->where('id', $data->id);
		$this->db->update('users', $data_update);
		
		$this->profile_get();
		return;
	
	}
}
