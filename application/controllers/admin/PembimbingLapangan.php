<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembimbingLapangan extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Jadwal','Model_Proposal','Model_Pembimbing_lapangan']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Admin'))) {
	    	redirect(base_url("auth_admin"));
	    }
    }

	public function index()
	  {

	  	$data['title']  = 'Admin | Pembimbing Lapangan';
     	$data['pembimbing'] = $this->Model_Pembimbing_lapangan->getAdmin();
	  	$this->load->view('admin/tampil_dataPembimbing', $data);

	  }

	
}