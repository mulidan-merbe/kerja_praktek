<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A02B extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_Kpdua_b', 'Kpdua_b');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Pembimbing'))) {
	    	redirect(base_url("auth_pembimbing"));
	    }
    }
 
    public function index()
	{
		$data['title']	= 'Pembimbing | KP-TI-A02B';
		$No_identitas = $this->session->userdata("No_identitas");
		$data['kpdua_b'] = $this->Kpdua_b->getbyNo_identitas($No_identitas);
		// $data['kpdua_b'] = $this->Kpdua_b->getAll();
		$this->load->view('pembimbing/tampil_datadua_b', $data);
		
	}

	public function lihat()
	{
		$Id = $_GET['Id'];
		$data['lihat'] = $this->Kpdua_b->lihatbyId($Id);
		$this->load->view('pembimbing/tampil_datadua_b', $data);
	}

	public function masukkanData()
	{
		 
			$Id_duaB 	= $this->input->post('Id_duaB');
			$Status	   	= $this->input->post('Status');

			$this->Kpdua_b->masukkanData($Id_duaB, $Status);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('pembimbing/KP_TI_A02B');
		

	}

}   