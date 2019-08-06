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
		$data = array(
			'activeMenu' => 'pendapatan',
            'title' => 'Pendapatan'
        );
		$this->slice->view('entities.owner.pages.pendapatan', $data);
	}

}
