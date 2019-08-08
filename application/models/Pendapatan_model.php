<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function count_total_pembayaran($periodik)
	{
		if ($periodik == "Bulan") {
			$query = $this->db->where('MONTH(pembayaran.Tanggalbayar) = MONTH(CURRENT_DATE())');
			$query->where('YEAR(pembayaran.Tanggalbayar) = YEAR(CURRENT_DATE())'); 
			$result = $query->count_all_results('pembayaran');
		} else {
			$query = $this->db->where('MONTH(pembayaran.Tanggalbayar) = MONTH(CURRENT_DATE())');
			$query->where('YEAR(pembayaran.Tanggalbayar) = YEAR(CURRENT_DATE())');
			$query->where('YEARWEEK(pembayaran.Tanggalbayar, 1) = YEARWEEK(CURDATE(), 1)');
			$result = $query->count_all_results('pembayaran');
		}
		return $result;
	}

	public function count_total_belanja_bahanbaku($periodik)
	{
		if ($periodik == "Bulan") {
			$query = $this->db->where('MONTH(belanja.TanggalBeli) = MONTH(CURRENT_DATE())');
			$query->where('YEAR(belanja.TanggalBeli) = YEAR(CURRENT_DATE())'); 
			$result = $query->count_all_results('belanja');
		} else {
			$query = $this->db->where('MONTH(belanja.TanggalBeli) = MONTH(CURRENT_DATE())');
			$query->where('YEAR(belanja.TanggalBeli) = YEAR(CURRENT_DATE())');
			$query->where('YEARWEEK(belanja.TanggalBeli, 1) = YEARWEEK(CURDATE(), 1)');
			$result = $query->count_all_results('belanja');
		}
		return $result;
	}

	public function total_bayar($periodik)
	{
		if ($periodik == "Bulan") {
			$query = $this->db->select_sum('TotalBayar');
			$query->where('MONTH(pembayaran.Tanggalbayar) = MONTH(CURRENT_DATE())');
			$query->where('YEAR(pembayaran.Tanggalbayar) = YEAR(CURRENT_DATE())'); 
			$result = $query->get('pembayaran')->row();
		} else {
			$query = $this->db->select_sum('TotalBayar');
			$query->where('MONTH(pembayaran.Tanggalbayar) = MONTH(CURRENT_DATE())');
			$query->where('YEAR(pembayaran.Tanggalbayar) = YEAR(CURRENT_DATE())');
			$query->where('YEARWEEK(pembayaran.Tanggalbayar, 1) = YEARWEEK(CURDATE(), 1)');
			$result = $query->get('pembayaran')->row();
		}
		$real_result = $result->TotalBayar;	
		return $real_result;
	}

	public function total_pendapatan($periodik)
	{
		if ($periodik == "Bulan") {
			$query1 = $this->db->select_sum('TotalBayar');
			$query1->where('MONTH(pembayaran.Tanggalbayar) = MONTH(CURRENT_DATE())');
			$query1->where('YEAR(pembayaran.Tanggalbayar) = YEAR(CURRENT_DATE())'); 
			$result1 = $query1->get('pembayaran')->row();

			$query2 = $this->db->select_sum('bahanbaku.Harga');
			$query2->from('belanja');
			$query2->join('bahanbaku', 'belanja.IdBahanBaku = bahanbaku.IdBahanBaku');
			$query2->where('MONTH(belanja.TanggalBeli) = MONTH(CURRENT_DATE())');
			$query2->where('YEAR(belanja.TanggalBeli) = YEAR(CURRENT_DATE())'); 
			$result2 = $query2->get()->row();
		} else {
			$query1 = $this->db->select_sum('TotalBayar');
			$query1->where('MONTH(pembayaran.Tanggalbayar) = MONTH(CURRENT_DATE())');
			$query1->where('YEAR(pembayaran.Tanggalbayar) = YEAR(CURRENT_DATE())');
			$query1->where('YEARWEEK(pembayaran.Tanggalbayar, 1) = YEARWEEK(CURDATE(), 1)');
			$result1 = $query1->get('pembayaran')->row();

			$query2 = $this->db->select_sum('bahanbaku.Harga');
			$query2->from('belanja');
			$query2->join('bahanbaku', 'belanja.IdBahanBaku = bahanbaku.IdBahanBaku');
			$query2->where('MONTH(belanja.TanggalBeli) = MONTH(CURRENT_DATE())');
			$query2->where('YEAR(belanja.TanggalBeli) = YEAR(CURRENT_DATE())');
			$query2->where('YEARWEEK(belanja.TanggalBeli, 1) = YEARWEEK(CURDATE(), 1)');
			$result2 = $query2->get()->row();
		}
		$real_result = $result1->TotalBayar - $result2->Harga;
		return $real_result;
	}

}
