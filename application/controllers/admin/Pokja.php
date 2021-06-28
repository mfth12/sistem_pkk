<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pokja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('pokja_model');
		if($this->session->userdata('akses_level') != 'superadmin')
			show_404();
	}

	// Index
	public function index()
	{
		$pokja 	= $this->pokja_model->listing();
		$site 	= $this->konfigurasi_model->listing();

		// Validasi
		$this->form_validation->set_rules(
			'nama_pokja',
			'Nama pokja',
			'required|is_unique[pokja.nama_pokja]',
			array(
				'required'	=> 'Nama pokja harus diisi',
				'is_unique'	=> 'Pokja <strong>' . $this->input->post('nama_pokja') . '</strong> sudah ada, tidak dapat menambah data pokja yang sama.'
			)
		);

		if ($this->form_validation->run() === FALSE) {
			// End validasi

			$data = array(
				'title'				=> 'Pokja',
				'namasite'	        => $site['namaweb'],
				'pokja'				=> $pokja,
				'isi'				=> 'back/pokja/index'
			);
			$this->load->view('back/wrapper', $data);
			// Masuk database
		} else {
			$i 				= $this->input;
			$slug_pokja		= url_title($i->post('nama_pokja'), 'dash', TRUE);
			$data 			= array(
				'slug_pokja'			=> $slug_pokja,
				'nama_pokja'			=> $i->post('nama_pokja'),
				'keterangan'			=> $i->post('keterangan'),
				'urutan'				=> $i->post('urutan')
			);
			$this->pokja_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Pokja berhasil ditambah');
			redirect(site_url('admin/pokja'));
		}
		// End masuk database
	}

	// Edit
	public function edit($id_pokja)
	{
		$pokja = $this->pokja_model->detail($id_pokja);
		$site = $this->konfigurasi_model->listing();

		// Validasi
		$this->form_validation->set_rules(
			'nama_pokja',
			'Nama pokja',
			'required',
			array('required'	=> 'Nama pokja harus diisi')
		);

		if ($this->form_validation->run() === FALSE) {
			// End validasi

			$data = array(
				'title'				=> 'Edit Pokja',
				'namasite'      	=> $site['namaweb'],
				'pokja'				=> $pokja,
				'isi'				=> 'back/pokja/edit'
			);
			$this->load->view('back/wrapper', $data);
			// Masuk database
		} else {
			$i 				= $this->input;
			$slug_pokja	= url_title($i->post('nama_pokja'), 'dash', TRUE);
			$data = array(
				'id_pokja'				=> $id_pokja,
				'slug_pokja'			=> $slug_pokja,
				'nama_pokja'			=> $i->post('nama_pokja'),
				'keterangan'			=> $i->post('keterangan'),
				'urutan'				=> $i->post('urutan')
			);
			$this->pokja_model->edit($data);
			$this->session->set_flashdata('sukses', 'Pokja berhasil diubah');
			redirect(site_url('admin/pokja'));
		}
		// End masuk database
	}

	// Delete
	public function delete($id_pokja)
	{
		$this->simple_login->terotentikasi();
		$data = array('id_pokja' => $id_pokja);
		$this->pokja_model->delete($data);
		$this->session->set_flashdata('dihapus', 'Pokja berhasil dihapus');
		redirect(site_url('admin/pokja'));
	}
}
