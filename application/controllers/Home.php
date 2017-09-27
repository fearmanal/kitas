<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('staff_model');
		$this->load->model('supplier_model');
		$this->load->model('devices_model');
		$this->load->model('category_model');
	}

	public function index() {
		$data['total_staff'] 	= $this->staff_model->total_rows();
		$data['total_supplier'] = $this->supplier_model->total_rows();
		$data['total_pc'] 		= $this->devices_model->total_devcat('pc');
		$data['userdata'] 		= $this->userdata;
		$data['category_hw'] 	= $this->category_model->select_by_usage('hardware');

		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Manage Data CRUD";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */