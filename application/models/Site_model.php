<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site_model extends CI_Model
{
	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Nav berita
	public function nav_berita()
	{
		$this->db->select('berita.*,pokja.nama_pokja, pokja.slug_pokja');
		$this->db->from('berita');
		$this->db->join('pokja', 'pokja.id_pokja = berita.id_pokja');
		$this->db->group_by('berita.id_pokja');
		$this->db->order_by('pokja.urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Nav profil
	public function nav_profil()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array(
			'jenis_berita'	=> 'Profil',
			'status_berita'	=> 'Publish'
		));
		$this->db->order_by('nama_berita');
		$query = $this->db->get();
		return $query->result();
	}
}
