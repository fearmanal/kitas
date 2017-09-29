<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('category_model');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataUsers'] 	= $this->users_model->select_all();
		$data['category_hw'] 	= $this->category_model->select_by_usage('hardware');

		$data['page'] 		= "users";
		$data['judul'] 		= "Users";
		$data['deskripsi'] 	= "Manage Data Users";

		$data['modal_tambah_users'] = show_my_modal('modals/modal_tambah_users', 'tambah-users', $data);

		$this->template->views('users/home', $data);
	}

	public function tampil() {
		$data['dataUsers'] = $this->users_model->select_all();
		$data['userdata'] 	= $this->userdata;
		$this->load->view('users/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');

		$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'nama' => $this->input->post('nama'),
				'role' => $this->input->post('role'),
				'email' => $this->input->post('email'),
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->users_model->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Users Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Users Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataUsers'] 	= $this->users_model->select_by_id($id);

		echo show_my_modal('modals/modal_update_users', 'update-users', $data);
	}

	public function resetpass() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataUsers'] 	= $this->users_model->select_by_id($id);

		echo show_my_modal('modals/modal_resetpass_users', 'resetpass-users', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');

		$data = array(
				'username' => $this->input->post('username'),
				'nama' => $this->input->post('nama'),
				'role' => $this->input->post('role'),
				'email' => $this->input->post('email'),
			);

		$condition = array(
				'id' => $this->input->post('id')
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->users_model->update($condition, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Users Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Users Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function prosesResetpass() {
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('password_confirm', 'password_confirm', 'trim|required');

		if ($this->input->post('password') != $this->input->post('password_confirm')) {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('Password &amp; Confirm Password not same');
		} else {
			$data = array(
					'password' => md5($this->input->post('password')),
				);

			$condition = array(
					'id' => $this->input->post('id')
				);

			if ($this->form_validation->run() == TRUE) {
				$result = $this->users_model->update($condition, $data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Password berhasil direset', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Password gagal direset', '20px');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
			}
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->users_model->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Users Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Users Gagal dihapus', '20px');
		}
	}
}
