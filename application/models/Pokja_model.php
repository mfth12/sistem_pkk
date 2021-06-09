<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pokja_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('pokja');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Read
	public function read($slug_pokja) {
		$this->db->select('*');
		$this->db->from('pokja');
		$this->db->where('slug_pokja',$slug_pokja);
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// detail perpokja
	public function detail($id_pokja){
		$query = $this->db->get_where('pokja',array('id_pokja'  => $id_pokja));
		return $query->row();
	}
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('pokja',$data);
	}
	
	// Edit 
	public function edit ($data) {
		$this->db->where('id_pokja',$data['id_pokja']);
		$this->db->update('pokja',$data);
	}
	
	// Delete
	public function delete ($data){
		$this->db->where('id_pokja',$data['id_pokja']);
		$this->db->delete('pokja',$data);
	}
}