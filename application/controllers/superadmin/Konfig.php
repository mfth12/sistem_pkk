<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfig extends CI_Controller
{
	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('berita_model');
		$this->load->model('kategori_berita_model');
		$this->load->model('konfigurasi_model');
		if ($this->session->userdata('akses_level') != 'superadmin')
			show_404();
	}

	// Index
	public function index()
	{
		$site = $this->konfigurasi_model->listing();

		// Validasi 
		$this->form_validation->set_rules('namaweb', 'Website name website', 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');

		if ($this->form_validation->run() === FALSE) {

			$data = array(
				'title'		=> 'Konfigurasi',
				'namasite' 	=> $site['namaweb'],
				'site'		=> $site,
				'isi'		=> 'superadmin/konfig/umum'
			);
			$this->load->view('superadmin/_partials/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array(
				'id_konfigurasi'	=> $i->post('id_konfigurasi'),
				'home_setting'		=> $i->post('home_setting'),
				'namaweb'			=> $i->post('namaweb'),
				'tagline'			=> $i->post('tagline'),
				'tentang'			=> $i->post('tentang'),
				'website'			=> $i->post('website'),
				'email'				=> $i->post('email'),
				'alamat'			=> $i->post('alamat'),
				'telepon'			=> $i->post('telepon'),
				'hp'				=> $i->post('hp'),
				'fax'				=> $i->post('fax'),
				'keywords'			=> $i->post('keywords'),
				'metatext'			=> $i->post('metatext'),
				'facebook'			=> $i->post('facebook'),
				'twitter'			=> $i->post('twitter'),
				'instagram'			=> $i->post('instagram'),
				'google_map'		=> $i->post('google_map'),
				'logo'				=> $i->post('logo'),
				'id_user'			=> $this->session->userdata('id')
			);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Site configuration updated successfully');
			redirect(site_url('superadmin/konfig'));
		}
	}

	// General Configuration
	public function konfigurasi()
	{
		$site = $this->konfigurasi_model->listing();

		// Validasi 
		$this->form_validation->set_rules('namaweb', 'Website name website', 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');

		if ($this->form_validation->run() === FALSE) {

			$data = array(
				'title'		=> 'General Configuration',
				'namasite'	=> $site['namaweb'],
				'site'		=> $site,
				'isi'		=> 'superadmin/konfig/umum'
			);
			$this->load->view('superadmin/_partials/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array(
				'id_konfigurasi'	=> $i->post('id_konfigurasi'),
				'home_setting'		=> $i->post('home_setting'),
				'namaweb'			=> $i->post('namaweb'),
				'tagline'			=> $i->post('tagline'),
				'tentang'			=> $i->post('tentang'),
				'website'			=> $i->post('website'),
				'email'				=> $i->post('email'),
				'alamat'			=> $i->post('alamat'),
				'telepon'			=> $i->post('telepon'),
				'hp'				=> $i->post('hp'),
				'fax'				=> $i->post('fax'),
				'keywords'			=> $i->post('keywords'),
				'metatext'			=> $i->post('metatext'),
				'facebook'			=> $i->post('facebook'),
				'twitter'			=> $i->post('twitter'),
				'instagram'			=> $i->post('instagram'),
				'google_map'		=> $i->post('google_map'),
				'id_user'			=> $this->session->userdata('id')
			);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Berhasil, konfigurasi situs berhasil diperbarui');
			redirect(site_url('superadmin/konfig'));
		}
	}

	// New logo
	public function logo()
	{
		$site = $this->konfigurasi_model->listing();

		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi', 'ID Konfigurasi', 'required');

		if ($v->run()) {

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('logo')) {
				$data = array(
					'title'		=> 'New logo',
					'namasite' 	=> $site['namaweb'],
					'site'		=> $site,
					'error'		=> $this->upload->display_errors(),
					'isi'		=> 'superadmin/konfig/umum'
				);
				$this->load->view('superadmin/_partials/wrapper', $data);
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/' . $site['logo']);
				unlink('./assets/upload/image/thumbs/' . $site['logo']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(
					'id_konfigurasi' => $i->post('id_konfigurasi'),
					'logo'			=> $upload_data['uploads']['file_name'],
					'id_user'		=> $this->session->userdata('id')
				);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Logo situs berhasil diperbarui');
				redirect(site_url('superadmin/konfig'));
			}
		}
		// Default page
		// $data = array(	'title'	=> 'New logo',
		// 				'site'	=> $site,
		// 				'isi'	=> 'admin/dasbor/logo');
		// $this->load->view('admin/layout/wrapper',$data);
		$this->session->set_flashdata('maaf', 'Maaf, tidak ada data yang diperbarui');
		redirect(site_url('superadmin/konfig'));
	}


	// Konfigurasi Icon
	public function icon()
	{
		$site = $this->konfigurasi_model->listing();

		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi', 'ID Konfigurasi', 'required');

		if ($v->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('icon')) {

				$data = array(
					'title'		=> 'New Icon',
					'namasite' 	=> $site['namaweb'],
					'site'		=> $site,
					'error'		=> $this->upload->display_errors(),
					'isi'		=> 'superadmin/konfig/umum'
				);
				$this->load->view('superadmin/_partials/wrapper', $data);
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				unlink('./assets/upload/image/' . $site['icon']);
				unlink('./assets/upload/image/thumbs/' . $site['icon']);
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(
					'id_konfigurasi' => $i->post('id_konfigurasi'),
					'icon'			=> $upload_data['uploads']['file_name'],
					'id_user'			=> $this->session->userdata('id')
				);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Favicon situs berhasil diperbarui');
				redirect(site_url('superadmin/konfig'));
			}
		}
		// Default page
		// $data = array(	'title'	=> 'New Icon',
		// 				'site'	=> $site,
		// 				'isi'	=> 'admin/dasbor/icon');
		// $this->load->view('admin/layout/wrapper',$data);
		$this->session->set_flashdata('maaf', 'Maaf, tidak ada data yang diperbarui');
		redirect(site_url('superadmin/konfig'));
	}

	// Quote
	public function quote()
	{
		$site = $this->konfigurasi_model->listing();

		// Validasi 
		$this->form_validation->set_rules('judul_1', 'Judul Quote 1', 'required');
		$this->form_validation->set_rules('pesan_1', 'Pesan Quote 1', 'required');
		$this->form_validation->set_rules('judul_2', 'Judul Quote 2', 'required');
		$this->form_validation->set_rules('pesan_2', 'Pesan Quote 2', 'required');
		$this->form_validation->set_rules('judul_3', 'Judul Quote 3', 'required');
		$this->form_validation->set_rules('pesan_3', 'Pesan Quote 3', 'required');
		$this->form_validation->set_rules('judul_4', 'Judul Quote 4', 'required');
		$this->form_validation->set_rules('pesan_4', 'Pesan Quote 4', 'required');

		if ($this->form_validation->run() === FALSE) {

			$data = array(
				'title'	=> 'General Configuration - Quote Front End',
				'site'	=> $site,
				'isi'	=> 'supeadmin/konfig/umum'
			);
			$this->load->view('superadmin/_partials/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array(
				'id_konfigurasi'	=> $i->post('id_konfigurasi'),
				'judul_1'			=> $i->post('judul_1'),
				'pesan_1'			=> $i->post('pesan_1'),
				'judul_2'			=> $i->post('judul_2'),
				'pesan_2'			=> $i->post('pesan_2'),
				'judul_3'			=> $i->post('judul_3'),
				'pesan_3'			=> $i->post('pesan_3'),
				'judul_4'			=> $i->post('judul_4'),
				'pesan_4'			=> $i->post('pesan_4'),
				'judul_5'			=> $i->post('judul_5'),
				'pesan_5'			=> $i->post('pesan_5'),
				'judul_6'			=> $i->post('judul_6'),
				'pesan_6'			=> $i->post('pesan_6'),
				'id_user'			=> $this->session->userdata('id')
			);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfigurasi quotes situs berhasil diperbarui');
			redirect(site_url('superadmin/konfig'));
		}
	}

	// Quote
	public function ucapan()
	{
		$site = $this->konfigurasi_model->listing();

		// Validasi 
		$this->form_validation->set_rules('welcome_say', 'Judul Ucapan', 'required');
		$this->form_validation->set_rules('deskripsi_say', 'Deksripsi Ucapan Sambutan', 'required');

		if ($this->form_validation->run() === FALSE) {

			$data = array(
				'title'	=> '',
				'site'	=> $site,
				'isi'	=> 'supeadmin/konfig/umum'
			);
			$this->load->view('superadmin/_partials/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array(
				'id_konfigurasi'	=> $i->post('id_konfigurasi'),
				'welcome_say'		=> $i->post('welcome_say'),
				'deskripsi_say'		=> $i->post('deskripsi_say'),
				'id_user'			=> $this->session->userdata('id')
			);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfigurasi kalimat ucapan situs berhasil diperbarui');
			redirect(site_url('superadmin/konfig'));
		}
	}

	//end of all
	//end of all
	//end of all
}
