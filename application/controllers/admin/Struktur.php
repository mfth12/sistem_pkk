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
        $site   = $this->konfigurasi_model->listing();
        $result = $this->struktur_model->nomor();
        if (empty($result[0]['nomor'])) {
            $no = "1";
        } else {
            $no = $result[0]['nomor'] + 1;
        }

        $data = array(
            'title'         => 'Pengurus',
            'nomor'         => $no,
            'namasite'      => $site['namaweb'],
            'struktur'      => $this->struktur_model->getAll(),
            'isi'           => 'back/struktur/list'
        );
        $this->load->view('back/wrapper', $data);
    }

    public function add()
    {
        $struktur = $this->struktur_model;
        $validation = $this->form_validation;
        $validation->set_rules($struktur->rules());

        if ($validation->run()) {
            $struktur->save();
            $this->session->set_flashdata('sukses', 'Anda berhasil menginput struktural baru');
            redirect(site_url('admin/struktur')); 
        }
        $this->session->set_flashdata('maaf', 'Anda gagal menginput data struktural');
        redirect(site_url('admin/struktur'));
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect(site_url('admin/struktur')); 

        $site     = $this->konfigurasi_model->listing();
        $struktur = $this->struktur_model; 
        $validation = $this->form_validation; 
        $validation->set_rules($struktur->rulesUbah());

        if ($validation->run()) {
            if (!$_FILES['image']['name']) { //untuk kosong
                $struktur->update(); 
                $this->session->set_flashdata('sukses', 'Data pengurus berhasil diperbarui. Foto tidak berubah.');
                redirect(site_url('admin/struktur')); 
            } else { //untuk berisi
                $struktur->update_baru();
                $this->session->set_flashdata('sukses', 'Data pengurus dan foto berhasil diperbarui');
                redirect(site_url('admin/struktur'));
            }

        } else {
            $data = array(
                'title'       => 'Ubah Slide',
                'namasite'    => $site['namaweb'],
                'struktur'       => $struktur->getById($id),
                'isi'         => 'back/struktur/ubah'
            );
            $this->load->view("back/wrapper", $data);
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->struktur_model->delete($id)) {
            $this->session->set_flashdata('maaf', 'Data pengurus telah dihapus');
            redirect(site_url('admin/struktur'));  
        }
    }
}
