<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->library('form_validation');
		$this->load->model('kas_model');
		// if($this->session->userdata('akses_level') != 'superadmin')
		// 	show_404();
	}

	public function index()
	{
		$site 	= $this->konfigurasi_model->listing();
		$total = $this->kas_model->row_masuk();
		$result = $this->kas_model->nomor();
		if (empty($result[0]['nomor'])) {
			$no = date('Ymd') . "000001";
		} else {
			$no = $result[0]['nomor'] + 1;
		}

		$ttl_kel = $this->kas_model->total_keluar();
		$ttl_mas = $this->kas_model->total_masuk();
		// $ttl_saldo = $ttl_mas->jumlah - $ttl_kel->jumlah;
		$data = array(
			'title'		=> 'Sirkulasi Keuangan',
			'namasite'	=> $site['namaweb'],
			'result' 	=> $this->kas_model->all(),
			'nomor' 	=> $no,
			'ttl' 		=> $this->kas_model->total_masuk(),
			'ttl_k' 		=> $this->kas_model->total_keluar(),
			// 'ttl' 		=> $ttl_saldo,
			'isi'		=> 'superadmin/keuangan/list'
		);
		$this->load->view('superadmin/_partials/wrapper', $data);
	}

	function tambah_pemasukan()
	{
		$data = array(
			'nomor'			=> $this->input->post('nomor'),
			'keterangan'	=> $this->input->post('keterangan'),
			'tanggal' 		=> $this->input->post('tanggal'),
			'jumlah' 		=> $this->input->post('jumlah'),
			'jenis' 		=> 'masuk'
		);
		$input = $this->kas_model->tambah_pemasukan($data);
		if ($input) {
			$this->session->set_flashdata('sukses', 'Data pemasukkan berhasil ditambahkan');
			redirect(site_url('superadmin/keuangan'));
		} else {
			$this->session->set_flashdata('maaf', 'Maaf, data pemasukan gagal ditambahkan');
			redirect(site_url('superadmin/keuangan'));
		}
	}

	function tambah_pengeluaran()
	{
		$data = array(
			'nomor'			=> $this->input->post('nomor2'),
			'keterangan'	=> $this->input->post('keterangan2'),
			'tanggal' 		=> $this->input->post('tanggal2'),
			'jumlah' 		=> $this->input->post('jumlah2'),
			'jenis' 		=> 'keluar'
		);
		$input = $this->kas_model->tambah_pengeluaran($data);
		if ($input) {
			$this->session->set_flashdata('sukses', 'Data pengeluaran berhasil ditambahkan');
			redirect(site_url('superadmin/keuangan'));
		} else {
			$this->session->set_flashdata('maaf', 'Maaf, data pengeluaran gagal ditambahkan');
			redirect(site_url('superadmin/keuangan'));
		}
	}

	function tambah_pemasukan_in()
	{
		$data = array(
			'nomor'			=> $this->input->post('nomor'),
			'keterangan'	=> $this->input->post('keterangan'),
			'tanggal' 		=> $this->input->post('tanggal'),
			'jumlah' 		=> $this->input->post('jumlah'),
			'jenis' 		=> 'masuk'
		);
		$input = $this->kas_model->tambah_pemasukan($data);
		if ($input) {
			$this->session->set_flashdata('sukses', 'Data pemasukkan berhasil ditambahkan');
			redirect(site_url('superadmin/keuangan/masukan'));
		} else {
			$this->session->set_flashdata('maaf', 'Maaf, data pemasukan gagal ditambahkan');
			redirect(site_url('superadmin/keuangan/masukan'));
		}
	}

	function tambah_pengeluaran_out()
	{
		$data = array(
			'nomor'			=> $this->input->post('nomor2'),
			'keterangan'	=> $this->input->post('keterangan2'),
			'tanggal' 		=> $this->input->post('tanggal2'),
			'jumlah' 		=> $this->input->post('jumlah2'),
			'jenis' 		=> 'keluar'
		);
		$input = $this->kas_model->tambah_pengeluaran($data);
		if ($input) {
			$this->session->set_flashdata('sukses', 'Data pengeluaran berhasil ditambahkan');
			redirect(site_url('superadmin/keuangan/keluaran'));
		} else {
			$this->session->set_flashdata('maaf', 'Maaf, data pengeluaran gagal ditambahkan');
			redirect(site_url('superadmin/keuangan/keluaran'));
		}
	}


	function masukan()
	{
		$site 	= $this->konfigurasi_model->listing();
		$total = $this->kas_model->row_masuk();
		$result = $this->kas_model->nomor();
		if (empty($result[0]['nomor'])) {
			$no = date('Ymd') . "000001";
		} else {
			$no = $result[0]['nomor'] + 1;
		}

		// $total = $this->kas_model->row_masuk();
		$data = array(
			'title'		=> 'Sirkulasi Keuangan',
			'nomor' 	=> $no,
			'namasite'	=> $site['namaweb'],
			'result' 	=> $this->kas_model->masuk(),
			'ttl' 		=> $this->kas_model->total_masuk(),
			'isi'		=> 'superadmin/keuangan/masukan'
		);
		$this->load->view('superadmin/_partials/wrapper', $data);
	}

	function keluaran()
	{
		$site 	= $this->konfigurasi_model->listing();
		$total = $this->kas_model->row_masuk();
		$result = $this->kas_model->nomor();
		if (empty($result[0]['nomor'])) {
			$no = date('Ymd') . "000001";
		} else {
			$no = $result[0]['nomor'] + 1;
		}

		// $total = $this->kas_model->row_masuk();
		$data = array(
			'title'		=> 'Sirkulasi Keuangan',
			'nomor' 	=> $no,
			'namasite'	=> $site['namaweb'],
			'result' 	=> $this->kas_model->keluaran(),
			'ttl' 		=> $this->kas_model->total_keluar(),
			'isi'		=> 'superadmin/keuangan/keluaran'
		);
		$this->load->view('superadmin/_partials/wrapper', $data);
	}

	function ubah($nomor = null)
	{
		if (!isset($nomor)) redirect('superadmin/keuangan');
		$site 	= $this->konfigurasi_model->listing();
		$result = $this->kas_model->ambil_data($nomor);
		$data = array(
			'title'		    => 'Edit',
			'namasite'	    => $site['namaweb'],
			'nomor'			=> $result[0]['nomor'],
			'keterangan'	=> $result[0]['keterangan'],
			'tanggal'		=> $result[0]['tanggal'],
			'jumlah'		=> $result[0]['jumlah'],
			'isi'		    => 'superadmin/keuangan/edit'
		);
		$this->load->view('superadmin/_partials/wrapper', $data);
	}

	function do_ubah($nomor = null)
	{
		if (isset($nomor)) {
			$data = array(
				'nomor'			=> $this->input->post('nomor'),
				'keterangan'	=> $this->input->post('keterangan'),
				'tanggal' 		=> $this->input->post('tanggal'),
				'jumlah' 		=> $this->input->post('jumlah')
			);
			$input = $this->kas_model->ubah($this->input->post('nomor'), $data);
			if ($input) {
				$this->session->set_flashdata('sukses', 'Data keuangan berhasil diubah');
				redirect(site_url('superadmin/keuangan'));
			}
		} else show_404();
	}

	function hapus_data($nomor)
	{
		$hapus = $this->kas_model->hapus($nomor);
		if ($hapus) {
			$this->session->set_flashdata('maaf', 'Data keuangan barhasil dihapus');
			redirect(site_url('superadmin/keuangan'));
		} else {
			$this->session->set_flashdata('maaf', 'Data keuangan gagal dihapus');
			redirect(site_url('superadmin/keuangan'));
		}
	}

	function hapus_in($nomor)
	{
		$hapus = $this->kas_model->hapus($nomor);
		if ($hapus) {
			$this->session->set_flashdata('maaf', 'Data keuangan barhasil dihapus');
			redirect(site_url('superadmin/keuangan/masukan'));
		} else {
			$this->session->set_flashdata('maaf', 'Data keuangan gagal dihapus');
			redirect(site_url('superadmin/keuangan/masukan'));
		}
	}

	function hapus_out($nomor)
	{
		$hapus = $this->kas_model->hapus($nomor);
		if ($hapus) {
			$this->session->set_flashdata('maaf', 'Data keuangan barhasil dihapus');
			redirect(site_url('superadmin/keuangan/keluaran'));
		} else {
			$this->session->set_flashdata('maaf', 'Data keuangan gagal dihapus');
			redirect(site_url('superadmin/keuangan/keluaran'));
		}
	}

	function clean()
	{
		if ($this->session->userdata('akses_level') == "superadmin") {
			$exec = $this->kas_model->clean();
			if ($exec) {
				$this->session->set_flashdata('maaf', 'Semua data keuangan berhasil dihapus');
				redirect(site_url('superadmin/keuangan'));
			} else {
				$this->session->set_flashdata('maaf', 'Semua data gagal dihapus');
				redirect(site_url('superadmin/keuangan'));
			}
		} else {
			show_404(); //page not found
		}
	}
} // end of all