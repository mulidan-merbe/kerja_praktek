<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Proposal', 'Model_rencanaTopik','Model_Jadwal']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }
    }

	public function index()
	{
		$NIM = $this->session->userdata('NIM');
		$data = [
			'title'		=> 'Mahasiswa | Proposal ',
			'rencana' 	=> $this->Model_rencanaTopik->cekbyStatus($NIM),
			'proposal' 	=> $this->Model_Proposal->getbyNIM($NIM),
			'jadwal'	=> $this->Model_Jadwal->getAll(),
			// 'status'	=> $this->Model_Proposal->cekStatus($NIM)
		];

		// var_dump($data['rencana']);
		// die;
		$this->load->view('mahasiswa/tampil_proposal', $data );

	}

	public function tambah()
	{
		$NIM = $this->session->userdata('NIM');
		$data = [
			'title'	=> 'Mahasiswa | Proposal ',
			'rencana' => $this->Model_rencanaTopik->cekbyStatus($NIM),
			'jadwal' => $this->Model_Jadwal->getAll()
		];

		$this->form_validation->set_rules('Judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required');

		if($this->form_validation->run() == false) 
		{ 
			$this->load->view('mahasiswa/tambah_dataProposal', $data);
		
		} else 
		{   
			$NIM_mahasiswa	=  $this->session->userdata('NIM');
			$config['upload_path'] = 'assets/proposal/file/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']      = 5000;
			$this->load->library('upload', $config);
				// Cek apakah berkas sudah sesuai dengan konfigurasi
		       if (!$this->upload->do_upload('berkas_proposal')) {
		            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berkas tidak sesuai</div>' );
					$this->load->view('mahasiswa/tambah_dataProposal', $data);
		       } else {
				$result        	 	=  $this->upload->data();
				$Id_pelaksanaan		=  $this->input->post('Id_pelaksanaan');
				$Username	    	=  $this->session->userdata('Username');
				$NIM		    	=  $this->session->userdata('NIM');
				$Berkas 			= 	$result['file_name'];
				$topik				= 	htmlspecialchars($this->input->post('Judul'));
				$NIP 				= 	htmlspecialchars($this->input->post('NIP'));
				$NamaDosen 			= 	htmlspecialchars($this->input->post('Username'));
				$Tanggal		  	= 	date('Y-m-d');

				$this->Model_Proposal->inputProposal($Id_pelaksanaan, $topik, $Username, $NIP, $NamaDosen, $Berkas, $NIM, $Tanggal);
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('mahasiswa/proposal');
			}
	      
    	}
	}


	public function ubah()
	{
		$data['title']	= 'Mahasiswa | Proposal KP';
		$NIM = $_GET['NIM'];
		$data['ubah'] = $this->Model_Proposal->getbyNIM($NIM);
		$this->load->view('mahasiswa/ubah_dataProposal', $data);
	}

	
	public function UbahData()
	{
		$data['title']	= 'Mahasiswa | Proposal KP';
		$NIM 	= $this->input->post('NIM');
		$data['ubah'] 	= $this->Model_Proposal->getbyNIM($NIM);
		

		$config['upload_path'] = 'assets/proposal/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 5000;
		$namabaru = 
		$this->load->library('upload', $config);

		// Cek apakah ada berkas yang diuploud atau tidak
		if(!empty($_FILES['File']['name']))
		{
			// Cek apakah Filei sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('File')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File tidak sesuai</div>' );
				$this->load->view('mahasiswa/ubah_dataProposal', $data);
			}else{
					
	        	$NIM = $this->input->post('NIM');
				$data 		 = $this->Model_Proposal->getDatabyNIM($NIM);
				$proses 	 = 'assets/proposal/file/'.$data->Berkas;
				unlink($proses);

				$result         = $this->upload->data();
				// $topik 			= $this->input->post('topik');
				$Berkas         = $result['file_name'];
				$Tanggal		= date('Y-m-d');

				$this->Model_Proposal->ubahData($NIM, $Berkas, $Tanggal);
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('mahasiswa/proposal');
				}
		// Kondisi dimana tidak ada file terbaru yg diuploud. Maka yg diuploud adalah file yg lama
		}else {
			$NIM 			= $this->input->post('NIM');
			// $topik 			= $this->input->post('topik');
			$Berkas  		= $this->input->post('old_file');
			$Tanggal		= date('Y-m-d');

			$this->Model_Proposal->ubahData($NIM, $Berkas, $Tanggal);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('mahasiswa/proposal');
		}
	}

	public function hapusProposal()
	{
		$Id_proposal = $_GET['Id_proposal'];
		$data = $this->Model_proposal->getDatabyId($Id_proposal );
		$proses = 'assets/proposal/file/'.$data->File;
		if(is_readable($proses) && unlink($proses)) {
			$hapus = $this->Model_proposal->hapusDataProposal($Id_proposal );
			$this->session->set_flashdata('flash', 'Dihapus');
        	redirect('mahasiswa/proposal');
		} else {
			'error';
		}
	}
}
