<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class staff extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('staff_model');
		$this->load->model('category_model');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataStaff'] 	= $this->staff_model->select_all();
		$data['category_hw'] 	= $this->category_model->select_by_usage('hardware');

		$data['page'] 		= "staff";
		$data['judul'] 		= "Data Staff";
		$data['deskripsi'] 	= "Manage Data Staff";

		$data['modal_tambah_staff'] = show_my_modal('modals/modal_tambah_staff', 'tambah-staff', $data);

		$this->template->views('staff/home', $data);
	}

	public function tampil() {
		$data['dataStaff'] = $this->staff_model->select_all();
		$data['userdata'] 	= $this->userdata;
		$this->load->view('staff/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('name', 'name', 'trim|required');

		$data = array(
				'name' => $this->input->post('name'),
				'position' => $this->input->post('position'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'status' => $this->input->post('status'),
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->staff_model->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Staff Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Staff Gagal ditambahkan', '20px');
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
		$data['dataStaff'] 	= $this->staff_model->select_by_id($id);

		echo show_my_modal('modals/modal_update_staff', 'update-staff', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('name', 'name', 'trim|required');

		$data = array(
				'name' => $this->input->post('name'),
				'position' => $this->input->post('position'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'status' => $this->input->post('status'),
			);

		$condition = array(
				'id_staff' => $this->input->post('id_staff')
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->staff_model->update($condition, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Staff Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Staff Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->staff_model->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Staff Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Staff Gagal dihapus', '20px');
		}
	}

	public function detailHw() {
		$data['userdata'] 	= $this->userdata;
		$id = trim($_POST['id']);

		$data['staff'] = $this->staff_model->select_by_id($id);
		$data['jumlahStaff'] = $this->staff_model->total_rows();
		$data['dataHw'] = $this->staff_model->hardware_by_staff($id);

		echo show_my_modal('modals/modal_detail_user_hw', 'detail-staff', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->staff_model->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Name"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Email");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Phone");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Position");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Status");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->name); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->email);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->phone);
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->position);
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->status);
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/data_staff.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/data_staff.xlsx', NULL);
	}
	/*
	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->staff_model->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->staff_model->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Staff Berhasil diimport ke database'));
						redirect('staff');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Staff Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('staff');
				}

			}
		}
	}
	*/
}
