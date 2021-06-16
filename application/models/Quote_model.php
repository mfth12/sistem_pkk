<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Quote_model extends CI_Model //ini perintah untuk ngambil data dari database
{
    private $_table = "quote"; //nama tabel database
    public $quote_id;
    public $name;
    public $jabatan;
    public $price;
    public $image = "default.jpg";
    public $description;

    public function rules()
    {
        return [
            ['field' => 'nama_quote',
            'label' => 'Nama Quote',
            'rules' => 'required'],

            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function rulesUbah()
    {
        return [
            ['field' => 'nama_quote',
            'label' => 'Nama Quote',
            'rules' => 'required'],

            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->order_by("nomor", "desc");
        return $this->db->get($this->_table)->result();
    }

        public function getById($id)
    {
        return $this->db->get_where($this->_table, ["quote_id" => $id])->row();
    }

    function nomor()
	{
		$this->db->select('nomor');
		$this->db->order_by('nomor DESC');
		$query = $this->db->get('quote');
		return $query->result_array();
    }

    function total_all()
    {
    	$this->db->select('nomor');
    	$this->db->from('quote');
    	$query = $this->db->get();
    	return $query->result();
    }
    
    public function save()
    {
        $post = $this->input->post();
        $acak = uniqid('QUOTE', FALSE);
        $data = array(
            'name'	        => $post["nama_quote"],
            'nomor'	        => $post["nomor"],
            'jabatan'	        => $post["jabatan"],
			'image'			=> $this->_uploadImage($acak),
			'description'	=> $post["description"]
		);
        return $this->db->insert($this->_table, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'name'	        => $post["nama_quote"],
            'nomor'	        => $post["nomor"],
            'jabatan'	        => $post["jabatan"],
			'image'			=> $post["image_lama"],
			'description'	=> $post["description"]
		);
        return $this->db->update($this->_table, $data, array('quote_id' => $post['id']));
    }

    public function update_baru()
    {
        $post = $this->input->post();
        $acak = uniqid('QUOTE', FALSE);
        $this->_deleteImage($post['id']);
        $data = array(
            'name'	        => $post["nama_quote"],
            'nomor'	        => $post["nomor"],
            'jabatan'	        => $post["jabatan"],
			'image'			=> $this->_uploadImage($acak),
			'description'	=> $post["description"]
		);
        return $this->db->update($this->_table, $data, array('quote_id' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("quote_id" => $id));
    }

    private function _uploadImage($acak)
    {
        // $post = $this->input->post();
        $config['upload_path']          = './back_assets/upload/quote/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $acak;
        $config['overwrite']			= true;
        $config['max_size']             = 6048; // 2MB saja maksimal

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $slide = $this->getById($id);
        if ($slide->image != "default.jpg") {
    	    $filename = explode(".", $slide->image)[0];
    		return array_map('unlink', glob(FCPATH."back_assets/upload/quote/$filename.*"));
        }
    }
}