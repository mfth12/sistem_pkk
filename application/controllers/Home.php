<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('berita_model');
		$this->load->model('kas_model');
		$this->load->model('sliders_model');
		$this->load->model('quote_model');
		$this->load->model('struktur_model');
	}

	public function index()
	{
		$site		= $this->konfigurasi_model->listing();
		$berita		= $this->berita_model->home();
		$slide		= $this->sliders_model->getAll();
		$quotes		= $this->quote_model->getAll();
		$struktur	= $this->struktur_model->getAllTampil();
		$data		= array(
			'title'			=> $site['namaweb'] . ' ' . $site['tagline'],
			'keywords' 		=> "PKK Desa Uma Beringin",
			'site'			=> $site,
			'berita_slide'	=> $berita,
			'slide'			=> $slide,
			'quotes'		=> $quotes,
			'struktur'		=> $struktur,
			'pakai_slide'	=> true,
			'subscribe'		=> true,
			'isi'			=> 'front/isi/home'
		);
		$this->load->view('front/landing', $data);
	}
}
