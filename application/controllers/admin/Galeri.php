<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->simple_login->terotentikasi();
        $this->load->model("galeri_model");
        $this->load->library('form_validation');
        if (!($this->session->userdata('akses_level') == "superadmin" || $this->session->userdata('akses_level') == "sekret_pokja"))
            show_404();
    }

    public function index()
    {
        $site     = $this->konfigurasi_model->listing();
        $result = $this->galeri_model->nomor();
        if (empty($result[0]['nomor'])) {
            $no = "1";
        } else {
            $no = $result[0]['nomor'] + 1;
        }

        $data = array(
            'title'         => 'Galeri Foto',
            'nomor'         => $no,
            'namasite'      => $site['namaweb'],
            'galeri'        => $this->galeri_model->getAll(),
            'isi'           => 'back/galeri/list'
        );
        $this->load->view('back/wrapper', $data);
    }

    public function add()
    {
        $galeri = $this->galeri_model;
        $validation = $this->form_validation;
        $validation->set_rules($galeri->rules());

        if ($validation->run()) {
            $galeri->save();
            $this->session->set_flashdata('sukses', 'Anda berhasil menginput galeri foto baru');
            redirect(site_url('admin/galeri'));
        }
        $this->session->set_flashdata('maaf', 'Anda gagal menginput data galeri foto');
        redirect(site_url('admin/galeri'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect(site_url('admin/galeri')); // redirect jika tidak ada $id 

        $site            = $this->konfigurasi_model->listing();
        $galeri          = $this->galeri_model;
        $validation      = $this->form_validation;
        $validation->set_rules($galeri->rulesUbah());

        if ($validation->run()) {
            if (!$_FILES['image']['name']) { //untuk kosong
                $galeri->update(); 
                $this->session->set_flashdata('sukses', 'Data galeri berhasil diperbarui. Foto tidak berubah.');
                redirect(site_url('admin/galeri'));
            } else { //untuk berisi
                $galeri->update_baru();
                $this->session->set_flashdata('sukses', 'Data galeri dan foto berhasil diperbarui');
                redirect(site_url('admin/galeri'));
            }

        } else {
            $data = array(
                'title'       => 'Ubah Galeri Foto',
                'namasite'    => $site['namaweb'],
                'galeri'       => $galeri->getById($id),
                'isi'         => 'back/galeri/edit'
            );
            $this->load->view("back/wrapper", $data); //menampilkan form edit
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->galeri_model->delete($id)) { //Apabila data berhasil dihapus, maka kita langsung alihkan (redirect())
            $this->session->set_flashdata('maaf', 'Data galeri telah dihapus'); // flash message
            redirect(site_url('admin/galeri'));  //menuju ke halaman admin/products/.
        }
    }
}
