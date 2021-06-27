<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_Laporan');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Pembimbing'))) {
	    	redirect(base_url("auth_pembimbing"));
	    }
    }

    public function index()
    {
    	  $data['title']  = 'Pembimbing | Laporan KP';
    	  $No_identitas = $this->session->userdata('No_identitas');
    	  $data['laporan']	= $this->Model_Laporan->getPembimbing($No_identitas);
    	  $this->load->view('pembimbing/tampil_dataLaporan', $data);
    }
}