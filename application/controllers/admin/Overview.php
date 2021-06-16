<?php
defined('BASEPATH') or exit('No direct script access allowed');

class overview extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('user_model');
		$this->load->model('berita_model');
		$this->load->model('pokja_model');
		$this->load->model('kas_model');
		$this->load->model('sliders_model');
		$this->load->model('masukan_model');
		$this->load->model('galeri_model');
		$this->load->model('struktur_model');
	}

	public function index()
	{
		$site 				= $this->konfigurasi_model->listing();
		$user				= $this->user_model->listing();
		$berita				= $this->berita_model->listing();
		$pokja				= $this->pokja_model->listing();
		$total 				= $this->kas_model->total_all();
		$slider 			= $this->sliders_model->total_all();
		$masukan 			= $this->masukan_model->total_all();
		$galeri 			= $this->galeri_model->total_all();
		$struktur 			= $this->struktur_model->total_all();
		$data = array(
			'title'				=> 'Dasbor ',
			'namasite'			=> $site['namaweb'],
			'site'				=> $site,
			'user'				=> $user,
			'berita'			=> $berita,
			'pokja'				=> $pokja,
			'total_trans'		=> $total,
			'slider'			=> $slider,
			'masukan'			=> $masukan,
			'galeri'			=> $galeri,
			'struktur'			=> $struktur,
			'isi'				=> 'back/1dasbor/index'
		);

		$this->load->view('back/wrapper', $data);
	}
}