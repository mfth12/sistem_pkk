<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik_class {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	public function add() {
		// Web Statistik
		$datastatistik = array(	'ip_address'	=> $this->CI->input->ip_address(),
								'halaman'		=> current_url(),
								'browser'		=> $this->CI->input->user_agent());
		$this->statistik_model->tambah($datastatistik);
		// End web statistik
	}
}