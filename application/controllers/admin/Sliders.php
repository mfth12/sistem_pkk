<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sliders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->simple_login->terotentikasi();
        // $this->load->model('user_model');
        $this->load->model("sliders_model");
        $this->load->library('form_validation');
        if ($this->session->userdata('akses_level') != 'superadmin')
            show_404();
    }

    public function index()
    {
        $site   = $this->konfigurasi_model->listing();
        $result = $this->sliders_model->nomor();
        if (empty($result[0]['nomor'])) {
            $no = "1";
        } else {
            $no = $result[0]['nomor'] + 1;
        }

        $data = array(
            'title'      => 'Gambar Slide',
            'nomor'      => $no,
            'namasite'   => $site['namaweb'],
            'slider'     => $this->sliders_model->getAll(),
            'isi'        => 'back/slider/list'
        );
        $this->load->view('back/wrapper', $data);
    }

    public function add()
    {
        $slide = $this->sliders_model;
        $validation = $this->form_validation;
        $validation->set_rules($slide->rules());

        if ($validation->run()) {
            $slide->save();
            $this->session->set_flashdata('sukses', 'Berhasil menginput gambar slide');
            redirect(site_url('admin/sliders'));  //menuju ke halaman admin/products/.
        }
        // else{show_404();}
        $this->session->set_flashdata('maaf', 'Anda gagal menginput gambar slide');
        redirect(site_url('admin/sliders'));
        // $this->load->view("admin/product/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect(site_url('admin/sliders')); // redirect jika tidak ada $id 

        $site     = $this->konfigurasi_model->listing();
        $slide = $this->sliders_model; //object manual
        $validation = $this->form_validation; //object validation
        $validation->set_rules($slide->rulesUbah()); //meneraptkan rules

        if ($validation->run()) { //melakukan validasi
            $slide->update();   //menyimpan data
            $this->session->set_flashdata('sukses', 'Slide berhasil diperbarui');
            redirect(site_url('admin/sliders'));  //menuju ke halaman admin/products/.
        }

        $data = array(
            'title'       => 'Ubah Slide',
            'namasite'    => $site['namaweb'],
            'slide'       => $slide->getById($id),
            'isi'         => 'back/slider/edit'
        );
        if (!$data["slide"]) show_404(); //jika tidak ada data, tampilkan error

        $this->load->view("back/wrapper", $data); //menampilkan form edit
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->sliders_model->delete($id)) { //Apabila data berhasil dihapus, maka kita langsung alihkan (redirect())
            $this->session->set_flashdata('maaf', 'Slide berhasil dihapus'); // flash message
            redirect(site_url('admin/sliders'));  //menuju ke halaman admin/products/.
        }
    }
}
