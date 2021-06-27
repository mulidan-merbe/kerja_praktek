<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembimbingLapangan extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Jadwal','Model_Proposal','Model_Pembimbing_lapangan','Model_Kpdua']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Admin'))) {
	    	redirect(base_url("auth_admin"));
	    }
    }

	public function index()
	  {

	  	$data['title']  = 'Admin | Pembimbing Lapangan';
     	$data['pembimbing'] = $this->Model_Pembimbing_lapangan->getAdmin();
	  	$this->load->view('admin/tampil_dataPembimbing', $data);

	  }

	public function suratPengantar()
	  {
	  	$Id = $this->Model_Jadwal->getAll();
		foreach ($Id as $data) {
			$Id = $data->Id_pelaksanaan;
		}

		$Id_pelaksanaan = $Id;
	  	$data = [
			'title'  => 'Admin | KP-TI-A02',
			'proposal'	=> $this->Model_Proposal->caribyId($Id_pelaksanaan),
			'kpdua' => $this->Model_Kpdua->getAll()
		];
	  	$this->load->view('admin/tampil_dataDua', $data);

	  }
}