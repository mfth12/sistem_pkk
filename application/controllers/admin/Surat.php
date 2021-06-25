<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->library('form_validation');
		$this->load->model('surat_model');
		$this->load->model('pokja_model');
		if($this->session->userdata('akses_level') != 'superadmin')
			show_404();
	}

	public function index()
	{
		$site 	= $this->konfigurasi_model->listing();
		$total 	= $this->surat_model->row_masuk();
		$result = $this->surat_model->nomor();
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
			'title'		=> 'Surat',
			'namasite'	=> $site['namaweb'],
			'result' 	=> $this->surat_model->all(),
			'nomor' 	=> $no,
			'ttl' 		=> $this->surat_model->total_masuk(),
			'ttl_k' 	=> $this->surat_model->total_keluar(),
			'isi'		=> 'back/surat/list'
		);
		$this->load->view('back/wrapper', $data);
	}
	
	function masuk()
	{
		$pokja 	= $this->pokja_model->listing();
		$site 	= $this->konfigurasi_model->listing();
		$result = $this->surat_model->nomor();
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
			$input = $this->surat_model->tambah_pemasukan($data);
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
			// $total = $this->surat_model->row_masuk();
			$data = array(
				'title'		=> 'Pemasukan',
				'nomor' 	=> $no,
				'pokja'		=> $pokja,
				'namasite'	=> $site['namaweb'],
				'result' 	=> $this->surat_model->masuk(),
				'ttl' 		=> $this->surat_model->total_masuk(),
				'isi'		=> 'back/surat/masukan'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function keluar()
	{
		$pokja 	= $this->pokja_model->listing();
		$site 	= $this->konfigurasi_model->listing();
		$result = $this->surat_model->nomor();
		$v 		= $this->form_validation;
		$v->set_rules(
			'keterangan2',
			'Nota pengeluaran',
			'required',
			array('required'	=> 'Nota keuangan harus diisi')
		);
		if ($v->run()) {
			$config['upload_path'] 		= './back_assets/upload/transaksi/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '6048'; // KB
			$config['file_name']        = $this->input->post('nomor2');
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
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
					'title'		=> 'Pengeluaran',
					'nomor' 	=> $no,
					'namasite'	=> $site['namaweb'],
					'pokja'		=> $pokja,
					'error'		=> $this->upload->display_errors(),
					'result' 	=> $this->surat_model->keluaran(),
					'ttl' 		=> $this->surat_model->total_keluar(),
					'isi'		=> 'back/surat/keluaran'
				);
				$this->load->view('back/wrapper', $data);
			} else { //kalau berhasil diupload ke sistem
				$upload_data				= array('uploads' => $this->upload->data());
				$data = array(
						'id_periode'	=> $this->session->userdata('active_periode'),
						'image'			=> $upload_data['uploads']['file_name'],
						'id_pokja'		=> $this->input->post('id_pokja'),
						'nomor'			=> $this->input->post('nomor2'),
						'keterangan'	=> $this->input->post('keterangan2'),
						'tanggal' 		=> $this->input->post('tanggal2'),
						'jumlah' 		=> $this->input->post('jumlah2'),
						'jenis' 		=> 'keluar'
					);
				$input = $this->surat_model->tambah_pengeluaran($data);
				if ($input) {
					$this->session->set_flashdata('sukses', 'Data pengeluaran berhasil ditambahkan');
					redirect(site_url('admin/keuangan/keluaran'));
				} else {
					$this->session->set_flashdata('maaf', 'Maaf, data pengeluaran gagal ditambahkan');
					redirect(site_url('admin/keuangan/keluaran'));
				}
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

			// $total = $this->surat_model->row_masuk();
			$data = array(
				'title'		=> 'Pengeluaran',
				'nomor' 	=> $no,
				'namasite'	=> $site['namaweb'],
				'pokja'		=> $pokja,
				'result' 	=> $this->surat_model->keluaran(),
				'ttl' 		=> $this->surat_model->total_keluar(),
				'isi'		=> 'back/surat/keluaran'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function ubah_masuk($nomor = null)
	{
		if (!isset($nomor)) redirect('admin/keuangan');
		$site 	= $this->konfigurasi_model->listing();
		$result = $this->surat_model->ambil_data($nomor);
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
				$input = $this->surat_model->ubah($this->input->post('nomor'), $data);
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
				'isi'		    => 'back/surat/edit_masuk'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function ubah_keluar($nomor = null)
	{
		if (!isset($nomor)) redirect('admin/keuangan');
		$pokja 	= $this->pokja_model->listing();
		$site 	= $this->konfigurasi_model->listing();
		$result = $this->surat_model->ambil_data($nomor);
		$v 		= $this->form_validation;
		$v->set_rules(
			'keterangan',
			'Nota',
			'required',
			array('required'	=> 'Nota keuangan harus diisi')
		);

		if ($v->run()) {
			if (!$_FILES['image']['name']) { //untuk kosong
				if (isset($nomor)) {
					$data = array(
						'id_periode'	=> $this->session->userdata('active_periode'),
						'image'			=> $this->input->post('image_lama'),
						'id_pokja'		=> $this->input->post('id_pokja'),
						 // ////
						'keterangan'	=> $this->input->post('keterangan'),
						'tanggal' 		=> $this->input->post('tanggal'),
						'jumlah' 		=> $this->input->post('jumlah')
					);
					$input = $this->surat_model->ubah($this->input->post('nomor'), $data);
					if ($input) {
						$this->session->set_flashdata('sukses', 'Data keuangan berhasil diubah, bukti transaksi tidak berubah.');
						redirect(site_url('admin/keuangan/keluaran'));
					}
				} else show_404();
			} else { //kalau ada isi
				$config['upload_path'] 		= './back_assets/upload/transaksi/';
				$config['allowed_types'] 	= 'gif|jpg|png|svg';
				$config['max_size']			= '6048'; // KB
				$config['file_name']        = $this->input->post('nomor');
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
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
						'title'		=> 'Pengeluaran',
						'nomor' 	=> $no,
						'namasite'	=> $site['namaweb'],
						'pokja'		=> $pokja,
						'error'		=> $this->upload->display_errors(),
						'result' 	=> $this->surat_model->keluaran(),
						'ttl' 		=> $this->surat_model->total_keluar(),
						'isi'		=> 'back/surat/keluaran'
					);
					$this->load->view('back/wrapper', $data);
				} else { //kalau berhasil diupload ke sistem
					$upload_data = array('uploads' => $this->upload->data());
					$data = array(
						'id_periode'	=> $this->session->userdata('active_periode'),
						'image'			=> $upload_data['uploads']['file_name'],
						'id_pokja'		=> $this->input->post('id_pokja'),
						'nomor'			=> $this->input->post('nomor'),
						'keterangan'	=> $this->input->post('keterangan'),
						'tanggal' 		=> $this->input->post('tanggal'),
						'jumlah' 		=> $this->input->post('jumlah'),
						'jenis' 		=> 'keluar'
					);
					$input = $this->surat_model->ubah($this->input->post('nomor'), $data);
					if ($input) {
						$this->session->set_flashdata('sukses', 'Data pengeluaran dan bukti transaksi, berhasil diperbarui');
						redirect(site_url('admin/keuangan/keluaran'));
					} else {
						$this->session->set_flashdata('maaf', 'Maaf, data pengeluaran gagal diperbarui');
						redirect(site_url('admin/keuangan/keluaran'));
					}
				}
			}
		}
		if (!$v->run()) {
			$data = array(
				'title'		    => 'Ubah Pengeluaran',
				'pokja'			=> $pokja,
				'namasite'	    => $site['namaweb'],
				'nomor'			=> $result[0]['nomor'],
				'id_pokja_this'	=> $result[0]['id_pokja'],
				'image'			=> $result[0]['image'],
				'keterangan'	=> $result[0]['keterangan'],
				'tanggal'		=> $result[0]['tanggal'],
				'jumlah'		=> $result[0]['jumlah'],
				'isi'		    => 'back/surat/edit_keluar'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function hapus_data($nomor)
	{
		$hapus = $this->surat_model->hapus($nomor);
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
		$hapus = $this->surat_model->hapus($nomor);
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
		$hapus = $this->surat_model->hapus($nomor);
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
			$exec = $this->surat_model->clean();
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