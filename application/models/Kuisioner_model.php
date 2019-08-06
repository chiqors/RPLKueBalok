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

	public function get_data($info)
	{
		$query = $this->db->get_where('kuisioner', array('IdKuisioner' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'StatusKuisioner' => 'Sudah Diisi',
			'Jwb_kondisi' => $this->input->post('Jwb_kondisi'),
			'Jwb_tempat' => $this->input->post('Jwb_tempat'),
			'Jwb_menu' => $this->input->post('Jwb_menu'),
			'Jwb_servis' => $this->input->post('Jwb_servis'),
			'TanggalPengisian' => $this->input->post('TanggalPengisian')
		);
		return $this->db->insert('kuisioner', $data);
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
		$this->db->where('IdKuisioner', $id);
		$this->db->delete('kuisioner');
		return true;
	}

}
