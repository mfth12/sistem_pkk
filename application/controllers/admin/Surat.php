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
		$result = $this->surat_model->nomor();
		$data = array(
			'title'		=> 'Surat',
			'namasite'	=> $site['namaweb'],
			// 'sort' 		=> $this->surat_model->all_bulan(),
			'result' 	=> $this->surat_model->all(),
			'isi'		=> 'back/surat/list'
		);
		$this->load->view('back/wrapper', $data);
	}
	
	function masuk() //list keluar
	{
		$pokja 	= $this->pokja_model->listing();
		$site 	= $this->konfigurasi_model->listing();
		$v 		= $this->form_validation;
		$v->set_rules(
			'nomor',
			'Nomor surat',
			'required|is_unique[surat.nomor]',
			array(
				'required'	=> 'Nomor surat harus diisi',
				'is_unique'	=> 'Nomor surat <strong>' . $this->input->post('nomor') . '</strong> telah digunakan, Silakan input nomor surat yang lain.'
			)
		);
		if ($v->run()) {
			$config['upload_path'] 		= './back_assets/upload/surat/';
			$config['allowed_types'] 	= 'gif|jpg|jpeg|png|svg|pdf|docx|doc|rtf|txt';
			$config['max_size']			= '6048'; // KB
			$config['file_name']        = uniqid('SURAT', FALSE);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				$data = array(
					'title'		=> 'Surat Masuk',
					'namasite'	=> $site['namaweb'],
					'pokja'		=> $pokja,
					'error'		=> $this->upload->display_errors(),
					'result' 	=> $this->surat_model->masuk(),
					'isi'		=> 'back/surat/masuk'
				);
				$this->load->view('back/wrapper', $data);
			} else { //kalau berhasil diupload ke sistem
				$upload_data = array('uploads' => $this->upload->data());
				$data = array(
						'id_periode'	=> $this->session->userdata('active_periode'),
						'id_pokja'		=> $this->input->post('id_pokja'),
						'image'			=> $upload_data['uploads']['file_name'],
						'keterangan'	=> $this->input->post('keterangan'),
						'nomor'			=> $this->input->post('nomor'),
						'tanggal' 		=> $this->input->post('tanggal'),
						'jenis' 		=> 'masuk'
					);
				$input = $this->surat_model->tambah_suratkeluar($data);
				if ($input) {
					$this->session->set_flashdata('sukses', 'Data surat masuk berhasil ditambahkan');
					redirect(site_url('admin/surat/masuk'));
				} else {
					$this->session->set_flashdata('maaf', 'Maaf, data surat masuk gagal ditambahkan');
					redirect(site_url('admin/surat/masuk'));
				}
			}
		}
		if (!$v->run()) { // kalo gak run
			$data = array(
				'title'		=> 'Surat Masuk',
				'namasite'	=> $site['namaweb'],
				'pokja'		=> $pokja,
				'result' 	=> $this->surat_model->masuk(),
				'isi'		=> 'back/surat/masuk'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function keluar() //list keluar
	{
		$pokja 	= $this->pokja_model->listing();
		$site 	= $this->konfigurasi_model->listing();
		$v 		= $this->form_validation;
		$v->set_rules(
			'nomor',
			'Nomor surat',
			'required|is_unique[surat.nomor]',
			array(
				'required'	=> 'Nomor surat harus diisi',
				'is_unique'	=> 'Nomor surat <strong>' . $this->input->post('nomor') . '</strong> telah digunakan, Silakan input nomor surat yang lain.'
			)
		);
		if ($v->run()) {
			$config['upload_path'] 		= './back_assets/upload/surat/';
			$config['allowed_types'] 	= 'gif|jpg|jpeg|png|svg|pdf|docx|doc|rtf|txt';
			$config['max_size']			= '6048'; // KB
			$config['file_name']        = uniqid('SURAT', FALSE);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				$data = array(
					'title'		=> 'Surat Keluar',
					'namasite'	=> $site['namaweb'],
					'pokja'		=> $pokja,
					'error'		=> $this->upload->display_errors(),
					'result' 	=> $this->surat_model->keluar(),
					'isi'		=> 'back/surat/keluar'
				);
				$this->load->view('back/wrapper', $data);
			} else { //kalau berhasil diupload ke sistem
				$upload_data = array('uploads' => $this->upload->data());
				$data = array(
						'id_periode'	=> $this->session->userdata('active_periode'),
						'id_pokja'		=> $this->input->post('id_pokja'),
						'image'			=> $upload_data['uploads']['file_name'],
						'keterangan'	=> $this->input->post('keterangan'),
						'nomor'			=> $this->input->post('nomor'),
						'tanggal' 		=> $this->input->post('tanggal'),
						'jenis' 		=> 'keluar'
					);
				$input = $this->surat_model->tambah_suratkeluar($data);
				if ($input) {
					$this->session->set_flashdata('sukses', 'Data surat keluar berhasil ditambahkan');
					redirect(site_url('admin/surat/keluar'));
				} else {
					$this->session->set_flashdata('maaf', 'Maaf, data surat keluar gagal ditambahkan');
					redirect(site_url('admin/surat/keluar'));
				}
			}
		}
		if (!$v->run()) { // kalo gak run
			$data = array(
				'title'		=> 'Surat Keluar',
				'namasite'	=> $site['namaweb'],
				'pokja'		=> $pokja,
				'result' 	=> $this->surat_model->keluar(),
				'isi'		=> 'back/surat/keluar'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function ubah_masuk($nomor = null) //proses ubah masuk
	{
		if (!isset($nomor)) redirect('admin/surat');
		$pokja 	= $this->pokja_model->listing();
		$site 	= $this->konfigurasi_model->listing();
		$result = $this->surat_model->ambil_data($nomor);
		$v 		= $this->form_validation;
		$v->set_rules(
			'nomor',
			'Nomor',
			'required',
			array('required'	=> 'Nomor surat harus diisi')
		);

		if ($v->run()) {
			if (!$_FILES['image']['name']) { //untuk kosong
				if (isset($nomor)) {
					$data = array(
						'id_periode'	=> $this->session->userdata('active_periode'),
						'id_pokja'		=> $this->input->post('id_pokja'),
						'nomor'			=> $this->input->post('nomor'),
						'keterangan'	=> $this->input->post('keterangan'),
						'tanggal' 		=> $this->input->post('tanggal')
					);
					$input = $this->surat_model->ubah($this->input->post('id_surat'), $data);
					if ($input) {
						$this->session->set_flashdata('sukses', 'Data surat berhasil diubah, berkas surat tidak berubah.');
						redirect(site_url('admin/surat/masuk'));
					}
				} else show_404();
			} else { //kalau ada isi
				$config['upload_path'] 		= './back_assets/upload/surat/';
				$config['allowed_types'] 	= 'gif|jpg|jpeg|png|svg|pdf|docx|doc|rtf|txt';
				$config['max_size']			= '6048'; // KB
				$config['file_name']        = uniqid('SURAT', FALSE);
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image')) {
					$data = array(
						'title'			=> 'Ubah Surat Keluar',
						'namasite'		=> $site['namaweb'],
						'error'			=> $this->upload->display_errors(),
						'pokja'			=> $pokja,
						'id_surat'		=> $result[0]['id_surat'],
						'nomor'			=> $result[0]['nomor'],
						'id_pokja_this'	=> $result[0]['id_pokja'],
						'image'			=> $result[0]['image'],
						'keterangan'	=> $result[0]['keterangan'],
						'tanggal'		=> $result[0]['tanggal'],
						'isi'		=> 'back/surat/edit_masuk'
					);
					$this->load->view('back/wrapper', $data);
				} else { //kalau berhasil diupload ke sistem
					$upload_data = array('uploads' => $this->upload->data());
					$this->surat_model->hapus_gambar($nomor);
					$data = array(
						'id_periode'	=> $this->session->userdata('active_periode'),
						'image'			=> $upload_data['uploads']['file_name'],
						'id_pokja'		=> $this->input->post('id_pokja'),
						'nomor'			=> $this->input->post('nomor'),
						'keterangan'	=> $this->input->post('keterangan'),
						'tanggal' 		=> $this->input->post('tanggal'),
					);
					$input = $this->surat_model->ubah($this->input->post('id_surat'), $data);
					if ($input) {
						$this->session->set_flashdata('sukses', 'Data surat masuk dan berkas, berhasil diperbarui');
						redirect(site_url('admin/surat/masuk'));
					} else {
						$this->session->set_flashdata('maaf', 'Maaf, data surat masuk gagal diperbarui');
						redirect(site_url('admin/surat/masuk'));
					}
				}
			}
		}
		if (!$v->run()) {
			$data = array(
				'title'		    => 'Ubah Surat Masuk',
				'pokja'			=> $pokja,
				'namasite'	    => $site['namaweb'],
				'id_surat'		=> $result[0]['id_surat'],
				'nomor'			=> $result[0]['nomor'],
				'id_pokja_this'	=> $result[0]['id_pokja'],
				'image'			=> $result[0]['image'],
				'keterangan'	=> $result[0]['keterangan'],
				'tanggal'		=> $result[0]['tanggal'],
				'isi'		    => 'back/surat/edit_masuk'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function ubah_keluar($nomor = null) //proses ubah keluar
	{
		if (!isset($nomor)) redirect('admin/surat');
		$pokja 	= $this->pokja_model->listing();
		$site 	= $this->konfigurasi_model->listing();
		$result = $this->surat_model->ambil_data($nomor);
		$v 		= $this->form_validation;
		$v->set_rules(
			'nomor',
			'Nomor',
			'required',
			array('required'	=> 'Nomor surat harus diisi')
		);

		if ($v->run()) {
			if (!$_FILES['image']['name']) { //untuk kosong
				if (isset($nomor)) {
					$data = array(
						'id_periode'	=> $this->session->userdata('active_periode'),
						'id_pokja'		=> $this->input->post('id_pokja'),
						'nomor'			=> $this->input->post('nomor'),
						'keterangan'	=> $this->input->post('keterangan'),
						'tanggal' 		=> $this->input->post('tanggal')
					);
					$input = $this->surat_model->ubah($this->input->post('id_surat'), $data);
					if ($input) {
						$this->session->set_flashdata('sukses', 'Data surat berhasil diubah, berkas surat tidak berubah.');
						redirect(site_url('admin/surat/keluar'));
					}
				} else show_404();
			} else { //kalau ada isi
				$config['upload_path'] 		= './back_assets/upload/surat/';
				$config['allowed_types'] 	= 'gif|jpg|jpeg|png|svg|pdf|docx|doc|rtf|txt';
				$config['max_size']			= '6048'; // KB
				$config['file_name']        = uniqid('SURAT', FALSE);
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image')) {
					$data = array(
						'title'			=> 'Ubah Surat Keluar',
						'namasite'		=> $site['namaweb'],
						'error'			=> $this->upload->display_errors(),
						'pokja'			=> $pokja,
						'id_surat'		=> $result[0]['id_surat'],
						'nomor'			=> $result[0]['nomor'],
						'id_pokja_this'	=> $result[0]['id_pokja'],
						'image'			=> $result[0]['image'],
						'keterangan'	=> $result[0]['keterangan'],
						'tanggal'		=> $result[0]['tanggal'],
						'isi'		=> 'back/surat/edit_keluar'
					);
					$this->load->view('back/wrapper', $data);
				} else { //kalau berhasil diupload ke sistem
					$upload_data = array('uploads' => $this->upload->data());
					$this->surat_model->hapus_gambar($nomor);
					$data = array(
						'id_periode'	=> $this->session->userdata('active_periode'),
						'image'			=> $upload_data['uploads']['file_name'],
						'id_pokja'		=> $this->input->post('id_pokja'),
						'nomor'			=> $this->input->post('nomor'),
						'keterangan'	=> $this->input->post('keterangan'),
						'tanggal' 		=> $this->input->post('tanggal'),
					);
					$input = $this->surat_model->ubah($this->input->post('id_surat'), $data);
					if ($input) {
						$this->session->set_flashdata('sukses', 'Data surat keluar dan berkas, berhasil diperbarui');
						redirect(site_url('admin/surat/keluar'));
					} else {
						$this->session->set_flashdata('maaf', 'Maaf, data surat keluar gagal diperbarui');
						redirect(site_url('admin/surat/keluar'));
					}
				}
			}
		}
		if (!$v->run()) {
			$data = array(
				'title'		    => 'Ubah Surat Keluar',
				'pokja'			=> $pokja,
				'namasite'	    => $site['namaweb'],
				'id_surat'		=> $result[0]['id_surat'],
				'nomor'			=> $result[0]['nomor'],
				'id_pokja_this'	=> $result[0]['id_pokja'],
				'image'			=> $result[0]['image'],
				'keterangan'	=> $result[0]['keterangan'],
				'tanggal'		=> $result[0]['tanggal'],
				'isi'		    => 'back/surat/edit_keluar'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	function hapus_in($nomor)
	{
		$hapus = $this->surat_model->hapus($nomor);
		if ($hapus) {
			$this->session->set_flashdata('maaf', 'Data surat berhasil dihapus');
			redirect(site_url('admin/surat/masuk'));
		} else {
			$this->session->set_flashdata('maaf', 'Data surat gagal dihapus');
			redirect(site_url('admin/surat/masuk'));
		}
	}

	function hapus_out($nomor)
	{
		$hapus = $this->surat_model->hapus($nomor);
		if ($hapus) {
			$this->session->set_flashdata('maaf', 'Data surat berhasil dihapus');
			redirect(site_url('admin/surat/keluar'));
		} else {
			$this->session->set_flashdata('maaf', 'Data surat gagal dihapus');
			redirect(site_url('admin/surat/keluar'));
		}
	}

	function clean()
	{
		if ($this->session->userdata('akses_level') == "superadmin") {
			$exec = $this->surat_model->clean();
			if ($exec) {
				$this->session->set_flashdata('maaf', 'Semua data surat-meyurat berhasil dihapus');
				redirect(site_url('admin/surat'));
			} else {
				$this->session->set_flashdata('maaf', 'Semua data surat-meyurat gagal dihapus');
				redirect(site_url('admin/surat'));
			}
		} else {
			show_404(); //page not found
		}
	}
} // end of all