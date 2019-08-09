<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pantry_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function count_total_bahanbaku()
	{
		$query = $this->db->count_all_results('bahanbaku');
		return $query;
	}

	public function check_ketersediaan_bahanbaku()
	{
		$query = $this->db->select('count(*)');
		$query->from('bahanbaku');
		$query->join('belanja', 'bahanbaku.IdBahanBaku = belanja.IdBahanBaku');
		$query->where('belanja.TanggalKadaluarsa < CURRENT_DATE()');
		$result = $query->count_all_results();
		if ($result > 0) {
			$output = $result;
		} else {
			$output = 0;
		}
		return $output;
	}

	public function get_list_available_bahanbaku()
	{
		$query = $this->db->select('belanja.IdBahanBaku, bahanbaku.Nama, bahanbaku.Jenis, bahanbaku.Kategori, belanja.TanggalKadaluarsa, belanja.Kuantitas');
		$query->from('bahanbaku');
		$query->join('belanja', 'bahanbaku.IdBahanBaku = belanja.IdBahanBaku');
		$query->where('belanja.TanggalKadaluarsa >= CURRENT_DATE()');
		$result = $query->get();
		return $result->result();
	}

}
