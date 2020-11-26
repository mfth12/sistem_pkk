<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('struktur_model');
	}

	// Index 
	public function index()
	{
		$site	= $this->konfigurasi_model->listing();
		$struktur	= $this->struktur_model->getAllTampil_page();

		$data	= array(
			'title'		=> 'Pengurus ' . $site['namaweb'] . ' ' . $site['tagline'],
			'keywords' 	=> 'Pengurus ' . $site['namaweb'] . ', ' . $site['keywords'],
			'struktur'	=> $struktur,
			'isi'		=> 'struktur/page'
		);
		$this->load->view('layout/landing_home', $data);
	}
} // end of all	