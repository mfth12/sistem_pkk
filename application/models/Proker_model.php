<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proker_model extends CI_Model
{

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listingUtama()
	{
		$when = $this->session->userdata('active_periode');
		$this->db->select('proker_utama.*, pokja.nama_pokja');
		$this->db->from('proker_utama');
		// $this->db->order_by('id_proker_utama', 'DESC');
		$this->db->join('pokja','pokja.id_pokja = proker_utama.id_pokja', 'LEFT');
		$this->db->order_by('id_pokja', 'ASC');
		$this->db->where('id_periode', $when);
		$query = $this->db->get();
		return $query->result();
	}
	public function listing()
	{
		$when = $this->session->userdata('active_periode');
		$this->db->select('proker.*, proker_utama.*');
		$this->db->from('proker');
		// Join
		$this->db->join('proker_utama', 'proker_utama.id_proker_utama = proker.id_proker_utama', 'LEFT');
		$this->db->join('pokja', 'proker_utama.id_pokja = proker.id_proker_utama', 'LEFT');
		// End join
		$this->db->order_by('id_pokja', 'ASC');
		$this->db->order_by('proker_utama.id_proker_utama', 'ASC');
		$this->db->where('proker_utama.id_periode', $when);
		// $this->db->group_by('nama_proker_utama', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah
	public function tambah_utama($data)
	{
		$this->db->insert('proker_utama', $data);
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('proker', $data);
	}

	// detail 
	public function detail_utama($id_proker_utama)
	{
		$query = $this->db->get_where('proker_utama', array('id_proker_utama'  => $id_proker_utama));
		return $query->row();
	}

	public function detail($id_proker)
	{
		$query = $this->db->get_where('proker', array('id_proker'  => $id_proker));
		return $query->row();
	}
	//ngambil satu row
	public function getById($id_proker)
	{
		return $this->db->get_where('proker', ["id_proker" => $id_proker])->row();
	}

	// Edit Utama
	public function edit_utama($data)
	{
		$this->db->where('id_proker_utama', $data['id_proker_utama']);
		$this->db->update('proker_utama', $data);
	}
	// Edit 
	public function edit_detail($data)
	{
		$this->db->where('id_proker', $data['id_proker']);
		$this->db->update('proker', $data);
	}

	// Delete
	public function delete_utama($data)
	{
		return $this->db->delete('proker_utama', array("id_proker_utama" => $data['id_proker_utama']));
	}
	// Delete Detail
	public function delete_detail($data)
	{
		return $this->db->delete('proker', array("id_proker" => $data['id_proker']));
	}
}
