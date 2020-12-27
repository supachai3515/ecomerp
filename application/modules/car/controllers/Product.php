<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Product extends REST_Controller
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

		// $this->user_id = $this->rest->user_id;
		// $this->company_id = $this->rest->company_id;
	}


	public function index_get()
	{
		$product_object = $this->db->get('product_object')->result();
		$shirtobject = null;
		foreach ($product_object as $k1 => $object) {
			$product_material = $this->db->get_where('product_material', array('type' => $object->type))->result();
			$shirtmaterial = null;
			foreach ($product_material as $k2 => $material) {
				$shirtmaterial[] = array(
					'material_id' => (int) $material->id,
					'type' => $material->type,
					'code' => $material->code,
					'title' => $material->title,
					'picture' => $material->picture,
					'mainpicture' => $material->mainpicture,
				);
			}

			$shirtobject[] = array(
				'type' => $object->type,
				'picture' => $object->picture,
				'material' => $shirtmaterial,
			);
		}

		$data['success'] = true;
		$data['message'] = 'valid success';
		$data['data']['shirtobject'] = $shirtobject;
		$data['data']['shirtdesign'] = $this->initial_shirt_design();

		//log_message('VANSALES', print_r($data, true));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function fabric_color_get($material_id = 0)
	{
		$product_color = $this->db->get_where('product_color', array('material_id' => $material_id))->result();
		
		$fabric_color = null;
		foreach($product_color as $key => $value)
		{
			$fabric_color[] = array(
				'id' => (int) $value->id,
				'code' => $value->code,
				'title' => $value->title,
				'picture' => $value->picture,
			);
		}
		
		$data['success'] = true;
		$data['message'] = 'valid success';
		$data['data']['fabric_color'] = $fabric_color;
		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function button_color_get($material_id = 0)
	{
		$product_color = $this->db->get_where('product_color', array('material_id' => $material_id))->result();
		
		$button_color = null;
		foreach($product_color as $key => $value)
		{
			$button_color[] = array(
				'id' => (int) $value->id,
				'code' => $value->code,
				'title' => $value->title,
				'picture' => $value->picture,
			);
		}
		
		$data['success'] = true;
		$data['message'] = 'valid success';
		$data['data']['button_color'] = $button_color;
		$this->response($data, REST_Controller::HTTP_OK);
	}


	public function index_post()
	{
		/* TODO: Implement "Post" Method */
		log_message('vansales', print_r('product post', true));
	}


	public function index_put($id = '')
	{
		/* TODO: Implement "Put" Method */
	}

	public function index_delete($code = 0)
	{
		/* TODO: Implement "Delete" Method */
	}


	private function initial_shirt_design()
	{

		$shirtdesign = array(
			'fabric' => array(
				"type" => "fabric",
				"code" => "151021",
				"title" => "151021",
				"color" => "สีขาว",
				"picture" => "",
				"mainpicture" => "https://vansales.sgp1.digitaloceanspaces.com/myshirt/image-fabric.png"
			),
			'collar' => array(
				"type" => "collar",
				"code" => "collar_rivara",
				"title" => "Rivara",
				"color" => "",
				"picture" => "",
				"mainpicture" => "https://vansales.sgp1.digitaloceanspaces.com/myshirt/image-collar.png"
			),
			"buttontape" => array(
				"type" => "buttontape",
				"code" => "buttontape_normal",
				"title" => "Fly",
				"color" => "",
				"picture" => "",
				"mainpicture" => "https://vansales.sgp1.digitaloceanspaces.com/myshirt/image-buttontape.png"
			),
			"button" => array(
				"type" => "button",
				"code" => "type1",
				"title" => "2 dots",
				"color" => "สีขาว",
				"picture" => "",
				"mainpicture" => "https://vansales.sgp1.digitaloceanspaces.com/myshirt/image-button.png"
			),
			"sleeve" => array(
				"type" => "sleeve",
				"code" => "armlength_65cm",
				"title" => "65 cm.",
				"color" => "",
				"picture" => "",
				"mainpicture" => "https://vansales.sgp1.digitaloceanspaces.com/myshirt/image-sleeve.png"
			),
			"pocket" => array(
				"type" => "pocket",
				"code" => "nopocket",
				"title" => "No Pocket",
				"color" => "",
				"picture" => "",
				"mainpicture" => "https://vansales.sgp1.digitaloceanspaces.com/myshirt/image-pocket.png"
			)
		);

		return $shirtdesign;
	}

}
