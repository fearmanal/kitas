<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class devices_model extends CI_Model {
	
	var $table = "hardware";
	
	public function select_all() {
		$table = $this->table;
		$this->db->select('*');
		$this->db->from($table);

		$data = $this->db->get();
		return $data->result();
	}

	public function select_by_category($category) {
		$table = $this->table;
		$where = "category = "."'".$category."'";
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);

		$data = $this->db->get();
		return $data->result();
	}

	public function select_by_id($id) {
		$table = $this->table;
		$sql = "SELECT * FROM $table WHERE id_hardware = '{$id}'";
		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$table = $this->table;
		$this->db->insert($table, $data);
		return $this->db->insert_id();		
	}

	public function insert_batch($data) {
		$table = $this->table;
		$this->db->insert_batch($table, $data);
		
		return $this->db->affected_rows();
	}

	public function update($where, $data) {
		$table = $this->table;
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete($id) {
		$table = $this->table;
		$sql = "DELETE FROM $table WHERE id_hardware='".$id."'";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$table = $this->table;
		$this->db->where('label', $nama);
		$data = $this->db->get($table);

		return $data->num_rows();
	}

	public function total_rows() {
		$table = $this->table;
		$data = $this->db->get($table);

		return $data->num_rows();
	}

	public function total_devcat($category) {
		$table = $this->table;
		$this->db->where('category', $category);
		$data = $this->db->get($table);

		return $data->num_rows();
	}

	public function list_user() {
		$this->db->select('*');
		$this->db->from('staff');
		$data = $this->db->get();

		return $data->result();
	}

	public function user_by_id($id) {
		$table = $this->table;
		$sql = "SELECT * FROM staff WHERE id_staff = '{$id}'";
		$data = $this->db->query($sql);

		return $data->row();
	}

	public function list_supplier() {
		$this->db->select('*');
		$this->db->from('supplier');
		$data = $this->db->get();

		return $data->result();
	}

	public function supplier_by_id($id) {
		$table = $this->table;
		$sql = "SELECT * FROM supplier WHERE id_supplier = '{$id}'";
		$data = $this->db->query($sql);

		return $data->row();
	}
}