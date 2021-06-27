<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BeritaAcara extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kpempat_a', 'Model_Kpempat_b', 'Model_Kpempat_c']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }
    }

    public function index()
    {
    	$NIM	= $this->session->userdata('NIM');
    	$data = [
    		'title' =>  'Mahasiswa | Berita Acara',
    		'empatC' =>  $this->Model_Kpempat_c->getbyNIM($NIM),
    		'empatA' =>  $this->Model_Kpempat_a->getbyNIM($NIM),
    		'empatB' =>  $this->Model_Kpempat_b->getbyNIM($NIM),
    		'cek'	 =>  $this->Model_Kpempat_c->getRowNIM($NIM),
    		'statusKajur' => $this->Model_Kpempat_c->cekStatusKajur($NIM)
    	];

    	if($data['cek']) {
    		if($data['statusKajur']) {
    			$this->load->view('mahasiswa/No_beritaAcara', $data);
	    	} elseif($data['statusKajur'] == 2 || 3) {
	    		$this->load->view('mahasiswa/tampil_beritaAcara', $data);
	    	}
    	} else {
    		$this->load->view('mahasiswa/No_beritaAcara', $data);
    	}
    }

}