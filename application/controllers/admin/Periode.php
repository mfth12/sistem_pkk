<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('periode_model');
		$this->load->model('user_model');
		$this->load->model('konfigurasi_model');
		if($this->session->userdata('akses_level') != 'superadmin')
			show_404();
	}

	// Index
	public function index()
	{
		$periode 	= $this->periode_model->listing();
		$site 		= $this->konfigurasi_model->listing();
		$id_user 	= $this->session->userdata('id');
		$user		= $this->user_model->get($id_user);

		$data = array(
			'title'				=> 'Periode',
			'namasite'	        => $site['namaweb'],
			'konfig'	    	=> $site['periode'],
			'periode'			=> $periode,
			'user'				=> $user,
			'isi'				=> 'back/periode/index'
		);
		$this->load->view('back/wrapper', $data);
	}

	public function tambah() {
		$i 	= $this->input;
		if ($i->post('pswd')!=$i->post('pswd_lama')) {
			$this->session->set_flashdata('dihapus', 'Maaf, password anda salah! Tidak dapat menambah periode.');
			redirect(site_url('admin/periode'));
		}
		
		// Validasi
		$this->form_validation->set_rules(
			'nama_periode',
			'Nama periode',
			'required|is_unique[periode.nama_periode]',
			array(
				'required'	=> 'Nama periode harus diisi',
				'is_unique'	=> 'Periode <strong>' . $this->input->post('nama_periode') . '</strong> sudah ada, tidak dapat menambah periode yang sama.'
			)
		);

		if ($this->form_validation->run() === TRUE) {
			$data = array(
				'nama_periode'			=> $i->post('nama_periode'),
				'ket'					=> $i->post('ket')
			);
			$this->periode_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Periode berhasil ditambah');
			redirect(site_url('admin/periode'));
		} if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('dihapus', 'Terjadi kesalahan');
			redirect(site_url('admin/periode'));
		}
	}

	// aktifkeun
	public function aktifkeun($id = null)
	{
		if (!isset($id)) {
			$this->session->set_flashdata('dihapus', 'Akses dilarang');
			redirect('admin/periode');
		}
		$i 	= $this->input;
		if ($i->post('pswd')!=$i->post('pswd_lama')) {
			$this->session->set_flashdata('dihapus', 'Maaf, password anda salah! Gagal mengaktifkan periode.');
			redirect(site_url('admin/periode'));
		}

		$nyari = $this->periode_model->nyari();
		$nyari_de = $nyari->id_periode;
		
		//nonaktif periode
		$dat = array(
			'id_periode'	=> $nyari_de,
			'ket'			=> 'tidak'
		);
		$this->periode_model->aktivasi($dat);

		//proses aktivasi periode
		$data = array(
			'id_periode'	=> $id,
			'ket'			=> 'aktif'
		);
		$this->periode_model->aktivasi($data);

		//saving aktivasi periode
		$data3 = array(
			'id_konfigurasi'=> '1',
			'periode'		=> $id
		);
		// $site = $this->konfigurasi_model->listing();
		$this->session->set_userdata('active_periode', $id);
		$this->konfigurasi_model->edit($data3);
		$this->session->set_flashdata('sukses', 'Selamat, periode berhasil diaktifkan');
		redirect(site_url('admin/periode'));
	}

	// Delete
	public function delete($id_periode)
	{
		$this->simple_login->terotentikasi();
		$data = array('id_periode' => $id_periode);
		$this->periode_model->delete($data);
		$this->session->set_flashdata('dihapus', 'Periode berhasil dihapus');
		redirect(site_url('admin/periode'));
	}
}
