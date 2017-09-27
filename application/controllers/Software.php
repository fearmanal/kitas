<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class software extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('software_model');
		$this->load->model('category_model');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataSoftware'] 	= $this->software_model->select_all();
		$data['listSupplier'] 	= $this->software_model->list_supplier();
		$data['category_hw'] 	= $this->category_model->select_by_usage('hardware');

		$data['page'] 		= "software";
		$data['judul'] 		= "Data Software";
		$data['deskripsi'] 	= "Manage Data Software";

		$data['modal_tambah_software'] = show_my_modal('modals/modal_tambah_software', 'tambah-software', $data);

		$this->template->views('software/home', $data);
	}

	public function tampil() {
		$data['dataSoftware'] = $this->software_model->select_all();
		$data['userdata'] 	= $this->userdata;
		$this->load->view('software/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('name', 'Name', 'trim|required');

		$data = array(
				'id_supplier' => $this->input->post('id_supplier'),
				'name' => $this->input->post('name'),
				'manufacturer' => $this->input->post('manufacturer'),
				'version' => $this->input->post('version'),
				'price' => $this->input->post('price'),
				'purchase_date' => $this->input->post('purchase_date'),
				'license_qty' => $this->input->post('license_qty'),
				'license_start_date' => $this->input->post('license_start_date'),
				'license_end_date' => $this->input->post('license_end_date'),
				'description' => $this->input->post('description'),
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->software_model->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Software Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Software Gagal ditambahkan', '20px');
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
		$data['dataSoftware'] 	= $this->software_model->select_by_id($id);
		$data['listSupplier'] 	= $this->software_model->list_supplier();

		echo show_my_modal('modals/modal_update_software', 'update-software', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('name', 'Name', 'trim|required');

		$data = array(
				'id_supplier' => $this->input->post('id_supplier'),
				'name' => $this->input->post('name'),
				'manufacturer' => $this->input->post('manufacturer'),
				'version' => $this->input->post('version'),
				'price' => $this->input->post('price'),
				'purchase_date' => $this->input->post('purchase_date'),
				'license_qty' => $this->input->post('license_qty'),
				'license_start_date' => $this->input->post('license_start_date'),
				'license_end_date' => $this->input->post('license_end_date'),
				'description' => $this->input->post('description'),
			);

		$condition = array(
				'id_software' => $this->input->post('id_software')
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->software_model->update($condition, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Software Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Software Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->software_model->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Software Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Software Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->software_model->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Name"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Manufacturer");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Version");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Supplier");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Price");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "Purchase Date");
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', "License Quantity");
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', "License Start Date");
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', "License End Date");
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', "Description");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->name); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->manufacturer);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->version);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $this->software_model->supplier_by_id($value->id_supplier)->name);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->price);
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->purchase_date);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->license_qty);
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->license_start_date);
			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->license_end_date);
			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->description);
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/data_software.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/data_software.xlsx', NULL);
	}
}
