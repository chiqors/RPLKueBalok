<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayan_Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Pelayan") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->menu_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'menu',
            'title' => 'Menu'
        );
		$this->slice->view('entities.pelayan.pages.menu.index', $data);
	}

	public function show($id) {
		$data_get1 = $this->menu_model->get_data($id);
		if (empty($data_get1)) {
			redirect('pelayan/menu');
		}
		$data_get2 = $this->menu_model->get_list_menu_bahanbaku($id);
		$data = array(
			'info1' => $data_get1,
			'info2' => $data_get2,
            'title' => 'Tampil Menu #'.$id
        );
		$this->slice->view('entities.pelayan.pages.menu.show', $data);
	}

}
