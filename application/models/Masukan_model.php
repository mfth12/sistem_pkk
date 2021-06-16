<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Masukan_model extends CI_Model //ini perintah untuk ngambil data dari database
{
    private $_table = "masukan";
    public function rules()
    {
        return [
            ['field' => 'nama_lengkap',
            'label' => 'Nama Pengguna',
            'rules' => 'required'],

            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->order_by("masukan_id", "desc");
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["masukan_id" => $id])->row();
    }


    function total_all()
    {
    	$this->db->select('masukan_id');
    	$this->db->from('masukan');
    	$query = $this->db->get();
    	return $query->result();
    }
    
    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'nama_lengkap'	=> $post["nama_lengkap"],
            'email'	        => $post["email"],
            'keperluan'	    => $post["keperluan"],
			'description'	=> $post["description"]
		);
        return $this->db->insert($this->_table, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'nama_lengkap'	=> $post["nama_lengkap"],
            'nomor'	        => $post["nomor"],
			'image'			=> $post["image_lama"],
			'description'	=> $post["description"]
		);
        return $this->db->update($this->_table, $data, array('masukan_id' => $post['id']));
    }


    public function delete($id)
    {
        return $this->db->delete($this->_table, array("masukan_id" => $id));
    }

}