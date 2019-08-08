<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pantry_Beranda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Pantry") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get1 = $this->pantry_model->count_total_bahanbaku();
		$data_get2 = $this->pantry_model->check_ketersediaan_bahanbaku();
		$data_get3 = $this->pantry_model->get_list_available_bahanbaku();
		$data = array(
			'info_total_bahanbaku' => $data_get1,
			'info_status_ketersediaan' => $data_get2,
			'info_available_bahanbaku' => $data_get3,
			'activeMenu' => 'beranda',
            'title' => 'Beranda'
        );
		$this->slice->view('entities.pantry.pages.beranda', $data);
	}

}
