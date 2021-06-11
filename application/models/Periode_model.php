<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('periode');
		$this->db->order_by('nama_periode','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// detail perperiode
	public function detail($id_periode){
		$query = $this->db->get_where('periode',array('id_periode'  => $id_periode));
		return $query->row();
	}

	// nyari periode untuk aktivasi
	public function nyari(){
		$query = $this->db->get_where('periode',array('ket'  => 'aktif'));
		return $query->row();
	}
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('periode',$data);
	}
	
	// Edit 
	public function edit ($data) {
		$this->db->where('id_periode',$data['id_periode']);
		$this->db->update('periode',$data);
	}

	// Edit 
	public function aktivasi ($data) {
		$this->db->where('id_periode',$data['id_periode']);
		$this->db->update('periode',$data);
	}
	
	// Delete
	public function delete ($data){
		$this->db->where('id_periode',$data['id_periode']);
		$this->db->delete('periode',$data);
	}
}