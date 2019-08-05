<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function do_login()
	{
		$this->db->where('Username', $this->input->post('Username'));
		$this->db->where('Password', md5($this->input->post('Password')));
		$query = $this->db->get('pengguna');
		return $query->row();
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('pengguna', array('Username' => $info));
		return $query->row();
	}

}
