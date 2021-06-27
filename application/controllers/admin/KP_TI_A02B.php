<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A02B extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_Kpdua_b', 'kpduaB');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Admin'))) {
	    	redirect(base_url("auth_admin"));
	    }
    }

    public function index()
    {
        $data['title']  = 'Admin | KP-TI-A02B';
    	$data['kpduaB'] = $this->kpduaB->getAdmin();
    	$this->load->view('admin/tampil_datadua_B', $data);
    }
}