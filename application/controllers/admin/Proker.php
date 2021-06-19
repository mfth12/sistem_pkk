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
		$proker = $this->proker_model->listing();
		$site 	= $this->konfigurasi_model->listing();
		$data = array(
			'site'		=> $site,
			'title'		=> 'Program Kerja',
			'namasite'	=> $site['namaweb'],
			'proker'	=> $proker,
			'isi'		=> 'back/3proker/index'
		);
		$this->load->view('back/wrapper', $data);
	}

	// Tambah Utama
	public function tambah_utama()
	{
		$site 		= $this->konfigurasi_model->listing();
		$pokja		= $this->pokja_model->listing();
		$v 			= $this->form_validation;
		$v->set_rules(
			'proker_utama',
			'Program kerja utama',
			'required',
			array('required'	=> 'Keterangan Program kerja harus diisi')
		);

		if ($v->run()) {
			$i = $this->input;
			$data = array(
				'id_user'		=> $this->session->userdata('id'),
				'id_pokja'		=> $i->post('id_pokja'),
				'slug_berita'	=> url_title($i->post('nama_berita'), 'dash', TRUE),
				'nama_berita'	=> $i->post('nama_berita'),
				'keterangan'	=> $i->post('keterangan'),
				'jenis_berita'	=> $i->post('jenis_berita'),
				'status_berita'	=> $i->post('status_berita'),
				'tanggal_post'	=> date('Y-m-d H:i:s')
			);
			$this->proker_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Kegiatan berhasil ditambah.');
			redirect(base_url('admin/proker'));
		}

		if (!$v->run()) {
			// disini halaman default nya
			$data = array(
				'title'		=> 'Tambah Program Utama',
				'site'		=> $site,
				'namasite'	=> $site['namaweb'],
				'pokja'		=> $pokja, //ngambil data pokja
				'isi'		=> 'back/3proker/tambah_utama'
			);
			$this->load->view('back/wrapper', $data);
		}
	}
	// Tambah
	public function tambah()
	{
		$site 		= $this->konfigurasi_model->listing();
		$pokja		= $this->pokja_model->listing();
		$v 			= $this->form_validation;
		$v->set_rules(
			'nama_berita',
			'Judul program kerja',
			'required|is_unique[proker.nama_berita]',
			array(
				'required'		=> 'Judul Program kerja harus diisi',
				'is_unique'		=> 'Program kerja: <strong>' . $this->input->post('nama_berita') . '</strong> sudah ada. Buat judul yang berbeda'
			)
		);
		$v->set_rules(
			'keterangan',
			'Keterangan Program kerja',
			'required',
			array(
				'required'	=> 'Keterangan Program kerja harus diisi'
			)
		);

		if ($v->run()) {
			$config['upload_path'] 		= './back_assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '6048'; // KB
			$config['file_name']        = url_title($this->input->post('nama_berita'), 'dash', TRUE);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				$datas = array(
					'title'		=> 'Tambah Berita',
					'site'		=> $site,
					'namasite'	=> $site['namaweb'],
					'pokja'	=> $pokja,
					'error'		=> $this->upload->display_errors(),
					'isi'		=> 'back/2berita/tambah'
				);
				$this->load->view('back/wrapper', $datas);
				// Masuk database
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './back_assets/upload/image/' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './back_assets/upload/image/thumbs/';
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
					'id_pokja'	=> $i->post('id_pokja'),
					'slug_berita'			=> url_title($i->post('nama_berita'), 'dash', TRUE),
					'nama_berita'			=> $i->post('nama_berita'),
					'keterangan'			=> $i->post('keterangan'),
					'jenis_berita'			=> $i->post('jenis_berita'),
					'status_berita'			=> $i->post('status_berita'),
					'gambar'				=> $upload_data['uploads']['file_name'],
					'tanggal_post'			=> date('Y-m-d H:i:s')
				);
				$this->proker_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Kegiatan berhasil ditambah.');
				redirect(base_url('admin/proker'));
			}
		}

		if (!$v->run()) {
			$data = array(
				'title'		=> 'Tambah Program Utama',
				'site'		=> $site,
				'namasite'	=> $site['namaweb'],
				'pokja'		=> $pokja, //ngambil data pokja
				'isi'		=> 'back/3proker/tambah_utama'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	public function edit($id_proker = null)
	{
		if (!isset($id_proker)) redirect('admin/proker');
		$proker		= $this->proker_model->detail($id_proker);
		$pokja		= $this->pokja_model->listing();
		$site 		= $this->konfigurasi_model->listing();
		// Validasi
		$v = $this->form_validation;
		$v->set_rules(
			'keterangan',
			'Keterangan program kerja',
			'required',
			array('required' => 'Keterangan program kerja harus diisi')
		);

		if ($v->run()) {
			if (!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './back_assets/upload/image/';
				$config['allowed_types'] 	= 'gif|jpg|png|svg';
				$config['max_size']			= '6048'; // KB	
				$config['file_name']        = url_title($this->input->post('nama_berita'), 'dash', TRUE);
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					$data = array(
						'site'		=> $site,
						'title'		=> 'Ubah Berita',
						'namasite'	=> $site['namaweb'],
						'pokja'	=> $pokja,
						'proker'	=> $proker,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'back/2berita/edit'
					);
					$this->load->view('back/wrapper', $data);
				} else {
					$upload_data				= array('uploads' => $this->upload->data());
					// Image Editor
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './back_assets/upload/image/' . $upload_data['uploads']['file_name'];
					$config['new_image'] 		= './back_assets/upload/image/thumbs/';
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
						'id_proker'				=> $id_proker,
						'id_user'				=> $this->session->userdata('id'),
						'id_pokja'				=> $i->post('id_pokja'),
						'slug_berita'			=> url_title($i->post('nama_berita'), 'dash', TRUE),
						'nama_berita'			=> $i->post('nama_berita'),
						'keterangan'			=> $i->post('keterangan'),
						'jenis_berita'				=> $i->post('jenis_berita'),
						'status_berita'			=> $i->post('status_berita'),
						'gambar'				=> $upload_data['uploads']['file_name']
					);
					$gambar_lama = $this->proker_model->getById($id_proker);
					if ($gambar_lama->gambar != "default.jpg") {
						$filename = explode(".", $gambar_lama->gambar)[0];
						array_map('unlink', glob(FCPATH . "back_assets/upload/image/$filename.*"));
						array_map('unlink', glob(FCPATH . "back_assets/upload/image/thumbs/$filename.*"));
					}
					$this->proker_model->edit($data);
					// $this->proker_model->delete_update($data);
					$this->session->set_flashdata('sukses', 'Program kerja berhasil diubah, gambar diperbarui.');
					redirect(base_url('admin/proker'));
				}
			} else {
				// Proses ke database
				$judul_input = url_title($this->input->post('nama_berita'), 'dash', TRUE);
				$ben = $this->proker_model->match_slug($judul_input); //perintah mengambil username aja kalo sama.
				if ($ben == $judul_input) {
					$this->session->set_flashdata('dihapus', 'Judul sudah ada 56.'); // Buat session flashdata
					redirect(base_url('admin/proker'));
				}
				$i = $this->input;
				$data = array(
					'id_proker'				=> $id_proker,
					'id_user'				=> $this->session->userdata('id'),
					'id_pokja'				=> $i->post('id_pokja'),
					'slug_berita'			=> url_title($i->post('nama_berita'), 'dash', TRUE),
					'nama_berita'			=> $i->post('nama_berita'),
					'keterangan'			=> $i->post('keterangan'),
					'jenis_berita'			=> $i->post('jenis_berita'),
					'status_berita'			=> $i->post('status_berita')
				);
				$this->proker_model->edit($data);
				$this->session->set_flashdata('sukses', 'Program kerja berhasil diubah, gambar tidak diperbarui.');
				redirect(base_url('admin/proker'));
			}
		}
		// End masuk database
		if (!$v->run()) {
			$data = array(
				'title'		=> 'Ubah Berita',
				'site'		=> $site,
				'namasite'	=> $site['namaweb'],
				'pokja'	=> $pokja,
				'proker'	=> $proker,
				'isi'		=> 'back/2berita/edit'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	// Delete
	public function delete($id_proker)
	{
		$this->simple_login->terotentikasi();
		$data = array('id_proker' => $id_proker);
		$this->proker_model->delete($data); //menghapus direktori
		$this->session->set_flashdata('dihapus', 'Data program kerja berhasil dihapus');
		redirect(site_url('admin/proker'));
	}
}
