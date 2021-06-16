<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function listing_berita($limit, $start){
		$this->db->where('status_berita','Publish');
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get('berita',$limit, $start);
		return $query->result();
	}

	public function listing() {
		$this->db->select('berita.*, pokja.nama_pokja, users.nama');
		$this->db->from('berita');
		// Join
		$this->db->join('pokja','pokja.id_pokja = berita.id_pokja', 'LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_sekret($you) {
		$this->db->select('berita.*, pokja.nama_pokja, users.nama');
		$this->db->from('berita');
		$this->db->where('slug_berita',$you);
		// Join
		$this->db->join('pokja','pokja.id_pokja = berita.id_pokja', 'LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	//Read
	public function read($slug_berita) {
		$this->db->select('berita.*, pokja.nama_pokja, users.nama');
		$this->db->from('berita');
		// Join
		$this->db->join('pokja','pokja.id_pokja = berita.id_pokja', 'LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where('slug_berita',$slug_berita);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	//pokja
	public function pokja($id_pokja, $limit, $start) {
		$this->db->where('status_berita','Publish');
		$this->db->where('berita.id_pokja',$id_pokja);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get('berita',$limit, $start);
		return $query->result();
	}

	//Listing
	public function ngambil_slug_all()
	{
		$this->db->select('berita.slug_berita');
		$this->db->from('berita');
		$query = $this->db->get();
		return $query->result();
	}

	//matching judul
	public function match_slug($slug)
	{
		// $query = $this->db->get_where('berita', array('slug_berita' => $slug));
		$this->db->where('slug_berita', $slug);
		$result = $this->db->get('berita');
		return $result->result();
	}

	// jumlah pokja
	function jumlah_kateg($su){
		$this->db->where('status_berita','Publish');
		$this->db->where('id_pokja',$su);
		return $this->db->get('berita')->num_rows();
	}
	
	//Home
	public function home() {
		$this->db->select('berita.*, pokja.nama_pokja, users.nama');
		$this->db->from('berita');
		// Join
		$this->db->join('pokja','pokja.id_pokja = berita.id_pokja', 'LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where('berita.status_berita','Publish');
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}
	
	// detail perberita
	public function detail($id_berita){
		$query = $this->db->get_where('berita',array('id_berita'  => $id_berita));
		return $query->row();
	}

	// Tambah
	public function tambah ($data) {
		$this->db->insert('berita',$data);
	}
	
	// Edit 
	public function edit ($data) {
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('berita',$data);
	}
	
	public function getById($id_berita)
    {
        return $this->db->get_where('berita', ["id_berita" => $id_berita])->row();
    }
	// Delete ketika update
	public function delete_update ($data){
        $this->_deleteImage($data['id_berita']);
        $this->_deleteImage_thumbs($data['id_berita']);
	}
	// Delete
	public function delete ($data){
        $this->_deleteImage($data['id_berita']);
        $this->_deleteImage_thumbs($data['id_berita']);
		return $this->db->delete('berita', array("id_berita" => $data['id_berita']));
	}
	//ngehapus file dari direktori
    private function _deleteImage($id)
    {
        $berita_hps = $this->getById($id);
        if ($berita_hps->gambar != "default.jpg") {
    	    $filename = explode(".", $berita_hps->gambar)[0];
    		return array_map('unlink', glob(FCPATH."back_assets/upload/image/$filename.*"));
        }
    }
	//ngehapus file dari direktori
    private function _deleteImage_thumbs($id)
    {
        $berita_hps = $this->getById($id);
        if ($berita_hps->gambar != "default.jpg") {
    	    $filename = explode(".", $berita_hps->gambar)[0];
    		return array_map('unlink', glob(FCPATH."back_assets/upload/image/thumbs/$filename.*"));
        }
    }
}