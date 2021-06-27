<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_pelaksanaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Jadwal', 'jadwal');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Admin'))) {
	    	redirect(base_url("auth_admin"));
	    }
	}

	public function index()
	{
		$data['title']	= 'Admin | Jadwal Pelaksanaan ';
		$data['jadwal'] = $this->jadwal->getAdmin();
		$this->load->view('admin/tampil_dataJadwal', $data);
	}

	public function tambah()
	{
		$data['title']	= 'Admin | Jadwal Pelaksanaan ';
		$this->form_validation->set_rules('Tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('Periode', 'Periode Pelaksanaan', 'trim|required');
 		$this->form_validation->set_rules('Tanggal_mulai', 'Tanggal Mulai', 'trim|required');
 		$this->form_validation->set_rules('Tanggal_selesai', 'Tanggal Selesai', 'trim|required');
 		$this->form_validation->set_rules('Pengajuan_seminar', 'Pengajuan Seminar', 'trim|required');
 		$this->form_validation->set_rules('Pelaksanaan_seminar', 'Pelaksanaan Seminar', 'trim|required');
 		$this->form_validation->set_rules('RevisiDpengumpulan', 'Revisi dan Pengumpulan Laporan', 'trim|required');

 		if($this->form_validation->run() == false )
 		{
 			$this->load->view('admin/tambah_dataJadwal', $data);

 		} else {
 			// $tgl_indo	=  $this->input->post('Tanggal_mulai'));
 			// $Tanggal_mulai = date('d F Y', strtotime($tgl_indo));
 			$Tahun 					= htmlspecialchars($this->input->post('Tahun', true));
 			$Periode 				= htmlspecialchars($this->input->post('Periode', true));
 			$Tanggal_mulai 			= htmlspecialchars($this->input->post('Tanggal_mulai', true));
 			$Tanggal_selesai 		= htmlspecialchars($this->input->post('Tanggal_selesai', true));
 			$Pengajuan_seminar 		= htmlspecialchars($this->input->post('Pengajuan_seminar', true));
 			$Pelaksanaan_seminar 	= htmlspecialchars($this->input->post('Pelaksanaan_seminar', true));
 			$Revisi 				= htmlspecialchars($this->input->post('RevisiDpengumpulan', true));
 			$Tanggal 				= date('Y-m-d');

 			$this->jadwal->insertJadwal($Tahun, $Periode, $Tanggal_mulai, $Tanggal_selesai, $Pengajuan_seminar, $Pelaksanaan_seminar, $Revisi, $Tanggal);
 			$this->session->set_flashdata('flash', 'Ditambahkan');
 			redirect('admin/jadwal_pelaksanaan');;

 		}
	}


	public function ubah()
	{
		$data['title'] = 'Admin | Jadwal Pelaksanaan';
		$Id_Pelaksanaan = $_GET['Id'];
		$data['ubah'] = $this->jadwal->getbyId($Id_Pelaksanaan);
		$this->load->view('admin/ubah_dataJadwal', $data);


	}

	public function ubahData()
	{
		$data['title']  = 'Admin | Jadwal Pelaksanaan';
		$Id_Pelaksanaan = $this->input->post('Id');
		$data['ubah']   = $this->jadwal->getbyId($Id_Pelaksanaan);

		$this->form_validation->set_rules('Tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('Periode', 'Periode Pelaksanaan', 'trim|required');
 		$this->form_validation->set_rules('Tanggal_mulai', 'Tanggal Mulai', 'trim|required');
 		$this->form_validation->set_rules('Tanggal_selesai', 'Tanggal Selesai', 'trim|required');
 		$this->form_validation->set_rules('Pengajuan_seminar', 'Pengajuan Seminar', 'trim|required');
 		$this->form_validation->set_rules('Pelaksanaan_seminar', 'Pelaksanaan Seminar', 'trim|required');
 		$this->form_validation->set_rules('RevisiDpengumpulan', 'Revisi dan Pengumpulan Laporan', 'trim|required');

 		if($this->form_validation->run() == false )
 		{
 			$this->load->view('admin/ubah_dataJadwal', $data);

 		} else {
 			// $tgl_indo	=  $this->input->post('Tanggal_mulai'));
 			// $Tanggal_mulai = date('d F Y', strtotime($tgl_indo));
 			$Id_Pelaksanaan 		= $this->input->post('Id');
 			$Tahun 					= htmlspecialchars($this->input->post('Tahun', true));
 			$Periode 				= htmlspecialchars($this->input->post('Periode', true));
 			$Tanggal_mulai 			= htmlspecialchars($this->input->post('Tanggal_mulai', true));
 			$Tanggal_selesai 		= htmlspecialchars($this->input->post('Tanggal_selesai', true));
 			$Pengajuan_seminar 		= htmlspecialchars($this->input->post('Pengajuan_seminar', true));
 			$Pelaksanaan_seminar 	= htmlspecialchars($this->input->post('Pelaksanaan_seminar', true));
 			$Revisi 				= htmlspecialchars($this->input->post('RevisiDpengumpulan', true));
 			$Tanggal 				= date('Y-m-d');

 			$this->jadwal->ubahJadwal($Id_Pelaksanaan, $Tahun, $Periode, $Tanggal_mulai, $Tanggal_selesai, $Pengajuan_seminar, $Pelaksanaan_seminar, $Revisi, $Tanggal);
 			$this->session->set_flashdata('flash', 'Diubah');
 			redirect('admin/jadwal_pelaksanaan');;

 		}
	}

	public function hapusData()
	{
		$Id_Pelaksanaan  = $_GET['Id'];
		$hapus =	$this->jadwal->hapusData($Id_Pelaksanaan);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/jadwal_pelaksanaan');
        
	}

}