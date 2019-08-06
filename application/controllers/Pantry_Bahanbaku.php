<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pantry_Bahanbaku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Pantry") {
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
		$this->slice->view('entities.pantry.pages.bahanbaku.index', $data);
	}

	public function create()
	{
		$data = array(
            'title' => 'Tambah Bahan Baku Baru'
        );
		$this->slice->view('entities.pantry.pages.bahanbaku.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('Nama', 'Nama', 'required');
		$this->form_validation->set_rules('Jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('Kategori', 'Kategori', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('pantry/bahanbaku/create');
		} else {
			$this->bahanbaku_model->store();
			$this->session->set_flashdata('success', 'Bahan Baku baru telah ditambahkan');
			redirect('pantry/bahanbaku');
		}
	}
	
	public function show($id) {
		$data_get1 = $this->bahanbaku_model->get_data($id);
		if (empty($data_get1)) {
			redirect('pantry/bahanbaku');
		}
		$data_get2 = $this->bahanbaku_model->get_list_belanja($id);
		$data = array(
			'info1' => $data_get1,
			'info2' => $data_get2,
			'info_bahanbaku' => $id,
            'title' => 'Tampil Bahan Baku #'.$id
        );
		$this->slice->view('entities.pantry.pages.bahanbaku.show', $data);
	}

	public function edit($id) {
		$data_get = $this->bahanbaku_model->get_data($id);
		if (empty($data_get)) {
			redirect('pantry/bahanbaku');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Bahan Baku #'.$id
        );
		$this->slice->view('entities.pantry.pages.bahanbaku.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('Nama', 'Nama', 'required');
		$this->form_validation->set_rules('Jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('Kategori', 'Kategori', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('pantry/bahanbaku/edit/'.$id);
		} else {
			$this->bahanbaku_model->update($id);
			$this->session->set_flashdata('success', 'Bahan Baku #'.$id.' telah diperbaharui');
			redirect('pantry/bahanbaku');
		}
	}

	public function destroy($id)
	{
		$this->bahanbaku_model->destroy($id);
		$this->session->set_flashdata('success', 'Bahan Baku #'.$id.' telah terhapus');
		redirect('pantry/bahanbaku');
	}

	public function create_belanja($id)
	{
		$data_get = $this->bahanbaku_model->get_list();
		$check = $this->bahanbaku_model->get_data($id);
		if (empty($check)) {
			$this->session->set_flashdata('error', 'Tidak ada bahan baku dengan id = '.$id);
			redirect('pantry/bahanbaku');
		}
		$data = array(
			'info_id_bahanbaku' => $id,
			'info_bahanbaku' => $data_get,
            'title' => 'Tambah Belanja Bahan Baku Baru'
        );
		$this->slice->view('entities.pantry.pages.bahanbaku.form_belanja', $data);
	}

	public function store_belanja($id)
	{
		$this->form_validation->set_rules('IdBahanBaku', 'ID Bahan Baku', 'required');
		$this->form_validation->set_rules('Kuantitas', 'Kuantitas', 'required');
		$this->form_validation->set_rules('TanggalKadaluarsa', 'Tanggal Kadaluarsa', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('pantry/bahanbaku/belanja/'.$this->input->post('IdBahanBaku').'/create');
		} else {
			$this->bahanbaku_model->store_belanja($id);
			$this->session->set_flashdata('success', 'Belanja Bahan Baku baru telah ditambahkan');
			redirect('pantry/bahanbaku/belanja/'.$this->input->post('IdBahanBaku'));
		}
	}

}
