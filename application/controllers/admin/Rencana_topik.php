<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana_topik extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_rencanaTopik', 'rencanatopik');
		if(is_null($this->session->userdata('Admin'))) {
	    	redirect(base_url("auth_admin"));
	    }
    }

	public function index()
	{
		$data['title']  = 'Admin | Rencana Topik';
		$data['rencanatopik'] = $this->rencanatopik->getAlladmin();
		$this->load->view('admin/tampil_rencanaTopik', $data);
	}

	public function setuju()
	{
		$Id_rencanajudul = $_GET['setujui'];
		$Status = 2;
		$Id = $this->uri->segment(4);

		$this->rencanatopik->setuju($Status, $Id_rencanajudul);
		$this->session->set_flashdata('flash', ' dipilih');
		$url = 'admin/rencana_topik/detail/'.$Id;
		redirect($url);
		// redirect('admin/topik/rencana');
	}

	public function tolak()
	{
		$Id_rencanajudul = $_GET['ditolak'];
		$Status = 3;

		$this->rencanatopik->setuju($Status, $Id_rencanajudul);
		$this->session->set_flashdata('flash', ' dipilih');
		redirect('admin/topik/rencana');
	}

	public function detail($Id_tawaranjudul)
	{
		$data['title']	= 'Admin | Rencana Topik';
		$NIP = $this->session->userdata("NIP");
		$Id_tawaranjudul = $Id_tawaranjudul;
		$data['detail'] = $this->rencanatopik->getbyrencana($Id_tawaranjudul);

		$this->load->view('admin/tampil_detailRencana', $data);
	}
}