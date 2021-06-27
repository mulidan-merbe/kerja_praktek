<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP_TI_A04B extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kpempat_b','Model_Kpempat']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Pembimbing'))) {
	    	redirect(base_url("auth_pembimbing"));
	    }
    }



    public function index()
    {
        $data['title']  = 'Pembimbing | KP-TI-A04B';
    	$No_identitas = $this->session->userdata('No_identitas');
    	$data['seminar'] = $this->Model_Kpempat_b->getPembimbing($No_identitas);
    	$this->load->view('pembimbing/tampil_dataEmpat_b', $data);

        
    	// $this->load->view('dosen/tampil_dataEmpat_A');
    }

    public function jadwal()
    {
        $data['title']  = 'Pembimbing | KP-TI-A04B';
    	$No_identitas = $this->session->userdata('No_identitas');
    	$data['jadwal'] = $this->Model_Kpempat->getPembimbing($No_identitas);
    	$this->load->view('pembimbing/tampil_jadwalSeminar', $data);
    }

    public function tambah()
    {
    	$No_identitas   = $this->session->userdata('No_identitas');
        $NIM            = $_GET['NIM'];
        $data = [
            'title'  => 'Pembimbing | KP-TI-A04B',
            'nilai'     => $this->Model_Kpempat_b->getbyNIM($NIM),
            'jadwal'    => $this->Model_Kpempat->getbyNIM($NIM)
        ];
    	$this->load->view('pembimbing/tambah_dataEmpat_b', $data);
    }

    public function tambahData()
    {
    	$No_identitas   = $this->session->userdata('No_identitas');
        $NIM            = $this->input->post('NIM');
        $data = [
            'title'  => 'Pembimbing | KP-TI-A04B',
            'nilai'     => $this->Model_Kpempat_b->getbyNIM($NIM),
            'jadwal'    => $this->Model_Kpempat->getbyNIM($NIM)
        ];

    	$this->form_validation->set_rules('Nilai_satu', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_dua', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_tiga', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_empat', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_lima', 'Nilai', 'trim|required');


    	if($this->form_validation->run() == false ){
    		$this->load->view('pembimbing/tambah_dataEmpat_b', $data);
    	} else {
    		$No_identitas 	= $this->session->userdata('No_identitas');
    		$NIM 			= $this->input->post('NIM');
    		$Nilai_satu		= htmlspecialchars($this->input->post('Nilai_satu'));
    		$Nilai_dua		= htmlspecialchars($this->input->post('Nilai_dua'));
    		$Nilai_tiga		= htmlspecialchars($this->input->post('Nilai_tiga'));
    		$Nilai_empat	= htmlspecialchars($this->input->post('Nilai_empat'));
    		$Nilai_lima		= htmlspecialchars($this->input->post('Nilai_lima'));
            $Catatan        = htmlspecialchars($this->input->post('Catatan'));
    		$Tanggal		= date('Y-m-d');

    		$this->Model_Kpempat_b->tambahData($No_identitas, $NIM, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima, $Catatan,  $Tanggal);
    		$this->session->set_flashdata('flash', 'Ditambahkan');
    		redirect('pembimbing/KP_TI_A04B');
    	}
    }

    public function Ubah()
    {
        $data['title']  = 'Pembimbing | KP-TI-A04B';
        $NIM = $_GET['NIM'];
        $data['ubah'] = $this->Model_Kpempat_b->getbyNIM($NIM);
        $this->load->view('pembimbing/ubah_dataEmpat_b', $data);
    }

    public function ubahData()
    {
      $data['title']  = 'Pembimbing | KP-TI-A04B';
        $Id_empatB      = $this->input->post('Id_empatB');
        $data['ubah'] = $this->Model_Kpempat_b->getbyId($Id_empatB);

        $this->form_validation->set_rules('Nilai_satu', 'Nilai', 'trim|required');
        $this->form_validation->set_rules('Nilai_dua', 'Nilai', 'trim|required');
        $this->form_validation->set_rules('Nilai_tiga', 'Nilai', 'trim|required');
        $this->form_validation->set_rules('Nilai_empat', 'Nilai', 'trim|required');
        $this->form_validation->set_rules('Nilai_lima', 'Nilai', 'trim|required');

        if($this->form_validation->run() == false ){
            $this->load->view('pembimbing/ubah_dataEmpat_b', $data);
        } else {
            $Id_empatB      = htmlspecialchars($this->input->post('Id_empatB'));
            $Nilai_satu     = htmlspecialchars($this->input->post('Nilai_satu'));
            $Nilai_dua      = htmlspecialchars($this->input->post('Nilai_dua'));
            $Nilai_tiga     = htmlspecialchars($this->input->post('Nilai_tiga'));
            $Nilai_empat    = htmlspecialchars($this->input->post('Nilai_empat'));
            $Nilai_lima     = htmlspecialchars($this->input->post('Nilai_lima'));
            $Catatan        = htmlspecialchars($this->input->post('Catatan'));
            $Tanggal        = date('Y-m-d');

            $this->Model_Kpempat_b->ubahData($Id_empatB, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima, $Catatan, $Tanggal);
            // var_dump($data);
            // die;
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pembimbing/KP_TI_A04B');
        }
    }
}