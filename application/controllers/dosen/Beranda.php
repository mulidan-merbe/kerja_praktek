<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Jadwal', 'Model_rencanaTopik', 'Model_Proposal','Model_Kpdua_a','Model_Kptiga','Model_Kpempat','Model_Laporan']);
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("auth_dosen"));
	    }
    }

	public function index()
	{
		$NIP = $this->session->userdata('NIP');
		$data['jadwal'] = $this->Model_Jadwal->getAll();

		foreach ($data['jadwal'] as $data) {
			$tgl_awal	= $data->Tanggal_mulai;
			$tgl_akhir	=  $data->Tanggal_selesai;
		}

		$data = [
			'title'			=> 'Dosen | Beranda',
			'jadwal' 		=> $this->Model_Jadwal->getAll(),
			'rencanaTopik'  => $this->Model_rencanaTopik->cek_status($NIP),
			'proposal'		=> $this->Model_Proposal->get_tanggal($tgl_awal, $tgl_akhir),
			'duaA'			=> $this->Model_Kpdua_a->cek_status($NIP),
			'tiga'			=> $this->Model_Kptiga->cek_statusDosen($NIP),
			'empat'			=> $this->Model_Kpempat->get_tanggal($tgl_awal, $tgl_akhir),
			'laporan'		=> $this->Model_Laporan->get_tanggal($tgl_awal, $tgl_akhir)
		];

        $this->load->view('dosen/beranda', $data);
	}

	public function get()
	{
		$NIP = $this->session->userdata('NIP');
		$total = $this->Model_rencanaTopik->get_count($NIP);
		$result['total'] = $total;
		echo json_encode($result);
	}
}
