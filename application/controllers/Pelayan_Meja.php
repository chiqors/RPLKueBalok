<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayan_Meja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Pelayan") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->meja_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'meja',
            'title' => 'Meja'
        );
		$this->slice->view('entities.pelayan.pages.meja.index', $data);
	}

	public function create()
	{
		$data = array(
            'title' => 'Tambah Meja Baru'
        );
		$this->slice->view('entities.pelayan.pages.meja.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('Kapasitas', 'Kapasitas', 'required');
		$this->form_validation->set_rules('TipeMeja', 'Tipe Meja', 'required');
		$this->form_validation->set_rules('HargaLayananMeja', 'Harga Layanan Meja', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('pelayan/meja/create');
		} else {
			$this->meja_model->store();
			$this->session->set_flashdata('success', 'Meja baru telah ditambahkan');
			redirect('pelayan/meja');
		}
	}

	public function show($id) {
		$data_get = $this->meja_model->get_data($id);
		if (empty($data_get)) {
			redirect('pelayan/meja');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Tampil Meja #'.$id
        );
		$this->slice->view('entities.pelayan.pages.meja.show', $data);
	}

	public function edit($id) {
		$data_get = $this->meja_model->get_data($id);
		if (empty($data_get)) {
			redirect('pelayan/meja');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Meja #'.$id
        );
		$this->slice->view('entities.pelayan.pages.meja.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('Kapasitas', 'Kapasitas', 'required');
		$this->form_validation->set_rules('TipeMeja', 'Tipe Meja', 'required');
		$this->form_validation->set_rules('HargaLayananMeja', 'Harga Layanan Meja', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('pelayan/meja/edit/'.$id);
		} else {
			$this->meja_model->update($id);
			$this->session->set_flashdata('success', 'Meja #'.$id.' telah diperbaharui');
			redirect('pelayan/meja');
		}
	}

	public function destroy($id)
	{
		$this->meja_model->destroy($id);
		$this->session->set_flashdata('success', 'Kuisioner #'.$id.' telah terhapus');
		redirect('pelayan/meja');
	}

}
