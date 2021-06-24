<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('produk_model');
		$this->load->model('berita_model');
		$this->load->model('kas_model');
		$this->load->model('sliders_model');
		$this->load->model('struktur_model');
	}

	public function index()
	{
		$site		= $this->konfigurasi_model->listing();
		$struktur	= $this->struktur_model->getAllTampil();
		$data		= array(
			'title'			=> 'Kontak Kami',
			'keywords' 		=> "Kontak, PKK, Desa Uma Beringin",
			'site'			=> $site,
			'struktur'		=> $struktur,
			'subscribe' 	=> false,
			'pakai_slide'	=> false,
			'isi'			=> 'front/isi/kontak'
		);
		$this->load->view('front/landing', $data);
	}
}
