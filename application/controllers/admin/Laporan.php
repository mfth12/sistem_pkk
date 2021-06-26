<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('proker_model');
		$this->load->model('pokja_model');
		$this->load->model('konfigurasi_model');
		if ($this->session->userdata('akses_level') != 'superadmin')
			show_404();
	}

	public function index()
	{
		$site 	= $this->konfigurasi_model->listing();
		$data = array(
			'site'		=> $site,
			'title'		=> 'Laporan Tahunan',
			'namasite'	=> $site['namaweb'],
			'isi'		=> 'back/laporan/index'
		);
		$this->load->view('back/wrapper', $data);
	}
	
	public function view()
	{
		$pokja = $this->pokja_model->listing();
		$proker = $this->proker_model->listingUtama();
		$data = array(
			'proker'	=> $proker,
			'pokja'		=> $pokja,
		);
		$this->load->view('back/laporan/file_laporan', $data);
	}

	public function cetak()
	{
		$this->load->library('dompdf_gen');
		$pokja = $this->pokja_model->listing();
		$proker = $this->proker_model->listingUtama();
		$data = array(
			'proker'	=> $proker,
			'pokja'		=> $pokja
		);
		$this->load->view('back/laporan/file_laporan', $data);
		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan_tahunan.pdf", array('Attachment'=>0));
	}
}
