<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->authenticated(); // Panggil fungsi authenticated
    }

    //untuk melakukan login
    // public function render_login($content, $data = NULL){
    //     /*
    //     * $data['contentnya']
    //     * variabel diatas ^ nantinya akan dikirim ke file views/template/login/index.php
    //     * */
    //     $data['contentnya'] = $this->load->view($content, $data, TRUE);
    //     $this->load->view('template/login/index', $data);
    // }


    //end of Extends
}
