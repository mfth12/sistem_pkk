<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quotes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->simple_login->terotentikasi();
        $this->load->model("quote_model");
        $this->load->library('form_validation');
        if ($this->session->userdata('akses_level') != 'superadmin')
            show_404();
    }

    public function index()
    {
        $site     = $this->konfigurasi_model->listing();
        $result = $this->quote_model->nomor();
        if (empty($result[0]['nomor'])) {
            $no = "1";
        } else {
            $no = $result[0]['nomor'] + 1;
        }

        $data = array(
            'title'         => 'List Quotes',
            'nomor'         => $no,
            'namasite'      => $site['namaweb'],
            'quote'        => $this->quote_model->getAll(),
            'isi'           => 'back/quotes/list'
        );
        $this->load->view('back/wrapper', $data);
    }

    public function add()
    {
        $quote = $this->quote_model;
        $validation = $this->form_validation;
        $validation->set_rules($quote->rules());

        if ($validation->run()) {
            $quote->save();
            $this->session->set_flashdata('sukses', 'Anda berhasil menginput quote baru');
            redirect(site_url('admin/quotes'));
        }
        $this->session->set_flashdata('maaf', 'Anda gagal menginput data quote');
        redirect(site_url('admin/quotes'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect(site_url('admin/quotes')); // redirect jika tidak ada $id 

        $site            = $this->konfigurasi_model->listing();
        $quote           = $this->quote_model;
        $validation      = $this->form_validation;
        $validation->set_rules($quote->rulesUbah());

        if ($validation->run()) {
            if (!$_FILES['image']['name']) { //untuk kosong
                $quote->update(); 
                $this->session->set_flashdata('sukses', 'Data quote berhasil diperbarui. Foto tidak berubah.');
                redirect(site_url('admin/quotes'));
            } else { //untuk berisi
                $quote->update_baru();
                $this->session->set_flashdata('sukses', 'Data quote dan foto berhasil diperbarui');
                redirect(site_url('admin/quotes'));
            }

        } else {
            $data = array(
                'title'       => 'Ubah Quotes',
                'namasite'    => $site['namaweb'],
                'quote'       => $quote->getById($id),
                'isi'         => 'back/quotes/edit'
            );
            $this->load->view("back/wrapper", $data); //menampilkan form edit
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->quote_model->delete($id)) {
            $this->session->set_flashdata('maaf', 'Data quote berhasil dihapus');
            redirect(site_url('admin/quotes'));
        }
    }
}
