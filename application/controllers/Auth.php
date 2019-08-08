<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function login()
	{
		if ($this->session->jabatan == "Pantry") {
			redirect('pantry');
		} else if ($this->session->jabatan == "Koki") {
			redirect('koki');
		} else if ($this->session->jabatan == "Customer Servis") {
			redirect('customer_servis');
		} else if ($this->session->jabatan == "Kasir") {
			redirect('kasir');
		} else if ($this->session->jabatan == "Pelayan") {
			redirect('pelayan');
		} else if ($this->session->jabatan == "Owner") {
			redirect('owner');
		}
		$data = array(
            'title' => 'Login'
        );
		$this->slice->view('entities.auth.pages.login', $data);
	}

	public function do_login()
	{
		$this->form_validation->set_rules('Username', 'Username', 'required');
		$this->form_validation->set_rules('Password', 'Password', 'required');

		$login = $this->pengguna_model->do_login();
		if ($login > 0) {
			$data_session = array(
				'nip' => $login->NIP,
				'username' => $login->Username,
				'jabatan' => $login->Jabatan
			);
			$this->session->set_userdata($data_session);
			if ($login->Jabatan == "Pantry") {
				redirect('pantry');
			} else if ($login->Jabatan == "Koki") {
				redirect('koki');
			} else if ($login->Jabatan == "Customer Servis") {
				redirect('customer_servis');
			} else if ($login->Jabatan == "Kasir") {
				redirect('kasir');
			} else if ($login->Jabatan == "Pelayan") {
				redirect('pelayan');
			} else if ($login->Jabatan == "Owner") {
				redirect('owner');
			}
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}
