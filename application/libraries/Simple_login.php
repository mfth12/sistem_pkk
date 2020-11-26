<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	public function terotentikasi(){ 
        if($this->CI->uri->segment(1) != 'auth' && $this->CI->uri->segment(1) != ''){
            if( ! $this->CI->session->userdata('terotentikasi')){
				$this->CI->session->set_flashdata('maaf', 'sesi anda telah berakhir. Silakan masuk kembali');
                redirect('auth');
			}
        }
	}
	
	// Login
	public function login($username, $password) {
		$query = $this->CI->db->get_where('users', array('username' => $username, 'password' => $password));
		$ben = $this->getnamauser($username);//perintah mengambil username aja kalo sama.

		if(empty($ben)) {
    		$this->CI->session->set_flashdata('maaf', 'anda belum terdaftar dalam sistem'); // Buat session flashdata
    		redirect('auth');
		}else{
			if($query->num_rows() == 1) {
				$row 	= $this->CI->db->query('SELECT * FROM users WHERE username = "'.$username.'"');
				$admin 	= $row->row();
				$id 	= $admin->id_user;
				$nama	= $admin->nama;
				$level	= $admin->akses_level;
				// $_SESSION['username'] = $username;
				$this->CI->session->set_userdata('terotentikasi',true); 
				$this->CI->session->set_userdata('username', $username); 
				$this->CI->session->set_userdata('akses_level', $level); 
				$this->CI->session->set_userdata('nama', $nama); 
				$this->CI->session->set_userdata('id_login', uniqid(rand()));
				$this->CI->session->set_userdata('id', $id);
				//pengalihan jika benar
				// redirect(base_url('auth'));
				$this->CI->simple_login->terotentikasi();
				if($this->CI->session->userdata('terotentikasi')) 
    				{
    				if($this->CI->session->userdata('akses_level') == 'superadmin') 
    				  redirect('superadmin');
    				if($this->CI->session->userdata('akses_level') == 'admin_desa') 
    				  redirect('superadmin');
    				}
				redirect('halaman_kosong');
			}else{
				$this->CI->session->set_flashdata('maaf','password anda salah. Periksa kembali');
				redirect('auth'); // Redirect ke halaman login
			}
		}
		return false;
	}

	
	// Cek login
	public function cek_login_nouse() {
		if($this->CI->session->userdata('username') == '' && $this->CI->session->userdata('akses_level')=='') {
			$this->CI->session->set_flashdata('maaf','Sesi anda habis. Silakan login kembali');
			redirect('auth');
		}	
	}
	
	// Logout
	public function logout() {
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		unset($_SESSION['admin']);
		session_destroy();
		$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url().'login');
	}
	
	private function getnamauser($username)
  	{
		$this->CI->db->where('username', $username);
        $result = $this->CI->db->get('users')->row();
        return $result;
	}
	  
	//end of all
}