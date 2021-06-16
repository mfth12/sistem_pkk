<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('struktur_model');
		
	}

	public function index()
	{
		$site		= $this->konfigurasi_model->listing();
		$struktur	= $this->struktur_model->getAll();
		$data 		= array(
			'title'      	=> 'Pengurus TP-PKK',
			'keywords' 	 	=> "Struktur, Pengurus, PKK, Desa Uma Beringin",
			'site'			=> $site,
			'pakai_slide'	=> false,
			'subscribe' 	=> true,
			'struktur'     	=> $struktur,
			'isi'        	=> 'front/isi/pengurus'
		);
		$this->load->view('front/landing', $data);
	}
}