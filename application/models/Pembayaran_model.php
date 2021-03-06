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
			$query = $this->db->select('*');
			$query->from('pesanan');
			$query->join('pembayaran', 'pesanan.KodePesanan = pembayaran.KodePesanan');
			$result = $query->get()->result();
			return $result;
		}
	}

	public function get_list_pesanan($search = FALSE)
	{
		if ($search === FALSE) {
			$this->db->where('StatusPesanan = ', 'Sudah Dilayani');
			$query = $this->db->get('pesanan');
			return $query->result();
		}
		/*if ($search === FALSE) {
			$query = $this->db->select('*');
			$query->from('pesanan');
			$query->join('pembayaran', 'pesanan.KodePesanan = pembayaran.KodePesanan');
			$result = $query->get()->result();
			return $result;
		}*/
	}

	public function get_data($info)
	{
		$query = $this->db->select('*');
		$query->from('pesanan');
		$query->join('pembayaran', 'pesanan.KodePesanan = pembayaran.KodePesanan');
		$query->where('KodePesanan', $info);
		$result = $query->get()->result();
		return $result;
		return $query->row();
	}

	public function get_data_pesanan_subtotalbayar($id) {
		$sql = "
				SELECT SUM(menu.Harga)+SUM(meja.HargaLayananMeja) AS SubTotalBayar
				FROM
					pesanan JOIN detailmenupesanan USING(KodePesanan)
							JOIN menu USING(IdMenu)
							JOIN detailmejapesanan USING(KodePesanan)
							JOIN meja USING(NoMeja)
				WHERE
					pesanan.KodePesanan = $id
		";
		$query = $this->db->query($sql);
		return $query->row();
	}
	
	public function store()
	{
		$data = array(
			'KodePesanan' => $this->input->post('KodePesanan'),
			'TanggalBayar' => $this->input->post('TanggalBayar'),
			'SubTotalBayar' => $this->input->post('SubTotalBayar'),
			'Diskon' => $this->input->post('Diskon'),
			'TotalBayar' => $this->input->post('TotalBayar')
		);
		return $this->db->insert('pembayaran', $data);
	}

}
