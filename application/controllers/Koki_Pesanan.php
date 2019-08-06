<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koki_Pesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Koki") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->pesanan_model->get_list_all_pesanan_menu();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'pesanan',
            'title' => 'Pesanan Menu'
        );
		$this->slice->view('entities.koki.pages.pesanan.index', $data);
	}

	public function confirm($id1,$id2) {
		$this->pesanan_model->confirm_pesanan($id1,$id2);
		$this->session->set_flashdata('success', 'Pesanan menu #'.$id2.' pada pesanan #'.$id1.' telah dilayani!');
		redirect('koki/pesanan');
	}

}
