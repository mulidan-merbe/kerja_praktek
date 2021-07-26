<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Jadwal','Model_Kpdua_b','Model_Kpempat']);
		if(is_null($this->session->userdata('Pembimbing'))) {
	    	redirect(base_url("pembimbing/login"));
	    }
    }

	public function index()
	{
		$No_identitas = $this->session->userdata("No_identitas");
		$data['jadwal'] = $this->Model_Jadwal->getAll();
		foreach ($data['jadwal'] as $data) {
			$tgl_awal	= $data->Tanggal_mulai;
			$tgl_akhir	=  $data->Tanggal_selesai;
		}

		$data = [
			'title'			=> 'Pembimbing  | Beranda',
			'jadwal' 		=> $this->Model_Jadwal->getAll(),
			'duaB'			=> $this->Model_Kpdua_b->cek_status($No_identitas),
			'empat'			=> $this->Model_Kpempat->get_tanggal($tgl_awal, $tgl_akhir)
		];
        $this->load->view('pembimbing/beranda', $data);
	}

}
