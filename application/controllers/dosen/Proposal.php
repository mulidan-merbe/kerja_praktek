<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller {


	function __construct() {
        parent::__construct();
		$this->load->model('Model_Proposal', 'proposal');
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("auth_dosen"));
	    }
    }
 
    public function index()
	{
		$data['title']  = 'Dosen | Proposal';
		$NIP = $this->session->userdata("NIP");
		$data['proposal'] = $this->proposal->getbyNIP($NIP);
		
		$this->load->view('dosen/tampil_dataProposal', $data);
		
	}

	public function setuju()
	{
		$Id_proposal = $_GET['setujui'];
		$Status = 2;
		$Tanggal_Status = date('Y-m-d');

		$this->proposal->terima($Id_proposal, $Status, $Tanggal_Status);
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('dosen/proposal');
	}

	public function tolak()
	{
		$Id_proposal = $_GET['ditolak'];
		$Status = 3;
		$Tanggal_Status = date('Y-m-d');

		$this->proposal->tolak($Id_proposal, $Status, $Tanggal_Status);
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('dosen/proposal');
	}

}