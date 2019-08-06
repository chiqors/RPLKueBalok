<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meja_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('meja');
			return $query->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('meja', array('NoMeja' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'Kapasitas' => $this->input->post('Kapasitas'),
			'TipeMeja' => $this->input->post('TipeMeja'),
			'HargaLayananMeja' => $this->input->post('HargaLayananMeja')
		);
		return $this->db->insert('meja', $data);
	}

	public function update($id)
	{
		$data = array(
			'Kapasitas' => $this->input->post('Kapasitas'),
			'TipeMeja' => $this->input->post('TipeMeja'),
			'HargaLayananMeja' => $this->input->post('HargaLayananMeja')
		);
		$this->db->where('NoMeja', $id);
		return $this->db->update('meja', $data);
	}

	public function destroy($id)
	{
		$this->db->where('NoMeja', $id);
		$this->db->delete('meja');
		return true;
	}

}
