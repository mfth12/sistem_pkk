<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
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
		$site	= $this->konfigurasi_model->listing();
		$berita	= $this->berita_model->home();
		$slide	= $this->sliders_model->getAll();
		$struktur	= $this->struktur_model->getAllTampil();

		$data	= array(
			'title'		=> 'Kegiatan ' . $site['namaweb'] . ' | ' . $site['tagline'],
			'keywords' 	=> 'Kegiatan ' . $site['namaweb'] . ', ' . $site['keywords'],
			'berita'	=> $berita,
			'slide'		=> $slide,
			'struktur'	=> $struktur,
			'isi'		=> 'kegiatan/list'
		);
		$this->load->view('layout/landing_home', $data);
	}

	// Kategori 
	public function kategori($slug_kategori_berita = null)
	{
		if (!isset($slug_kategori_berita)) redirect('kegiatan');
		$site				= $this->konfigurasi_model->listing();
		$kategori			= $this->kategori_berita_model->read($slug_kategori_berita);
		$id_kategori_berita	= $kategori->id_kategori_berita;
		$berita				= $this->berita_model->kategori($id_kategori_berita);
		$slide	= $this->sliders_model->getAll();
		$struktur	= $this->struktur_model->getAllTampil();

		$data	= array(
			'title'		=> 'Kegiatan | ' . $kategori->nama_kategori_berita,
			'keywords' 	=> 'Kegiatan | ' . $kategori->nama_kategori_berita,
			'berita'	=> $berita,
			'slide'		=> $slide,
			'struktur'	=> $struktur,
			'isi'		=> 'kegiatan/list'
		);
		$this->load->view('layout/landing_home', $data);
	}

	// Read
	public function read($slug_berita = null)
	{
		if (!isset($slug_berita)) {
			show_404();
		} //jika slug nya kosong, maka 404
		$site	= $this->konfigurasi_model->listing();
		$berita	= $this->berita_model->home();
		$read	= $this->berita_model->read($slug_berita);
		$slide	= $this->sliders_model->getAll();
		$struktur	= $this->struktur_model->getAllTampil();

		$data	= array(
			'title'		=> $read->nama_berita,
			'keywords' 	=> $read->nama_berita,
			'berita'	=> $berita,
			'read'		=> $read,
			'slide'		=> $slide,
			'struktur'	=> $struktur,
			'isi'		=> 'kegiatan/read'
		);
		$this->load->view('layout/landing_home', $data);
	}
}
