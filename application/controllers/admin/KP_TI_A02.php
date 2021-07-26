<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KP_TI_A02 extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model_Kpdua', 'Model_Proposal', 'Model_Jadwal']);
		$this->load->library('form_validation');
		if (is_null($this->session->userdata('Admin'))) {
			redirect(base_url("admin/login"));
		}
	}

	public function index()
	{
		$Id = $this->Model_Jadwal->getAll();
		foreach ($Id as $data) {
			$Id = $data->Id_pelaksanaan;
		}

		$Id_pelaksanaan = $Id;
		$data = [
			'title'  => 'Admin | KP-TI-A02',
			'proposal'	=> $this->Model_Proposal->caribyId($Id_pelaksanaan),
			'kpdua' => $this->Model_Kpdua->getAll()
		];
		$this->load->view('admin/tampil_dataDua', $data);
	}



	public function tambah()
	{
		$Id = $this->Model_Jadwal->getAll();
		foreach ($Id as $data) {
			$Id = $data->Id_pelaksanaan;
		}

		$Id_pelaksanaan = $Id;

		$data = [
			'title'  => 'Admin | KP-TI-A02',
			'proposal'	=> $this->Model_Proposal->caribyId($Id_pelaksanaan),
			'kpdua' => $this->Model_Kpdua->getAll()
		];

		$this->form_validation->set_rules('NIM', 'NIM', 'trim|required');
		// $this->form_validation->set_rules('File', 'File', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/tampil_dataDua', $data);
		} else {
			$config['upload_path'] = 'assets/KP_TI_A02/file/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']      = 5000;
			$this->load->library('upload', $config);
			// Cek apakah berkas sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('File')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File tidak sesuai</div>');
				$this->load->view('admin/tampil_dataDua', $data);
			} else {
				$result        	  =  $this->upload->data();
				$NIM 	  		  = htmlspecialchars($this->input->post('NIM', true));
				$File 			  =	$result['file_name'];
				$Tanggal		  = date('Y-m-d');

				$this->Model_Kpdua->tambahData($NIM, $File, $Tanggal);
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('admin/KP_TI_A02');
			}
		}
	}

	public function tambahData()
	{
		$data['title']  = 'Admin | KP-TI-A02';
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('NIM', 'NIM', 'trim|required');
		// $this->form_validation->set_rules('File', 'File', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/tambah_dataDuaaa', $data);
		} else {
			$config['upload_path'] = 'assets/KP_TI_A02/file/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']      = 5000;
			$this->load->library('upload', $config);
			// Cek apakah berkas sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('File')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File tidak sesuai</div>');
				$this->load->view('admin/tambah_dataDuaaa', $data);
			} else {
				$result        	  =  $this->upload->data();
				$NIM 	  		  = htmlspecialchars($this->input->post('NIM', true));
				$Nama			  = htmlspecialchars($this->input->post('nama', true));
				$File 			  =	$result['file_name'];
				$Tanggal		  = date('Y-m-d');

				$this->Model_Kpdua->tambahData($NIM, $Nama, $File, $Tanggal);
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('admin/KP_TI_A02');
			}
		}
	}

	public function ubah()
	{
		$data['title']  = 'Admin | KP-TI-A02';
		$Id_Kpdua = $_GET['Id'];
		$data['ubah'] = $this->Model_Kpdua->getbyId($Id_Kpdua);
		$this->load->view('admin/ubah_dataDua', $data);
	}

	public function ubahData()
	{
		$data['title']  = 'Admin | KP-TI-A02';
		$Id_Kpdua	= $this->input->post('Id');
		$data['ubah'] 	= $this->Model_Kpdua->getbyId($Id_Kpdua);


		$config['upload_path'] = 'assets/KP_TI_A02/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 5000;
		$this->load->library('upload', $config);

		// Cek apakah ada berkas yang diuploud atau tidak
		if (!empty($_FILES['File']['name'])) {
			// Cek apakah Filei sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('File')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File tidak sesuai</div>');
				$this->load->view('admin/tambah_dataDuaaa', $data);
			} else {

				$Id_Kpdua 	 = $this->input->post('Id');
				$data 		 = $this->Model_Kpdua->getDatabyId($Id_Kpdua);
				$proses 	 = 'assets/KP_TI_A02/file/' . $data->File;
				unlink($proses);

				$result         = $this->upload->data();
				$NIM 			= htmlspecialchars($this->input->post('NIM'));
				$nama 			= htmlspecialchars($this->input->post('nama'));
				$File           = $result['file_name'];
				$Tanggal		= date('Y-m-d');

				$this->Model_Kpdua->ubahData($Id_Kpdua, $NIM, $nama, $File, $Tanggal);
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('admin/KP_TI_A02');
			}
			// Kondisi dimana tidak ada file terbaru yg diuploud. Maka yg diuploud adalah file yg lama
		} else {
			$Id_Kpdua 		= $this->input->post('Id');
			$NIM 			= htmlspecialchars($this->input->post('NIM'));
			$nama 			= htmlspecialchars($this->input->post('nama'));
			$File  			= $this->input->post('old_file');
			$Tanggal		= date('Y-m-d');

			$this->Model_Kpdua->ubahData($Id_Kpdua, $NIM, $nama, $File, $Tanggal);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/KP_TI_A02');
		}
	}


	public function hapusData()
	{
		$Id  = $_GET['Id'];
		$data = $this->Model_Kpdua->getDatabyId($Id);
		$proses = 'assets/KP_TI_A02/file/' . $data->File;
		if (is_readable($proses) && unlink($proses)) {
			$hapus =	$this->Model_Kpdua->hapusData($Id);
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect('admin/KP_TI_A02');
		} else {
			'error';
		}
	}
}
