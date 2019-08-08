<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->jabatan != "Kasir") {
			redirect('auth/login');
		}
	}

	// GET Pesanan Sub Total Pembayaran
    public function get_pesanan_subtotalbayar($id) {
        $data_get = $this->pembayaran_model->get_data_pesanan_subtotalbayar($id);
        echo json_encode($data_get);
    }

	public function index()
	{
		$data_get = $this->pembayaran_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'pembayaran',
            'title' => 'Pembayaran'
        );
		$this->slice->view('entities.kasir.pages.pembayaran.index', $data);
	}

	public function create()
	{
		$data = array(
            'title' => 'Tambah Pembayaran Baru'
        );
		$this->slice->view('entities.kasir.pages.pembayaran.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('KodePesanan', 'Kode Pesanan', 'required');
		$this->form_validation->set_rules('IdKuisioner', 'ID Kuisioner', 'required');
		$this->form_validation->set_rules('TanggalBayar', 'Tanggal Bayar', 'required');
		$this->form_validation->set_rules('SubTotalBayar', 'Sub Total Bayar', 'required');
		$this->form_validation->set_rules('Diskon', 'Diskon', 'required');
		$this->form_validation->set_rules('TotalBayar', 'Total Bayar', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('kasir/pembayaran/create');
		} else {
			$this->pembayaran_model->store();
			$this->session->set_flashdata('success', 'Pembayaran baru telah ditambahkan');
			redirect('kasir/pembayaran');
		}
	}

}
