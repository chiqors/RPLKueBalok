<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerServis_Kuisioner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Customer Servis") {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data_get = $this->kuisioner_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'kuisioner',
            'title' => 'Kuisioner'
        );
		$this->slice->view('entities.customer_servis.pages.kuisioner.index', $data);
	}

	public function create()
	{
		$data = array(
            'title' => 'Tambah Kuisioner Baru'
        );
		$this->slice->view('entities.customer_servis.pages.kuisioner.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('Jwb_kondisi', 'Jawaban Kondisi', 'required');
		$this->form_validation->set_rules('Jwb_tempat', 'Jawaban Tempat', 'required');
		$this->form_validation->set_rules('Jwb_menu', 'Jawaban Menu', 'required');
		$this->form_validation->set_rules('Jwb_servis', 'Jawaban Servis', 'required');
		$this->form_validation->set_rules('TanggalPengisian', 'Tanggal Pengisian', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('customer_servis/kuisioner/create');
		} else {
			$this->kuisioner_model->store();
			$this->session->set_flashdata('success', 'Kuisioner baru telah ditambahkan');
			redirect('customer_servis/kuisioner');
		}
	}

	public function edit($id) {
		$data_get = $this->kuisioner_model->get_data($id);
		if (empty($data_get)) {
			redirect('customer_servis/kuisioner');
		}
		$data = array(
			'info' => $data_get,
            'title' => 'Ubah Kuisioner #'.$id
        );
		$this->slice->view('entities.customer_servis.pages.kuisioner.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('Jwb_kondisi', 'Jawaban Kondisi', 'required');
		$this->form_validation->set_rules('Jwb_tempat', 'Jawaban Tempat', 'required');
		$this->form_validation->set_rules('Jwb_menu', 'Jawaban Menu', 'required');
		$this->form_validation->set_rules('Jwb_servis', 'Jawaban Servis', 'required');
		$this->form_validation->set_rules('TanggalPengisian', 'Tanggal Pengisian', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('customer_servis/kuisioner/edit/'.$id);
		} else {
			$this->kuisioner_model->update($id);
			$this->session->set_flashdata('success', 'Kuisioner #'.$id.' telah diperbaharui');
			redirect('customer_servis/kuisioner');
		}
	}

	public function destroy($id)
	{
		$this->kuisioner_model->destroy($id);
		$this->session->set_flashdata('success', 'Kuisioner #'.$id.' telah terhapus');
		redirect('customer_servis/kuisioner');
	}

}
