<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proposal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model_Draft', 'Model_Proposal', 'Model_rencanaTopik', 'Model_Jadwal']);
		$this->load->library('form_validation');
		if (is_null($this->session->userdata('Login'))) {
			redirect(base_url("mahasiswa/login"));
		}
	}

	public function index()
	{
		$NIM = $this->session->userdata('NIM');
		$data = [
			'title'		=> 'Mahasiswa | Proposal ',
			'draft'		=> $this->Model_Draft->getMahasiswa($NIM),
			'rencana' 	=> $this->Model_rencanaTopik->cekbyStatus($NIM),
			'proposal' 	=> $this->Model_Proposal->getbyNIM($NIM),
			'jadwal'	=> $this->Model_Jadwal->getAll(),
			// 'status'	=> $this->Model_Proposal->cekStatus($NIM)
		];

		// var_dump($data['rencana']);
		// die;
		$this->load->view('mahasiswa/tampil_proposal', $data);
	}

	public function tambah()
	{
		$NIM = $this->session->userdata('NIM');
		$data = [
			'title'	=> 'Mahasiswa | Proposal ',
			'draft'		=> $this->Model_Draft->getMahasiswa($NIM),
			'rencana' => $this->Model_rencanaTopik->cekbyStatus($NIM),
			'jadwal' => $this->Model_Jadwal->getAll()
		];

		$this->form_validation->set_rules('Judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required');
		if (empty($_FILES['berkas_proposal']['name'])) {
			$this->form_validation->set_rules('berkas_proposal', 'Berkas', 'required');
		}
		if ($this->form_validation->run() == false) {
			$this->load->view('mahasiswa/tambah_dataProposal', $data);
		} else {
			$config['upload_path'] = 'assets/proposal/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']      = 5000;
			$new_name = $NIM . "-" . $_FILES["berkas_proposal"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			// Cek apakah berkas sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('berkas_proposal')) {
				$this->session->set_flashdata('message', '<small class="text-danger pl-3">Berkas tidak sesuai</small>');
				$this->load->view('mahasiswa/tambah_dataProposal', $data);
			} else {
				$config        	 	=  $this->upload->data();
				$Id_pelaksanaan		=  $this->input->post('Id_pelaksanaan');
				$Username	    	=  $this->session->userdata('Username');
				$NIM		    	=  $this->session->userdata('NIM');
				$Berkas 			= 	$config['file_name'];
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


	public function ubah($Id_proposal)
	{
		$data['title']	= 'Mahasiswa | Proposal ';
		$data['ubah'] = $this->Model_Proposal->getbyId($Id_proposal);
		$this->load->view('mahasiswa/ubah_dataProposal', $data);
	}


	public function ubahData()
	{
		$NIM = $this->session->userdata('NIM');
		$data['title']	= 'Mahasiswa | Proposal ';
		$Id_proposal 	= $this->input->post('Id_proposal');
		$data['ubah'] 	= $this->Model_Proposal->getbyId($Id_proposal);


		$config['upload_path'] = 'assets/proposal/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 5000;
		$new_name = $NIM . "-" . $_FILES["File"]['name'];
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);

		// Cek apakah ada berkas yang diuploud atau tidak
		if (!empty($_FILES['File']['name'])) {
			// Cek apakah Filei sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('File')) {
				$this->session->set_flashdata('message', '<small class="text-danger pl-3">Berkas tidak sesuai</small>');
				$this->load->view('mahasiswa/ubah_dataProposal', $data);
			} else {

				$NIM = $this->input->post('NIM');
				$Berkas = trim($this->input->post('Berkas'));
				// $data 		 = $this->Model_Proposal->getDatabyNIM($NIM);
				// var_dump($data);
				// die;
				$proses 	 = 'assets/proposal/' . $Berkas;
				unlink($proses);

				$config         = $this->upload->data();
				// $topik 			= $this->input->post('topik');
				$Berkas         = $config['file_name'];
				$Tanggal		= date('Y-m-d');

				$this->Model_Proposal->ubahData($NIM, $Berkas, $Tanggal);
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('mahasiswa/proposal');
			}
			// Kondisi dimana tidak ada file terbaru yg diuploud. Maka yg diuploud adalah file yg lama
		} else {
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
		$data = $this->Model_proposal->getDatabyId($Id_proposal);
		$proses = 'assets/proposal/file/' . $data->File;
		if (is_readable($proses) && unlink($proses)) {
			$hapus = $this->Model_proposal->hapusDataProposal($Id_proposal);
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect('mahasiswa/proposal');
		} else {
			'error';
		}
	}
}
