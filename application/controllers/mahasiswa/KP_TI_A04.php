<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A04 extends CI_Controller {

	function __construct(){
		parent::__construct();
			$this->load->model('Model_Kpempat', 'kpempat');
			if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }
		
	}

	public function index()
	{
		$data['title']	= 'Mahasiswa | KP-TI-A04';
		$NIM = $this->session->userdata("NIM");
		$data['kpempat'] = $this->kpempat->getbyNIM($NIM);
		$this->load->view('mahasiswa/tampil_dataEmpat', $data);
		
	}
}