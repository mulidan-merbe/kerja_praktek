
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Kpempat_a','Model_Kpempat','Model_Jadwal']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Dosen'))) {
	    	redirect(base_url("auth_dosen"));
	    }
    }

    public function index()
    {
        $data['title']  = 'Dosen | Penilaian Seminar';
    	$NIP = $this->session->userdata('NIP');
    	$data['jadwal'] = $this->Model_Kpempat->getbyNIP($NIP);
    	$data['seminar'] = $this->Model_Kpempat_a->getbyNIP($NIP);
    	$this->load->view('dosen/tampil_dataEmpat_A', $data);
    	// $this->load->view('dosen/tampil_dataEmpat_A');
    }

    public function jadwal()
    {
        $data['title']  = 'Dosen | Penilaian Seminar';
    	$NIP = $this->session->userdata('NIP');

    	$data['jadwal'] = $this->Model_Kpempat->getbyNIP($NIP);
    	$this->load->view('dosen/tampil_jadwalSeminar', $data);
    }


    public function tambah($NIM)
    {
        $NIM            = $NIM;
        $data = [
            'title'     => 'Dosen | Penilaian Seminar',
            'nilai'     => $this->Model_Kpempat_a->getbyNIM($NIM),
            'jadwal'    => $this->Model_Kpempat->getbyNIM($NIM)
        ];
        $this->load->view('dosen/tambah_dataEmpat_A', $data);
    }

    public function tambahData()
    {
        $NIP            = $this->session->userdata('NIP');
        $NIM            = $this->input->post('NIM');
    	$data = [
            'title'     => 'Dosen | Penilaian Seminar',
            'nilai'     => $this->Model_Kpempat_a->getbyNIM($NIM),
            'jadwal'    => $this->Model_Kpempat->getbyNIM($NIM)
        ];

    	$this->form_validation->set_rules('Nilai_satu', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_dua', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_tiga', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_empat', 'Nilai', 'trim|required');
    	$this->form_validation->set_rules('Nilai_lima', 'Nilai', 'trim|required');

    	if($this->form_validation->run() == false ){
    		$this->load->view('dosen/tambah_dataEmpat_A', $data);
    	} else {
    		$NIP 			= $this->session->userdata('NIP');
    		$NIM 			= $this->input->post('NIM');
    		$Nilai_satu		= htmlspecialchars($this->input->post('Nilai_satu', true));
    		$Nilai_dua		= htmlspecialchars($this->input->post('Nilai_dua', true));
    		$Nilai_tiga		= htmlspecialchars($this->input->post('Nilai_tiga', true));
    		$Nilai_empat	= htmlspecialchars($this->input->post('Nilai_empat', true));
    		$Nilai_lima		= htmlspecialchars($this->input->post('Nilai_lima', true));
            $Catatan        = htmlspecialchars($this->input->post('Catatan', true));
    		$Tanggal		= date('Y-m-d');

    		$this->Model_Kpempat_a->tambahData($NIP, $NIM, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima, $Catatan,  $Tanggal);
    		$this->session->set_flashdata('flash', 'Ditambahkan');
    		redirect('dosen/Penilaian');
    	}
    }

    public function ubah($NIM)
    {
        $data['title']  = 'Dosen | Penilaian Seminar';
        $NIM = $NIM;
        $data['ubah'] = $this->Model_Kpempat_a->getbyNIM($NIM);
        $data['pelaksanaan'] = $this->Model_Jadwal->getAll();
        $this->load->view('dosen/ubah_dataEmpat_A', $data);
    }

    public function ubahData()
    {
        $data['title']  = 'Dosen | Penilaian Seminar';
        $Id_empatA      = $this->input->post('Id_empatA');
        $data['ubah']   = $this->Model_Kpempat_a->getbyId($Id_empatA);
        $data['pelaksanaan'] = $this->Model_Jadwal->getAll();

        $this->form_validation->set_rules('Nilai_satu', 'Nilai', 'trim|required');
        $this->form_validation->set_rules('Nilai_dua', 'Nilai', 'trim|required');
        $this->form_validation->set_rules('Nilai_tiga', 'Nilai', 'trim|required');
        $this->form_validation->set_rules('Nilai_empat', 'Nilai', 'trim|required');
        $this->form_validation->set_rules('Nilai_lima', 'Nilai', 'trim|required');

        if($this->form_validation->run() == false ){
            $this->load->view('dosen/ubah_dataEmpat_A', $data);
        } else {
            $Id_empatA      = htmlspecialchars($this->input->post('Id_empatA'));
            $Nilai_satu     = htmlspecialchars($this->input->post('Nilai_satu'));
            $Nilai_dua      = htmlspecialchars($this->input->post('Nilai_dua'));
            $Nilai_tiga     = htmlspecialchars($this->input->post('Nilai_tiga'));
            $Nilai_empat    = htmlspecialchars($this->input->post('Nilai_empat'));
            $Nilai_lima     = htmlspecialchars($this->input->post('Nilai_lima'));
            $Catatan        = htmlspecialchars($this->input->post('Catatan'));
            $Tanggal        = date('Y-m-d');

            $this->Model_Kpempat_a->ubahData($Id_empatA, $Nilai_satu, $Nilai_dua, $Nilai_tiga, $Nilai_empat, $Nilai_lima, $Catatan,  $Tanggal);
            // var_dump($data);
            // die;
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('dosen/Penilaian');
        }
    }
}

