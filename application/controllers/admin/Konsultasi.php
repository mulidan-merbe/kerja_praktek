<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kpdua_a', 'Model_Kpdua_b']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Admin'))) {
	    	redirect(base_url("auth_admin"));
	    }
    }

    public function index()
    {
        $data['title']  = 'Admin | Konsultasi Dosen';
    	$data['kpduaA'] = $this->Model_Kpdua_a->getAdmin();
    	$this->load->view('admin/tampil_datadua_A', $data);
    }

     public function Lapangan()
    {
        $data['title']  = 'Admin | Konsultasi Pembimbing Lapangan';
    	$data['kpduaB'] = $this->Model_Kpdua_b->getAdmin();
    	$this->load->view('admin/tampil_datadua_B', $data);
    }
}