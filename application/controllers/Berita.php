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
		$this->load->model('pokja_model');
		$this->load->model('sliders_model');
		$this->load->model('struktur_model');
	}

	// Index 
	public function index()
	{
		$config['first_link']       = 'Awal';
		$config['last_link']        = 'Akhir';
		$config['next_link']        = 'Selanjutnya';
		$config['prev_link']        = 'Sebelumnya';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$jumlah_data = $this->db->count_all('berita'); //total row
		$this->load->library('pagination');
		$config['base_url'] = base_url().'berita/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$this->pagination->initialize($config);
		$from = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		/////\\\\\////\\\\\
		$site = $this->konfigurasi_model->listing();
		$berita_list = $this->berita_model->listing_berita($config['per_page'], $from);
		$data = array(
			'title'			=> $site['namaweb'],
			'keywords' 		=> "Berita, PKK, Desa Uma Beringin",
			'berita'		=> $berita_list,
			'site'			=> $site,
			'subscribe' 	=> true,
			'pakai_slide'	=> false,
			'isi'			=> 'front/isi/berita'
		);
		$this->load->view('front/landing', $data);
	}

	// pokja 
	public function pokja($slug_pokja = null)
	{
		if (!isset($slug_pokja)) redirect('berita');
		$config['first_link']       = 'Awal';
		$config['last_link']        = 'Akhir';
		$config['next_link']        = 'Selanjutnya';
		$config['prev_link']        = 'Sebelumnya';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$site				= $this->konfigurasi_model->listing();
		$pokja			= $this->pokja_model->read($slug_pokja);
		$jumlah_data		= $this->berita_model->jumlah_kateg($pokja->id_pokja); //total row
		$this->load->library('pagination');
		$config['base_url'] = base_url().'berita/pokja/'.$slug_pokja.'/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 3;
		$this->pagination->initialize($config);
		$from 				= ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$id_pokja			= $pokja->id_pokja;
		$berita				= $this->berita_model->pokja($id_pokja, $config['per_page'], $from);

		$data	= array(
			'title'		=> $pokja->nama_pokja,
			'keywords' 	=> 'Berita '.$pokja->nama_pokja,
			'site'		=> $site,
			'berita'	=> $berita,
			'subscribe' => true,
			'pakai_slide'=> false,
			'isi'		=> 'front/isi/berita'
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
		if (!isset($read)) show_404();
		$slide	= $this->sliders_model->getAll();
		$struktur	= $this->struktur_model->getAllTampil();
		$data	= array(
			'site'		=> $site,
			'title'		=> $read->nama_berita,
			'keywords' 	=> $read->nama_berita,
			'berita'	=> $berita,
			'read'		=> $read,
			'slide'		=> $slide,
			'subscribe' => true,
			'pakai_slide' => false,
			'struktur'	=> $struktur,
			'isi'		=> 'front/isi/berita_detail'
		);
		$this->load->view('front/landing', $data);
	}
}
