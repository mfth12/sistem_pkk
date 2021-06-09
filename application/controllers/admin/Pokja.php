<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pokja extends CI_Controller
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
			'required|is_unique[kategori_berita.nama_kategori_berita]',
			array(
				'required'	=> 'Nama kategori berita harus diisi',
				'is_unique'	=> 'Kategori berita <strong>'. $this->input->post('nama_kategori_berita') . '</strong> sudah ada, ganti yang lain'
			)
		);

		if ($this->form_validation->run() === FALSE) {
			// End validasi

			$data = array(
				'title'				=> 'Kategori Berita',
				'namasite'	        => $site['namaweb'],
				'kategori_berita'	=> $kategori_berita,
				'isi'				=> 'back/kategori_berita/index'
			);
			$this->load->view('back/wrapper', $data);
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
			$this->session->set_flashdata('sukses', 'Kategori berita berhasil ditambah');
			redirect(site_url('admin/kategori_berita'));
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
				'title'				=> 'Edit Kategori',
				'namasite'      	=> $site['namaweb'],
				'kategori_berita'	=> $kategori_berita,
				'isi'				=> 'back/kategori_berita/edit'
			);
			$this->load->view('back/wrapper', $data);
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
			$this->session->set_flashdata('sukses', 'Kategori berita berhasil diubah');
			redirect(site_url('admin/kategori_berita'));
		}
		// End masuk database
	}

	// Delete
	public function delete($id_kategori_berita)
	{
		$this->simple_login->terotentikasi();
		$data = array('id_kategori_berita'	=> $id_kategori_berita);
		$this->kategori_berita_model->delete($data);
		$this->session->set_flashdata('dihapus', 'Kategori berita berhasil dihapus');
		redirect(site_url('admin/kategori_berita'));
	}
}
