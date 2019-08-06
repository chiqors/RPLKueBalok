<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner_Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Owner") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->pengguna_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'pengguna',
            'title' => 'Pengguna'
        );
		$this->slice->view('entities.owner.pages.pengguna.index', $data);
	}

	public function create()
	{
		$data = array(
            'title' => 'Tambah Pengguna Baru'
        );
		$this->slice->view('entities.owner.pages.pengguna.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('NIP', 'NIP', 'required');
		$this->form_validation->set_rules('Username', 'Username', 'required');
		$this->form_validation->set_rules('Password', 'Password', 'required');
		$this->form_validation->set_rules('NamaLengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('Jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('NoTelp', 'Nomor Telepon', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('owner/pengguna/create');
		} else {
			$this->pengguna_model->store();
			$this->session->set_flashdata('success', 'Pengguna baru telah ditambahkan');
			redirect('owner/pengguna');
		}
	}

	public function edit($id) {
		$data_get = $this->pengguna_model->get_data($id);
		if (empty($data_get)) {
			redirect('owner/pengguna');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Pengguna #'.$id
        );
		$this->slice->view('entities.owner.pages.pengguna.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('NIP', 'NIP', 'required');
		$this->form_validation->set_rules('Username', 'Username', 'required');
		$this->form_validation->set_rules('NamaLengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('Jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('NoTelp', 'Nomor Telepon', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('owner/pengguna/edit/'.$id);
		} else {
			$this->pengguna_model->update($id);
			$this->session->set_flashdata('success', 'Pengguna #'.$id.' telah diperbaharui');
			redirect('owner/pengguna');
		}
	}

	public function destroy($id)
	{
		$this->pengguna_model->destroy($id);
		$this->session->set_flashdata('success', 'Pengguna #'.$id.' telah terhapus');
		redirect('owner/pengguna');
	}

}
