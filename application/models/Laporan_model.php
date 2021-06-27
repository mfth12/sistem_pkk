<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	// detail perperiode
	public function detail($id_laporan){
		$query = $this->db->get_where('laporan',array('periode_ke'  => $id_laporan));
		return $query->row();
	}
	
	public function detail_lama($id_laporan){
		$query = $this->db->get_where('laporan',array('periode_ke'  => $id_laporan));
		return $query->row();
	}

	// nyari laporan untuk aktivasi
	public function look($num){
		$query = $this->db->get_where('laporan',array('periode_ke'  => $num));
		return $query->result();
	}
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('laporan',$data);
	}
	
	// Edit 
	public function edit ($data) {
		$this->db->where('id_laporan',$data['id_laporan']);
		$this->db->update('laporan',$data);
	}

}