<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_list_all_pesanan_menu($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('detailmenupesanan');
			return $query->result();
		}
	}

	public function confirm_pesanan($id1, $id2)
	{
		$data = array(
			'StatusMenu' => 'Sudah Dilayani'
		);
		$this->db->where('KodePesanan', $id1);
		$this->db->where('IdMenu', $id2);
		return $this->db->update('detailmenupesanan', $data);
	}

}
