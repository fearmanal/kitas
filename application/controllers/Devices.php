<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class devices extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('devices_model');
		$this->load->model('category_model');
	}	

	public function index() {
		$uriget = $this->uri->uri_to_assoc();
		$category = $uriget['category'];
		$data['userdata'] 	= $this->userdata;
		$data['dataDevices'] 	= $this->devices_model->select_by_category($category);
		$data['listUser'] 	= $this->devices_model->list_user();
		$data['listSupplier'] 	= $this->devices_model->list_supplier();
		$data['devcat'] 		= $category;
		$data['category_hw'] 	= $this->category_model->select_by_usage('hardware');

		$data['page'] 		= "devices";
		$data['judul'] 		= $category;
		$data['deskripsi'] 	= "Manage Data ".$category;

		$data['modal_tambah_devices'] = show_my_modal('modals/modal_tambah_devices', 'tambah-devices', $data);

		$this->template->views('devices/home', $data);
	}

	public function tampil() {
		$uriget = $this->uri->uri_to_assoc();
		$category = $uriget['category'];
		$data['userdata'] 	= $this->userdata;
		$data['listUser'] 	= $this->devices_model->list_user();
		$data['dataDevices'] = $this->devices_model->select_by_category($category);
		$this->load->view('devices/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('label', 'Label', 'trim|required');

		$data = array(
				'id_supplier' => $this->input->post('id_supplier'),
				'id_staff' => $this->input->post('id_staff'),
				'category' => $this->input->post('category'),
				'name' => $this->input->post('name'),
				'label' => $this->input->post('label'),
				'manufacturer' => $this->input->post('manufacturer'),
				'series' => $this->input->post('series'),
				'price' => $this->input->post('price'),
				'purchase_date' => $this->input->post('purchase_date'),
				'warranty' => $this->input->post('warranty'),				
				'condition' => $this->input->post('condition'),
				'location' => $this->input->post('location'),
				'description' => $this->input->post('description'),
				'cpu' => $this->input->post('cpu'),
				'memory' => $this->input->post('memory'),
				'vga' => $this->input->post('vga'),
				'storage' => $this->input->post('storage'),
				'lan_port' => $this->input->post('lan_port'),
				'wireless_adapter' => $this->input->post('wireless_adapter'),
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->devices_model->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data  Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data  Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$uriget = $this->uri->uri_to_assoc();
		$category = $uriget['category'];
		$data['devcat'] 		= $category;

		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataDevices'] 	= $this->devices_model->select_by_id($id);
		$data['listUser'] 	= $this->devices_model->list_user();
		$data['listSupplier'] 	= $this->devices_model->list_supplier();
		$data['category_hw'] 	= $this->category_model->select_by_usage('hardware');

		echo show_my_modal('modals/modal_update_devices', 'update-devices', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('label', 'Label', 'trim|required');

		$data = array(
				'id_supplier' => $this->input->post('id_supplier'),
				'id_staff' => $this->input->post('id_staff'),
				'category' => $this->input->post('category'),
				'name' => $this->input->post('name'),
				'label' => $this->input->post('label'),
				'manufacturer' => $this->input->post('manufacturer'),
				'series' => $this->input->post('series'),
				'price' => $this->input->post('price'),
				'purchase_date' => $this->input->post('purchase_date'),
				'warranty' => $this->input->post('warranty'),
				'image' => $this->input->post('image'),
				'condition' => $this->input->post('condition'),
				'location' => $this->input->post('location'),
				'description' => $this->input->post('description'),
				'cpu' => $this->input->post('cpu'),
				'memory' => $this->input->post('memory'),
				'vga' => $this->input->post('vga'),
				'storage' => $this->input->post('storage'),
				'lan_port' => $this->input->post('lan_port'),
				'wireless_adapter' => $this->input->post('wireless_adapter'),
			);

		$condition = array(
				'id_hardware' => $this->input->post('id_hardware')
			);

		if ($this->form_validation->run() == TRUE) {
			$result = $this->devices_model->update($condition, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->devices_model->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Gagal dihapus', '20px');
		}
	}

	public function detailUser() {
		$data['userdata'] 	= $this->userdata;
		$id = trim($_POST['id']);

		$data['devices'] = $this->devices_model->select_by_id($id);
		$data['dataUser'] = $this->devices_model->user_by_id($id);

		echo show_my_modal('modals/modal_detail_user', 'detail-devices', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();
		
		$uriget = $this->uri->uri_to_assoc();
		$category = $uriget['category'];
		$data = $this->devices_model->select_by_category($category);

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Devices"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Manufacturer");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Series");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Supplier");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Price");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "Purchase Date");
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', "Warranty");
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', "Description");
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', "Label");
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', "User");
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', "Location");
		$objPHPExcel->getActiveSheet()->SetCellValue('L1', "Condition");
		
		if($category == 'pc' || $category == 'server') {
			$objPHPExcel->getActiveSheet()->SetCellValue('M1', "CPU");
			$objPHPExcel->getActiveSheet()->SetCellValue('N1', "Memory");
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', "VGA");
			$objPHPExcel->getActiveSheet()->SetCellValue('P1', "Storage");
			$objPHPExcel->getActiveSheet()->SetCellValue('Q1', "LAN Port");
			$objPHPExcel->getActiveSheet()->SetCellValue('R1', "Wireless Adapter");
		}

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->name); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->manufacturer);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->series);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $this->devices_model->supplier_by_id($value->id_supplier)->name);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->price);
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->purchase_date);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->warranty.' Month');
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->description);
			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->label);
			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $this->devices_model->user_by_id($value->id_staff)->name);
			$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $value->location);
			$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $value->condition);
			if($category == 'pc' || $category == 'server') {
				$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $value->cpu);
				$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $value->memory);
				$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $value->vga);
				$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $value->storage);
				$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $value->lan_port);
				$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $value->wireless_adapter);
			}
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/data_'.$category.'.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/data_'.$category.'.xlsx', NULL);
	}
}
