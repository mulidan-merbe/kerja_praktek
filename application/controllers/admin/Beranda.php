<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Jadwal', 'Model_Proposal','Model_Pembimbing_lapangan','Model_Kptiga','Model_Kpempat_c','Model_Laporan']);
		// if(is_null($this->session->userdata('Status') == '2' || $this->session->userdata('Status') == '1' )) {
	 //    	redirect(base_url("Auth"));
	 //    }

	    if(is_null($this->session->userdata('Admin'))) {
	    	redirect(base_url("auth_admin"));
	    }
    }

	public function index()
	{
		$data['jadwal'] = $this->Model_Jadwal->getAll();

		foreach ($data['jadwal'] as $data) {
			$tgl_awal	= $data->Tanggal_mulai;
			$tgl_akhir	=  $data->Tanggal_selesai;
			$Id_pelaksanaan = $data->Id_pelaksanaan;
		}

		$data = [
			'title'			=> 'Admin | Beranda',
			'jadwal' 		=> $this->Model_Jadwal->getAll(),
			'proposal'		=> $this->Model_Proposal->get_terbaru($Id_pelaksanaan),
			'proposal_periode'		=> $this->Model_Proposal->get_periode($Id_pelaksanaan),
			'pembimbing'	=> $this->Model_Pembimbing_lapangan->get_tanggal($tgl_awal, $tgl_akhir),
			'tiga'			=> $this->Model_Kptiga->cek_status(),
			'empatC'		=> $this->Model_Kpempat_c->get_tanggal($tgl_awal, $tgl_akhir),
			'laporan'		=> $this->Model_Laporan->get_tanggal($tgl_awal, $tgl_akhir)
		];

		
        $this->load->view('admin/beranda', $data);
	}
}
