<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A02 extends CI_Controller {

	function __construct(){
		parent::__construct();
			$this->load->model('Model_Kpdua', 'kpdua');
			// $this->load->library('pdf');
			if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }
		
	}

	public function index()
	{
		$NIM = $this->session->userdata("NIM");
		$data = [
			'title' 		=> 'Mahasiswa | KP-TI-A02',
			'kpdua' 		=> $this->kpdua->getbyNIM($NIM)
		];
		$this->load->view('mahasiswa/tampil_datadua', $data);
		
	}

	public function file()
	{
		$NIM = $this->session->userdata('NIM');
		$data['kpdua'] = $this->kpdua->getbyNIM($NIM);
		$this->load->view('mahasiswa/file/KP_TI_A02', $data);
	}


}