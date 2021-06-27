<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A03 extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kptiga', 'Model_Kpdua_a', 'Model_Proposal','Model_Syarat']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }
    }

    public function index()
    {
    	$NIM = $this->session->userdata('NIM');
    	$data = [
            'title'	        => 'Mahasiswa | KP-TI-A03',
            'kptiga'        => $this->Model_Kptiga->getbyNIM($NIM),
            'proposal'      => $this->Model_Proposal->getDataNIMLimit($NIM),
            'limit'         => $this->Model_Kpdua_a->getDataNIMLimit($NIM),
            'kpdua'         => $this->Model_Kpdua_a->cekStatus($NIM),
            'cek'           => $this->Model_Kptiga->cekStatus($NIM),
            'dataDuaA'       => $this->Model_Kpdua_a->getbyNIM($NIM),
            'syarat'        => $this->Model_Syarat->get()
    	 ];
        $this->load->view('mahasiswa/tampil_dataTiga', $data);
    	
    }


    public function tambahData()
	 {
	 	
	 	
		$NIM		=  $this->session->userdata('NIM');
		$NIP 		= htmlspecialchars($this->input->post('NIP'));
		$Status 	= htmlspecialchars($this->input->post('Status'));
		$Tanggal	= date('Y-m-d');

		$this->Model_Kptiga->tambahData($NIM, $NIP, $Status, $Tanggal );
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('mahasiswa/KP_TI_A03');
	        
	    
	 }

	public function hapusData()
	{
		$Id_Kptiga  = $_GET['Id_Kptiga'];
        $this->Model_Kptiga->hapusData($Id_Kptiga);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa/KP_TI_A03');
	}

}

