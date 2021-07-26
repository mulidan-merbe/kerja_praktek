<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Model_Kpempat_a', 'Model_Kpempat_b', 'Model_Kpdua_c']);
        $this->load->library('form_validation');
        if (is_null($this->session->userdata('Admin'))) {
            redirect(base_url("admin/login"));
        }
    }

    public function index()
    {
        $data['title']  = 'Admin | Penilaian Lapangan';
        $data['dua_C'] = $this->Model_Kpdua_c->getAll();
        $this->load->view('admin/tampil_dataDua_c', $data);
    }

    public function seminarDosen()
    {

        $data['title']  = 'Admin | Penilaian Seminar Dosen';
        $data['empat_A'] = $this->Model_Kpempat_a->getAdmin();
        $this->load->view('admin/tampil_dataEmpat_a', $data);
    }

    public function seminarLapangan()
    {

        $data['title']  = 'Admin | Penilaian Seminar Lapangan';
        $data['empat_B'] = $this->Model_Kpempat_b->getAdmin();
        $this->load->view('admin/tampil_dataEmpat_b', $data);
    }
}
