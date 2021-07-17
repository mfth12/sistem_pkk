<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_model extends CI_Model {

	function all(){
		// $this->db->where('jenis', 'masuk');
		$this->db->from('data_kas');
        $this->db->order_by('nomor DESC');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
        $query = $this->db->get();
        return $query->result();
	}
	
	function all_bulan($date1,$date2){
		// $this->db->where('jenis', 'masuk');
		$this->db->from('data_kas');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
		$this->db->where('tanggal >=', $date1);
		$this->db->where('tanggal <=', $date2);
        $this->db->order_by('tanggal DESC');
        $query = $this->db->get();
        return $query->result();
	}

	function masuk(){
		$this->db->from('data_kas');
        $this->db->order_by('nomor DESC');
    	$this->db->where('jenis', 'masuk');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
        $query = $this->db->get();
        return $query->result();
	}



	function keluaran(){
		$this->db->from('data_kas');
        $this->db->order_by('nomor DESC');
    	$this->db->where('jenis', 'keluar');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
        $query = $this->db->get();
        return $query->result();
	}
	
    function row_masuk(){
		$this->db->from('data_kas');
    	$this->db->where('jenis', 'masuk');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
        $query = $this->db->get();
        return $query->num_rows();
	}
	
    function row_keluar(){
		$this->db->from('data_kas');
    	$this->db->where('jenis', 'keluar');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
        $query = $this->db->get();
        return $query->num_rows();
    }
	
    function total_all()
    {
    	$this->db->select('jumlah');
    	$this->db->from('data_kas');
    	// $this->db->where('jenis', 'masuk');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
    	$query = $this->db->get();
    	return $query->result();
	}
	
    function total_masuk()
    {
    	$this->db->select('jumlah');
    	$this->db->from('data_kas');
    	$this->db->where('jenis', 'masuk');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
    	$query = $this->db->get();
    	return $query->result();
	}
	
    function total_keluar()
    {
    	$this->db->select('jumlah');
    	$this->db->from('data_kas');
    	$this->db->where('jenis', 'keluar');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
    	$query = $this->db->get();
    	return $query->result();
	}

	function total_masuk_bulan($date1,$date2)
    {
    	$this->db->select('jumlah');
    	$this->db->from('data_kas');
    	$this->db->where('jenis', 'masuk');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
    	$this->db->where('tanggal >=', $date1);
		$this->db->where('tanggal <=', $date2);
		$query = $this->db->get();
    	return $query->result();
	}
	
    function total_keluar_bulan($date1,$date2)
    {
    	$this->db->select('jumlah');
    	$this->db->from('data_kas');
    	$this->db->where('jenis', 'keluar');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
    	$this->db->where('tanggal >=', $date1);
		$this->db->where('tanggal <=', $date2);

		$query = $this->db->get();
    	return $query->result();
	}

	function nomor()
	{
		$this->db->select('nomor');
    	$this->db->from('data_kas');
		$this->db->order_by('nomor DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	function tambah_pemasukan($data)
	{
		$query = $this->db->insert('data_kas', $data);
		return $query;
	}

	function tambah_pengeluaran($data)
	{
		$query = $this->db->insert('data_kas', $data);
		return $query;
	}

	function ubah($nomor, $data)
	{
		$this->db->where('nomor', $nomor);
		$query = $this->db->update('data_kas', $data);
		return $query;
	}

	function hapus($nomor)
	{
        $this->_deleteImage($nomor);
		$this->db->where('nomor', $nomor);
		$query = $this->db->delete('data_kas');
		return $query;
	}

	private function _deleteImage($id)
    {
        $uang = $this->getById($id);
        if ($uang->image != "default.jpg") {
    	    $filename = explode(".", $uang->image)[0];
    		return array_map('unlink', glob(FCPATH."back_assets/upload/transaksi/$filename.*"));
        }
    }

    function clean()
    {
        $query = $this->db->truncate('data_kas');
        return $query;
    }
	
	function ambil_data($nomor)
	{
		$this->db->select('data_kas.*, pokja.id_pokja, pokja.nama_pokja');
		$this->db->from('data_kas');
		$this->db->join('pokja', 'data_kas.id_pokja = pokja.id_pokja', 'LEFT');
		$this->db->where('nomor', $nomor);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getById($id)
    {
        return $this->db->get_where('data_kas', ["nomor" => $id])->row();
    }
	
	///////////////////////////////

	function laporan_masuk(){
		$this->db->from('data_kas');
        $this->db->order_by('nomor ASC');
    	$this->db->where('jenis', 'masuk');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
        $query = $this->db->get();
        return $query->result();
	}

	function laporan_keluar(){
		$this->db->select('data_kas.*, pokja.*');
        $this->db->order_by('pokja.id_pokja ASC');
    	$this->db->where('jenis', 'keluar');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
		$this->db->join('pokja', 'data_kas.id_pokja = pokja.id_pokja', 'LEFT');
		$this->db->from('data_kas');
		$this->db->group_by('data_kas.id_pokja');
        $query = $this->db->get();
        return $query->result();
	}
	
	function laporan_keluar_in(){
		$this->db->from('data_kas');
        $this->db->order_by('id_pokja ASC');
    	$this->db->where('jenis', 'keluar');
    	$this->db->where('id_periode', $this->session->userdata('active_periode'));
        $query = $this->db->get();
        return $query->result();
	}
	
}