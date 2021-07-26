<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seminar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Model_Kptiga', 'Model_Jadwal', 'Model_Syarat', 'Model_Kpempat']);
        $this->load->library('form_validation');
        if (is_null($this->session->userdata('Admin'))) {
            redirect(base_url("admin/login"));
        }
    }

    public function index()
    {
        $data['cektiga'] = $this->Model_Kptiga->getAdmin();
        foreach ($data['cektiga'] as $data) {
            $NIM = $data->NIM;
        }
        $data = [
            'title'  => 'Admin | Pernyataan Siap Seminar',
            'tiga'   => $this->Model_Kptiga->cek_status(),
            'kptiga' => $this->Model_Kptiga->getAdmin(),
            'empat'  => $this->Model_Kpempat->getbyNIM($NIM)
        ];

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
        if ($this->form_validation->run() == false) {
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


    public function tambah($NIM)
    {
        $data['title']  = 'Admin | Jadwal Seminar';

        $data['jadwal'] = $this->Model_Kptiga->jadwalSeminar($NIM);
        $this->form_validation->set_rules('NIM', 'NIM', 'trim|required');
        $this->form_validation->set_rules('NIP', 'NIP', 'trim|required');
        $this->form_validation->set_rules('No_identitas', 'No identitas', 'trim|required');
        $this->form_validation->set_rules('Hari', 'Hari', 'trim|required');
        $this->form_validation->set_rules('Tanggal_seminar', 'Tanggal seminar', 'trim|required');
        $this->form_validation->set_rules('Waktu', 'Waktu', 'trim|required');
        $this->form_validation->set_rules('Ruangan', 'Ruangan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/tambah_dataEmpat', $data);
        } else {
            $NIM                = htmlspecialchars($this->input->post('NIM', true));
            $NIP                = htmlspecialchars($this->input->post('NIP', true));
            $No_identitas       = htmlspecialchars($this->input->post('No_identitas', true));
            $Hari               = htmlspecialchars($this->input->post('Hari', true));
            $Tanggal_seminar    = htmlspecialchars($this->input->post('Tanggal_seminar', true));
            $Waktu              = htmlspecialchars($this->input->post('Waktu', true));
            $Ruangan            = htmlspecialchars($this->input->post('Ruangan', true));
            $Tanggal            = date('Y-m-d');

            $this->kpempat->simpanData($NIM, $NIP, $No_identitas, $Hari, $Tanggal_seminar, $Waktu, $Ruangan, $Tanggal);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/seminar/jadwal');
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
            'title'     => 'Admin | Pernyataan Siap Seminar',
            'syarat'    => $this->Model_Syarat->getSyarat(),
            'jadwal'    => $this->Model_Jadwal->getAll()
        ];

        $this->form_validation->set_rules('Jumlah', 'Jumlah', 'trim|required');
        if ($this->form_validation->run() == false) {
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
