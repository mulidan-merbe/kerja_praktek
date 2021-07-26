<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Proposal', 'Model_Kpdua_a','Model_Pembimbing_lapangan', 'Model_Kpdua_b']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("mahasiswa/login"));
	    }
    }

	public function index()
	  {
     	$NIM = $this->session->userdata('NIM');
     	$data = [
			'title' 		=> 'Mahasiswa | Konsultasi',
			'proposal' 		=> $this->Model_Proposal->getbyNIM($NIM),
			'dua_A'			=> $this->Model_Kpdua_a->getbyNIM($NIM),
			'pembimbing' 	=>	$this->Model_Pembimbing_lapangan->getDataNIMLimit($NIM),
	  		'dua_B'		 	=> $this->Model_Kpdua_b->getbyNIM($NIM)
		];

	  	$this->load->view('mahasiswa/tampil_dataKonsultasi', $data);
	  }

	public function tambahKonsultasiDosen()
	{
		$NIM = $this->session->userdata('NIM');
		$data = [
			'title' 		=> 'Mahasiswa | KP-TI-A02A',
			'proposal' 		=> $this->Model_Proposal->getDataNIMLimit($NIM)
		];
		
		$this->form_validation->set_rules('Tema', 'Perihal', 'trim|required');
		$this->form_validation->set_rules('Uraian', 'Uraian', 'trim|required');
		// $this->form_validation->set_rules('File', 'File', 'trim|required');

		if($this->form_validation->run() == false) 
		{
				$this->load->view('mahasiswa/tambah_datadua_A', $data);
		} else 
		{   

				$config['upload_path'] = 'assets/KonsultasiDosen/file/';
				$config['allowed_types'] = 'pdf';
				$config['max_size']      = 5000;
				$this->load->library('upload', $config);
				// Cek apakah berkas sudah sesuai dengan konfigurasi
		        if (!$this->upload->do_upload('berkas_file')) {
		             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berkas tidak sesuai</div>' );
	                 $this->load->view('mahasiswa/tambah_datadua_A', $data);

		        } else {
		        	$result        	  = $this->upload->data();
		        	$Id_proposal	  = $this->input->post('Id_proposal');
					$NIP 	  		  = $this->input->post('NIP');
					$Tema			  = htmlspecialchars($this->input->post('Tema', true));
					$Uraian			  = htmlspecialchars($this->input->post('Uraian', true));
					$Status			  = htmlspecialchars($this->input->post('Status', true));
					$NIM	  		  = $this->session->userdata('NIM');
					$File 			  =	$result['file_name'];
					$Tanggal		  = date('Y-m-d');
					// $Tanggal		  = format_indo(date('Y-m-d'));


					$this->Model_Kpdua_a->tambahData($Id_proposal, $NIM, $Tema, $Uraian, $NIP, $Status, $File, $Tanggal);
					$this->session->set_flashdata('flash', 'Ditambahkan');
					redirect('mahasiswa/konsultasi');
				}
		} 
		
	}


	public function ubahKonsultasiDosen($Id_duaA)
	{
		$data['title']	= 'Mahasiswa | KP-TI-A02A';
		$Id_duaA 		= $Id_duaA;
		$data['ubah'] 	= $this->Model_Kpdua_a->getbyId($Id_duaA);
		$this->load->view('mahasiswa/ubah_datadua_A', $data);

	}

	public function ubahDataKonsultasiDosen()
	{
		$data['title']	= 'Mahasiswa | KP-TI-A02A';
		$Id_duaA 		= $this->input->post('Id');
		$data['ubah'] 	= $this->Model_Kpdua_a->getbyId($Id_duaA);
		

		$config['upload_path'] = 'assets/KonsultasiDosen/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 5000;
		$this->load->library('upload', $config);
		// Cek apakah berkas sudah sesuai dengan konfigurasi
	
		if(!empty($_FILES['File']['name']))
		{
			// Cek apakah berkasi sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('File')) {
				// $error = $this->upload->display_errors();
				// // menampilkan pesan error
				// print_r($error);
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File tidak sesuai</div>' );
				$this->load->view('mahasiswa/ubah_datadua_A', $data);
			}else{
					
	        	$Id_duaA 		= $this->input->post('Id');
				$data 			= $this->Model_Kpdua_a->getDatabyId($Id_duaA);
				$proses 		= 'assets/KonsultasiDosen/file/'.$data->File;
				unlink($proses);

				$result         = $this->upload->data();
				$Tema			= htmlspecialchars($this->input->post('Tema'));
				$Uraian			= htmlspecialchars($this->input->post('Uraian'));
				$File           = $result['file_name'];
				$Tanggal		= date('Y-m-d');

				$this->Model_Kpdua_a->ubahData($Id_duaA, $Tema, $Uraian, $File, $Tanggal);
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('mahasiswa/konsultasi');
				}
		// Kondisi dimana tidak ada file terbaru yg diuploud. Maka yg diuploud adalah file yg lama
		}else {
			$Id_duaA 			= $this->input->post('Id');
			$Tema			= htmlspecialchars($this->input->post('Tema'));
			$Uraian			= htmlspecialchars($this->input->post('Uraian'));
			$File           = $this->input->post('old_file');
			$Tanggal		= date('Y-m-d');

			$this->Model_Kpdua_a->ubahData($Id_duaA, $Tema, $Uraian, $File, $Tanggal);
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('mahasiswa/konsultasi');
		}
	}

	public function tambahKonsiltasiLapangan()
	{
		$NIM = $this->session->userdata('NIM');
		$data = [
			'title' 		=> 'Mahasiswa | KP-TI-A02B',
			'pembimbing' 	=> $this->Model_Pembimbing_lapangan->getDataNIMLimit($NIM)
			];

		$this->form_validation->set_rules('Tema', 'Tema', 'trim|required');
		$this->form_validation->set_rules('Uraian', 'Uraian', 'trim|required');

		if($this->form_validation->run() == false) 
		{
				$this->load->view('mahasiswa/tambah_datadua_B', $data);
		} else 
		{   

				$config['upload_path'] = 'assets/KonsultasiLapangan/file/';
				$config['allowed_types'] = 'pdf';
				$config['max_size']      = 5000;
				$this->load->library('upload', $config);
				// Cek apakah berkas sudah sesuai dengan konfigurasi
		        if (!$this->upload->do_upload('berkas_file')) {
		             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berkas tidak sesuai</div>' );
	                 $this->load->view('mahasiswa/tambah_datadua_B', $data);

		        } else {
		        	$result        	  =  $this->upload->data();
		        	$Id				  =  $this->input->post('Id');
					$No_identitas 	  = htmlspecialchars($this->input->post('No_identitas', true));
					$Tema			  = htmlspecialchars($this->input->post('Tema', true));
					$Uraian			  = htmlspecialchars($this->input->post('Uraian', true));
					$Status			  = htmlspecialchars($this->input->post('Status', true));
					$NIM	  		  = $this->session->userdata('NIM');
					$File 			  =	$result['file_name'];
					$Tanggal		  = date('Y-m-d');
					// $Tanggal		  = format_indo(date('Y-m-d'));


					$this->Model_Kpdua_b->tambahData($Id, $NIM, $Tema, $Uraian, $No_identitas , $Status,  $File, $Tanggal);
					$this->session->set_flashdata('flash', 'Ditambahkan');
					redirect('mahasiswa/konsultasi');
				}
		} 
		
	}


	public function ubahKonsultasiLapangan($Id_duaB)
	{
		$data['title']	= 'Mahasiswa | KP-TI-A02B';
		$Id_duaB 		= $Id_duaB;
		$data['ubah'] 	= $this->Model_Kpdua_b->getbyId($Id_duaB);
		$this->load->view('mahasiswa/ubah_datadua_B', $data);

	}

	public function ubahDataKonsultasiLapangan()
	{
		$data['title']	= 'Mahasiswa | KP-TI-A02B';
		$Id_duaB 		= $this->input->post('Id');
		$data['ubah'] 	= $this->Model_Kpdua_b->getbyId($Id_duaB);
		

		$config['upload_path'] = 'assets/KonsultasiLapangan/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 5000;
		$this->load->library('upload', $config);
		// Cek apakah berkas sudah sesuai dengan konfigurasi
	
		if(!empty($_FILES['File']['name']))
		{
			// Cek apakah berkasi sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('File')) {
				// $error = $this->upload->display_errors();
				// // menampilkan pesan error
				// print_r($error);
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File tidak sesuai</div>' );
				$this->load->view('mahasiswa/ubah_datadua_B', $data);
			}else{
					
	        	$Id_duaB 		= $this->input->post('Id');
				$data 		 	= $this->Model_Kpdua_b->getDatabyId($Id_duaB);
				$proses 		= 'assets/KonsultasiLapangan/file/'.$data->File;
				unlink($proses);

				$result         = $this->upload->data();
				$Tema			= htmlspecialchars($this->input->post('Tema'));
				$Uraian			= htmlspecialchars($this->input->post('Uraian'));
				$File           = $result['file_name'];
				$Tanggal		= date('Y-m-d');

				$this->Model_Kpdua_b->ubahData($Id_duaB, $Tema, $Uraian, $File, $Tanggal);
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('mahasiswa/konsultasi');
				}
		// Kondisi dimana tidak ada file terbaru yg diuploud. Maka yg diuploud adalah file yg lama
		}else {
			$Id 			= $this->input->post('Id');
			$Tema			= htmlspecialchars($this->input->post('Tema'));
			$Uraian			= htmlspecialchars($this->input->post('Uraian'));
			$File           = $this->input->post('old_file');
			$Tanggal		= date('Y-m-d');

			$this->Model_Kpdua_b->ubahData($Id, $Tema, $Uraian, $File, $Tanggal);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('mahasiswa/konsultasi');
		}
	}
}