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
        $this->load->model("masukan_model");
        $this->load->library('form_validation');
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
	
    public function add()
    {
        $slide = $this->masukan_model;
        $validation = $this->form_validation;
        $validation->set_rules($slide->rules());

        if ($validation->run()) {
            $slide->save();
            $this->session->set_flashdata('sukses', 'Terimakasih telah menghubungi kami. Kami akan memberikan respon melalui email dari form yang telah anda kirim.');
            redirect(site_url('kontak'));
        }
        $this->session->set_flashdata('maaf', 'Anda gagal mengirim form ke kami.');
        redirect(site_url('kontak'));
    }
}
