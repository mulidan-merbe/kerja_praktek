<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A04C extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kpempat','Model_Kpempat_a','Model_Kpempat_b', 'Model_Kpempat_c','Model_Jadwal']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Admin')) ) {
	    	redirect(base_url("auth_admin"));
	    }
    }

    public function index()
    {
    	$data['title']	= 'Admin | KP-TI-A04C';  
        $data['nilai']   = $this->Model_Kpempat_c->getStatusDosen();
    	$this->load->view('admin/tampil_dataEmpat_c', $data);
    }

    public function lihat()
    {
        $NIM = $_GET['NIM'];
        $data = [
            'title' =>  'Admin | KP-TI-A04C',
            'empatC' =>  $this->Model_Kpempat_c->getbyNIM($NIM),
            'empatA' =>  $this->Model_Kpempat_a->getbyNIM($NIM),
            'empatB' =>  $this->Model_Kpempat_b->getbyNIM($NIM),
            'cek'    =>  $this->Model_Kpempat_c->getRowNIM($NIM)
        ];
        
        $this->load->view('admin/tampil_dataLihat', $data);
    }

    public function persentase()
    {
        $data = [
            'title' =>  'Admin | KP-TI-A04C',
            'persentase'     => $this->Model_Kpempat_c->getPersentase(),
            'jadwal'    => $this->Model_Jadwal->getAll()
        ];
        $this->load->view('admin/tampil_dataPersentase', $data);
    }

    public function Detail($NIM)
    {
        $data['title']  = 'Admin | KP-TI-A04C';
        $NIP = $this->session->userdata('NIP');
        $NIM    = $NIM;
        $data['seminar']   = $this->Model_Kpempat->getbyNIP($NIP);
        $data['nilai']   = $this->Model_Kpempat_c->getbyNIP($NIP);
        $data['empatA'] = $this->Model_Kpempat_a->getbyNIM($NIM);
        $data['empatB'] = $this->Model_Kpempat_b->getbyNIM($NIM);
        $this->load->view('admin/tampil_detailMahasiswa', $data);
    }

    public function Seminar()
    {
        $NIP = $this->session->userdata('NIP');
 		$data = [
 			'status_dosen' => $this->Model_Kpempat_c->getStatusDosen(),
 			'seminar'	   => $this->Model_Kpempat->getAdmin(),
 			'title'			=> 'Admin | KP-TI-A04C'
 		];

        $this->load->view('admin/tampil_dataSeminar', $data);
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

    public function tambahPersentase()
    {
         $data = [
            'title' =>  'Admin | KP-TI-A04C',
            'jadwal'    => $this->Model_Jadwal->getAll(),
            'persentase'     => $this->Model_Kpempat_c->getPersentase()
        ];

        $this->form_validation->set_rules('Nilai_lapangan', 'Nilai Lapangan', 'trim|required');
        $this->form_validation->set_rules('Nilai_Seminar_lapangan', 'Nilai Seminar Lapangan', 'trim|required');
        $this->form_validation->set_rules('Nilai_Seminar_dosen', 'Nilai Seminar Dosen', 'trim|required');

         if($this->form_validation->run() == false ){
            $this->load->view('Admin/tampil_dataPersentase', $data);
        } else {
            $Id_pelaksanaan             = $this->input->post('Id_pelaksanaan');
            $Nilai_lapangan             = htmlspecialchars($this->input->post('Nilai_lapangan'));
            $Nilai_Seminar_lapangan     = htmlspecialchars($this->input->post('Nilai_Seminar_lapangan'));
            $Nilai_Seminar_dosen        = htmlspecialchars($this->input->post('Nilai_Seminar_dosen'));
            $Tanggal                    = date('Y-m-d');

            $this->Model_Kpempat_c->tambahDataPersentase($Id_pelaksanaan, $Nilai_lapangan, $Nilai_Seminar_lapangan, $Nilai_Seminar_dosen, $Tanggal);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/KP_TI_A04C/persentase');
        }
    }

    public function ubahPersentase()
    {
         $data = [
            'title' =>  'Admin | KP-TI-A04C',
            'persentase'     => $this->Model_Kpempat_c->getPersentase()
        ];

        $this->form_validation->set_rules('Nilai_lapangan', 'Nilai Lapangan', 'trim|required');
        $this->form_validation->set_rules('Nilai_Seminar_lapangan', 'Nilai Seminar Lapangan', 'trim|required');
        $this->form_validation->set_rules('Nilai_Seminar_dosen', 'Nilai Seminar Dosen', 'trim|required');

         if($this->form_validation->run() == false ){
            $this->load->view('Admin/tampil_dataPersentase', $data);
        } else {
            $Id                         = $this->input->post('Id');
            $Nilai_lapangan             = htmlspecialchars($this->input->post('Nilai_lapangan'));
            $Nilai_Seminar_lapangan     = htmlspecialchars($this->input->post('Nilai_Seminar_lapangan'));
            $Nilai_Seminar_dosen        = htmlspecialchars($this->input->post('Nilai_Seminar_dosen'));
            $Tanggal                    = date('Y-m-d');

            $this->Model_Kpempat_c->ubahDataPersentase($Id, $Nilai_lapangan, $Nilai_Seminar_lapangan, $Nilai_Seminar_dosen, $Tanggal);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/KP_TI_A04C/persentase');
        }
    }

    public function Ubah()
    {
        $data['title']  = 'Admin | KP-TI-A04C';
        $NIM    = $_GET['NIM'];
        $data['empatA'] = $this->Model_Kpempat_a->getbyNIM($NIM);
        $data['empatB'] = $this->Model_Kpempat_b->getbyNIM($NIM);
        $data['nilai']   = $this->Model_Kpempat_c->getbyNIMAdmin($NIM);
        $this->load->view('admin/ubah_dataEmpat_c', $data);
    }

}