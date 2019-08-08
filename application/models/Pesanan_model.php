<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('pesanan');
			return $query->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('pesanan', array('KodePesanan' => $info));
		return $query->row();
	}

	public function get_list_available_meja()
	{
		$query = $this->db->get('meja');
		return $query->result();
	}

	public function get_list_pesanan_meja($info, $search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get_where('detailmejapesanan', array('KodePesanan' => $info));
			return $query->result();
		}
	}

	public function get_list_available_menu()
	{
		$query = $this->db->get('menu');
		return $query->result();
	}

	public function get_list_pesanan_menu($info, $search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get_where('detailmenupesanan', array('KodePesanan' => $info));
			return $query->result();
		}
	}

	public function store()
	{
		$data = array(
			'KodePesanan' => $this->input->post('KodePesanan'),
			'NIP' => $this->input->post('NIP'),
			'TanggalPesanan' => $this->input->post('TanggalPesanan'),
			'StatusPesanan' => $this->input->post('StatusPesanan'),
			'NamaPelanggan' => $this->input->post('NamaPelanggan'),
			'NoTelepon' => $this->input->post('NoTelepon'),
			'Email' => $this->input->post('Email')
		);
		$this->db->insert('pesanan', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
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
