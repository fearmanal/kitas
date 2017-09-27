<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_model extends CI_Model {
	public function login($user, $pass) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $user);
		$this->db->where('password', md5($pass));

		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}
}

/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */