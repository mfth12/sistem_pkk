<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('berita_model');
		$this->load->model('kategori_berita_model');
		$this->load->model('konfigurasi_model');
		// if($this->session->userdata('akses_level') != 'superadmin')
		// 	show_404();
	}

	// Index
	public function index()
	{
		$berita = $this->berita_model->listing();
		$site 	= $this->konfigurasi_model->listing();

		$data = array(
			'title'		=> 'Kegiatan PKK',
			'namasite'	=> $site['namaweb'],
			'berita'	=> $berita,
			'isi'		=> 'superadmin/kegiatan/list'
		);
		$this->load->view('superadmin/_partials/wrapper', $data);
	}

	// Tambah
	public function tambah()
	{
		$kategori	= $this->kategori_berita_model->listing();
		$site 		= $this->konfigurasi_model->listing();

		// Validasi
		$v = $this->form_validation;

		$v->set_rules(
			'nama_berita',
			'Nama berita',
			'required|is_unique[berita.nama_berita]',
			array(
				'required'		=> 'Nama kegiatan harus diisi',
				'is_unique'		=> 'Nama kegiatan: <strong>' . $this->input->post('nama_berita') .
					'</strong> sudah ada. Buat nama kegiatan yang berbeda'
			)
		);

		$v->set_rules(
			'keterangan',
			'Keterangan berita',
			'required',
			array('required'		=> 'Keterangan berita harus diisi')
		);

		if ($v->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				// End validasi

				$data = array(
					'title'		=> 'Tambah Kegiatan',
					'namasite'	=> $site['namaweb'],
					'kategori'	=> $kategori,
					'error'		=> $this->upload->display_errors(),
					'isi'		=> 'superadmin/kegiatan/tambah'
				);
				$this->load->view('superadmin/_partials/wrapper', $data);
				// Masuk database
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 200; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				// Proses ke database
				$i = $this->input;
				$data = array(
					'id_user'				=> $this->session->userdata('id'),
					'id_kategori_berita'	=> $i->post('id_kategori_berita'),
					'slug_berita'			=> url_title($i->post('nama_berita'), 'dash', TRUE),
					'nama_berita'			=> $i->post('nama_berita'),
					'keterangan'			=> $i->post('keterangan'),
					'jenis_berita'			=> $i->post('jenis_berita'),
					'status_berita'			=> $i->post('status_berita'),
					'gambar'				=> $upload_data['uploads']['file_name'],
					'tanggal_post'			=> date('Y-m-d H:i:s')
				);
				$this->berita_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Kegiatan berhasil ditambah');
				redirect(base_url('superadmin/kegiatan'));
			}
		}
		// End masuk database
		$data = array(
			'title'		=> 'Tambah kegiatan',
			'namasite'	=> $site['namaweb'],
			'kategori'	=> $kategori,
			'isi'		=> 'superadmin/kegiatan/tambah'
		);
		$this->load->view('superadmin/_partials/wrapper', $data);
	}

	// Edit
	public function edit($id_berita = null)
	{
		if (!isset($id_berita)) redirect('superadmin/kegiatan');
		$berita		= $this->berita_model->detail($id_berita);
		$kategori	= $this->kategori_berita_model->listing();
		$site 	= $this->konfigurasi_model->listing();

		// Validasi
		$v = $this->form_validation;

		$v->set_rules(
			'nama_berita',
			'Nama berita',
			'required',
			array('required'		=> 'Nama berita harus diisi')
		);

		$v->set_rules(
			'keterangan',
			'Keterangan berita',
			'required',
			array('required'		=> 'Keterangan kegiatan harus diisi')
		);

		if ($v->run()) {
			if (!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/upload/image/';
				$config['allowed_types'] 	= 'gif|jpg|png|svg';
				$config['max_size']			= '12000'; // KB	
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					// End validasi

					$data = array(
						'title'		=> 'Edit berita',
						'namasite'	=> $site['namaweb'],
						'kategori'	=> $kategori,
						'berita'	=> $berita,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'superadmin/kegiatan/edit'
					);
					$this->load->view('superadmin/_partials/wrapper', $data);
					// Masuk database
				} else {
					$upload_data				= array('uploads' => $this->upload->data());
					// Image Editor
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/upload/image/' . $upload_data['uploads']['file_name'];
					$config['new_image'] 		= './assets/upload/image/thumbs/';
					$config['create_thumb'] 	= TRUE;
					$config['quality'] 			= "100%";
					$config['maintain_ratio'] 	= TRUE;
					$config['width'] 			= 360; // Pixel
					$config['height'] 			= 200; // Pixel
					$config['x_axis'] 			= 0;
					$config['y_axis'] 			= 0;
					$config['thumb_marker'] 	= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					// Proses ke database
					$i = $this->input;
					$data = array(
						'id_berita'				=> $id_berita,
						'id_user'				=> $this->session->userdata('id'),
						'id_kategori_berita'	=> $i->post('id_kategori_berita'),
						'slug_berita'			=> url_title($i->post('nama_berita'), 'dash', TRUE),
						'nama_berita'			=> $i->post('nama_berita'),
						'keterangan'			=> $i->post('keterangan'),
						'jenis_berita'				=> $i->post('jenis_berita'),
						'status_berita'			=> $i->post('status_berita'),
						'gambar'				=> $upload_data['uploads']['file_name']
					);
					$this->berita_model->edit($data);
					$this->session->set_flashdata('sukses', 'Kegiatan berhasil diubah');
					redirect(base_url('superadmin/kegiatan'));
				}
			} else {
				// Proses ke database
				$i = $this->input;
				$data = array(
					'id_berita'				=> $id_berita,
					'id_user'				=> $this->session->userdata('id'),
					'id_kategori_berita'	=> $i->post('id_kategori_berita'),
					'slug_berita'			=> url_title($i->post('nama_berita'), 'dash', TRUE),
					'nama_berita'			=> $i->post('nama_berita'),
					'keterangan'			=> $i->post('keterangan'),
					'jenis_berita'			=> $i->post('jenis_berita'),
					'status_berita'			=> $i->post('status_berita')
				);
				$this->berita_model->edit($data);
				$this->session->set_flashdata('sukses', 'Kegiatan berhasil diubah');
				redirect(base_url('superadmin/kegiatan'));
			}
		}
		// End masuk database
		$data = array(
			'title'		=> 'Edit kegiatan',
			'namasite'	=> $site['namaweb'],
			'kategori'	=> $kategori,
			'berita'	=> $berita,
			'isi'		=> 'superadmin/kegiatan/edit'
		);
		$this->load->view('superadmin/_partials/wrapper', $data);
	}

	// Delete
	public function delete($id_berita)
	{
		$this->simple_login->terotentikasi();
		$data = array('id_berita' => $id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('dihapus', 'Data kegiatan berhasil dihapus');
		redirect(site_url('superadmin/kegiatan'));
	}
}
