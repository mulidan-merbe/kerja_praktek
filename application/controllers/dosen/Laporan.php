<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_Laporan');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("auth_dosen"));
	    }
    }

    public function index()
    {
    	$data['title']  = 'Dosen | Laporan';
    	$NIP = $this->session->userdata('NIP');
    	$data['laporan']	= $this->Model_Laporan->getbydataNIP($NIP);
    	$this->load->view('dosen/tampil_dataLaporan', $data);
    }
}