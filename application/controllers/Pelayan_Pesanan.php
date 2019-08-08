<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayan_Pesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Pelayan") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->pesanan_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'pesanan',
            'title' => 'Pesanan'
        );
		$this->slice->view('entities.pelayan.pages.pesanan.index', $data);
	}

	public function create()
	{
		$data = array(
            'title' => 'Tambah Pesanan Baru'
        );
		$this->slice->view('entities.pelayan.pages.pesanan.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('KodePesanan', 'Kode Pesanan', 'required');
		$this->form_validation->set_rules('NIP', 'NIP (Kasir)', 'required');
		$this->form_validation->set_rules('TanggalPesanan', 'Tanggal Pesanan', 'required');
		$this->form_validation->set_rules('StatusPesanan', 'Status Pesanan', 'required');
		$this->form_validation->set_rules('NamaPelanggan', 'Nama Pelanggan', 'required');
		$this->form_validation->set_rules('NoTelepon', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('Email', 'Email', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('pelayan/pesanan/create');
		} else {
			$info_kode_pesanan = $this->pesanan_model->store();
			$info_lanjut = array(
				'info_kode_pesanan'  => $info_kode_pesanan
			);
			$this->session->set_userdata($info_lanjut);
			$this->session->set_flashdata('success', 'Pesanan baru telah ditambahkan, Silahkan isi form pesanan meja!');
			redirect('pelayan/pesanan/meja/create');
		}
	}

	public function create_pesanan_meja()
	{
		$data_get1 = $this->pesanan_model->get_data($this->session->info_kode_pesanan);
		$data_get2 = $this->pesanan_model->get_list_available_meja();
		$data_get3 = $this->pesanan_model->get_list_pesanan_meja($this->session->info_kode_pesanan);
		$data = array(
			'info1' => $data_get1,
			'info2' => $data_get2,
			'info3' => $data_get3,
            'title' => 'Tambah Pesanan Meja Baru'
        );
		$this->slice->view('entities.pelayan.pages.pesanan.form_meja', $data);
	}

	public function store_pesanan_meja()
	{
		$this->form_validation->set_rules('NoMeja', 'Nomor Meja', 'required');

		if ($this->input->post('submitForm') == 'loop') {
			if ($this->form_validation->run() === FALSE) {
				$this->session->set_flashdata('error', validation_errors());
				redirect('pelayan/pesanan/meja/create');
			} else {
				$this->pesanan_model->store_pesanan_meja($this->session->info_kode_pesanan);
				$this->session->set_flashdata('success', 'Pesanan Meja berhasil didaftarkan, Silahkan mendaftarkan bahan baku lainnya!');
				redirect('pelayan/pesanan/meja/create');
			}
		} else {
			$this->session->set_flashdata('success', 'Pesanan Meja telah dicatat, Silahkan isi pesanan menu!');
			redirect('pelayan/pesanan/menu/create');
		}
	}

	public function create_pesanan_menu()
	{
		$data_get1 = $this->pesanan_model->get_data($this->session->info_kode_pesanan);
		$data_get2 = $this->pesanan_model->get_list_available_menu();
		$data_get3 = $this->pesanan_model->get_list_pesanan_menu($this->session->info_kode_pesanan);
		$data = array(
			'info1' => $data_get1,
			'info2' => $data_get2,
			'info3' => $data_get3,
            'title' => 'Tambah Pesanan Menu Baru'
        );
		$this->slice->view('entities.pelayan.pages.pesanan.form_menu', $data);
	}

	public function store_pesanan_menu()
	{
		$this->form_validation->set_rules('IdMenu', 'ID Menu', 'required');
		$this->form_validation->set_rules('Kuantitas', 'Kuantitas', 'required');

		if ($this->input->post('submitForm') == 'loop') {
			if ($this->form_validation->run() === FALSE) {
				$this->session->set_flashdata('error', validation_errors());
				redirect('pelayan/pesanan/menu/create');
			} else {
				$this->pesanan_model->store_pesanan_menu($this->session->info_kode_pesanan);
				$this->session->set_flashdata('success', 'Pesanan Menu berhasil didaftarkan, Silahkan mendaftarkan bahan baku lainnya!');
				redirect('pelayan/pesanan/menu/create');
			}
		} else {
			$this->session->set_flashdata('success', 'Pesanan Menu telah dicatat, Pesanan berhasil ditambahkan!');
			redirect('pelayan/pesanan');
		}
	}

	public function show($id) {
		$data_get1 = $this->pesanan_model->get_data($id);
		if (empty($data_get1)) {
			redirect('pelayan/pesanan');
		}
		$data_get2 = $this->pesanan_model->get_list_pesanan_meja($id);
		$data_get3 = $this->pesanan_model->get_list_pesanan_menu($id);
		$data = array(
			'info1' => $data_get1,
			'info2' => $data_get2,
			'info3' => $data_get3,
            'title' => 'Tampil Pesanan #'.$id
        );
		$this->slice->view('entities.pelayan.pages.pesanan.show', $data);
	}

}
