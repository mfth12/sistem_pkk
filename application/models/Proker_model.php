<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker_model extends CI_Model {
	
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function listing_berita($limit, $start){
		$this->db->where('status_berita','Publish');
		$this->db->order_by('id_proker','DESC');
		$query = $this->db->get('proker',$limit, $start);
		return $query->result();
	}

	public function listing() {
		$this->db->select('proker.*, pokja.nama_pokja');
		$this->db->from('proker');
		// Join
		$this->db->join('pokja','pokja.id_pokja = proker.id_pokja', 'LEFT');
		// End join
		$this->db->order_by('id_proker','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_sekret($you) {
		$this->db->select('proker.*, pokja.nama_pokja');
		$this->db->from('proker');
		$this->db->where('slug_berita',$you);
		// Join
		$this->db->join('pokja','pokja.id_pokja = proker.id_pokja', 'LEFT');
		// End join
		$this->db->order_by('id_proker','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	//Read
	public function read($slug_berita) {
		$this->db->select('proker.*, pokja.nama_pokja');
		$this->db->from('proker');
		// Join
		$this->db->join('pokja','pokja.id_pokja = proker.id_pokja', 'LEFT');
		// End join
		$this->db->where('slug_berita',$slug_berita);
		$this->db->order_by('id_proker','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	//pokja
	public function pokja($id_pokja, $limit, $start) {
		$this->db->where('status_berita','Publish');
		$this->db->where('proker.id_pokja',$id_pokja);
		$this->db->order_by('id_proker','DESC');
		$query = $this->db->get('proker',$limit, $start);
		return $query->result();
	}

	//Listing
	public function ngambil_slug_all()
	{
		$this->db->select('proker.slug_berita');
		$this->db->from('proker');
		$query = $this->db->get();
		return $query->result();
	}

	//matching judul
	public function match_slug($slug)
	{
		// $query = $this->db->get_where('proker', array('slug_berita' => $slug));
		$this->db->where('slug_berita', $slug);
		$result = $this->db->get('proker');
		return $result->result();
	}

	// jumlah pokja
	function jumlah_kateg($su){
		$this->db->where('status_berita','Publish');
		$this->db->where('id_pokja',$su);
		return $this->db->get('proker')->num_rows();
	}
	
	//Home
	public function home() {
		$this->db->select('proker.*, pokja.nama_pokja');
		$this->db->from('proker');
		// Join
		$this->db->join('pokja','pokja.id_pokja = proker.id_pokja', 'LEFT');
		// End join
		$this->db->where('proker.status_berita','Publish');
		$this->db->order_by('id_proker','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}
	
	// detail perberita
	public function detail($id_proker){
		$query = $this->db->get_where('proker',array('id_proker'  => $id_proker));
		return $query->row();
	}

	// Tambah
	public function tambah ($data) {
		$this->db->insert('proker',$data);
	}
	
	// Edit 
	public function edit ($data) {
		$this->db->where('id_proker',$data['id_proker']);
		$this->db->update('proker',$data);
	}
	
	public function getById($id_proker)
    {
        return $this->db->get_where('proker', ["id_proker" => $id_proker])->row();
    }
	// Delete ketika update
	public function delete_update ($data){
        $this->_deleteImage($data['id_proker']);
        $this->_deleteImage_thumbs($data['id_proker']);
	}
	// Delete
	public function delete ($data){
        $this->_deleteImage($data['id_proker']);
        $this->_deleteImage_thumbs($data['id_proker']);
		return $this->db->delete('proker', array("id_proker" => $data['id_proker']));
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