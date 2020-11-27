<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Struktur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->simple_login->terotentikasi();
        $this->load->model('user_model');
        $this->load->model("struktur_model");
        $this->load->library('form_validation');
        if ($this->session->userdata('akses_level') != 'superadmin')
            show_404();
    }

    public function index()
    {
        $site     = $this->konfigurasi_model->listing();
        $result = $this->struktur_model->nomor();
        if (empty($result[0]['nomor'])) {
            $no = "1";
        } else {
            $no = $result[0]['nomor'] + 1;
        }

        $data = array(
            'title'         => 'Struktur PKK',
            'nomor'         => $no,
            'namasite'      => $site['namaweb'],
            'struktur'      => $this->struktur_model->getAll(),
            'isi'           => 'superadmin/struktur/list'
        );
        $this->load->view('superadmin/_partials/wrapper', $data);
    }

    public function add()
    {
        $struktur = $this->struktur_model;
        $validation = $this->form_validation;
        $validation->set_rules($struktur->rules());

        if ($validation->run()) {
            $struktur->save();
            $this->session->set_flashdata('sukses', 'Anda berhasil menginput struktural baru');
            redirect(site_url('superadmin/struktur'));  //menuju ke halaman admin/products/.
        }
        // else{show_404();}
        $this->session->set_flashdata('maaf', 'Anda gagal menginput data struktural');
        redirect(site_url('superadmin/struktur'));
        // $this->load->view("admin/product/new_form");
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect(site_url('superadmin/struktur')); // redirect jika tidak ada $id 

        $site     = $this->konfigurasi_model->listing();
        $struktur = $this->struktur_model; //object manual
        $validation = $this->form_validation; //object validation
        $validation->set_rules($struktur->rulesUbah()); //meneraptkan rules

        if ($validation->run()) { //melakukan validasi
            $struktur->update();   //menyimpan data
            $this->session->set_flashdata('sukses', 'Data pengurus berhasil diperbarui');
            redirect(site_url('superadmin/struktur'));  //menuju ke halaman admin/products/.
        }

        $data = array(
            'title'        => 'Ubah Slide',
            'namasite'    => $site['namaweb'],
            'struktur'     => $struktur->getById($id),
            'isi'        => 'superadmin/struktur/ubah'
        );
        if (!$data["struktur"]) show_404(); //jika tidak ada data, tampilkan error

        $this->load->view("superadmin/_partials/wrapper", $data); //menampilkan form edit
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->struktur_model->delete($id)) { //Apabila data berhasil dihapus, maka kita langsung alihkan (redirect())
            $this->session->set_flashdata('maaf', 'Data struktur telah dihapus'); // flash message
            redirect(site_url('superadmin/struktur'));  //menuju ke halaman admin/products/.
        }
    }
}
