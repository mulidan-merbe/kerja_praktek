<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_admin', 'admin');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }

	 //    if($this->session->userdata('Mahasiswa') != TRUE) {
		// 	redirect(base_url("login"));
		// }

    }

	public function index()
	{
		$data['title']	= 'Mahasiswa | Profil';
        $this->load->view('mahasiswa/profil', $data);
	}

}
