<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders_model extends CI_Model //ini perintah untuk ngambil data dari database
{
    private $_table = "slider"; //nama tabel database
    public $slider_id;
    public $name;
    public $price;
    public $image = "default.jpg";
    public $description;

    public function rules()
    {
        return [
            ['field' => 'nama_slide',
            'label' => 'Nama slide',
            'rules' => 'required'],

            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function rulesUbah()
    {
        return [
            ['field' => 'nama_slide',
            'label' => 'Nama slide',
            'rules' => 'required'],

            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->order_by("nomor", "asc");
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["slider_id" => $id])->row();
    }

    function nomor()
	{
		$this->db->select('nomor');
		$this->db->order_by('nomor DESC');
		$query = $this->db->get('slider');
		return $query->result_array();
    }

    function total_all()
    {
    	$this->db->select('nomor');
    	$this->db->from('slider');
    	$query = $this->db->get();
    	return $query->result();
    }
    
    public function save()
    {
        $post = $this->input->post();
        $acak = uniqid('SLIDE', FALSE);
        $data = array(
            'name'	        => $post["nama_slide"],
            'nomor'	        => $post["nomor"],
			'image'			=> $this->_uploadImage($acak),
			'description'	=> $post["description"]
		);
        return $this->db->insert($this->_table, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'name'	        => $post["nama_slide"],
            'nomor'	        => $post["nomor"],
			'image'			=> $post["image_lama"],
			'description'	=> $post["description"]
		);
        return $this->db->update($this->_table, $data, array('slider_id' => $post['id']));
    }

    public function update_baru()
    {
        $post = $this->input->post();
        $acak = uniqid('SLIDE', FALSE);
        $this->_deleteImage($post['id']);
        $data = array(
            'name'	        => $post["nama_slide"],
            'nomor'	        => $post["nomor"],
			'image'			=> $this->_uploadImage($acak),
			'description'	=> $post["description"]
		);
        return $this->db->update($this->_table, $data, array('slider_id' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("slider_id" => $id));
    }

    private function _uploadImage($acak)
    {
        // $post = $this->input->post();
        $config['upload_path']          = './back_assets/upload/slider/';
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
    		return array_map('unlink', glob(FCPATH."back_assets/upload/slider/$filename.*"));
        }
    }
}