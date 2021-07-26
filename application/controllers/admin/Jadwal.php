<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Kpempat', 'kpempat');
		$this->load->library('form_validation');
		if (is_null($this->session->userdata('Admin'))) {
			redirect(base_url("admin/login"));
		}
	}

	public function index()
	{
		$data['title']  = 'Admin | KP-TI-A04';
		$data['kpempat'] = $this->kpempat->getAdmin();
		$this->load->view('admin/tampil_dataEmpat', $data);
	}

	public function tambah()
	{
		$data['title']  = 'Admin | KP-TI-A04';
		$this->form_validation->set_rules('NIM', 'NIM', 'trim|required');
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required');
		$this->form_validation->set_rules('No_identitas', 'No identitas', 'trim|required');
		$this->form_validation->set_rules('Hari', 'Hari', 'trim|required');
		$this->form_validation->set_rules('Tanggal_seminar', 'Tanggal seminar', 'trim|required');
		$this->form_validation->set_rules('Waktu', 'Waktu', 'trim|required');
		$this->form_validation->set_rules('Ruangan', 'Ruangan', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/tambah_dataEmpat', $data);
		} else {
			$NIM 				= htmlspecialchars($this->input->post('NIM', true));
			$NIP 				= htmlspecialchars($this->input->post('NIP', true));
			$No_identitas 		= htmlspecialchars($this->input->post('No_identitas', true));
			$Hari 				= htmlspecialchars($this->input->post('Hari', true));
			$Tanggal_seminar 	= htmlspecialchars($this->input->post('Tanggal_seminar', true));
			$Waktu 				= htmlspecialchars($this->input->post('Waktu', true));
			$Ruangan 			= htmlspecialchars($this->input->post('Ruangan', true));
			$Tanggal 			= date('Y-m-d');

			$this->kpempat->simpanData($NIM, $NIP, $No_identitas, $Hari, $Tanggal_seminar, $Waktu, $Ruangan, $Tanggal);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/jadwal');
		}
	}

	public function tambahData()
	{
	}

	public function ubah($Id_Kpempat)
	{
		$data['title']  = 'Admin | KP-TI-A04';
		// $Id_Kpempat = $_GET['Id'];
		$data['ubah'] = $this->kpempat->getbyId($Id_Kpempat);
		$this->load->view('admin/ubah_dataEmpat', $data);
	}

	public function ubahData()
	{
		$data['title']  = 'Admin | KP-TI-A04';
		$Id_Kpempat = $this->input->post('Id_Kpempat');
		$data['ubah'] = $this->kpempat->getbyId($Id_Kpempat);

		$this->form_validation->set_rules('NIM', 'NIM', 'trim|required');
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required');
		$this->form_validation->set_rules('No_identitas', 'No identitas', 'trim|required');
		$this->form_validation->set_rules('Hari', 'Hari', 'trim|required');
		$this->form_validation->set_rules('Tanggal_seminar', 'Tanggal seminar', 'trim|required');
		$this->form_validation->set_rules('Waktu', 'Waktu', 'trim|required');
		$this->form_validation->set_rules('Ruangan', 'Ruangan', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/ubah_dataEmpat', $data);
		} else {
			$Id_Kpempat = $this->input->post('Id_Kpempat');
			$NIM 				= htmlspecialchars($this->input->post('NIM', true));
			$NIP 				= htmlspecialchars($this->input->post('NIP', true));
			$No_identitas 		= htmlspecialchars($this->input->post('No_identitas', true));
			$Hari 				= htmlspecialchars($this->input->post('Hari', true));
			$Tanggal_seminar 	= htmlspecialchars($this->input->post('Tanggal_seminar', true));
			$Waktu 				= htmlspecialchars($this->input->post('Waktu', true));
			$Ruangan 			= htmlspecialchars($this->input->post('Ruangan', true));
			$Tanggal 			= date('Y-m-d');

			$this->kpempat->ubahData($Id_Kpempat, $NIM, $NIP, $No_identitas, $Hari, $Tanggal_seminar, $Waktu, $Ruangan, $Tanggal);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/jadwal');
		}
	}

	public function hapus($Id_Kpempat)
	{
		// $Id_Kpempat = $_GET['Id'];
		$this->kpempat->hapusData($Id_Kpempat);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/jadwal');
	}
}
