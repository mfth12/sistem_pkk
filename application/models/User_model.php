<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $_table = "users";
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	
	//Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_user','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// detail peruser
	public function detail($id_user){
		$query = $this->db->get_where('users',array('id_user'  => $id_user));
		return $query->row();
	}

	public function get($id_user){
        $this->db->where('id_user', $id_user);
        $result = $this->db->get('users')->row();
        return $result;
    }
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('users',$data);
	}
	
	// Edit 
	public function edit ($data,$id_user) {
		$this->db->where('id_user',$id_user);
		$this->db->update('users',$data);
	}
	
	// Delete
	public function delete ($data){
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('users',$data);
	}

	//update datails
	public function updateprofil($id)
    {
		$_table = "users";
		$i = $this->input;

	if (isset($id))
	{
		$data = array(	
			'id_user'	=> $i->post('id_user'),
			'nama'		=> $i->post('nama'),
			'email'		=> $i->post('email'),
		);
		$this->session->set_flashdata('sukses', 'Anda berhasil mengupdate profil');
		$this->session->set_userdata('nama', $i->post('nama'));
	}
        return $this->db->update($this->_table, $data, array('id_user' => $id));
	}

	//update password
	public function updatepassword($id)
    {
		$_table = "users";
		$post = $this->input->post();
        if($post["password_lama"] == $post["data_password_lama"]) 
        {
            //cs..,fd
            if ($post["password_verif"] == $post["password_baru"]) 
            { 
                $data = array(
                    'password' => $post["password_baru"]
                );
            }
            else 
            { // dan jika tidak berisi inputan
                $this->session->set_flashdata('maaf', 'Konfirmasi password baru anda tidak sama. Silakan periksa kembali password baru dan konfirmasi anda.');
                redirect(site_url('profile'));  //menuju ke halaman admin/products/.
            }
        } //if untuk ngecek password lama
        else {
            $this->session->set_flashdata('maaf', 'Anda salah menginput password lama.');
            redirect(site_url('profile'));  //menuju ke halaman admin/products/.
        }
        return $this->db->update($this->_table, $data, array('id_user' => $id));
	}
}