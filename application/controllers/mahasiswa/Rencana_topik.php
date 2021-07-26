<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana_topik extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_rencanaTopik', 'rencanatopik');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("mahasiswa/login"));
	    }
    }

	public function index()
	{
        $NIM = $this->session->userdata('NIM');
        $data = [
              'title'  => 'Mahasiswa | Rencana Topik',
		      'rencanaTopik' => $this->rencanatopik->getRencanaJudulMhs($NIM),
              'cekStatus'    => $this->rencanatopik->getJudulMHS($NIM)
            ];

		$this->load->view('mahasiswa/tampil_rencanaTopik', $data);
	}

	public function tambah()
	{
        //Aambil Id_tawaranjudul melalui method get yang dikirimkan dari view
        // $Id_tawaranjudul = $_GET['Id_tawaranjudul'];
        // $NIM = $this->session->userdata('NIM');
        // $Id = $this->rencanatopik->getbyId($NIM, $Id_tawaranjudul);

        // if($Id > 0) {
           
        //      redirect('mahasiswa/tawaran_topik');
        // } else {
        //     $Id_tawaranjudul    = $_GET['Id_tawaranjudul'];
        //     $NIM                =  $this->session->userdata("NIM");
        //     $Username           =  $this->session->userdata('Username');
        //     $Tanggal            = date('Y-m-d'); 
        
        // $this->rencanatopik->inputRencanaJudul($Id_tawaranjudul, $NIM, $Username, $Tanggal);
        // $this->session->set_flashdata('flash', 'Dipilih');
        // redirect('mahasiswa/rencana_topik');

        // }
            $Id_tawaranjudul    = $_GET['Id_tawaranjudul'];
            $NIM                =  $this->session->userdata("NIM");
            $Username           =  $this->session->userdata('Username');
            $Tanggal            = date('Y-m-d'); 
        
        $this->rencanatopik->inputRencanaJudul($Id_tawaranjudul, $NIM, $Username, $Tanggal);
        $this->session->set_flashdata('flash', 'Dipilih');
        redirect('mahasiswa/rencana_topik');
        
	}


	public function hapusRencanaTopik()
    {
		$Id_rencanajudul = $_GET['Id_rencanajudul'];
        $this->rencanatopik->hapusDataRencanaTopik($Id_rencanajudul);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa/rencana_topik');
    }
}
