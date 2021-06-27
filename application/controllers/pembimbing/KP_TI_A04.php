<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A04 extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_Kpempat', 'Kpempat');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Pembimbing'))) {
            redirect(base_url("auth_pembimbing"));
        }
    }

    public function index()
    {
        $data['title']  = 'Pembimbing | KP-TI-A04';
    	$No_identitas	= $this->session->userdata('No_identitas');
    	$data['kpempat'] = $this->Kpempat->getPembimbing($No_identitas);
    	$this->load->view('pembimbing/tampil_dataEmpat', $data);
    }
}