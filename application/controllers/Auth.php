<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->simple_login->terotentikasi();
		$site = $this->konfigurasi_model->listing();
		if ($this->session->userdata('terotentikasi')) { //mengembalikan jika ingin akses halaman auth lagi
			if ($this->session->userdata('akses_level') == 'superadmin')
				redirect('admin');
			if ($this->session->userdata('akses_level') == 'sekret_pokja')
				redirect('admin');
			if ($this->session->userdata('akses_level') == 'kades')
				redirect('admin');
		}
		$data  = array('site'  => $site);
		// var_dump($data);
		// die();
		$this->load->view('masuk', $data);
	}

	public function login()
	{
		$site = $this->konfigurasi_model->listing();
		$valid = $this->form_validation;
		$valid->set_rules(
			'username',
			'Username',
			'required',
			array('required'  => 'Username harus diisi')
		);
		$valid->set_rules(
			'password',
			'Password',
			'required',
			array('required'  => 'Password harus diisi')
		);
		$username  = $this->input->post('username');
		$password  = $this->input->post('password');

		if ($valid->run()) { //validasi dikirim ke model simple_login
			$this->simple_login->login($username, $password, site_url('auth'), base_url('auth'));
		}
		$data  = array('site'  => $site);
		$this->load->view('masuk', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy(); // Hapus semua session
		redirect('auth');
	}

	private function _updateLastLogin($user_id) //untuk mengupdate last login
	{
		$sql = "UPDATE pegawai_user SET last_login=now() WHERE user_id={$user_id}";
		$this->db->query($sql);
	}
}
