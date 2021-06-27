<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seminar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Model_Kptiga', 'Model_Jadwal','Model_Syarat','Model_Kpempat']);
        $this->load->library('form_validation');
        if (is_null($this->session->userdata('Admin'))) {
            redirect(base_url("auth_admin"));
        }
    }

    public function index()
    {
        $data['title']  = 'Admin | Pernyataan Siap Seminar';
        $data['kptiga'] = $this->Model_Kptiga->getAdmin();

        $this->load->view('admin/tampil_datatiga', $data);
        // }
    }

    public function jadwal()
      {
        $data['title']  = 'Admin | Jadwal Seminar';
        $data['kpempat'] = $this->Model_Kpempat->getAdmin();
        $this->load->view('admin/tampil_dataEmpat', $data);

      }

    public function syaratPengajuan()
    {
        $data = [
            'title'     => 'Admin | KP-TI-A03',
            'syarat'    => $this->Model_Syarat->getSyarat(),
            'jadwal'    => $this->Model_Jadwal->getAll()
        ];
         
        $this->form_validation->set_rules('Jumlah', 'Jumlah', 'trim|required');
        if($this->form_validation->run() == false ) 
        {
            $this->load->view('admin/tampil_dataSyarat', $data);
        } else {
          
            $Id_pelaksanaan   = $this->input->post('Id_pelaksanaan');
            $Jumlah           = htmlspecialchars($this->input->post('Jumlah', true));
            $Tanggal          = date('Y-m-d');

            $this->Model_Syarat->tambahData($Id_pelaksanaan, $Jumlah, $Tanggal);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/KP_TI_A03/syaratPengajuan');
        }
    }

    public function ubah()
    {
        $Id = $_GET['Id'];
        $data['syaratbyId'] = $this->Model_Syarat->syaratbyId($Id);
        $this->load->view('admin/tampil_dataSyarat', $data);
    }

    public function ubahData()
    {
        $data = [
            'title'     => 'Admin | KP-TI-A03',
            'syarat'    => $this->Model_Syarat->getSyarat(),
            'jadwal'    => $this->Model_Jadwal->getAll()
        ];

        $this->form_validation->set_rules('Jumlah', 'Jumlah', 'trim|required');
        if($this->form_validation->run() == false ) 
        {
            $this->load->view('admin/tampil_dataSyarat', $data);
        } else {
          
            $Id         = $this->input->post('Id');
            $Jumlah     = htmlspecialchars($this->input->post('Jumlah', true));
            $Tanggal    = date('Y-m-d');

            $this->Model_Syarat->ubahData($Id, $Jumlah, $Tanggal);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/KP_TI_A03/syaratPengajuan');
        }
    }
    public function hapusData()
    {
        $Id = $_GET['Id'];
        $hapus =    $this->Model_Syarat->hapusData($Id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/KP_TI_A03/syaratPengajuan');
    }

}
