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

    public function add()
    {
        $slide = $this->masukan_model;
        $validation = $this->form_validation;
        $validation->set_rules($slide->rules());

        if ($validation->run()) {
            $slide->save();
            $this->session->set_flashdata('sukses', 'Terimakasih telah menghubungi kami. Kami akan memberikan respon melalui email dari form yang telah anda kirim.');
            redirect(site_url('kontak'));  //menuju ke halaman admin/products/.
        }
        $this->session->set_flashdata('maaf', 'Anda gagal mengirim form ke kami.');
        redirect(site_url('kontak'));
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->masukan_model->delete($id)) { //Apabila data berhasil dihapus, maka kita langsung alihkan (redirect())
            $this->session->set_flashdata('maaf', 'Pesan berhasil dihapus'); // flash message
            redirect(site_url('admin/masukan'));  //menuju ke halaman admin/products/.
        }
    }
}
