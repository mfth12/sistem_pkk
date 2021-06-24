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
		$this->load->model('pokja_model');
		// if($this->session->userdata('akses_level') != 'superadmin')
		// 	show_404();
	}

	public function index()
	{
		$site 	= $this->konfigurasi_model->listing();
		$total 	= $this->kas_model->row_masuk();
		$result = $this->kas_model->nomor();
		$ben	= "001";
		$bes	= date('Ymd') . $ben;
		if (empty($result[0]['nomor'])) {
			$no = $bes;
		} else if (substr($result[0]['nomor'], 0, 8) == (date('Ymd'))) {
			$no = $result[0]['nomor'] + 1;
		} else if (substr($result[0]['nomor'], 0, 8) != (date('Ymd'))) {
			$no = $bes;
		}

		$data = array(
			'title'		=> 'Keuangan',
			'namasite'	=> $site['namaweb'],
			'result' 	=> $this->kas_model->all(),
			'nomor' 	=> $no,
			'ttl' 		=> $this->kas_model->total_masuk(),
			'ttl_k' 	=> $this->kas_model->total_keluar(),
			// 'ttl' 		=> $ttl_saldo,
			'isi'		=> 'back/keuangan/list'
		);
		$this->load->view('back/wrapper', $data);
	}

	
	function masukan()
	{
		$pokja 	= $this->pokja_model->listing();
		$site 	= $this->konfigurasi_model->listing();
		$result = $this->kas_model->nomor();
		$v 		= $this->form_validation;
		$v->set_rules(
			'keterangan',
			'Nota',
			'required',
			array('required'	=> 'Nota keuangan harus diisi')
		);
		if ($v->run()) {
			$data = array(
				'id_periode'	=> $this->session->userdata('active_periode'),
				'id_pokja'		=> $this->input->post('id_pokja'),
				'nomor'			=> $this->input->post('nomor'),
				'keterangan'	=> $this->input->post('keterangan'),
				'tanggal' 		=> $this->input->post('tanggal'),
				'jumlah' 		=> $this->input->post('jumlah'),
				'jenis' 		=> 'masuk'
			);
			$input = $this->kas_model->tambah_pemasukan($data);
			if ($input) {
				$this->session->set_flashdata('sukses', 'Data pemasukkan berhasil ditambahkan');
				redirect(site_url('admin/keuangan/masukan'));
			} else {
				$this->session->set_flashdata('maaf', 'Maaf, data pemasukan gagal ditambahkan');
				redirect(site_url('admin/keuangan/masukan'));
			}
		}

		if (!$v->run()) {
			$ben	= "001";
			$bes	= date('Ymd') . $ben;
			if (empty($result[0]['nomor'])) {
				$no = $bes;
			} else if (substr($result[0]['nomor'], 0, 8) == (date('Ymd'))) {
				$no = $result[0]['nomor'] + 1;
			} else if (substr($result[0]['nomor'], 0, 8) != (date('Ymd'))) {
				$no = $bes;
			}
			// $total = $this->kas_model->row_masuk();
			$data = array(
				'title'		=> 'Pemasukan',
				'nomor' 	=> $no,
				'pokja'		=> $pokja,
				'namasite'	=> $site['namaweb'],
				'result' 	=> $this->kas_model->masuk(),
				'ttl' 		=> $this->kas_model->total_masuk(),
				'isi'		=> 'back/keuangan/masukan'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function keluaran()
	{
		$pokja 	= $this->pokja_model->listing();
		$site 	= $this->konfigurasi_model->listing();
		$result = $this->kas_model->nomor();
		$v 		= $this->form_validation;
		$v->set_rules(
			'keterangan2',
			'Nota pengeluaran',
			'required',
			array('required'	=> 'Nota keuangan harus diisi')
		);
		if ($v->run()) {
			$data = array(
				'id_periode'	=> $this->session->userdata('active_periode'),
				'nomor'			=> $this->input->post('nomor2'),
				'keterangan'	=> $this->input->post('keterangan2'),
				'tanggal' 		=> $this->input->post('tanggal2'),
				'jumlah' 		=> $this->input->post('jumlah2'),
				'jenis' 		=> 'keluar'
			);
			$input = $this->kas_model->tambah_pengeluaran($data);
			if ($input) {
				$this->session->set_flashdata('sukses', 'Data pengeluaran berhasil ditambahkan');
				redirect(site_url('admin/keuangan/keluaran'));
			} else {
				$this->session->set_flashdata('maaf', 'Maaf, data pengeluaran gagal ditambahkan');
				redirect(site_url('admin/keuangan/keluaran'));
			}
		}
		if (!$v->run()) {
			$ben	= "001";
			$bes	= date('Ymd') . $ben;
			if (empty($result[0]['nomor'])) {
				$no = $bes;
			} else if (substr($result[0]['nomor'], 0, 8) == (date('Ymd'))) {
				$no = $result[0]['nomor'] + 1;
			} else if (substr($result[0]['nomor'], 0, 8) != (date('Ymd'))) {
				$no = $bes;
			}

			// $total = $this->kas_model->row_masuk();
			$data = array(
				'title'		=> 'Pengeluaran',
				'nomor' 	=> $no,
				'namasite'	=> $site['namaweb'],
				'pokja'		=> $pokja,
				'result' 	=> $this->kas_model->keluaran(),
				'ttl' 		=> $this->kas_model->total_keluar(),
				'isi'		=> 'back/keuangan/keluaran'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function ubah_masukan($nomor = null)
	{
		if (!isset($nomor)) redirect('admin/keuangan');
		$site 	= $this->konfigurasi_model->listing();
		$result = $this->kas_model->ambil_data($nomor);
		$v 		= $this->form_validation;
		$v->set_rules(
			'keterangan',
			'Nota',
			'required',
			array('required'	=> 'Nota keuangan harus diisi')
		);

		if ($v->run()) {
			if (isset($nomor)) {
				$data = array(
					'nomor'			=> $this->input->post('nomor'),
					'keterangan'	=> $this->input->post('keterangan'),
					'id_pokja'		=> $this->input->post('id_pokja'),
					'tanggal' 		=> $this->input->post('tanggal'),
					'jumlah' 		=> $this->input->post('jumlah')
				);
				$input = $this->kas_model->ubah($this->input->post('nomor'), $data);
				if ($input) {
					$this->session->set_flashdata('sukses', 'Data keuangan berhasil diubah');
					redirect(site_url('admin/keuangan/masukan'));
				}
			} else show_404();
		}
		if (!$v->run()) {
			$data = array(
				'title'		    => 'Ubah Pemasukan',
				'namasite'	    => $site['namaweb'],
				'nomor'			=> $result[0]['nomor'],
				'id_pokja'		=> $result[0]['id_pokja'],
				'nama_pokja'	=> $result[0]['nama_pokja'],
				'keterangan'	=> $result[0]['keterangan'],
				'tanggal'		=> $result[0]['tanggal'],
				'jumlah'		=> $result[0]['jumlah'],
				'isi'		    => 'back/keuangan/edit_masuk'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function ubah_keluaran($nomor = null)
	{
		if (!isset($nomor)) redirect('admin/keuangan');
		$site 	= $this->konfigurasi_model->listing();
		$result = $this->kas_model->ambil_data($nomor);
		$v 		= $this->form_validation;
		$v->set_rules(
			'keterangan',
			'Nota',
			'required',
			array('required'	=> 'Nota keuangan harus diisi')
		);

		if ($v->run()) {
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
					redirect(site_url('admin/keuangan/keluaran'));
				}
			} else show_404();
		}
		if (!$v->run()) {
			$data = array(
				'title'		    => 'Ubah Pengeluaran',
				'namasite'	    => $site['namaweb'],
				'nomor'			=> $result[0]['nomor'],
				'keterangan'	=> $result[0]['keterangan'],
				'tanggal'		=> $result[0]['tanggal'],
				'jumlah'		=> $result[0]['jumlah'],
				'isi'		    => 'back/keuangan/edit_keluar'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function hapus_data($nomor)
	{
		$hapus = $this->kas_model->hapus($nomor);
		if ($hapus) {
			$this->session->set_flashdata('maaf', 'Data keuangan berhasil dihapus');
			redirect(site_url('admin/keuangan'));
		} else {
			$this->session->set_flashdata('maaf', 'Data keuangan gagal dihapus');
			redirect(site_url('admin/keuangan'));
		}
	}

	function hapus_in($nomor)
	{
		$hapus = $this->kas_model->hapus($nomor);
		if ($hapus) {
			$this->session->set_flashdata('maaf', 'Data keuangan berhasil dihapus');
			redirect(site_url('admin/keuangan/masukan'));
		} else {
			$this->session->set_flashdata('maaf', 'Data keuangan gagal dihapus');
			redirect(site_url('admin/keuangan/masukan'));
		}
	}

	function hapus_out($nomor)
	{
		$hapus = $this->kas_model->hapus($nomor);
		if ($hapus) {
			$this->session->set_flashdata('maaf', 'Data keuangan berhasil dihapus');
			redirect(site_url('admin/keuangan/keluaran'));
		} else {
			$this->session->set_flashdata('maaf', 'Data keuangan gagal dihapus');
			redirect(site_url('admin/keuangan/keluaran'));
		}
	}

	function clean()
	{
		if ($this->session->userdata('akses_level') == "superadmin") {
			$exec = $this->kas_model->clean();
			if ($exec) {
				$this->session->set_flashdata('maaf', 'Semua data keuangan berhasil dihapus');
				redirect(site_url('admin/keuangan'));
			} else {
				$this->session->set_flashdata('maaf', 'Semua data gagal dihapus');
				redirect(site_url('admin/keuangan'));
			}
		} else {
			show_404(); //page not found
		}
	}
} // end of all