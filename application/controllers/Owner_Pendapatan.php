<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner_Pendapatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Owner") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		if (!empty($this->input->get('periodik'))) {
			$data_get1 = $this->pendapatan_model->count_total_pembayaran($this->input->get('Periodik'));
			$data_get2 = $this->pendapatan_model->count_total_belanja_bahanbaku($this->input->get('Periodik'));
			$data_get3 = $this->pendapatan_model->total_bayar($this->input->get('Periodik'));
			$data_get4 = $this->pendapatan_model->total_pendapatan($this->input->get('Periodik'));
			if ($data_get4 > 0) {
				$data_get5 = "Untung";
			} else {
				$data_get5 = "Rugi";
			}
			$data = array(
				'info_jumlah_pembayaran' => $data_get1,
				'info_jumlah_belanja_bahanbaku' => $data_get2,
				'info_total_pembayaran' => $data_get3,
				'info_total_pendapatan' => $data_get4,
				'info_status' => $data_get5,
				'activeMenu' => 'pendapatan',
				'title' => 'Pendapatan'
			);
		} else {
			$data = array(
				'activeMenu' => 'pendapatan',
				'title' => 'Pendapatan'
			);
		}
		
		$this->slice->view('entities.owner.pages.pendapatan', $data);
	}

}
