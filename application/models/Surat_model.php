<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

	function all(){
		$this->db->select('surat.*, pokja.nama_pokja');
		$this->db->from('surat');
        $this->db->order_by('id_surat DESC');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
		$this->db->join('pokja','pokja.id_pokja = surat.id_pokja', 'LEFT');
        $query = $this->db->get();
        return $query->result();
	}
	
	function all_periodik($date1,$date2){
		$this->db->select('surat.*, pokja.nama_pokja');
		$this->db->from('surat');
        $this->db->order_by('tanggal DESC');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
		$this->db->join('pokja','pokja.id_pokja = surat.id_pokja', 'LEFT');
		// $this->db->group_by('tanggal', 'ASC');
		$this->db->where('tanggal >=', $date1);
		$this->db->where('tanggal <=', $date2);
        $query = $this->db->get();
        return $query->result();
	}

	function masuk(){
		// $this->db->where('jenis', 'masuk');
		$this->db->select('surat.*, pokja.nama_pokja');
		$this->db->from('surat');
        $this->db->order_by('id_surat DESC');
    	$this->db->where('jenis', 'masuk');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
		$this->db->join('pokja','pokja.id_pokja = surat.id_pokja', 'LEFT');
        $query = $this->db->get();
        return $query->result();
	}

	function keluar(){
		// $this->db->where('jenis', 'masuk');
		$this->db->select('surat.*, pokja.nama_pokja');
		$this->db->from('surat');
        $this->db->order_by('id_surat DESC');
    	$this->db->where('jenis', 'keluar');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
		$this->db->join('pokja','pokja.id_pokja = surat.id_pokja', 'LEFT');
        $query = $this->db->get();
        return $query->result();
	}
	
    function row_masuk(){
		$this->db->from('surat');
    	$this->db->where('jenis', 'masuk');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
        $query = $this->db->get();
        return $query->num_rows();
	}
	
    function row_keluar(){
		$this->db->from('surat');
    	$this->db->where('jenis', 'keluar');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	function nomor()
	{
		$this->db->select('nomor');
    	$this->db->from('surat');
		$this->db->order_by('nomor DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	function tambah_pemasukan($data)
	{
		$query = $this->db->insert('surat', $data);
		return $query;
	}

	function tambah_suratkeluar($data)
	{
		$query = $this->db->insert('surat', $data);
		return $query;
	}

	function ubah($nomor, $data)
	{
		$this->db->where('id_surat', $nomor);
		$query = $this->db->update('surat', $data);
		return $query;
	}

	function hapus($nomor)
	{
        $this->_deleteImage($nomor);
		$this->db->where('id_surat', $nomor);
		$query = $this->db->delete('surat');
		return $query;
	}

	function hapus_gambar($id)
    {
        $uang = $this->getById($id);
        if ($uang->image != "default.jpg") {
    	    $filename = explode(".", $uang->image)[0];
    		return array_map('unlink', glob(FCPATH."back_assets/upload/surat/$filename.*"));
        }
    }

	private function _deleteImage($id)
    {
        $uang = $this->getById($id);
        if ($uang->image != "default.jpg") {
    	    $filename = explode(".", $uang->image)[0];
    		return array_map('unlink', glob(FCPATH."back_assets/upload/surat/$filename.*"));
        }
    }

    function clean()
    {
        $query = $this->db->truncate('surat');
        return $query;
    }
	
	function ambil_data($nomor)
	{
		$this->db->select('surat.*, pokja.id_pokja, pokja.nama_pokja');
		$this->db->from('surat');
		$this->db->join('pokja', 'surat.id_pokja = pokja.id_pokja', 'LEFT');
		$this->db->where('id_surat', $nomor);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getById($id)
    {
        return $this->db->get_where('surat', ["id_surat" => $id])->row();
    }
	
	///////////////////////////////
}