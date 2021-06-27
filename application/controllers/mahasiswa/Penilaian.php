<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kpempat_a', 'Model_Kpempat_b','Model_Kpdua_c']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("login"));
	    }
    }

    public function index()
    {
    	$NIM	= $this->session->userdata('NIM');
    	$data = [
    		'title'	=> 'Mahasiswa | Penilaian Seminar',
    		'dua_C' => $this->Model_Kpdua_c->getbyNIM($NIM),
    		'empatA' => $this->Model_Kpempat_a->getbyNIM($NIM),
    		'empatB' => $this->Model_Kpempat_b->getbyNIM($NIM)
    	];
    	$this->load->view('mahasiswa/tampil_penilaianSeminar', $data);
    }

    public function detailPenilaianDosen()
    {
    	$data['title']	= 'Mahasiswa | Penilaian Seminar';
    	$NIM = $this->session->userdata('NIM');
    	$data['empat_A']	= $this->Model_Kpempat_a->getbyNIM($NIM);

        if($data['empat_A']){
    	   $this->load->view('mahasiswa/tampil_dataEmpat_A', $data);
        } else {
        $this->load->view('mahasiswa/no_dataEmpat_A', $data);
        }
    }

    public function detailPenilaianLapangan()
    {
    	$data['title']	= 'Mahasiswa | Penilaian Seminar';
    	$NIM = $this->session->userdata('NIM');
    	$data['empat_B']	= $this->Model_Kpempat_b->getbyNIM($NIM);
    	
        if($data['empat_B']){
           
           $this->load->view('mahasiswa/tampil_dataEmpat_B', $data);

        } else {
        
            $this->load->view('mahasiswa/no_dataEmpat_B', $data);
        
        }
    }

}
