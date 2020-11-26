<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('kategori_berita');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	//Read
	public function read($slug_kategori_berita) {
		$this->db->select('*');
		$this->db->from('kategori_berita');
		$this->db->where('slug_kategori_berita',$slug_kategori_berita);
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// detail perkategori_berita
	public function detail($id_kategori_berita){
		$query = $this->db->get_where('kategori_berita',array('id_kategori_berita'  => $id_kategori_berita));
		return $query->row();
	}
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('kategori_berita',$data);
	}
	
	// Edit 
	public function edit ($data) {
		$this->db->where('id_kategori_berita',$data['id_kategori_berita']);
		$this->db->update('kategori_berita',$data);
	}
	
	// Delete
	public function delete ($data){
		$this->db->where('id_kategori_berita',$data['id_kategori_berita']);
		$this->db->delete('kategori_berita',$data);
	}
}