<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PernyataanSiapSeminar extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kptiga', 'Model_Kpdua_a']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("auth_dosen"));
	    }
    }

    public function index()
    {

    	$NIP = $this->session->userdata('NIP');
    	$data = [
    		'title'		=> 'Dosen | Pernyataan Siap Seminar',
    		'kptiga' 	=> $this->Model_Kptiga->getbyNIP($NIP),
    		'duaA'		=> $this->Model_Kpdua_a->cek_status($NIP),
			'tiga'		=> $this->Model_Kptiga->cek_statusDosen($NIP)
		];
    	$this->load->view('dosen/tampil_dataTiga', $data);
    }

    public function setuju($Id_Kptiga)
	{
		$Id_Kptiga = $Id_Kptiga;
		$Status = 2;

		$this->Model_Kptiga->terima($Id_Kptiga, $Status);
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('dosen/PernyataanSiapSeminar');
	}

	public function tolak($Id_Kptiga)
	{
		$Id_Kptiga = $Id_Kptiga;
		$Status = 3;

		$this->Model_Kptiga->tolak($Id_Kptiga, $Status);
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('dosen/PernyataanSiapSeminar');
	}
}