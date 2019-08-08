<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koki_Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Koki") {
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
		$this->slice->view('entities.koki.pages.menu.index', $data);
	}

	public function create()
	{
		$data = array(
            'title' => 'Tambah Menu Baru'
        );
		$this->slice->view('entities.koki.pages.menu.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('JenisMenu', 'Jenis Menu', 'required');
		$this->form_validation->set_rules('Nama', 'Nama Menu', 'required');
		$this->form_validation->set_rules('Harga', 'Harga Menu', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('koki/menu/create');
		} else {
			$info_id_menu = $this->menu_model->store();
			$info_lanjut = array(
				'info_id_menu'  => $info_id_menu
			);
			$this->session->set_userdata($info_lanjut);
			$this->session->set_flashdata('success', 'Menu baru telah ditambahkan, Menuju ke Bahan Baku');
			redirect('koki/menu/bahanbaku/create');
		}
	}

	public function create_menu_bahanbaku()
	{
		$data_get1 = $this->menu_model->get_list_bahanbaku();
		$data_get2 = $this->menu_model->get_list_menu_bahanbaku($this->session->info_id_menu);
		$data = array(
			'info_bahanbaku' => $data_get1,
			'info_menu_bahanbaku' => $data_get2,
            'title' => 'Tambah Menu Bahan Baku'
        );
		$this->slice->view('entities.koki.pages.menu.form_bahanbaku', $data);
	}

	public function store_menu_bahanbaku()
	{
		$this->form_validation->set_rules('IdMenu', 'ID Menu', 'required');
		$this->form_validation->set_rules('IdBahanBaku', 'ID Bahan Baku', 'required');
		$this->form_validation->set_rules('Jumlah', 'Jumlah', 'required');

		if ($this->input->post('submitForm') == 'loop') {
			if ($this->form_validation->run() === FALSE) {
				$this->session->set_flashdata('error', validation_errors());
				redirect('koki/menu/bahanbaku/create');
			} else {
				$this->menu_model->store_bahanbaku();
				$this->session->set_flashdata('success', 'Bahan Baku berhasil didaftarkan, Silahkan mendaftarkan bahan baku lainnya!');
				redirect('koki/menu/bahanbaku/create');
			}
		} else {
			$info_lanjut = array('info_id_menu');
			$this->session->unset_userdata($info_lanjut);
			$this->session->set_flashdata('success', 'Bahan Baku telah dicatat, Menu berhasil ditambahkan');
			redirect('koki/menu');
		}
	}
	
	public function show($id) {
		$data_get1 = $this->menu_model->get_data($id);
		if (empty($data_get1)) {
			redirect('koki/menu');
		}
		$data_get2 = $this->menu_model->get_list_menu_bahanbaku($id);
		$data = array(
			'info1' => $data_get1,
			'info2' => $data_get2,
            'title' => 'Tampil Menu #'.$id
        );
		$this->slice->view('entities.koki.pages.menu.show', $data);
	}

	public function show_create_menu_bahanbaku($id)
	{
		$data_get1 = $this->menu_model->get_list_bahanbaku();
		$data_get2 = $this->menu_model->get_list_menu_bahanbaku($id);
		$data = array(
			'info_id_menu' => $id,
			'info_bahanbaku' => $data_get1,
			'info_menu_bahanbaku' => $data_get2,
            'title' => 'Tambah Menu Bahan Baku'
        );
		$this->slice->view('entities.koki.pages.menu.form_show_bahanbaku', $data);
	}

	public function show_store_menu_bahanbaku()
	{
		$this->form_validation->set_rules('IdMenu', 'ID Menu', 'required');
		$this->form_validation->set_rules('IdBahanBaku', 'ID Bahan Baku', 'required');
		$this->form_validation->set_rules('Jumlah', 'Jumlah', 'required');

		if ($this->input->post('submitForm') == 'loop') {
			if ($this->form_validation->run() === FALSE) {
				$this->session->set_flashdata('error', validation_errors());
				redirect('koki/menu/bahanbaku/create');
			} else {
				$this->menu_model->store_bahanbaku();
				$this->session->set_flashdata('success', 'Bahan Baku berhasil didaftarkan, Silahkan mendaftarkan bahan baku lainnya!');
				redirect('koki/menu/bahanbaku/create');
			}
		} else {
			$this->session->set_flashdata('success', 'Bahan Baku telah ditambahkan pada menu!');
			redirect('koki/menu');
		}
	}

	public function edit($id) {
		$data_get = $this->menu_model->get_data($id);
		if (empty($data_get)) {
			redirect('koki/menu');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Menu #'.$id
        );
		$this->slice->view('entities.koki.pages.menu.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('JenisMenu', 'Jenis Menu', 'required');
		$this->form_validation->set_rules('Nama', 'Nama Menu', 'required');
		$this->form_validation->set_rules('Harga', 'Harga Menu', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('koki/menu/edit/'.$id);
		} else {
			$this->menu_model->update($id);
			$this->session->set_flashdata('success', 'Menu #'.$id.' telah diperbaharui');
			redirect('koki/menu');
		}
	}

	public function destroy($id)
	{
		$this->menu_model->destroy($id);
		$this->session->set_flashdata('success', 'Menu #'.$id.' telah terhapus');
		redirect('koki/menu');
	}

}
