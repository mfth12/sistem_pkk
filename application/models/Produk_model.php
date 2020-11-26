<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing() {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, users.nama');
		$this->db->from('produk');
		// Join
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk', 'LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		// End join
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	//Home
	public function home() {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, users.nama');
		$this->db->from('produk');
		// Join
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk', 'LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		// End join
		$this->db->where('produk.status_produk','Publish');
		$this->db->order_by('id_produk','DESC');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query->result();
	}
	
	//Kategori
	public function kategori($id_kategori_produk) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, users.nama');
		$this->db->from('produk');
		// Join
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk', 'LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		// End join
		$this->db->where('produk.status_produk','Publish');
		$this->db->where('produk.id_kategori_produk',$id_kategori_produk);
		$this->db->order_by('id_produk','DESC');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query->result();
	}
	
	//Read
	public function read($slug_produk) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, users.nama');
		$this->db->from('produk');
		// Join
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk', 'LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		// End join
		$this->db->where('produk.slug_produk',$slug_produk);
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// detail perproduk
	public function detail($id_produk){
		$query = $this->db->get_where('produk',array('id_produk'  => $id_produk));
		return $query->row();
	}
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('produk',$data);
	}
	
	// Edit 
	public function edit ($data) {
		$this->db->where('id_produk',$data['id_produk']);
		$this->db->update('produk',$data);
	}
	
	// Delete
	public function delete ($data){
		$this->db->where('id_produk',$data['id_produk']);
		$this->db->delete('produk',$data);
	}
}