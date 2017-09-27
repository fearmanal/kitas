<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {
	public function update($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("user", $data);

		return $this->db->affected_rows();
	}

	public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('user');

		return $data->row();
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */