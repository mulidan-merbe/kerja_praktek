<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A02B extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Pembimbing_lapangan', 'Model_Kpdua_b']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }
    }

	public function index()
	  {
     	$NIM = $this->session->userdata('NIM');
	  	$data = [
	  		'title'		 =>	 'Mahasiswa | KP-TI-A02B',
	  		'pembimbing' =>	$this->Model_Pembimbing_lapangan->getDataNIMLimit($NIM),
	  		'dua_B'		 => $this->Model_Kpdua_b->getbyNIM($NIM)
	  		];

	  	$this->load->view('mahasiswa/tampil_datadua_B.php', $data);
	  }

	public function tambah()
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


	public function Ubah()
	{
		$data['title']	= 'Mahasiswa | KP-TI-A02B';
		$Id_duaB 		= $_GET['Id'];
		$data['ubah'] 	= $this->Model_Kpdua_b->getbyId($Id_duaB);
		$this->load->view('mahasiswa/ubah_datadua_B', $data);

	}

	public function ubahData()
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

	public function hapusData()
	{
		$Id_duaB  = $_GET['Id'];
		$data = $this->Model_Kpdua_b->getDatabyId($Id_duaB);
		$proses = 'assets/KonsultasiLapangan/file/'.$data->File;
		if(is_readable($proses) && unlink($proses)) {
			$hapus =$this->Model_Kpdua_b->hapusData($Id_duaB);
        	$this->session->set_flashdata('flash', 'Dihapus');
        	redirect('mahasiswa/KP_TI_A02B');
		} else {
			'error';
		}
        
	}
 

}
 