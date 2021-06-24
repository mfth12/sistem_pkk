<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proker extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('proker_model');
		$this->load->model('pokja_model');
		$this->load->model('konfigurasi_model');
		if ($this->session->userdata('akses_level') != 'superadmin')
			show_404();
	}

	public function index()
	{
		$pokja = $this->pokja_model->listing();
		$proker = $this->proker_model->listingUtama();
		$site 	= $this->konfigurasi_model->listing();
		$data = array(
			'site'		=> $site,
			'title'		=> 'Program Kerja',
			'namasite'	=> $site['namaweb'],
			'proker'	=> $proker,
			'pokja'	=> $pokja,
			'isi'		=> 'back/3proker/index'
		);
		$this->load->view('back/wrapper', $data);
	}

	public function detail()
	{
		$proker = $this->proker_model->listing();
		$site 	= $this->konfigurasi_model->listing();
		$data = array(
			'site'		=> $site,
			'title'		=> 'Detail Program Kerja',
			'namasite'	=> $site['namaweb'],
			'proker'	=> $proker,
			'isi'		=> 'back/3proker/index_detail'
		);
		$this->load->view('back/wrapper', $data);
	}

	// Tambah Utama
	public function tambah_utama()
	{
		$site 	= $this->konfigurasi_model->listing();
		$pokja 	= $this->pokja_model->listing();
		$v 		= $this->form_validation;
		$v->set_rules(
			'nama_proker_utama',
			'Program kerja utama',
			'required',
			array('required'	=> 'Keterangan Program kerja harus diisi')
		);
		
		$v->set_rules(
			'id_pokja',
			'Pokja',
			'required',
			array('required'	=> 'Pokja harus dipilih')
		);

		if ($v->run()) {
			$i = $this->input;
			$data = array(
				'id_periode'	=> $this->session->userdata('active_periode'),
				'nama_proker_utama'	=> $i->post('nama_proker_utama'),
				'id_pokja'		=> $i->post('id_pokja'),
				'keterangan'	=> $i->post('keterangan')
			);
			$this->proker_model->tambah_utama($data);
			$this->session->set_flashdata('sukses', 'Program kerja utama berhasil ditambah.');
			redirect(base_url('admin/proker'));
		}

		if (!$v->run()) {
			// disini halaman default nya
			$data = array(
				'title'		=> 'Tambah Program Utama',
				'site'		=> $site,
				'pokja'		=> $pokja,
				'namasite'	=> $site['namaweb'],
				'isi'		=> 'back/3proker/tambah_utama'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	// Tambah
	public function tambah_detail()
	{
		$site 	= $this->konfigurasi_model->listing();
		$proker = $this->proker_model->listingUtama();
		$v 		= $this->form_validation;
		$v->set_rules(
			'nama_proker',
			'Program kerja',
			'required',
			array('required'	=> 'Nama Program kerja harus diisi')
		);
		
		$v->set_rules(
			'id_proker_utama',
			'Program kerja utama',
			'required',
			array('required'	=> 'Program kerja utama belum dipilih')
		);
		
		$v->set_rules(
			'status',
			'Status Proker',
			'required',
			array('required'	=> 'Keterangan Program kerja harus diisi')
		);

		if ($v->run()) {
			$i = $this->input;
			$data = array(
				'id_proker_utama'	=> $i->post('id_proker_utama'),
				'nama_proker'		=> $i->post('nama_proker'),
				'keterangan_proker'	=> $i->post('keterangan'),
				'status'			=> $i->post('status')
			);
			$this->proker_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Detail program kerja berhasil ditambah.');
			redirect(base_url('admin/proker/detail'));
		}

		if (!$v->run()) {
			// disini halaman default nya
			$data = array(
				'title'		=> 'Tambah Detail Program',
				'site'		=> $site,
				'proker'		=> $proker,
				'namasite'	=> $site['namaweb'],
				'isi'		=> 'back/3proker/tambah_prokerdetail'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	public function edit_utama($id_proker_utama = null)
	{
		if (!isset($id_proker_utama)) redirect('admin/proker');
		$proker		= $this->proker_model->detail_utama($id_proker_utama);
		$pokja		= $this->pokja_model->listing();
		$site 		= $this->konfigurasi_model->listing();
		// Validasi
		$v = $this->form_validation;
		$v->set_rules(
			'nama_proker_utama',
			'Program kerja utama',
			'required',
			array('required'	=> 'Program kerja utama harus diisi')
		);

		if ($v->run()) {
			$i = $this->input;
			$data = array(
				'id_proker_utama'	=> $i->post('id_proker_utama'),
				'id_pokja'			=> $i->post('id_pokja'),
				'nama_proker_utama'	=> $i->post('nama_proker_utama'),
				'keterangan'		=> $i->post('keterangan')
			);
			$this->proker_model->edit_utama($data);
			$this->session->set_flashdata('sukses', 'Program kerja utama berhasil diubah.');
			redirect(base_url('admin/proker'));
		}
		if (!$v->run()) {
			$data = array(
				'title'		=> 'Ubah',
				'site'		=> $site,
				'namasite'	=> $site['namaweb'],
				'pokja'		=> $pokja,
				'proker'	=> $proker,
				'isi'		=> 'back/3proker/edit_utama'
			);
			$this->load->view('back/wrapper', $data);
		}
	}
	
	public function edit($id_proker = null)
	{
		if (!isset($id_proker)) redirect('admin/proker/detail');
		$proker		= $this->proker_model->detail($id_proker);
		$proker_utama	= $this->proker_model->listingUtama($id_proker);
		// $pokja		= $this->pokja_model->listing();
		$site 		= $this->konfigurasi_model->listing();
		// Validasi
		$v = $this->form_validation;
		$v->set_rules(
			'nama_proker',
			'Program kerja',
			'required',
			array('required'	=> 'Nama Program kerja harus diisi')
		);
		
		$v->set_rules(
			'id_proker_utama',
			'Program kerja utama',
			'required',
			array('required'	=> 'Program kerja utama belum dipilih')
		);
		
		$v->set_rules(
			'status',
			'Status Proker',
			'required',
			array('required'	=> 'Keterangan Program kerja harus diisi')
		);

		if ($v->run()) {
			$i = $this->input;
			$data = array(
				'id_proker'			=> $i->post('id_proker'),
				'id_proker_utama'	=> $i->post('id_proker_utama'),
				'nama_proker'		=> $i->post('nama_proker'),
				'keterangan_proker'	=> $i->post('keterangan'),
				'status'			=> $i->post('status')
			);
			$this->proker_model->edit_detail($data);
			$this->session->set_flashdata('sukses', 'Detail program kerja berhasil diubah.');
			redirect(base_url('admin/proker/detail'));
		}
		if (!$v->run()) {
			$data = array(
				'title'		=> 'Ubah Detail',
				'site'		=> $site,
				'namasite'	=> $site['namaweb'],
				// 'pokja'		=> $pokja,
				'proker'	=> $proker,
				'proker_utama'	=> $proker_utama,
				'isi'		=> 'back/3proker/edit_detail'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	// Delete Utama
	public function delete_utama($id_proker_utama)
	{
		$this->simple_login->terotentikasi();
		$data = array('id_proker_utama' => $id_proker_utama);
		$this->proker_model->delete_utama($data);
		$this->session->set_flashdata('dihapus', 'Data program kerja utama berhasil dihapus');
		redirect(site_url('admin/proker'));
	}
	// Delete
	public function delete_detail($id_proker)
	{
		$this->simple_login->terotentikasi();
		$data = array('id_proker' => $id_proker);
		$this->proker_model->delete_detail($data);
		$this->session->set_flashdata('dihapus', 'Detail program kerja berhasil dihapus');
		redirect(site_url('admin/proker/detail'));
	}
}
