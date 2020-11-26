<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_produk_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('kategori_produk');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// read perkategori_produk
	public function read($slug_kategori_produk){
		$query = $this->db->get_where('kategori_produk',array('slug_kategori_produk'  => $slug_kategori_produk));
		return $query->row();
	}
	
	// detail perkategori_produk
	public function detail($id_kategori_produk){
		$query = $this->db->get_where('kategori_produk',array('id_kategori_produk'  => $id_kategori_produk));
		return $query->row();
	}
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('kategori_produk',$data);
	}
	
	// Edit 
	public function edit ($data) {
		$this->db->where('id_kategori_produk',$data['id_kategori_produk']);
		$this->db->update('kategori_produk',$data);
	}
	
	// Delete
	public function delete ($data){
		$this->db->where('id_kategori_produk',$data['id_kategori_produk']);
		$this->db->delete('kategori_produk',$data);
	}
}