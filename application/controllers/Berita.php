<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('berita_model');
		$this->load->model('kategori_berita_model');
		$this->load->model('sliders_model');
		$this->load->model('struktur_model');
	}

	// Index 
	public function index()
	{
		$site		= $this->konfigurasi_model->listing();
		$berita_list= $this->berita_model->listing();
		// $berita		= $this->berita_model->home();
		$data		= array(
			'title'			=> 'Berita '.' | '.$site['namaweb'].$site['tagline'],
			'keywords' 		=> "Berita, PKK, Desa Uma Beringin",
			'berita'		=> $berita_list,
			'site'			=> $site,
			'pakai_slide'	=> false,
			'isi'			=> 'front/isi/berita'
		);
		$this->load->view('front/landing', $data);
	}

	// Kategori 
	public function kategori($slug_kategori_berita = null)
	{
		if (!isset($slug_kategori_berita)) redirect('berita');
		$site				= $this->konfigurasi_model->listing();
		$kategori			= $this->kategori_berita_model->read($slug_kategori_berita);
		$id_kategori_berita	= $kategori->id_kategori_berita;
		$berita				= $this->berita_model->kategori($id_kategori_berita);
		$slide				= $this->sliders_model->getAll();
		$struktur			= $this->struktur_model->getAllTampil();

		$data	= array(
			'title'		=> 'Kegiatan | ' . $kategori->nama_kategori_berita,
			'keywords' 	=> 'Kegiatan | ' . $kategori->nama_kategori_berita,
			'site'		=> $site,
			'berita'	=> $berita,
			'slide'		=> $slide,
			'struktur'	=> $struktur,
			'isi'		=> 'front/isi/berita_kategori'
		);
		$this->load->view('front/landing', $data);
	}

	// Read
	public function read($slug_berita = null)
	{
		if (!isset($slug_berita)) {
			show_404();
		}
		$site	= $this->konfigurasi_model->listing();
		$berita	= $this->berita_model->home();
		$read	= $this->berita_model->read($slug_berita);
		$slide	= $this->sliders_model->getAll();
		$struktur	= $this->struktur_model->getAllTampil();
		$data	= array(
			'site'		=> $site,
			'title'		=> $read->nama_berita,
			'keywords' 	=> $read->nama_berita,
			'berita'	=> $berita,
			'read'		=> $read,
			'slide'		=> $slide,
			'pakai_slide'=> false,
			'struktur'	=> $struktur,
			'isi'		=> 'front/isi/berita_detail'
		);
		$this->load->view('front/landing', $data);
	}
}
