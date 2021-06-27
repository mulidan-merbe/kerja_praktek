<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A02A extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_Kpdua_a', 'Kpdua_a');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("auth_dosen"));
	    }
    }
 
    public function index()
	{
		$data['title']	= 'Dosen | KP-TI-A02A';
		$NIP = $this->session->userdata("NIP");
		$data['kpdua_a'] = $this->Kpdua_a->getbyNIP($NIP);
		 
		 // var_dump($data['kpdua_a']);
		 // die;
		$this->load->view('dosen/tampil_datadua_a', $data);
		
	}

	public function lihat()
	{
		$Id = $_GET['Id'];
		$data['lihat'] = $this->Kpdua_a->lihatbyId($Id);
		$this->load->view('dosen/tampil_datadua_a', $data);
	}

	public function detail($NIM)
	{
		$data['title']	= 'Dosen | KP-TI-A02A';
		$NIP = $this->session->userdata("NIP");
		$NIM = $NIM;
		$data['detail'] = $this->Kpdua_a->getbyNIM($NIM);
		$data['kpdua_a'] = $this->Kpdua_a->getbyNIP($NIP);

		$this->load->view('dosen/tampil_detaildua_a', $data);
	}

	public function masukkanData()
	{
		 
		$Id_duaA 	= $this->input->post('Id_duaA');
		$Status	   	= $this->input->post('Status');

		$this->Kpdua_a->masukkanData($Id_duaA, $Status);
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('dosen/KP_TI_A02A');
		

	}

	public function setuju()
	{
		$Id_duaA = $_GET['setujui'];
		$NIM = $_GET['NIM'];
		$Status = 2;

		$this->Kpdua_a->status($Id_duaA, $Status);
		$this->session->set_flashdata('flash', 'Dipilih');
		$url = 'dosen/KP_TI_A02A/detail/'.$NIM;
		redirect($url);
	}

	public function tolak()
	{
		$Id_duaA = $_GET['ditolak'];
		$NIM = $_GET['NIM'];
		$Status = 3;

		$this->Kpdua_a->status($Id_duaA, $Status);
		$this->session->set_flashdata('flash', 'Dipilih');
		$url = 'dosen/KP_TI_A02A/detail/'.$NIM;
		redirect($url);
	}

}   