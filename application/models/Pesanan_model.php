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
			$query = $this->db->where('KodePesanan', $info);
			$result = $query->get('detailmejapesanan');
			return $result->result();
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
		return $this->input->post('KodePesanan');
	}

	public function store_pesanan_meja($info)
	{
		$data = array(
			'KodePesanan' => $info,
			'NoMeja' => $this->input->post('NoMeja'),
			'TanggalWaktuReservasi' => date('Y-m-d')
		);
		return $this->db->insert('detailmejapesanan', $data);
	}

	public function store_pesanan_menu($info)
	{
		$data = array(
			'KodePesanan' => $info,
			'IdMenu' => $this->input->post('IdMenu'),
			'Kuantitas' => $this->input->post('Kuantitas'),
			'StatusMenu' => 'Belum Dilayani'
		);
		return $this->db->insert('detailmenupesanan', $data);
	}

	public function get_list_all_pesanan_menu($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('detailmenupesanan');
			return $query->result();
		}
	}

	public function get_data_sum_($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('detailmenupesanan');
			return $query->result();
		}
	}

	public function confirm_pesanan($id1, $id2)
	{
		$data1 = array(
			'StatusMenu' => 'Sudah Dilayani'
		);
		$query1 = $this->db->where('KodePesanan', $id1);
		$query1->where('IdMenu', $id2);
		$query1->update('detailmenupesanan', $data1);

		$query2 = $this->db->where('KodePesanan', $id1);
		$query2->where('StatusMenu', 'Dipesan');
		$result2 = $query2->count_all_results('detailmenupesanan');
		if ($result2 == 0) {
			$data3 = array(
				'StatusPesanan' => 'Sudah Dilayani'
			);
			$query3 = $this->db->where('KodePesanan', $id1);
			$query3->update('pesanan', $data3);
		}
	}

	/*public function confirm_pesanan($id1, $id2)
	{
		$data = array(
			'StatusMenu' => 'Sudah Dilayani'
		);
		$query1 = $this->db->where('KodePesanan', $id1);
		$query1->where('IdMenu', $id2);
		$query1->update('detailmenupesanan', $data);

		$query2 = $this->db->where('IdMenu', $id2);
		$result2 = $query2->get('menu_bahanbaku')->result();

		foreach ($result2 as $get_data) {
			$idbahanbaku = $get_data->IdBahanBaku;
			$kuantitas = $get_data->Kuantitas;
			$query3 = $this->db->where('IdBahanBaku', $idbahanbaku);
			$result3 = $query3->get('belanja')->result();
			foreach ($result3 as $get_data_belanja_bahanbaku) {
				$idbelanja = $get_data_belanja_bahanbaku->IdBelanja;
				$kuantitasbelanja = $get_data_belanja_bahanbaku->Kuantitas;
				if ($kuantitas > $kuantitasbelanja) {
					$query4 = $this->db->where('IdBelanja', $idbelanja);
					$query4->destroy('belanja');
					$kuantitas = $kuantitas - $kuantitasbelanja;
				} else {
					if ($kuantitas < $kuantitasbelanja) {
						$current_kuantitas = $kuantitasbelanja - $kuantitas;
						$data5 = array(
							'Kuantitas' => $current_kuantitas
						);
						$query5 = $this->db->where('IdBelanja', $idbelanja);
						$query5->update('belanja', $data5);
					} else {
						$query6 = $this->db->where('IdBelanja', $idbelanja);
						$query6->destroy('belanja');
					}
				}
			}
		}
	}*/

}
