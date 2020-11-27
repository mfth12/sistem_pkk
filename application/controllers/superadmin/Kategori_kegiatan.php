<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_kegiatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('kategori_berita_model');
		// if($this->session->userdata('akses_level') != 'superadmin')
		// 	show_404();
	}

	// Index
	public function index()
	{
		$kategori_berita = $this->kategori_berita_model->listing();
		$site = $this->konfigurasi_model->listing();

		// Validasi
		$this->form_validation->set_rules(
			'nama_kategori_berita',
			'Nama kategori',
			'required',
			array('required'	=> 'Nama kategori kegiatan harus diisi')
		);

		if ($this->form_validation->run() === FALSE) {
			// End validasi

			$data = array(
				'title'				=> 'Kategori Kegiatan',
				'namasite'	        => $site['namaweb'],
				'kategori_berita'	=> $kategori_berita,
				'isi'				=> 'superadmin/kategori_kegiatan/list'
			);
			$this->load->view('superadmin/_partials/wrapper', $data);
			// Masuk database
		} else {
			$i 				= $this->input;
			$slug_kategori	= url_title($i->post('nama_kategori_berita'), 'dash', TRUE);
			$data = array(
				'slug_kategori_berita'	=> $slug_kategori,
				'nama_kategori_berita'	=> $i->post('nama_kategori_berita'),
				'keterangan'			=> $i->post('keterangan'),
				'urutan'				=> $i->post('urutan')
			);
			$this->kategori_berita_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Kategori kegiatan berhasil ditambah');
			redirect(site_url('superadmin/kategori_kegiatan'));
		}
		// End masuk database
	}

	// Edit
	public function edit($id_kategori_berita)
	{
		$kategori_berita = $this->kategori_berita_model->detail($id_kategori_berita);
		$site = $this->konfigurasi_model->listing();

		// Validasi
		$this->form_validation->set_rules(
			'nama_kategori_berita',
			'Nama kategori',
			'required',
			array('required'	=> 'Nama kategori berita harus diisi')
		);

		if ($this->form_validation->run() === FALSE) {
			// End validasi

			$data = array(
				'title'				=> 'Edit Kategori Berita',
				'namasite'      	=> $site['namaweb'],
				'kategori_berita'	=> $kategori_berita,
				'isi'				=> 'superadmin/kategori_kegiatan/edit'
			);
			$this->load->view('superadmin/_partials/wrapper', $data);
			// Masuk database
		} else {
			$i 				= $this->input;
			$slug_kategori	= url_title($i->post('nama_kategori_berita'), 'dash', TRUE);
			$data = array(
				'id_kategori_berita'	=> $id_kategori_berita,
				'slug_kategori_berita'	=> $slug_kategori,
				'nama_kategori_berita'	=> $i->post('nama_kategori_berita'),
				'keterangan'			=> $i->post('keterangan'),
				'urutan'				=> $i->post('urutan')
			);
			$this->kategori_berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Kategori kegiatan berhasil diubah');
			redirect(site_url('superadmin/kategori_kegiatan'));
		}
		// End masuk database
	}

	// Delete
	public function delete($id_kategori_berita)
	{
		$this->simple_login->terotentikasi();
		$data = array('id_kategori_berita'	=> $id_kategori_berita);
		$this->kategori_berita_model->delete($data);
		$this->session->set_flashdata('dihapus', 'Kategori kegiatan berhasil dihapus');
		redirect(site_url('superadmin/kategori_kegiatan'));
	}
}
