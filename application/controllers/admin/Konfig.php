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
		// $this->load->model('pokja_model');
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
				'isi'		=> 'back/konfig/umum'
			);
			$this->load->view('back/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array(
				'id_konfigurasi'	=> $i->post('id_konfigurasi'),
				'slide_setting'		=> $i->post('slide_setting'),
				'namaweb'			=> $i->post('namaweb'),
				'tagline'			=> $i->post('tagline'),
				'tentang'			=> $i->post('tentang'),
				'email'				=> $i->post('email'),
				'alamat'			=> $i->post('alamat'),
				'telepon'			=> $i->post('telepon'),
				'hp'				=> $i->post('hp'),
				'facebook'			=> $i->post('facebook'),
				'twitter'			=> $i->post('twitter'),
				'instagram'			=> $i->post('instagram'),
				'google_map'		=> $i->post('google_map'),
				'id_user'			=> $this->session->userdata('id')
			);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfigurasi website berhasil diperbarui');
			redirect(site_url('admin/konfig'));
		}
	}

	// New logo
	public function logo()
	{
		$site = $this->konfigurasi_model->listing();

		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi', 'ID Konfigurasi', 'required');

		if ($v->run()) {

			$config['upload_path'] 		= './back_assets/img/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB
			$config['file_name']        = 'main-logo.png';
			unlink('./back_assets/img/' . $site['logo']);
			unlink('./back_assets/img/thumbs/' . $site['logo']);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('logo')) {
				$data = array(
					'title'		=> 'New logo',
					'namasite' 	=> $site['namaweb'],
					'site'		=> $site,
					'error'		=> $this->upload->display_errors(),
					'isi'		=> 'back/konfig/umum'
				);
				$this->load->view('back/wrapper', $data);
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './back_assets/img/' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './back_assets/img/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
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
				redirect(site_url('admin/konfig'));
			}
		}
		$this->session->set_flashdata('maaf', 'Maaf, tidak ada data yang diperbarui');
		redirect(site_url('admin/konfig'));
	}


	// Konfigurasi Icon
	public function icon()
	{
		$site = $this->konfigurasi_model->listing();

		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi', 'ID Konfigurasi', 'required');

		if ($v->run()) {
			$config['upload_path'] 		= './back_assets/img/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '4200'; // KB
			$config['file_name']        = 'icon_site.png';
			unlink('./back_assets/img/' . $site['icon']);
			unlink('./back_assets/img/thumbs/' . $site['icon']);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('icon')) {

				$data = array(
					'title'		=> '',
					'namasite' 	=> $site['namaweb'],
					'site'		=> $site,
					'error'		=> $this->upload->display_errors(),
					'isi'		=> 'back/konfig/umum'
				);
				$this->load->view('back/wrapper', $data);
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './back_assets/img/' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './back_assets/img/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(
					'id_konfigurasi'=> $i->post('id_konfigurasi'),
					'icon'			=> $upload_data['uploads']['file_name'],
					'id_user'		=> $this->session->userdata('id')
				);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Favicon situs berhasil diperbarui');
				redirect(site_url('admin/konfig'));
			}
		}
		$this->session->set_flashdata('maaf', 'Maaf, tidak ada data yang diperbarui');
		redirect(site_url('admin/konfig'));
	}

	// Konfigurasi background
	public function background()
	{
		$site = $this->konfigurasi_model->listing();

		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi', 'ID Konfigurasi', 'required');

		if ($v->run()) {
			$config['upload_path'] 		= './back_assets/img/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '6200'; // KB
			$config['file_name']        = 'background.jpg';
			unlink('./back_assets/img/' . $site['background']);
			unlink('./back_assets/img/thumbs/' . $site['background']);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('back')) {
				$data = array(
					'title'		=> '',
					'namasite' 	=> $site['namaweb'],
					'site'		=> $site,
					'error'		=> $this->upload->display_errors(),
					'isi'		=> 'back/konfig/umum'
				);
				$this->load->view('back/wrapper', $data);
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './back_assets/img/' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './back_assets/img/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 450; // Pixel
				// $config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(
					'id_konfigurasi'=> $i->post('id_konfigurasi'),
					'background'	=> $upload_data['uploads']['file_name'],
					'id_user'		=> $this->session->userdata('id')
				);
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Background situs berhasil diperbarui');
				redirect(site_url('admin/konfig'));
			}
		}
		$this->session->set_flashdata('maaf', 'Maaf, tidak ada data yang diperbarui');
		redirect(site_url('admin/konfig'));
	}


	// Ucapan
	public function ucapan()
	{
		$site = $this->konfigurasi_model->listing();

		// Validasi 
		$this->form_validation->set_rules('welcome_say', 'Judul Ucapan', 'required');
		$this->form_validation->set_rules('deskripsi_say', 'Deksripsi Ucapan Sambutan', 'required');

		if ($this->form_validation->run() === FALSE) {

			$data = array(
				'title'	=> 'Ucapan',
				'site'	=> $site,
				'isi'	=> 'back/konfig/umum'
			);
			$this->load->view('back/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array(
				'id_konfigurasi'	=> $i->post('id_konfigurasi'),
				'welcome_say'		=> $i->post('welcome_say'),
				'deskripsi_say'		=> $i->post('deskripsi_say'),
				'id_user'			=> $this->session->userdata('id')
			);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Kalimat ucapan website berhasil diperbarui');
			redirect(site_url('admin/konfig'));
		}
	}

	//end of all
	//end of all
	//end of all
}
