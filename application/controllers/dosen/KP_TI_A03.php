<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A03 extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_Kptiga', 'Kptiga');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("auth_dosen"));
	    }
    }

    public function index()
    {
        $data['title']  = 'Dosen | KP-TI-A03';
    	$NIP = $this->session->userdata('NIP');
    	$data['kptiga'] = $this->Kptiga->getbyNIP($NIP);
    	$this->load->view('dosen/tampil_dataTiga', $data);
    }

    public function pilihData()
    {
    	$Id_Kptiga	= $this->input->post('Id_Kptiga');
    	$Status		= $this->input->post('Status');

    	$this->Kptiga->pilihData($Id_Kptiga, $Status);
    	$this->session->set_flashdata('flash', 'Dipilih');
		redirect('dosen/KP_TI_A03');
    }

    public function setuju($Id_Kptiga)
	{
		$Id_Kptiga = $Id_Kptiga;
		$Status = 2;

		$this->Kptiga->terima($Id_Kptiga, $Status);
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('dosen/KP_TI_A03');
	}

	public function tolak($Id_Kptiga)
	{
		$Id_Kptiga = $Id_Kptiga;
		$Status = 3;

		$this->Kptiga->tolak($Id_Kptiga, $Status);
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('dosen/KP_TI_A03');
	}
}