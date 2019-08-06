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
		$data = array(
			'activeMenu' => 'beranda',
            'title' => 'Beranda'
        );
		$this->slice->view('entities.pantry.pages.beranda', $data);
	}

}
