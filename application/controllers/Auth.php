<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->simple_login->terotentikasi();
    $site         = $this->konfigurasi_model->listing();
    if ($this->session->userdata('terotentikasi')) {
      if ($this->session->userdata('akses_level') == 'superadmin')
        redirect('superadmin');
      if ($this->session->userdata('akses_level') == 'admin_desa')
        redirect('superadmin');
    }
    $data  = array('site'  => $site);
    $this->load->view('masuk', $data);
  }

  public function login()
  {
    $site         = $this->konfigurasi_model->listing();
    $valid = $this->form_validation;
    $valid->set_rules(
      'username',
      'Username',
      'required',
      array('required'  => 'Username harus diisi')
    );
    $valid->set_rules(
      'password',
      'Password',
      'required',
      array('required'  => 'Password harus diisi')
    );
    //getting from $POST
    $username  = $this->input->post('username');
    $password  = $this->input->post('password');

    if ($valid->run()) { //validasi dikirim ke model simple_login
      $this->simple_login->login(
        $username,
        $password,
        site_url('auth'),
        base_url('auth')
      );
    }
    $data  = array('site'  => $site);
    $this->load->view('masuk', $data);
  }

  public function logout()
  {
    $this->session->sess_destroy(); // Hapus semua session
    redirect('auth'); // Redirect ke halaman login
  }

  private function _updateLastLogin($user_id) //untuk mengupdate last login
  {
    $sql = "UPDATE pegawai_user SET last_login=now() WHERE user_id={$user_id}";
    $this->db->query($sql);
  }
}
