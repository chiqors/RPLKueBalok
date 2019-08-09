<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('menu');
			return $query->result();
		}
	}

	public function get_list_bahanbaku($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get_where('bahanbaku');
			return $query->result();
		}
	}

	public function get_list_menu_bahanbaku($id, $search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->select('*');
			$query->from('bahanbaku');
			$query->join('menu_bahanbaku', 'bahanbaku.IdBahanBaku = menu_bahanbaku.IdBahanBaku');
			$query->where('menu_bahanbaku.IdMenu =', $id);
			$result = $query->get();
			return $result->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('menu', array('IdMenu' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'JenisMenu' => $this->input->post('JenisMenu'),
			'Nama' => $this->input->post('Nama'),
			'Harga' => $this->input->post('Harga')
		);
		$this->db->insert('menu', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function store_bahanbaku()
	{
		$data = array(
			'IdMenu' => $this->input->post('IdMenu'),
			'IdBahanBaku' => $this->input->post('IdBahanBaku'),
			'Jumlah' => $this->input->post('Jumlah')
		);
		return $this->db->insert('menu_bahanbaku', $data);
	}

	public function update($id)
	{
		$data = array(
			'JenisMenu' => $this->input->post('JenisMenu'),
			'Nama' => $this->input->post('Nama'),
			'Harga' => $this->input->post('Harga')
		);
		$this->db->where('IdMenu', $id);
		return $this->db->update('menu', $data);
	}

	public function destroy($id)
	{
		$query1 = $this->db->where('IdMenu', $id);
		$query1->delete('menu_bahanbaku');
		$query2 = $this->db->where('IdMenu', $id);
		$query2->delete('menu');
	}

}
