<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tawaran_topik extends CI_Controller {

		function __construct() {
        parent::__construct();
		$this->load->model(['Model_tawaranTopik', 'Model_rencanaTopik']);
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("mahasiswa/login"));
	    }
    }

	public function index()
	{
		$NIM = $this->session->userdata('NIM');
		$data = [
			'title' 		=> 'Mahasiswa | Tawaran Topik',
			'data_judul' 	=> $this->Model_tawaranTopik->getAll(),
			'hitung'		=> $this->Model_rencanaTopik->hitung(),
			'rencana'		=> $this->Model_rencanaTopik->getRencanaJudulMhs($NIM)
		];	

        // var_dump($data['hitung']);
        // die;
		$this->load->view('mahasiswa/tampil_tawaranTopik', $data );
	}

	public function tambah()
	{
        $Id_tawaranjudul = $_GET['tawaran'];
        $NIM = $this->session->userdata('NIM');
        $Id = $this->Model_rencanaTopik->getbyId($NIM, $Id_tawaranjudul);
        $data = [
			'title' 		=> 'Mahasiswa | Tawaran Topik',
			'data_judul' 	=> $this->Model_tawaranTopik->getAll(),
			'hitung'		=> $this->Model_rencanaTopik->hitung(),
			'rencana'		=> $this->Model_rencanaTopik->getRencanaJudulMhs($NIM)
		];

        if($Id > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Tawaran sudah dipilih sebelumnya.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>' );
            redirect('mahasiswa/tawaran_topik');
        } else {
            $Id_tawaranjudul    = $_GET['tawaran'];
            $NIM                =  $this->session->userdata("NIM");
            $Username           =  $this->session->userdata('Username');
            $Tanggal            = date('Y-m-d'); 
        
        $this->Model_rencanaTopik->inputRencanaJudul($Id_tawaranjudul, $NIM, $Username, $Tanggal);
        $this->session->set_flashdata('flash', 'Dipilih');
        redirect('mahasiswa/rencana_topik');

        }
        //     $Id_tawaranjudul    = $_GET['Id_tawaranjudul'];
        //     $NIM                =  $this->session->userdata("NIM");
        //     $Username           =  $this->session->userdata('Username');
        //     $Tanggal            = date('Y-m-d'); 
        
        // $this->rencanatopik->inputRencanaJudul($Id_tawaranjudul, $NIM, $Username, $Tanggal);
        // $this->session->set_flashdata('flash', 'Dipilih');
        // redirect('mahasiswa/rencana_topik');
        
	}

}
