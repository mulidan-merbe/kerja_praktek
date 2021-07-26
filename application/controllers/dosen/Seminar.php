<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seminar extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kpempat', 'Model_Kpempat_a']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("dosen/login"));
	    }
    }

    public function index()
    {
        $data['title']  = 'Dosen | Jadwal Seminar';
    	$NIP = $this->session->userdata('NIP');
    	$data['kpempat'] = $this->Model_Kpempat->getbyNIP($NIP);
    	$this->load->view('dosen/tampil_dataEmpat', $data);
    }

    public function penilaian()
    {
        $data['title']  = 'Dosen | Penilaian Seminar';
    	$NIP = $this->session->userdata('NIP');
    	$data['jadwal'] = $this->Model_Kpempat->getbyNIP($NIP);
    	$data['seminar'] = $this->Model_Kpempat_a->getbyNIP($NIP);
    	$this->load->view('dosen/tampil_dataEmpat_A', $data);
    	// $this->load->view('dosen/tampil_dataEmpat_A');
    }
}