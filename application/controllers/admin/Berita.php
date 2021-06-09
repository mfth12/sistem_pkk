<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('berita_model');
		$this->load->model('pokja_model');
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
			'site'		=> $site, //percontohan untuk yang lain, menggunakan $site-['details']
			'title'		=> 'Berita',
			'namasite'	=> $site['namaweb'],
			'berita'	=> $berita,
			'isi'		=> 'back/2berita/index'
		);
		$this->load->view('back/wrapper', $data);
	}

	// Tambah
	public function tambah()
	{
		$site 		= $this->konfigurasi_model->listing();
		$pokja	= $this->pokja_model->listing(); //ngambil jenis pokja
		// Validasi
		$v = $this->form_validation;
		$v->set_rules(
			'nama_berita',
			'Judul berita',
			'required|is_unique[berita.nama_berita]',
			array(
				'required'		=> 'Judul berita harus diisi',
				'is_unique'		=> 'Judul berita: <strong>' . $this->input->post('nama_berita') . '</strong> sudah ada. Buat judul yang berbeda'
			)
		);
		$v->set_rules(
			'keterangan',
			'Keterangan berita',
			'required',
			array(
				'required'	=> 'Keterangan berita harus diisi'
				)
		);

		if ($v->run()) {
			$config['upload_path'] 		= './back_assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '6048'; // KB
			$config['file_name']        = url_title($this->input->post('nama_berita'), 'dash', TRUE);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				// End validasi
				//kalau gagal upload
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
				$this->berita_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Kegiatan berhasil ditambah.');
				redirect(base_url('admin/berita'));
			}
		}

		if (!$v->run()){
			// disini halaman default nya
			$data = array(
				'title'		=> 'Tambah Berita',
				'site'		=> $site,
				'namasite'	=> $site['namaweb'],
				'pokja'		=> $pokja, //ngambil data pokja
				'isi'		=> 'back/2berita/tambah'
			);
			$this->load->view('back/wrapper', $data);
		}
		
	}

	// Edit
	public function edit($id_berita = null)
	{
		if (!isset($id_berita)) redirect('admin/berita');
		$berita		= $this->berita_model->detail($id_berita);
		$pokja	= $this->pokja_model->listing();
		$site 		= $this->konfigurasi_model->listing();
		// Validasi
		$v = $this->form_validation;
		$v->set_rules(
			'nama_berita',
			'Judul berita',
			'required',
			array(
				'required'		=> 'Judul berita harus diisi'
			)
		);
		$v->set_rules(
			'keterangan',
			'Keterangan berita',
			'required',
			array('required'		=> 'Keterangan berita harus diisi')
		);

		if ($v->run()) {
			if (!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './back_assets/upload/image/';
				$config['allowed_types'] 	= 'gif|jpg|png|svg';
				$config['max_size']			= '6048'; // KB	
				$config['file_name']        = url_title($this->input->post('nama_berita'), 'dash', TRUE);
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					// End validasi
					//kalau gagal upload
					$data = array(
						'site'		=> $site,
						'title'		=> 'Ubah Berita',
						'namasite'	=> $site['namaweb'],
						'pokja'	=> $pokja,
						'berita'	=> $berita,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'back/2berita/edit'
					);
					$this->load->view('back/wrapper', $data);
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
						'id_berita'				=> $id_berita,
						'id_user'				=> $this->session->userdata('id'),
						'id_pokja'	=> $i->post('id_pokja'),
						'slug_berita'			=> url_title($i->post('nama_berita'), 'dash', TRUE),
						'nama_berita'			=> $i->post('nama_berita'),
						'keterangan'			=> $i->post('keterangan'),
						'jenis_berita'				=> $i->post('jenis_berita'),
						'status_berita'			=> $i->post('status_berita'),
						'gambar'				=> $upload_data['uploads']['file_name']
					);
					$gambar_lama = $this->berita_model->getById($id_berita);;
					if ($gambar_lama->gambar != "default.jpg") {
						$filename = explode(".", $gambar_lama->gambar)[0];
						array_map('unlink', glob(FCPATH."back_assets/upload/image/$filename.*"));
						array_map('unlink', glob(FCPATH."back_assets/upload/image/thumbs/$filename.*"));
					}
					$this->berita_model->edit($data);
					// $this->berita_model->delete_update($data);
					$this->session->set_flashdata('sukses', 'Berita berhasil diubah, gambar diperbarui.');
					redirect(base_url('admin/berita'));
				}
			} else {
				// Proses ke database
				
				$judul_input = url_title($this->input->post('nama_berita'), 'dash', TRUE);
				$ben = $this->berita_model->match_slug($judul_input);//perintah mengambil username aja kalo sama.
				if($ben==$judul_input) {
					$this->session->set_flashdata('dihapus', 'Judul sudah ada 56.'); // Buat session flashdata
					redirect(base_url('admin/berita'));
				}
				$i = $this->input;
				$data = array(
					'id_berita'				=> $id_berita,
					'id_user'				=> $this->session->userdata('id'),
					'id_pokja'				=> $i->post('id_pokja'),
					'slug_berita'			=> url_title($i->post('nama_berita'), 'dash', TRUE),
					'nama_berita'			=> $i->post('nama_berita'),
					'keterangan'			=> $i->post('keterangan'),
					'jenis_berita'			=> $i->post('jenis_berita'),
					'status_berita'			=> $i->post('status_berita')
				);
				$this->berita_model->edit($data);
				$this->session->set_flashdata('sukses', 'Berita berhasil diubah, gambar tidak diperbarui.');
				redirect(base_url('admin/berita'));
			}
		}
		// End masuk database
		if (!$v->run()) {
			$data = array(
				'title'		=> 'Ubah Berita',
				'site'		=> $site,
				'namasite'	=> $site['namaweb'],
				'pokja'	=> $pokja,
				'berita'	=> $berita,
				'isi'		=> 'back/2berita/edit'
			);
			$this->load->view('back/wrapper', $data);
		}
	}

	// Delete
	public function delete($id_berita)
	{
		$this->simple_login->terotentikasi();
		$data = array('id_berita' => $id_berita);
		$this->berita_model->delete($data);//menghapus direktori
		$this->session->set_flashdata('dihapus', 'Data kegiatan berhasil dihapus');
		redirect(site_url('admin/berita'));
	}

}
