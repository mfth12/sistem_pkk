<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('galeri_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$site		= $this->konfigurasi_model->listing();
		$data 		= array(
			'title'      	=> 'Foto Galeri',
			'keywords' 	 	=> "Kontak, PKK, Desa Uma Beringin",
			'site'			=> $site,
			'pakai_slide'	=> false,
			'subscribe' 	=> true,
			'galeri'     	=> $this->galeri_model->getAll(),
			'isi'        	=> 'front/isi/galeri'
		);
		$this->load->view('front/landing', $data);
	}
}
