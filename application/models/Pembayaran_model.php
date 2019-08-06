<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('pembayaran');
			return $query->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('pembayaran', array('KodePesanan' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'KodePesanan' => $this->input->post('KodePesanan'),
			'IdKuisioner' => $this->input->post('IdKuisioner'),
			'TanggalBayar' => $this->input->post('TanggalBayar'),
			'SubTotalBayar' => $this->input->post('SubTotalBayar'),
			'Diskon' => $this->input->post('Diskon'),
			'TotalBayar' => $this->input->post('TotalBayar')
		);
		return $this->db->insert('pembayaran', $data);
	}

}
