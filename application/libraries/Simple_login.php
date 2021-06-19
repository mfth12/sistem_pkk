<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct()
	{
		$this->CI = &get_instance();
	}

	public function terotentikasi()
	{
		if ($this->CI->uri->segment(1) != 'auth' && $this->CI->uri->segment(1) != '') {
			if (!$this->CI->session->userdata('terotentikasi')) {
				$this->CI->session->set_flashdata('maaf', 'sesi anda telah berakhir.');
				redirect('auth');
			}
		}
	}

	// Login
	public function login($username, $password)
	{
		$query = $this->CI->db->get_where('users', array('username' => $username, 'password' => $password));
		$query2 = $this->CI->db->get_where('users', array('email' => $username, 'password' => $password));
		$ben = $this->getnamauser($username); //perintah mengambil username aja kalo sama.
		$mail = $this->getnamaemail($username); //perintah mengambil username aja kalo sama.

		if (empty($ben || $mail)) {
			$this->CI->session->set_flashdata('maaf', 'anda belum terdaftar dalam sistem'); // Buat session flashdata
			redirect('auth');
		} else {
			if (($query->num_rows() == 1) || ($query2->num_rows() == 1)) {
				if (isset($ben)) {
					$row 	= $this->CI->db->query('SELECT * FROM users WHERE username = "' . $username . '"');
				}
				if (isset($mail)) {
					$row 	= $this->CI->db->query('SELECT * FROM users WHERE email = "' . $username . '"');
				}
				$k 	= $this->CI->db->query('SELECT * FROM konfigurasi WHERE id_konfigurasi = "1"');
				$admin 	= $row->row();
				$konf 	= $k->row();
				$id 	= $admin->id_user;
				$nama	= $admin->nama;
				$periode= $konf->periode;
				$level	= $admin->akses_level;
				// masuk ke pembuatan session_userdata
				$this->CI->session->set_userdata('terotentikasi', true);
				$this->CI->session->set_userdata('username', $username);
				$this->CI->session->set_userdata('akses_level', $level);
				$this->CI->session->set_userdata('nama', $nama);
				$this->CI->session->set_userdata('active_periode', $periode);
				$this->CI->session->set_userdata('id_login', uniqid(rand()));
				$this->CI->session->set_userdata('id', $id);
				//pengalihan jika benar
				// redirect(base_url('auth'));
				$this->CI->simple_login->terotentikasi();
				if ($this->CI->session->userdata('terotentikasi')) {
					if ($this->CI->session->userdata('akses_level') == 'superadmin') {
						$this->CI->session->set_flashdata('sukses', 'Selamat datang ');
						redirect('admin');
					}
					if ($this->CI->session->userdata('akses_level') == 'sekret_pokja') {
						$this->CI->session->set_flashdata('sukses', 'Selamat datang ');
						redirect('admin');
					}
					if ($this->CI->session->userdata('akses_level') == 'kades') {
						$this->CI->session->set_flashdata('sukses', 'Selamat datang ');
						redirect('admin');
					}
				}
				redirect('halaman_kosong');
			} else {
				$this->CI->session->set_flashdata('maaf', 'password anda salah. Periksa kembali');
				redirect('auth'); // Redirect ke halaman login
			}
		}
		return false;
	}

	private function getnamauser($username)
	{
		$this->CI->db->where('username', $username);
		$result = $this->CI->db->get('users')->row();
		return $result;
	}

	private function getnamaemail($username)
	{
		$this->CI->db->where('email', $username);
		$result = $this->CI->db->get('users')->row();
		return $result;
	}

	//end of all
}
