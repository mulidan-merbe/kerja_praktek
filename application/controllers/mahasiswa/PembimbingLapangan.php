<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembimbingLapangan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(['Model_Pembimbing_lapangan', 'Model_Kpdua','Model_Jadwal','Model_Proposal']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }
	}

	public function index()
	{
		$NIM 	= $this->session->userdata('NIM');
		$data = [
			'title' 		=> 'Mahasiswa | Pembimbing lapangan',
			'dua' 			=> $this->Model_Kpdua->getbyNIM($NIM),
			'pembimbing'	=> $this->Model_Pembimbing_lapangan->getbyNIM($NIM),
			'proposal' 		=> $this->Model_Proposal->getDataNIMLimit($NIM)
			
		];
		// var_dump($data['proposal']);
		// die;
		$this->load->view('mahasiswa/tampil_data_pembimbing_lapangan', $data);

	}

	public function tambah()
	{
		$NIM 	= $this->session->userdata('NIM');
		$data = [
			'title' 	=> 'Mahasiswa | Pembimbing lapangan',
			'jadwal' 	=> $this->Model_Jadwal->getAll(),
			'proposal' 		=> $this->Model_Proposal->getDataNIMLimit($NIM)
		];

		// var_dump($data['jadwal']);
		// die;
		$this->form_validation->set_rules('Username', 'Nama', 'trim|required');
		$this->form_validation->set_rules('No_identitas', 'No Identitas', 'trim|required');
		$this->form_validation->set_rules('Jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('Alamat_kantor', 'Alamat Kantor', 'trim|required');
		$this->form_validation->set_rules('No_hp', 'No Hp', 'trim|required');
		// $this->form_validation->set_rules('File', 'File', 'trim|required');

		if($this->form_validation->run() == false) 
		{ 
			
			$this->load->view('mahasiswa/tambah_data_pembimbing_lapangan', $data);
		
		} else 
		{   
		// Konfigurasi File
			$config['upload_path'] = 'assets/kpifempat/file/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']      = 5000;
			$this->load->library('upload', $config);
			// Cek apakah berkasi sudah sesuai dengan konfigurasi
	        if (!$this->upload->do_upload('File')) {
	             $error = array('error' => $this->upload->display_errors());
	             $this->session->set_flashdata('flash', 'belum ada file');
                 $this->load->view('mahasiswa/tambah_dataempat', $error);
	        } else {
				$result         =  $this->upload->data();
				$Id_proposal	=  $this->input->post('Id_proposal');
				$NIM   			=  $this->session->userdata("NIM");
				$File           = $result['file_name'];
				$Username		= htmlspecialchars($this->input->post('Username'));
				$No_identitas	= htmlspecialchars($this->input->post('No_identitas'));
				$Password		= password_hash($this->input->post('No_identitas'), PASSWORD_DEFAULT);
				$Jabatan		= htmlspecialchars($this->input->post('Jabatan'));
				$Alamat_kantor  = htmlspecialchars($this->input->post('Alamat_kantor'));
				$No_hp			= htmlspecialchars($this->input->post('No_hp'));
				$Tanggal		= date('Y-m-d');

				$this->Model_Pembimbing_lapangan->tambahData($Id_proposal, $NIM, $File, $Username, $No_identitas, $Password, $Jabatan, $Alamat_kantor, $No_hp, $Tanggal);
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('mahasiswa/pembimbingLapangan');
	        }
    	}
	}

	public function ubah($NIM)
	{
		$data['title']	= 'Mahasiswa | Pembimbing lapangan';
		$NIM = $NIM;
		$data['edit'] = $this->Model_Pembimbing_lapangan->getbyNIM($NIM);
		$this->load->view('mahasiswa/ubah_dataPembimbing', $data);

	}



	public function ubahData()
	{
		$data['title']	= 'Mahasiswa | Pembimbing lapangan';
		$NIM = $this->input->post('NIM');
		$data['edit'] = $this->Model_Pembimbing_lapangan->getbyNIM($NIM);
		

		$config['upload_path'] = 'assets/kpifempat/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 5000;
		$this->load->library('upload', $config);

		// Cek apakah ada berkas yang diuploud atau tidak
		if(!empty($_FILES['File']['name']))
		{
			// Cek apakah berkasi sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('File')) {
				// $error = $this->upload->display_errors();
				// // menampilkan pesan error
				// print_r($error);
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File tidak sesuai</div>' );
				$this->load->view('mahasiswa/ubah_dataPembimbing', $data);
			}else{
					
	        	$NIM 		= $this->input->post('NIM');
				$data 		= $this->Model_Pembimbing_lapangan->getDatabyNIM($NIM);
				$proses 	= 'assets/kpifempat/file/'.$data->File;
				unlink($proses);

				$result         = $this->upload->data();
					// $Id 			= $this->input->post('Id');
				$NIM   			= $this->session->userdata("NIM");
				$File           = $result['file_name'];
				$Username		= htmlspecialchars($this->input->post('Username'));
				$No_identitas	= htmlspecialchars($this->input->post('No_identitas'));
				$Password		= password_hash($this->input->post('No_identitas'), PASSWORD_DEFAULT);
				$Jabatan		= htmlspecialchars($this->input->post('Jabatan'));
				$Alamat_kantor  = htmlspecialchars($this->input->post('Alamat_kantor'));
				$No_hp			= htmlspecialchars($this->input->post('No_hp'));
				$Tanggal		= date('Y-m-d');

				$this->Model_Pembimbing_lapangan->ubahData($NIM, $File, $Username, $No_identitas, $Password, $Jabatan, $Alamat_kantor, $No_hp, $Tanggal);
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('mahasiswa/pembimbingLapangan');
				}
		// Kondisi dimana tidak ada file terbaru yg diuploud. Maka yg diuploud adalah file yg lama
		}else {
			$Id 			= $this->input->post('Id');
			$data 			 = $this->Model_Pembimbing_lapangan->getbyId($Id);
			$NIM   			= $this->session->userdata("NIM");
			$File  			= $this->input->post('old_file');
			$Username		= htmlspecialchars($this->input->post('Username'));
			$No_identitas	= htmlspecialchars($this->input->post('No_identitas'));
			$Password		= password_hash($this->input->post('No_identitas'), PASSWORD_DEFAULT);
			$Jabatan		= htmlspecialchars($this->input->post('Jabatan'));
			$Alamat_kantor  = htmlspecialchars($this->input->post('Alamat_kantor'));
			$No_hp			= htmlspecialchars($this->input->post('No_hp'));
			$Tanggal		= date('Y-m-d');

			$this->Model_Pembimbing_lapangan->ubahData( $NIM, $File, $Username, $No_identitas, $Password, $Jabatan, $Alamat_kantor, $No_hp, $Tanggal);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('mahasiswa/pembimbingLapangan');
		}
	}
}