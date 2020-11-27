<?php

class overview extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('user_model');
		$this->load->model('video_model');
		$this->load->model('berita_model');
		$this->load->model('produk_model');
		$this->load->model('kategori_produk_model');
		$this->load->model('kategori_berita_model');
		$this->load->model('kas_model');
		$this->load->model('sliders_model');
		$this->load->model('struktur_model');
		// if($this->session->userdata('akses_level') != 'superadmin')
		// 	show_404();
	}


	public function index()
	{
		$site 				= $this->konfigurasi_model->listing();
		$user				= $this->user_model->listing();
		$berita				= $this->berita_model->listing();
		$produk				= $this->produk_model->listing();
		$kategori_produk	= $this->kategori_produk_model->listing();
		$kategori_berita	= $this->kategori_berita_model->listing();
		$total 			= $this->kas_model->total_all();
		$slider 		= $this->sliders_model->total_all();
		$struktur 		= $this->struktur_model->total_all();

		$data = array(
			'title'				=> 'Dashboard ' . $site['namaweb'],
			'namasite'			=> $site['namaweb'],
			'user'				=> $user,
			'berita'			=> $berita,
			'produk'			=> $produk,
			'kategori_produk'	=> $kategori_produk,
			'kategori_berita'	=> $kategori_berita,
			'total_trans'		=> $total,
			'slider'		=> $slider,
			'struktur'		=> $struktur,
			'isi'				=> 'superadmin/dasbor/list.php'
		);

		$this->load->view('superadmin/_partials/wrapper', $data);

		// if($this->session->userdata('akses_level') == 'superadmin')
		// 	{$this->load->view('superadmin/_partials/wrapper',$data);}
		// else {
		// 	show_404();
		// }
		//end of ppublic index
	}
}//end off all