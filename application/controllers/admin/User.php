<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->simple_login->terotentikasi();
		// if($this->session->userdata('akses_level') != 'superadmin')
		// 	show_404();
	}

	// Index
	public function index()
	{
		$user = $this->user_model->listing();
		$site = $this->konfigurasi_model->listing();
		$data = array(
			'title' => 'Data User',
			'namasite'	=> $site['namaweb'],
			'userb'	=> 	$user,
			'isi'  	=> 'back/user/list'
		);
		$this->load->view('back/wrapper', $data);
	}

	// Tambah User
	public function tambah()
	{
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules(
			'nama',
			'Nama',
			'required',
			array('required' => 'Nama harus diisi')
		);

		$valid->set_rules(
			'email',
			'Email',
			'required',
			array('required' => 'Email harus diisi')
		);

		$valid->set_rules(
			'username',
			'Username',
			'required|is_unique[users.username]',
			array(
				'required' 	=> 'Username harus diisi',
				'is_unique'	=> 'Username: <strong>' . $this->input->post('username') .
					'</strong> sudah digunakan. Buat username baru!'
			)
		);

		$valid->set_rules(
			'password',
			'Password',
			'required',
			array('required' => 'Password harus diisi')
		);

		if ($valid->run() === FALSE) {
			$this->session->set_flashdata('dihapus', 'Username sudah digunakan. Gagal menambah data user');
			redirect(site_url('admin/user'));
		} else {
			$i = $this->input;
			$data = array(
				'nama'			=> 	$i->post('nama'),
				'email'			=>	$i->post('email'),
				'username'		=>	$i->post('username'),
				'password'		=>	$i->post('password'),
				'akses_level'	=>  $i->post('akses_level')
			);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'User berhasil ditambah');
		}
		redirect(site_url('admin/user'));
		// End masuk database
	}

	// Edit User
	public function edit($id_user = null)
	{
		if (!isset($id_user)) redirect('admin/user');
		$user = $this->user_model->detail($id_user);
		$site 	= $this->konfigurasi_model->listing();
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules(
			'nama',
			'Nama',
			'required',
			array('required' => 'Nama harus diisi')
		);

		$valid->set_rules(
			'email',
			'Email',
			'required',
			array('required' => 'email harus diisi')
		);

		$valid->set_rules(
			'password',
			'Password',
			'required',
			array('required' => 'Password harus diisi')
		);

		if ($valid->run() === FALSE) {
			// End validasi

			$data = array(
				'title' 	=> 'Edit User',
				'namasite'	=> $site['namaweb'],
				'user'	=> $user,
				'isi' 	=> 'back/user/edit'
			);
			$this->load->view('back/wrapper', $data);
			// masuk database
		} else {
			$i = $this->input;
			$data = array(
				'nama'			=> 	$i->post('nama'),
				'email'			=>	$i->post('email'),
				'username'		=>	$i->post('username'),
				'password'		=>	$i->post('password'),
				'akses_level'	=>  $i->post('akses_level')
			);
			$this->user_model->edit($data, $id_user);
			$this->session->set_flashdata('sukses', 'User berhasil diubah');
			redirect(site_url('admin/user'));
		}
		// End masuk database
	}

	// Delete User
	public function delete($id_user)
	{
		$this->simple_login->terotentikasi();
		$data = array('id_user' => $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('dihapus', 'Data user berhasil dihapus');
		redirect(site_url('admin/user'));
	}
}
