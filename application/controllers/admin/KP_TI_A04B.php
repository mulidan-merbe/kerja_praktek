<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A04B extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('Model_Kpempat_b');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Admin'))) {
	    	redirect(base_url("auth_admin"));
	    }
    }

    public function index()
    {

	  	$data['title']  = 'Admin | KP-TI-A04B';
     	$data['empat_B'] = $this->Model_Kpempat_b->getAdmin();
	    $this->load->view('admin/tampil_dataEmpat_b', $data);
	  
    }
}
