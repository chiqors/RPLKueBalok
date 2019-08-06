<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koki_Bahanbaku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Koki") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get1 = $this->bahanbaku_model->get_list();
		$data_get2 = $this->bahanbaku_model->get_all_list_belanja();
		$data = array(
			'info1' => $data_get1,
			'info2' => $data_get2,
			'activeMenu' => 'bahanbaku',
            'title' => 'Bahan Baku'
        );
		$this->slice->view('entities.koki.pages.bahanbaku.index', $data);
	}

	public function show($id) {
		$data_get1 = $this->bahanbaku_model->get_data($id);
		if (empty($data_get1)) {
			redirect('koki/bahanbaku');
		}
		$data_get2 = $this->bahanbaku_model->get_list_belanja($id);
		$data = array(
			'info1' => $data_get1,
			'info2' => $data_get2,
			'info_bahanbaku' => $id,
            'title' => 'Tampil Bahan Baku #'.$id
        );
		$this->slice->view('entities.koki.pages.bahanbaku.show', $data);
	}

}
