<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('users/user_model');
		$this->load->model('api/api_model');  
		$this->load->library('users/auth');
	}


	public function login_post()
	{

		$user = $this->rest_auth->user;
		$token = $this->rest_auth->token;

		$fcmtoken = json_decode($this->input->raw_input_stream)->fcmtoken;
		
		$this->db->where('id',$user->id);
        $this->db->update('users', array('fcmtoken' => $fcmtoken));

		$data['success'] = true;
		$data['message'] = 'login success';
		$data['data'] = [	
			'id' => (int) $user->id,
			'company_id' => (int) $user->company_id,
			'email' => $user->email,
			'username' => $user->username,
			'display_name' => $user->display_name,
			'timezone' => $user->timezone,
			'language' => $user->language,
			'phone' => $user->phone,
			'level' => $user->role_name,
			'token' =>  $token,
			'provider' => $user->provider,
			'image' => $user->image,
			'address'=>$user->address,
			'fcmtoken'=>$fcmtoken,
		];

		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function facebook_post()
	{
		$json = json_decode($this->input->raw_input_stream);
		$application = 'facebook';

		if($json->provider == 'facebook')
		{
			$this->db->where('email', $json->email);
			$query = $this->db->get('users');
			$user = $query->row();

			if($user){


				//Todo: update facebook profile into local database

				$token_data = array(
					'user_id' => $user->id,
					'company_id' => $user->company_id,
					'level' => 3, 
					'created_on' => date("Y-m-d H:i:s"),
					'created_by' => $user->id,
					'application' => $application,
				);
				$this->api_model->_delete_user_keys($user->id, $application);
				$this->api_model->_insert_key($json->token, $token_data);
			}else{
				
				$user_id = $this->saveUser();

				$this->db->where('id', $user_id);
				$query = $this->db->get('users');
				$user = $query->row();

				if($user){
					$token_data = array(
						'user_id' => $user->id,
						'company_id' => $user->company_id,
						'level' => 3, 
						'created_on' => date("Y-m-d H:i:s"),
						'created_by' => $user->id,
						'application' => $application,
					);
					$this->api_model->_delete_user_keys($user->id, $application);
					$this->api_model->_insert_key($json->token, $token_data);
				}
			}

			$data['success'] = true;
			$data['message'] = 'login success';
			$data['data'] = [
				'id' => (int) $user->id,
				'company_id' => (int) $user->company_id,
				'email' => $user->email,
				'username' => $user->username,
				'display_name' => $user->display_name,
				'timezone' => $user->timezone,
				'language' => $user->language,
				'phone' => $user->phone,
				'level' => 'member',
				'token' =>  $json->token,
				'provider' => $user->provider,
				'image' => $user->image,
				'address'=> $user->address
			];

			$this->response($data, REST_Controller::HTTP_OK); 
		}
	}

	public function signup_post()
	{
		$result = $this->saveUser();

		if ($result) {
			$this->response([
				'success' => true,
				'message' => 'user was created',
				'data' => array('user_id' => $result)
			], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
				'success' => false,
				'message' => 'Could not create account',
				'data' => null
			], REST_Controller::HTTP_NOT_ACCEPTABLE);
		}
	}



	// -------------------------------------------------------------------------
	// Private Methods
	// -------------------------------------------------------------------------

	/**
	 * Save the user.
	 *
	 * @param  string  $type            The type of operation ('insert' or 'update').
	 * @param  integer $id              The id of the user (ignored on insert).
	 * @param  array   $metaFields      Array of meta fields for the user.
	 *
	 * @return boolean/integer The id of the inserted user or true on successful
	 * update. False if the insert/update failed.
	 */
	private function saveUser()
	{

		$form_data = $this->input->post();
		$json_data = json_decode($this->input->raw_input_stream);

		$data = array();
		if ($form_data) {
			$data = $form_data;
		}

		if ($json_data) {
			$data = $json_data;
		}

		$metaData = array();
		$metaData['country'] = 'LA'; // Set default country to LA

		if(isset($data->facebook_id)){
			$metaData['facebook_id'] = $data->facebook_id;
		}
		
		$data = $this->user_model->prep_data((array) $data);
		$result = false;

		$activationMethod = $this->settings_lib->item('auth.user_activation_method');
		if ($activationMethod == 0) {
			// No activation method, so automatically activate the user.
			$data['active'] = 1;
		}

		if (!$this->user_model->is_unique('username', $data['username'])) {
			log_message('error', 'duplication user');
			return false;
		}

		if (!$this->user_model->is_unique('email', $data['email'])) {
			log_message('error', 'duplication email');
			return false;
		}

		$id = $this->user_model->insert($data);
		if (is_numeric($id)) {
			$result = $id;
		}


		if (is_numeric($id) && !empty($metaData)) {
			$this->user_model->save_meta_for($id, $metaData);
		}

		// Add result to payload.
		$payload['result'] = $result;
		
		// Trigger event after saving the user.
		Events::trigger('save_user', $payload);

		//log_message('vansales', print_r($data, true));
		return $result;
	}
}
