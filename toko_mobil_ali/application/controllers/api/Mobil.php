<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';



class Mobil extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mobil_model','mobil');
	}

	public function index_get()
	{
		$brand = $this->get('brand');
		$type = $this->get('type');
		$id = $this->get('id');

		if($brand === null && $type === null && $id === null)
		{			
			$mobil = $this->mobil->getMobil();
		}
		else{
			$mobil = $this->mobil->getMobil($brand, $type, $id);
		}
		
		if($mobil)
		{
			$this->response([
				'status' => true,
				'data' => $mobil
			], REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
				'status' => false,
				'message' => "Cars not found"
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_delete()
	{
		$id = $this->delete('id');

		if ($id === null) 
		{
			$this->response([
				'status' => false,
				'message' => "Provide an id"
			], REST_Controller::HTTP_BAD_REQUEST);
		}
		else
		{
			if($this->mobil->deleteMobil($id) > 0)
			{
				$this->response([
					'status' => true,
					'id' => $id,
					'message' => 'Cars deleted'
				], REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response([
					'status' => false,
					'message' => "Id car not found"
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}
	public function index_post()
	{
		$data =[
			'no_rangka'	=>$this->post('no_rangka'),
			'no_polisi'	=>$this->post('no_polisi'),
			'merek'		=>$this->post('merek'),
			'tipe'		=>$this->post('tipe'),
			'tahun'		=>$this->post('tahun')
		];
		if($this->mobil->createMobil($data) > 0)
		{
			$this->response([
				'status' => true,
				'message' => 'New cars has been created'
			], REST_Controller::HTTP_CREATED);
		}
		else
		{
			$this->response([
				'status' => false,
				'message' => "Fail to add cars"
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put()
	{
		$id= $this->put('id');
		$data =[
			'no_rangka'	=>$this->put('no_rangka'),
			'no_polisi'	=>$this->put('no_polisi'),
			'merek'		=>$this->put('merek'),
			'tipe'		=>$this->put('tipe'),
			'tahun'		=>$this->put('tahun')
		];
		if($this->mobil->updateMobil($data, $id) > 0)
		{
			$this->response([
				'status' => true,
				'message' => 'Cars has been Updated'
			], REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
				'status' => false,
				'message' => "Fail to Update cars"
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}