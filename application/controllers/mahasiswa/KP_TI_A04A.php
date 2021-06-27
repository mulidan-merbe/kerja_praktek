<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A04A extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_Kpempat_a');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }
    }

    public function index()
    {
    	$data['title']	= 'Mahasiswa | KP-TI-A04A';
    	$NIM = $this->session->userdata('NIM');
    	$data['empat_A']	= $this->Model_Kpempat_a->getbyNIM($NIM);

        if($data['empat_A']){
    	   $this->load->view('mahasiswa/tampil_dataEmpat_A', $data);
        } else {
        $this->load->view('mahasiswa/no_dataEmpat_A', $data);
        }
    }
}