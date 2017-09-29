<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplier extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('supplier_model');
		$this->load->model('category_model');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataSupplier'] 	= $this->supplier_model->select_all();
		$data['category_hw'] 	= $this->category_model->select_by_usage('hardware');

		$data['page'] 		= "supplier";
		$data['judul'] 		= "Supplier";
		$data['deskripsi'] 	= "Manage Data Supplier";

		$data['modal_tambah_supplier'] = show_my_modal('modals/modal_tambah_supplier', 'tambah-supplier', $data);

		$this->template->views('supplier/home', $data);
	}

	public function tampil() {
		$data['dataSupplier'] = $this->supplier_model->select_all();
		$data['userdata'] 	= $this->userdata;
		$this->load->view('supplier/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('name', 'name', 'trim|required');

		$data = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax'),
				'city' => $this->input->post('city'),
				'country' => $this->input->post('country'),
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->supplier_model->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Supplier Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Supplier Gagal ditambahkan', '20px');
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
		$data['dataSupplier'] 	= $this->supplier_model->select_by_id($id);

		echo show_my_modal('modals/modal_update_supplier', 'update-supplier', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('name', 'name', 'trim|required');

		$data = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax'),
				'city' => $this->input->post('city'),
				'country' => $this->input->post('country'),
			);

		$condition = array(
				'id_supplier' => $this->input->post('id_supplier')
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->supplier_model->update($condition, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Supplier Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Supplier Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->supplier_model->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Supplier Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Supplier Gagal dihapus', '20px');
		}
	}

	public function detailSuppHw() {
		$data['userdata'] 	= $this->userdata;
		$id = trim($_POST['id']);

		$data['supplier'] = $this->supplier_model->select_by_id($id);
		$data['jumlahSupplier'] = $this->supplier_model->total_rows();
		$data['dataSuppHw'] = $this->supplier_model->hardware_by_supplier($id);

		echo show_my_modal('modals/modal_detail_supplier_hw', 'detail-supplier', $data, 'lg');
	}

	public function detailSuppSw() {
		$data['userdata'] 	= $this->userdata;
		$id = trim($_POST['id']);

		$data['supplier'] = $this->supplier_model->select_by_id($id);
		$data['jumlahSupplier'] = $this->supplier_model->total_rows();
		$data['dataSuppSw'] = $this->supplier_model->software_by_supplier($id);

		echo show_my_modal('modals/modal_detail_supplier_sw', 'detail-supplier', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->supplier_model->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Name"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Email");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Phone");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Fax");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "City");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "Country");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->name); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->email);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->phone);
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->fax);
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->city);
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->country);
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/data_supplier.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/data_supplier.xlsx', NULL);
	}

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
						$check = $this->supplier_model->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->supplier_model->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Supplier Berhasil diimport ke database'));
						redirect('supplier');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Supplier Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('supplier');
				}

			}
		}
	}
}
