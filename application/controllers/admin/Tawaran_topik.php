<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tawaran_topik extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(['Model_tawaranTopik', 'Model_Jadwal']);
		if (is_null($this->session->userdata('Admin'))) {
			redirect(base_url("admin/login"));
		}
	}

	public function index()
	{
		$data['title']  = 'Admin | Tawaran Topik';
		$data['tawaranJudul'] = $this->Model_tawaranTopik->getAll();

		// if($data['tawaranJudul'] != 404) {
		$this->load->view('admin/tampil_tawaranTopik', $data);
		// }else {
		// 	$this->load->view('mahasiswa/no_dataTawaranJudul');
		// }       
	}

	public function tambah()
	{
		$data['title']  = 'Admin | Tawaran Topik';
		$data['jadwal'] = $this->Model_Jadwal->getAll();
		$this->form_validation->set_rules('topik', 'Topik', 'trim|required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('Jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('No_hp', 'No Handphone', 'trim|required');
		$this->form_validation->set_rules('Instansi', 'Instansi ', 'trim|required');

		if ($this->form_validation->run() == false) {

			$this->load->view('admin/tambah_tawaranTopik', $data);
		} else {
			$topik 			 = htmlspecialchars($this->input->post('topik'));
			$Alamat 		 = htmlspecialchars($this->input->post('Alamat'));
			$Jumlah 		 = htmlspecialchars($this->input->post('Jumlah'));
			$No_hp 			 = htmlspecialchars($this->input->post('No_hp'));
			$Instansi 		 = htmlspecialchars($this->input->post('Instansi'));
			$NIP		 	 = $this->session->userdata("No_identitas");
			$Username		 = $this->session->userdata("Nama");
			$Id_pelaksanaan  = $this->input->post('Id_pelaksanaan');
			$Tanggal     	 = format_indo(date('Y-m-d'));
			$this->Model_tawaranTopik->tambahData($NIP, $topik, $Alamat, $Jumlah, $No_hp, $Instansi, $Username, $Id_pelaksanaan, $Tanggal);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/topik');
		}
	}

	public function ubah($Id_tawaranjudul)
	{
		$data['title']	= 'Admin | Tawaran Topik';
		$Id_tawaranjudul = $Id_tawaranjudul;
		$data['tawaran'] = $this->Model_tawaranTopik->getbyId($Id_tawaranjudul);
		$this->load->view('admin/ubah_dataTawaranTopik', $data);
	}

	public function ubahData()
	{
		$data['title']	= 'Admin | Tawaran Topik';
		$Id_tawaranjudul	= $this->input->post('Id_tawaranjudul');
		$data['tawaran'] = $this->Model_tawaranTopik->getbyId($Id_tawaranjudul);

		$this->form_validation->set_rules('topik', 'topik', 'trim|required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('Jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('No_hp', 'No Handphone', 'trim|required');
		$this->form_validation->set_rules('Instansi', 'Instansi ', 'trim|required');

		if ($this->form_validation->run() == false) {

			$this->load->view('admin/ubah_dataTawaranTopik', $data);
		} else {
			$Id_tawaranjudul	= $this->input->post('Id_tawaranjudul');
			$topik 			 	= htmlspecialchars($this->input->post('topik'));
			$Alamat 		 	= htmlspecialchars($this->input->post('Alamat'));
			$Jumlah 		 	= htmlspecialchars($this->input->post('Jumlah'));
			$No_hp 			 	= htmlspecialchars($this->input->post('No_hp'));
			$Instansi 		 	= htmlspecialchars($this->input->post('Instansi'));
			$NIP		 	 	= $this->session->userdata("No_identitas");
			$Tanggal     	 	= format_indo(date('Y-m-d'));
			$this->Model_tawaranTopik->ubahData($Id_tawaranjudul, $topik, $Alamat, $Jumlah, $No_hp, $Instansi, $NIP, $Tanggal);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/topik');
		}
	}

	public function hapus($Id_tawaranjudul)
	{
		$Id_tawaranjudul = $Id_tawaranjudul;
		$this->Model_tawaranTopik->hapusDataJudul($Id_tawaranjudul);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/topik');
	}
}
