<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function do_login()
	{
		$this->db->where('Username', $this->input->post('Username'));
		$this->db->where('Password', md5($this->input->post('Password')));
		$query = $this->db->get('pengguna');
		return $query->row();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('pengguna');
			return $query->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('pengguna', array('NIP' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'NIP' => $this->input->post('NIP'),
			'Username' => $this->input->post('Username'),
			'Password' => md5($this->input->post('Password')),
			'NamaLengkap' => $this->input->post('NamaLengkap'),
			'Jabatan' => $this->input->post('Jabatan'),
			'NoTelp' => $this->input->post('NoTelp')
		);
		return $this->db->insert('pengguna', $data);
	}

	public function update($id)
	{
		if (empty($this->input->post('Password'))) {
			$data = array(
				'Username' => $this->input->post('Username'),
				'NamaLengkap' => $this->input->post('NamaLengkap'),
				'Jabatan' => $this->input->post('Jabatan'),
				'NoTelp' => $this->input->post('NoTelp')
			);
		} else {
			$data = array(
				'Username' => $this->input->post('Username'),
				'Password' => md5($this->input->post('Password')),
				'NamaLengkap' => $this->input->post('NamaLengkap'),
				'Jabatan' => $this->input->post('Jabatan'),
				'NoTelp' => $this->input->post('NoTelp')
			);
		}
		$this->db->where('NIP', $id);
		return $this->db->update('pengguna', $data);
	}

	public function destroy($id)
	{
		$this->db->where('NIP', $id);
		$this->db->delete('pengguna');
		return true;
	}

}
