<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->simple_login->terotentikasi();
        $this->load->model("masukan_model");
        $this->load->library('form_validation');
        if ($this->session->userdata('akses_level') != 'superadmin')
            show_404();
    }

    public function index()
    {
        
        $site   = $this->konfigurasi_model->listing();

        $data = array(
            'title'      => 'Pesan',
            'namasite'   => $site['namaweb'],
            'masukan'     => $this->masukan_model->getAll(),
            'isi'        => 'back/masukan/list'
        );
        $this->load->view('back/wrapper', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->masukan_model->delete($id)) {
            $this->session->set_flashdata('maaf', 'Pesan berhasil dihapus');
            redirect(site_url('admin/masukan')); 
        }
    }
}
