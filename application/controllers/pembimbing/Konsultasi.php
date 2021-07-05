<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kpdua_b', 'Model_Syarat']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Pembimbing'))) {
	    	redirect(base_url("auth_pembimbing"));
	    }
    }
 
    public function index()
	{
		$No_identitas = $this->session->userdata("No_identitas");
		$data  = [
			'title'   => 'Pembimbing | Konsultasi',
			'kpdua_b' => $this->Model_Kpdua_b->getbyNo_identitas($No_identitas),
			'duaB'	  => $this->Model_Kpdua_b->cek_status($No_identitas),
			'syarat'  => $this->Model_Syarat->get()
		];
		$this->load->view('pembimbing/tampil_datadua_b', $data);
		
	}

	public function detail($NIM)
	{
		$data['title']	= 'Pembimbing | Konsultasi';
		$NIP = $this->session->userdata("No_identitas");
		$NIM = $NIM;
		$data['detail'] = $this->Model_Kpdua_b->getbyNIM($NIM);
		// $data['Model_Kpdua_b'] = $this->Model_Kpdua_b->getbyNo_idenitas($No_idenitas);

		$this->load->view('pembimbing/tampil_detaildua_b', $data);
	}

	public function lihat()
	{
		$Id = $_GET['Id'];
		$data['lihat'] = $this->Model_Kpdua_b->lihatbyId($Id);
		$this->load->view('pembimbing/tampil_datadua_b', $data);
	}

	public function setuju()
	{
		$Id_duaB = $_GET['setujui'];
		$NIM = $_GET['NIM'];
		$Status = 2;

		$this->Model_Kpdua_b->status($Id_duaB, $Status);
		$this->session->set_flashdata('flash', 'Dipilih');
		$url = 'pembimbing/konsultasi/detail/'.$NIM;
		redirect($url);
	}

	public function tolak()
	{
		$Id_duaB = $_GET['ditolak'];
		$NIM = $_GET['NIM'];
		$Status = 3;

		$this->Model_Kpdua_b->status($Id_duaB, $Status);
		$this->session->set_flashdata('flash', 'Dipilih');
		$url = 'pembimbing/konsultasi/detail/'.$NIM;
		redirect($url);
	}

}   