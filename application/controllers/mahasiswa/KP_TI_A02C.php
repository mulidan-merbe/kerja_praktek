<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A02C extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_Kpdua_c');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }
    }

	public function index()
	  {
	  	$data['title']	= 'Mahasiswa | KP-TI-A02C';
     	$NIM = $this->session->userdata('NIM');
     	$data['dua_C'] = $this->Model_Kpdua_c->getbyNIM($NIM);
     	$this->load->view('mahasiswa/tampil_dataDua_c', $data);
	  }

}