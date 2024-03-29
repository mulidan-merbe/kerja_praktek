<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tawaran_topik extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model_tawaranTopik', 'Model_Jadwal']);
		$this->load->library('form_validation');
		if (is_null($this->session->userdata('Dosen'))) {
			redirect(base_url("dosen/login"));
		}
	}

	public function index()
	{
		$data['title']  = 'Dosen | Tawaran Topik';
		$NIP = $this->session->userdata('NIP');
		$data['tawaranTopik'] = $this->Model_tawaranTopik->getAllTopik($NIP);
		$this->load->view('dosen/tampil_tawaranTopik', $data);
	}

	public function tambah()
	{
		$data['title']  = 'Dosen | Tawaran Topik';
		$data['jadwal'] = $this->Model_Jadwal->getAll();
		$this->form_validation->set_rules('topik', 'Topik', 'trim|required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('Jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('No_hp', 'No Handphone', 'trim|required');
		$this->form_validation->set_rules('Instansi', 'Instansi ', 'trim|required');

		if ($this->form_validation->run() == false) {

			$this->load->view('dosen/tambah_tawaranTopik', $data);
		} else {
			$topik 			 = htmlspecialchars($this->input->post('topik'));
			$Alamat 		 = htmlspecialchars($this->input->post('Alamat'));
			$Jumlah 		 = htmlspecialchars($this->input->post('Jumlah'));
			$No_hp 			 = htmlspecialchars($this->input->post('No_hp'));
			$Instansi 		 = htmlspecialchars($this->input->post('Instansi'));
			$NIP		 	 = $this->session->userdata("NIP");
			$Username		 = $this->session->userdata("Username");
			$Id_pelaksanaan  = $this->input->post('Id_pelaksanaan');
			$Tanggal     	 = format_indo(date('Y-m-d'));
			$this->Model_tawaranTopik->tambahData($NIP, $topik, $Alamat, $Jumlah, $No_hp, $Instansi, $Username, $Id_pelaksanaan, $Tanggal);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('dosen/topik');
		}
	}

	public function ubah($Id_tawaranjudul)
	{
		$data['title']	= 'Dosen | Tawaran Topik';
		$Id_tawaranjudul = $Id_tawaranjudul;
		$data['tawaran'] = $this->Model_tawaranTopik->getbyId($Id_tawaranjudul);
		$this->load->view('dosen/ubah_dataTawaranTopik', $data);
	}

	public function ubahData()
	{
		$data['title']	= 'Dosen | Tawaran Topik';
		$Id_tawaranjudul	= $this->input->post('Id_tawaranjudul');
		$data['tawaran'] = $this->Model_tawaranTopik->getbyId($Id_tawaranjudul);

		$this->form_validation->set_rules('topik', 'topik', 'trim|required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('Jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('No_hp', 'No Handphone', 'trim|required');
		$this->form_validation->set_rules('Instansi', 'Instansi ', 'trim|required');

		if ($this->form_validation->run() == false) {

			$this->load->view('dosen/ubah_dataTawaranTopik', $data);
		} else {
			$Id_tawaranjudul	= $this->input->post('Id_tawaranjudul');
			$topik 			 	= htmlspecialchars($this->input->post('topik'));
			$Alamat 		 	= htmlspecialchars($this->input->post('Alamat'));
			$Jumlah 		 	= htmlspecialchars($this->input->post('Jumlah'));
			$No_hp 			 	= htmlspecialchars($this->input->post('No_hp'));
			$Instansi 		 	= htmlspecialchars($this->input->post('Instansi'));
			$NIP		 	 	= $this->session->userdata("NIP");
			$Tanggal     	 	= format_indo(date('Y-m-d'));
			$this->Model_tawaranTopik->ubahData($Id_tawaranjudul, $topik, $Alamat, $Jumlah, $No_hp, $Instansi, $NIP, $Tanggal);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('dosen/tawaran_topik');
		}
	}

	public function hapus($Id_tawaranjudul)
	{
		$Id_tawaranjudul = $Id_tawaranjudul;
		$this->Model_tawaranTopik->hapusDataJudul($Id_tawaranjudul);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('dosen/tawaran_topik');
	}
}
