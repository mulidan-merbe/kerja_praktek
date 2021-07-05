<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seminar extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kpempat', 'Model_Jadwal','Model_Kpempat_b','Model_Kpempat_c','Model_Kpdua_c','Model_Kpempat_a']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Pembimbing'))) {
            redirect(base_url("auth_pembimbing"));
        }
    }

    public function index()
    {
        $data['jadwal'] = $this->Model_Jadwal->getAll();
        foreach ($data['jadwal'] as $data) {
            $tgl_awal   = $data->Tanggal_mulai;
            $tgl_akhir  =  $data->Tanggal_selesai;
        }
    	$No_identitas	= $this->session->userdata('No_identitas');
    	$data = [
            'title'     => 'Pembimbing | Seminar',
            'kpempat'   => $this->Model_Kpempat->getPembimbing($No_identitas),
            'empat'     => $this->Model_Kpempat->get_tanggal($tgl_awal, $tgl_akhir)
        ];
    	$this->load->view('pembimbing/tampil_dataEmpat', $data);
    }

    public function penilaian()
    {
        $data['jadwal'] = $this->Model_Jadwal->getAll();
        foreach ($data['jadwal'] as $data) {
            $tgl_awal   = $data->Tanggal_mulai;
            $tgl_akhir  =  $data->Tanggal_selesai;
        }
        $No_identitas = $this->session->userdata('No_identitas');
        $data = [
            'title'     => 'Pembimbing | Penilaian',
            'seminar'   => $this->Model_Kpempat_b->getPembimbing($No_identitas),
            'empat'     => $this->Model_Kpempat->get_tanggal($tgl_awal, $tgl_akhir)
        ];

        $this->load->view('pembimbing/tampil_dataEmpat_b', $data);

        
        // $this->load->view('dosen/tampil_dataEmpat_A');
    }

    public function beritaAcara($NIM)
    {
        $data = [
            'title'  => 'Pembimbing | Berita Acara',     
            'duaC'      => $this->Model_Kpdua_c->getbyNIM($NIM),
            'empatA' => $this->Model_Kpempat_a->getbyNIM($NIM),
            'empatB' => $this->Model_Kpempat_b->getbyNIM($NIM),
        ];

        $this->load->view('pembimbing/tampil_detailMahasiswa', $data);
    }

    public function Detail($NIM)
    {
        $No_identitas = $this->session->userdata('No_identitas');
        $NIM    = $NIM;
        $data = [
            'title'  => 'Pembimbing | Berita Acara',
            'seminar' => $this->Model_Kpempat->getbyNo_identitas($No_identitas),
            'nilai' => $this->Model_Kpempat_c->getbyNo_identitas($No_identitas),
            'duaC'      => $this->Model_Kpdua_c->getbyNIM($NIM),
            'empatA' => $this->Model_Kpempat_a->getbyNIM($NIM),
            'empatB' => $this->Model_Kpempat_b->getbyNIM($NIM),
            'laporan' => $this->Model_Laporan->getbyNIM($NIM)
        ];

        $this->load->view('pembimbing/tampil_detailMahasiswa', $data);
    }
}