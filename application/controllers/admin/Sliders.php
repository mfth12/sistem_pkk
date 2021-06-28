<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sliders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->simple_login->terotentikasi();
        $this->load->model("sliders_model");
        $this->load->library('form_validation');
        if (!($this->session->userdata('akses_level') == "superadmin" || $this->session->userdata('akses_level') == "sekret_pokja"))
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
        $this->session->set_flashdata('maaf', 'Anda gagal menginput gambar slide');
        redirect(site_url('admin/sliders'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect(site_url('admin/sliders')); // redirect jika tidak ada $id 

        $site       = $this->konfigurasi_model->listing();
        $slide      = $this->sliders_model;
        $validation = $this->form_validation;
        $validation->set_rules($slide->rulesUbah());

        if ($validation->run()) {
            if (!$_FILES['image']['name']) { //untuk kosong
                $slide->update(); 
                $this->session->set_flashdata('sukses', 'Data slide berhasil diperbarui. Gambar tidak berubah.');
                redirect(site_url('admin/sliders')); 
            } else { //untuk berisi
                $slide->update_baru();
                $this->session->set_flashdata('sukses', 'Data slide dan gambar berhasil diperbarui');
                redirect(site_url('admin/sliders'));
            }

        } else {
            $data = array(
                'title'       => 'Ubah Slide',
                'namasite'    => $site['namaweb'],
                'slide'       => $slide->getById($id),
                'isi'         => 'back/slider/edit'
            );
            $this->load->view("back/wrapper", $data); //menampilkan form edit
        }
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
