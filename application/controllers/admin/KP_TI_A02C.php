<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KP_TI_A02C extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Kpdua_c', 'kpduaC');
        $this->load->library('form_validation');
        if (is_null($this->session->userdata('Admin'))) {
            redirect(base_url("admin/login"));
        }
    }

    public function index()
    {
        $data['title']  = 'Admin | KP-TI-A02C';
        $data['dua_C'] = $this->kpduaC->getAll();
        $this->load->view('admin/tampil_dataDua_c', $data);
    }
}
