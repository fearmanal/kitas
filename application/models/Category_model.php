<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category_model extends CI_Model {
	
	var $table = "category";
	
	public function select_all() {
		$table = $this->table;
		$this->db->select('*');
		$this->db->from($table);

		$data = $this->db->get();
		return $data->result();
	}

	public function select_usage_all($usage) {
		$table = $this->table;
		$where = "used_for = "."'".$usage."'";
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);

		$data = $this->db->get();
		return $data->result();
	}

	public function select_by_usage($usage) {
		$table = $this->table;
		$where = "status = 'Enable' AND used_for = "."'".$usage."'";
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by("label", "asc");

		$data = $this->db->get();
		return $data->result();
	}

	public function select_by_id($id) {
		$table = $this->table;
		$sql = "SELECT * FROM $table WHERE id_category = '{$id}'";
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
		$sql = "DELETE FROM $table WHERE id_category='".$id."'";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function total_rows() {
		$table = $this->table;
		$data = $this->db->get($table);

		return $data->num_rows();
	}
}