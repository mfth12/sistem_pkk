<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('produk_model');
		$this->load->model('berita_model');
		$this->load->model('video_model');
		$this->load->model('kas_model');
		$this->load->model('sliders_model');
		$this->load->model('struktur_model');
	}

	// Index 
	public function index()
	{
		$site	= $this->konfigurasi_model->listing();
		$produk	= $this->produk_model->home();
		$berita	= $this->berita_model->home();
		$video	= $this->video_model->home();
		$slide	= $this->sliders_model->getAll();
		$struktur	= $this->struktur_model->getAllTampil();

		$data	= array(
			'title'		=> $site['namaweb'] . ' ' . $site['tagline'],
			'keywords' 	=> $site['namaweb'] . ', ' . $site['keywords'],
			'site'		=> $site,
			'produk'	=> $produk,
			'berita'	=> $berita,
			'video'		=> $video,
			'slide'		=> $slide,
			'struktur'	=> $struktur,
			'isi'		=> 'home/main_list'
		);
		// $this->load->view('layout/wrapper',$data); 
		$this->load->view('layout/landing_home', $data);
	}
}
