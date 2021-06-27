<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A04 extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_Kpempat', 'Kpempat');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("auth_dosen"));
	    }
    }

    public function index()
    {
        $data['title']  = 'Dosen | KP-TI-A04';
    	$NIP = $this->session->userdata('NIP');
    	$data['kpempat'] = $this->Kpempat->getbyNIP($NIP);
    	$this->load->view('dosen/tampil_dataEmpat', $data);
    }
}