<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
		$this->load->model(['Model_Proposal', 'Model_Jadwal']);
		if(is_null($this->session->userdata('Admin'))) {
	    	redirect(base_url("auth_admin"));
	    }
    }

	public function index()
	{
		$data['title']  = 'Admin | Proposal';
		
		$data['tahun'] = $this->Model_Jadwal->Tahun();
       

		
        // var_dump($data['tahun']);
        // die;
        if(isset($_GET['filter']) && ! empty($_GET['filter'])) {
        	$filter = $_GET['filter'];

        	if($filter == '1') {

        		$Tahun = $_GET['Tahun'];
				$ket = 'Data Proposal Tahun '.$Tahun;
				$cetak = 'proposal/cetak?filter=1&Tahun='.$Tahun;
        		$data['dataProposal'] = $this->Model_Proposal->lihatTahun($Tahun);

        	} elseif($filter == '2') {
        		$NIP = $_GET['NIP'];
        		$ket = $NIP;
        		$cetak = 'proposal/cetak?filter=2&Tahun=&NIP='.$NIP;
        		$data['dataProposal'] = $this->Model_Proposal->getbydataNIP($NIP);
        	}
        } else {
        	$ket = 'Semua Data Proposal';
        	$cetak = 'proposal/cetak';
        	$data['dataProposal'] = $this->Model_Proposal->getAllAdmin();
        }

        $data['ket'] = $ket;
        $data['cetak'] = $cetak;
        $this->load->view('admin/tampil_dataProposal', $data);
	}

	public function cetak()
	{
		$data['title']  = 'Admin | Proposal';
		
		$data['tahun'] = $this->Model_Jadwal->Tahun();

        if(isset($_GET['filter']) && ! empty($_GET['filter'])) {
        	$filter = $_GET['filter'];

        	if($filter == '1') {

        		$Tahun = $_GET['Tahun'];
				$ket = 'Data Proposal Tahun '.$Tahun;
        		$proposal = $data['dataProposal'] = $this->Model_Proposal->lihatTahun($Tahun);

        	} elseif($filter == '2') {
        		$NIP = $_GET['NIP'];
        		$ket = 'Data Proposal Dosen Pembimbing'.$NIP;
        		$proposal = $data['dataProposal'] = $this->Model_Proposal->getbydataNIP($NIP);
        	}
        } else {
            $ket = 'Data Semua Proposal ';
        	$proposal = $data['dataProposal'] = $this->Model_Proposal->getAllAdmin();
        }

 		$data['ket'] = $ket;
        $data['proposal'] = $proposal;

  //       $this->load->library('mypdf');
		// $this->mypdf->generate('Cetak/proposal', $data);
        $this->load->view('Cetak/test', $data); 
        
	}
}

