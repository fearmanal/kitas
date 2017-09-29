<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('category_model');
	}

	public function index() {
		$uriget = $this->uri->uri_to_assoc();
		$usage = $uriget['usage'];
		$data['userdata'] 	= $this->userdata;
		$data['dataCategory'] 	= $this->category_model->select_usage_all($usage);
		$data['usage'] 		= $usage;
		$data['category_hw'] 	= $this->category_model->select_by_usage('hardware');

		$data['page'] 		= "category";
		$data['judul'] 		= "Category";
		$data['deskripsi'] 	= "Manage Data Category";

		$data['modal_tambah_category'] = show_my_modal('modals/modal_tambah_category', 'tambah-category', $data);

		$this->template->views('category/home', $data);
	}

	public function tampil() {
		$uriget = $this->uri->uri_to_assoc();
		$usage = $uriget['usage'];
		$data['dataCategory'] = $this->category_model->select_usage_all($usage);
		$data['userdata'] 	= $this->userdata;
		$this->load->view('category/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('name', 'name', 'trim|required');

		$data = array(
				'used_for' => $this->input->post('used_for'),
				'name' => $this->input->post('name'),
				'label' => $this->input->post('label'),
				'options' => $this->input->post('options'),
				'status' => $this->input->post('status'),
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->category_model->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Category Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Category Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$uriget = $this->uri->uri_to_assoc();
		$usage = $uriget['usage'];
		$data['userdata'] 	= $this->userdata;
		$data['usage'] 		= $usage;

		$id 				= trim($_POST['id']);
		$data['dataCategory'] 	= $this->category_model->select_by_id($id);

		echo show_my_modal('modals/modal_update_category', 'update-category', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('name', 'name', 'trim|required');

		$data = array(
				'used_for' => $this->input->post('used_for'),
				'name' => $this->input->post('name'),
				'label' => $this->input->post('label'),
				'options' => $this->input->post('options'),
				'status' => $this->input->post('status'),
			);

		$condition = array(
				'id_category' => $this->input->post('id_category')
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->category_model->update($condition, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Category Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Category Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->category_model->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Category Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Category Gagal dihapus', '20px');
		}
	}
}
