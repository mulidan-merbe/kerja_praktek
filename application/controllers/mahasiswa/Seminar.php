<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seminar extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kptiga', 'Model_Kpdua_a', 'Model_Proposal','Model_Syarat','Model_Kpempat']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }
    }

    public function index()
    {
    	$NIM = $this->session->userdata('NIM');
    	$data = [
            'title'	        => 'Mahasiswa | Seminar',
            'kptiga'        => $this->Model_Kptiga->getbyNIM($NIM),
            'proposal'      => $this->Model_Proposal->getDataNIMLimit($NIM),
            'limit'         => $this->Model_Kpdua_a->getDataNIMLimit($NIM),
            'kpdua'         => $this->Model_Kpdua_a->cekStatus($NIM),
            'cek'           => $this->Model_Kptiga->cekStatus($NIM),
            'dataDuaA'      => $this->Model_Kpdua_a->getbyNIM($NIM),
            'syarat'        => $this->Model_Syarat->get(),
            'kpempat'		=> $this->Model_Kpempat->getbyNIM($NIM)
    	 ];

        // menampilkan data pernyataan siap seminar dan jadwal seminar
        $this->load->view('mahasiswa/tampil_dataSeminar', $data);
    	
    }
}