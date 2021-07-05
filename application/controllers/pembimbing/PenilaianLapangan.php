<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenilaianLapangan extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		{
			$this->load->model(['Model_Kpdua_c','Model_Kpdua_b']);
			$this->load->library('form_validation');
			if(is_null($this->session->userdata('Pembimbing'))) {
	    	redirect(base_url("auth_pembimbing"));
	    	}

		}
	}

	public function index()
	{
		$data['title']	= 'Pembimbing | Penilaian Lapangan'; 
		$No_identitas	= $this->session->userdata('No_identitas');
		// $data['dua_B']	= $this->Model_Kpdua_b->getPembimbing($No_identitas);
		// $data['dua_B']	= $this->Model_Kpdua_b->getPembimbing();
		$data['dua_C']	= $this->Model_Kpdua_c->getPembimbing($No_identitas);

		$this->load->view('pembimbing/tampil_datadua_c', $data);
	}

	public function Penilaian()
	{
		$data['title']	= 'Pembimbing | Penilaian Lapangan'; 
		$No_identitas	= $this->session->userdata('No_identitas');
		$data['count_B']	= $this->Model_Kpdua_b->countStatusB($No_identitas);
		$data['dua_B']	= $this->Model_Kpdua_b->getPembimbing($No_identitas);
		$data['distinctPembimbing']	= $this->Model_Kpdua_b->getDistincPembimbing($No_identitas);
		$data['Penilaian']	= $this->Model_Kpdua_b->getNIM();

		$this->load->view('pembimbing/tampil_penilaiandua_b', $data);
		// if($data['countB'] >= 4){
		// 	// if($data['Penilaian']) {
		// 	$this->load->view('pembimbing/tampil_penilaiandua_b', $data);
		// 	// } else {
		// 	// 	$this->load->view('pembimbing/tampil_penilaiandua_b');
		// 	// }
		// }
	}

	public function tambah($NIM)
	{
		$data['title']	= 'Pembimbing | Penilaian Lapangan'; 
		$data['tambah']	= $this->Model_Kpdua_b->getDatabyNIM($NIM);
		$this->load->view('pembimbing/tambah_dataDua_c', $data);
	}

	public function tambahData()
	{
		$data['title']	= 'Pembimbing | Penilaian Lapangan'; 
		$NIM 	= $this->input->post('NIM');
		$data['tambah']	= $this->Model_Kpdua_b->getDatabyNIM($NIM);
    	$this->form_validation->set_rules('Nilai_satu', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_dua', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_tiga', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_empat', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_lima', 'Nilai', 'trim|required');

    	if($this->form_validation->run() == false ){
    		$this->load->view('pembimbing/tambah_dataDua_c', $data);
    	} else {
    		$No_identitas 	= $this->session->userdata('No_identitas');
    		$NIM 			= $this->input->post('NIM');
    		$Nilai_satu		= htmlspecialchars($this->input->post('Nilai_satu'));
    		$Nilai_dua		= htmlspecialchars($this->input->post('Nilai_dua'));
    		$Nilai_tiga		= htmlspecialchars($this->input->post('Nilai_tiga'));
    		$Nilai_empat	= htmlspecialchars($this->input->post('Nilai_empat'));
    		$Nilai_lima		= htmlspecialchars($this->input->post('Nilai_lima'));
    		$Tanggal		= date('Y-m-d');

    		$this->Model_Kpdua_c->tambahData($No_identitas, $NIM, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima,  $Tanggal);
    		$this->session->set_flashdata('flash', 'Ditambahkan');
    		redirect('pembimbing/penilaianLapangan');
    	}

	}

	public function ubah($Id_duaC)
	{
		$data['title']	= 'Pembimbing | Penilaian Lapangan'; 
		// $Id_duaC	= $_GET['Id'];
		$data['ubah'] = $this->Model_Kpdua_c->getbyId($Id_duaC);
		$this->load->view('pembimbing/ubah_dataDua_c', $data);
	}

	public function ubahData()
	{
		$data['title']	= 'Pembimbing | Penilaian Lapangan'; 
		$Id_duaC 	= $this->input->post('Id_duaC');
		$data['ubah']	= $this->Model_Kpdua_b->getbyId($Id_duaC);
    	$this->form_validation->set_rules('Nilai_satu', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_dua', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_tiga', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_empat', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_lima', 'Nilai', 'trim|required');

    	if($this->form_validation->run() == false ){
    		$this->load->view('pembimbing/ubah_dataDua_c', $data);
    	} else {
    		$Id_duaC 	= $this->input->post('Id_duaC');
    		$No_identitas 	= $this->session->userdata('No_identitas');
    		$NIM 			= $this->input->post('NIM');
    		$Nilai_satu		= htmlspecialchars($this->input->post('Nilai_satu'));
    		$Nilai_dua		= htmlspecialchars($this->input->post('Nilai_dua'));
    		$Nilai_tiga		= htmlspecialchars($this->input->post('Nilai_tiga'));
    		$Nilai_empat	= htmlspecialchars($this->input->post('Nilai_empat'));
    		$Nilai_lima		= htmlspecialchars($this->input->post('Nilai_lima'));
    		$Tanggal		= date('Y-m-d');

    		$this->Model_Kpdua_c->ubahData($Id_duaC, $No_identitas, $NIM, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima,  $Tanggal);
    		$this->session->set_flashdata('flash', 'Diubah');
    		redirect('pembimbing/penilaianLapangan');
    	}

	}
	

}

