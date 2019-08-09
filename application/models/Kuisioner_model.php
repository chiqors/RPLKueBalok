<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisioner_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('kuisioner');
			return $query->result();
		}
	}

	public function get_list_pembayaran($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->select('*');
			$query->from('pesanan');
			$query->join('pembayaran', 'pesanan.KodePesanan = pembayaran.KodePesanan');
			$query->where('pesanan.StatusPesanan =', 'Sudah Dilayani');
			$result = $this->db->get();
			return $result->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('kuisioner', array('IdKuisioner' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'IdPembayaran' => $this->input->post('IdPembayaran'),
			'StatusKuisioner' => 'Sudah Diisi',
			'Jwb_kondisi' => $this->input->post('Jwb_kondisi'),
			'Jwb_tempat' => $this->input->post('Jwb_tempat'),
			'Jwb_menu' => $this->input->post('Jwb_menu'),
			'Jwb_servis' => $this->input->post('Jwb_servis'),
			'TanggalPengisian' => $this->input->post('TanggalPengisian')
		);
		$this->db->insert('kuisioner', $data);
	}

	public function update($id)
	{
		$data = array(
			'Jwb_kondisi' => $this->input->post('Jwb_kondisi'),
			'Jwb_tempat' => $this->input->post('Jwb_tempat'),
			'Jwb_menu' => $this->input->post('Jwb_menu'),
			'Jwb_servis' => $this->input->post('Jwb_servis'),
			'TanggalPengisian' => $this->input->post('TanggalPengisian')
		);
		$this->db->where('IdKuisioner', $id);
		return $this->db->update('kuisioner', $data);
	}

	public function destroy($id)
	{
		$query1 = $this->db->where('IdKuisioner', $id);
		$query1->delete('kuisioner');
		return true;
	}

}
