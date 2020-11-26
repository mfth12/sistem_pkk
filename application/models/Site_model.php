<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	// Nav produk
	public function nav_produk() {
		$this->db->select('produk.*,kategori_produk.nama_kategori_produk,
						  kategori_produk.slug_kategori_produk');
		$this->db->from('produk');
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk');
		$this->db->group_by('produk.id_kategori_produk');
		$this->db->order_by('kategori_produk.nama_kategori_produk','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Nav berita
	public function nav_berita() {
		$this->db->select('berita.*,kategori_berita.nama_kategori_berita,
						  kategori_berita.slug_kategori_berita');
		$this->db->from('berita');
		$this->db->join('kategori_berita','kategori_berita.id_kategori_berita = berita.id_kategori_berita');
		$this->db->group_by('berita.id_kategori_berita');
		$this->db->order_by('kategori_berita.urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Nav profil
	public function nav_profil() {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array(	'jenis_berita'	=> 'Profil',
								'status_berita'	=> 'Publish'));
		$this->db->order_by('nama_berita');
		$query = $this->db->get();
		return $query->result();
	}
}