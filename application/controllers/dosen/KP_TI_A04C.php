<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A04C extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kpempat','Model_Kpdua_c','Model_Kpempat_a','Model_Kpempat_b', 'Model_Kpempat_c','Model_Laporan']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("auth_dosen"));
	    }
    }

    public function index()
    {
    	$data['title']	= 'Dosen | KP-TI-A04C';
    	$NIP = $this->session->userdata('NIP');     
        $data['nilai']   = $this->Model_Kpempat_c->getbyNIP($NIP);
    	$this->load->view('dosen/tampil_dataEmpat_c', $data);
    }

    public function Detail($NIM)
    {
        $NIP = $this->session->userdata('NIP');
        $NIM    = $NIM;
        $data = [
            'title'  => 'Dosen | KP-TI-A04C',
            'seminar' => $this->Model_Kpempat->getbyNIP($NIP),
            'nilai' => $this->Model_Kpempat_c->getbyNIP($NIP),
            'duaC'      => $this->Model_Kpdua_c->getbyNIM($NIM),
            'empatA' => $this->Model_Kpempat_a->getbyNIM($NIM),
            'empatB' => $this->Model_Kpempat_b->getbyNIM($NIM),
            'laporan' => $this->Model_Laporan->getbyNIM($NIM)
        ];

        $this->load->view('dosen/tampil_detailMahasiswa', $data);
    }

    public function Seminar()
    {
        $data['title']  = 'Dosen | KP-TI-A04C';
        $NIP = $this->session->userdata('NIP');
        $data['seminar']   = $this->Model_Kpempat_a->getbyNIP($NIP);
 
        $this->load->view('dosen/tampil_dataSeminar', $data);
    }

    public function tambahData()
    {
        $this->form_validation->set_rules('Status', 'Status', 'trim|required');

        if($this->form_validation->run() == false ){
            $this->load->view('dosen/tampil_detailMahasiswa', $data);
        } else {
            $NIP            = $this->session->userdata('NIP');
            $NIM            = $this->input->post('NIM');
            $Id_duaC        = $this->input->post('Id_duaC');
            $Id_empatA      = $this->input->post('Id_empatA');
            $Id_empatB      = $this->input->post('Id_empatB');
            $Status_dosen   = htmlspecialchars($this->input->post('Status'));
            $Tanggal_dosen  = date('Y-m-d');

            $this->Model_Kpempat_c->tambahDataDosen($NIP, $NIM, $Id_duaC, $Id_empatA, $Id_empatB, $Status_dosen, $Tanggal_dosen);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('dosen/KP_TI_A04C');
        }

    }

    public function setuju()
    {
        $No_identitas      = $this->session->userdata('No_identitas');
        $NIM                = $_GET['setujui'];
        $Status_kaprodi     = 2;
        $Tanggal_kaprodi    = date('Y-m-d');

        $this->Model_Kpempat_c->tambahDataKaprodi($NIM, $No_identitas, $Status_kaprodi, $Tanggal_kaprodi);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/KP_TI_A04C');
    }

    public function tolak()
    {
        $No_identitas      = $this->session->userdata('No_identitas');
        $NIM                = $_GET['setujui'];
        $Status_kaprodi     = 3;
        $Tanggal_kaprodi    = date('Y-m-d');

        $this->Model_Kpempat_c->tambahDataKaprodi($NIM, $No_identitas, $Status_kaprodi, $Tanggal_kaprodi);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/KP_TI_A04C');
    }


    public function Ubah($NIM)
    {
        $NIP = $this->session->userdata('NIP');
        $NIM    = $NIM;
        $data = [
            'title'  => 'Dosen | KP-TI-A04C',
            'empatA' => $this->Model_Kpempat_a->getbyNIM($NIM),
            'empatB' => $this->Model_Kpempat_b->getbyNIM($NIM),
            'nilai'  => $this->Model_Kpempat_c->getbyNIM($NIM)
        ];
        $this->load->view('dosen/ubah_dataEmpat_c', $data);
    }

    public function ubahData()
    {
        $data['title']  = 'Dosen | KP-TI-A04C';

        $this->form_validation->set_rules('Status', 'Status', 'trim|required');

        if($this->form_validation->run() == false ){
            $this->load->view('dosen/ubah_dataEmpat_c', $data);
        } else {
            // $Id_empatC      = $this->input->post('Id_empatC');
            $NIM            = $this->input->post('NIM');
            $NIP            = $this->session->userdata('NIP');
            $Status_dosen   = htmlspecialchars($this->input->post('Status'));
            $Tanggal_dosen  = date('Y-m-d');

            $this->Model_Kpempat_c->ubahDataDosen( $NIM, $NIP, $Status_dosen,  $Tanggal_dosen);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('dosen/KP_TI_A04C');
        }

    }

}