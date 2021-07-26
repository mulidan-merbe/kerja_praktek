<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana_topik extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_rencanaTopik', 'rencanatopik');
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("dosen/login"));
	    }
    }

	public function index()
	{
		$data['title']  = 'Dosen | Rencana Topik';
		$NIP = $this->session->userdata('NIP');
		$data['rencanaTopik'] = $this->rencanatopik->getbyNIP($NIP);
		$this->load->view('dosen/tampil_rencanaTopik', $data);
	}

	public function pilihRencanaJudul()
	{
	
		$Id_rencanajudul = $_GET['Id_rencanajudul'];
		// $Id_rencanajudul = array ( 'Id_rencanajudul', $Id_rencanajudul);
		$dataa['status'] = $this->rencanatopik->getbyId($Id_rencanajudul);
		$this->load->view('dosen/modal_pilih', $dataa);
	}


	public function updateRencanajudul()
	{
		$Id_rencanajudul = $this->input->post('Id_rencanajudul');
		$Status = $this->input->post('Status');

		$this->rencanatopik->updateJudul($Status, $Id_rencanajudul);
		$this->session->set_flashdata('flash', ' dipilih');
		redirect('dosen/rencana_topik');
	}

	public function setuju()
	{
		$Id_rencanajudul = $_GET['setujui'];
		$Status = 2;

		$this->rencanatopik->setuju($Status, $Id_rencanajudul);
		$this->session->set_flashdata('flash', ' dipilih');
		redirect('dosen/rencana_topik');
	}

	public function tolak()
	{
		$Id_rencanajudul = $_GET['ditolak'];
		$Status = 3;

		$this->rencanatopik->setuju($Status, $Id_rencanajudul);
		$this->session->set_flashdata('flash', ' dipilih');
		redirect('dosen/rencana_topik');
	}

	public function detail($Id_tawaranjudul)
	{
		$data['title']	= 'Dosen | Rencana Topik';
		$NIP = $this->session->userdata("NIP");
		$Id_tawaranjudul = $Id_tawaranjudul;
		$data['detail'] = $this->rencanatopik->getbyrencana($Id_tawaranjudul);

		$this->load->view('dosen/tampil_detailRencana', $data);
	}

}