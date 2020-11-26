<?php

class Profile extends CI_Controller
{
	// deklarasi tabel
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('user_model');
		// $this->load->user_model();
	}

	// Profil
	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$id_user = $this->session->userdata('id');
		$user	= $this->user_model->get($id_user);

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama anda', 'required');
		$valid->set_rules('email', 'Email', 'required|valid_email|is_unique[users.username]');

		if ($valid->run() === FALSE) {

			$data = array(
				'title'		=> '',
				'namasite'	=> $site['namaweb'],
				'userb'		=> $user,
				'isi'		=> 'profile'
			);
			$this->load->view('superadmin/_partials/wrapper', $data);
		}
	}



	public function edits($id = null)
	{
		if (!isset($id)) redirect('profile');
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama anda', 'required');
		$valid->set_rules('email', 'Email', 'required|valid_email');
		$user	= $this->user_model->get($id);
		$i = $this->input;

		if ($i->post('nama') === $user->nama && $i->post('email') === $user->email) {
			$this->session->set_flashdata('maaf', 'Tidak ada data yang diubah');
			redirect(site_url('profile'));
		}


		if ($valid->run() === TRUE) {
			$this->user_model->updateprofil($id);
			$this->session->set_flashdata('success_edit', 'Data anda telah berhasil diperbarui');
			clearstatcache();
			redirect(site_url('profile'));
		}
		redirect(site_url('profile'));
	}


	public function edit_password($id = null)
	{
		if (!isset($id)) redirect('profile');
		$user	= $this->user_model;
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('password_lama', 'Password', 'required');
		$valid->set_rules('password_baru', 'Password', 'required');
		$valid->set_rules('password_verif', 'Password', 'required');
		// $user	= $this->user_model->get($id);
		$i = $this->input;

		if ($valid->run() === TRUE) {
			$user->updatepassword($id);
			$this->session->set_flashdata('sukses', 'Password anda berhasil diperbarui');
			redirect(site_url('profile'));
		}
		redirect(site_url('profile_inigagal'));  //menuju ke halaman admin/products/.
	}


	// end
}
