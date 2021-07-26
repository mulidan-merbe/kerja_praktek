<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kpdua_a', 'Model_Kptiga']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("dosen/login"));
	    }
    }
 
    public function index()
	{
		$NIP = $this->session->userdata("NIP");
		$data  = [
				'title'		=> 'Dosen | Konsultasi',
				'kpdua_a'   => $this->Model_Kpdua_a->getbyNIP($NIP),
				'duaA'		=> $this->Model_Kpdua_a->cek_status($NIP),
				'tiga'		=> $this->Model_Kptiga->cek_statusDosen($NIP)
			 ];
		$this->load->view('dosen/tampil_datadua_a', $data);
		
	}

	public function lihat()
	{
		$Id = $_GET['Id'];
		$data['lihat'] = $this->Model_Kpdua_a->lihatbyId($Id);
		$this->load->view('dosen/tampil_datadua_a', $data);
	}

	public function detail($NIM)
	{
		$data['title']	= 'Dosen | Konsultasi';
		$NIP = $this->session->userdata("NIP");
		$NIM = $NIM;
		$data['detail'] = $this->Model_Kpdua_a->getbyNIM($NIM);
		$data['kpdua_a'] = $this->Model_Kpdua_a->getbyNIP($NIP);

		$this->load->view('dosen/tampil_detaildua_a', $data);
	}


	public function setuju()
	{
		$Id_duaA = $_GET['setujui'];
		$NIM = $_GET['NIM'];
		$Status = 2;

		$this->Model_Kpdua_a->status($Id_duaA, $Status);
		$this->session->set_flashdata('flash', 'Dipilih');
		$url = 'dosen/konsultasi/detail/'.$NIM;
		redirect($url);
	}

	public function tolak()
	{
		$Id_duaA = $_GET['ditolak'];
		$NIM = $_GET['NIM'];
		$Status = 3;

		$this->Model_Kpdua_a->status($Id_duaA, $Status);
		$this->session->set_flashdata('flash', 'Dipilih');
		$url = 'dosen/konsultasi/detail/'.$NIM;
		redirect($url);
	}

}   