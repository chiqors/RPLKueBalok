<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbaku_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('bahanbaku');
			return $query->result();
		}
	}

	public function get_all_list_belanja($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('belanja');
			return $query->result();
		}
	}

	public function get_list_belanja($id, $search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get_where('belanja', array('IdBahanBaku' => $id));
			return $query->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('bahanbaku', array('IdBahanBaku' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'Nama' => $this->input->post('Nama'),
			'Jenis' => $this->input->post('Jenis'),
			'Kategori' => $this->input->post('Kategori')
		);
		return $this->db->insert('bahanbaku', $data);
	}

	public function update($id)
	{
		$data = array(
			'Nama' => $this->input->post('Nama'),
			'Jenis' => $this->input->post('Jenis'),
			'Kategori' => $this->input->post('Kategori')
		);
		$this->db->where('IdBahanBaku', $id);
		return $this->db->update('bahanbaku', $data);
	}

	public function destroy($id)
	{
		$query1 = $this->db->where('IdBahanBaku', $id);
		$query1->delete('belanja');
		$query2 = $this->db->where('IdBahanBaku', $id);
		$query2->delete('menu_bahanbaku');
		$query3 = $this->db->where('IdBahanBaku', $id);
		$query3->delete('bahanbaku');
		return true;
	}

	public function store_belanja($id)
	{
		$data = array(
			'IdBahanBaku' => $id,
			'Kuantitas' => $this->input->post('Kuantitas'),
			'TanggalKadaluarsa' => $this->input->post('TanggalKadaluarsa'),
			'TanggalBeli' => date('Y-m-d')
		);
		return $this->db->insert('belanja', $data);
	}

}
