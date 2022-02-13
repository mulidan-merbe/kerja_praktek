<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Model_Laporan', 'Model_Pembimbing_lapangan', 'Model_Proposal', 'Model_Kpempat_c', 'Model_Kpempat_a', 'Model_Kpempat_b', 'Model_Jadwal']);
        $this->load->library('form_validation');
        if (is_null($this->session->userdata('Login'))) {
            redirect(base_url("mahasiswa/login"));
        }
    }

    public function index()
    {
        $NIM  = $this->session->userdata('NIM');
        $data = [
            'title'                => 'Mahasiswa | Laporan ',
            'laporan'           => $this->Model_Laporan->getbyNIM($NIM),
            'cekBA'             => $this->Model_Kpempat_c->cekStatus($NIM),
            'catatanDosen'      => $this->Model_Kpempat_a->getbyNIM($NIM),
            'catatanLapangan'   => $this->Model_Kpempat_b->getbyNIM($NIM),
            'jadwal'            => $this->Model_Jadwal->getAll()
        ];

        $this->load->view('mahasiswa/tampil_dataLaporan', $data);
    }

    public function tambah()
    {
        $NIM    = $this->session->userdata('NIM');
        $data = [
            'title'         => 'Mahasiswa | Laporan ',
            'dosen'         => $this->Model_Proposal->getbyNIM($NIM),
            'pembimbing'    => $this->Model_Pembimbing_lapangan->getbyNIM($NIM),
            'jadwal'        => $this->Model_Jadwal->getAll()
        ];


        $this->form_validation->set_rules('NIM', 'NIM', 'trim|required');
        $this->form_validation->set_rules('Keterangan', 'Keterangan', 'trim|required');
        if (empty($_FILES['Berkas']['name'])) {
            $this->form_validation->set_rules('Berkas', 'Berkas', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('mahasiswa/tambah_dataLaporan', $data);
        } else {


            $config['upload_path'] = 'assets/laporan/file/';
            $config['allowed_types'] = 'zip|rar|pdf';
            $config['max_size']      = 10000;
            $new_name = $NIM . "-" . $_FILES["Berkas"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            // Cek apakah berkas sudah sesuai dengan konfigurasi
            if (!$this->upload->do_upload('Berkas')) {
                $this->session->set_flashdata('message', '<small class="text-danger pl-3">Berkas tidak sesuai</small>');
                $this->load->view('mahasiswa/tambah_dataLaporan', $data);
            } else {
                $config             = $this->upload->data();
                $Id_pelaksanaan     = $this->input->post('Id_pelaksanaan');
                $NIM                = $this->session->userdata('NIM');
                $NIP                = $this->input->post('NIP');
                $No_identitas       = $this->input->post('No_identitas');
                $Keterangan         = $this->input->post('Keterangan');
                $Berkas             = $config['file_name'];
                $Tanggal            = date('Y-m-d');

                $this->Model_Laporan->tambahData($Id_pelaksanaan, $NIM, $NIP, $No_identitas, $Keterangan,  $Berkas, $Tanggal);
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('mahasiswa/laporan');
            }
        }
    }


    public function ubah($Id_laporan)
    {
        $data['title']  = 'Mahasiswa | Laporan ';
        // $NIM    = $_GET['NIM'];
        $data['ubah']   = $this->Model_Laporan->getbyId($Id_laporan);
        $this->load->view('mahasiswa/ubah_dataLaporan', $data);
    }

    public function ubahData()
    {
        $NIM = $this->session->userdata('NIM');
        $data['title']  = 'Mahasiswa | Laporan ';
        $Id_laporan    = $this->input->post('Id_laporan');
        $data['ubah']   = $this->Model_Laporan->getbyId($Id_laporan);


        $config['upload_path'] = 'assets/laporan/file/';
        $config['allowed_types'] = 'zip|rar|pdf';
        $config['max_size']      = 10000;
        $new_name = $NIM . "-" . $_FILES["Berkas"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        // Cek apakah ada berkas yang diuploud atau tidak
        if (!empty($_FILES['Berkas']['name'])) {
            // Cek apakah Berkasi sudah sesuai dengan konfigurasi
            if (!$this->upload->do_upload('Berkas')) {
                $this->session->set_flashdata('message', '<small class="text-danger pl-3">Berkas tidak sesuai</small>');
                $this->load->view('mahasiswa/ubah_dataLaporan', $data);
            } else {

                $NIM         = $this->input->post('NIM');
                $Keterangan  = $this->input->post('Keterangan');
                $Id_laporan   = $this->input->post('Id_laporan');
                $Berkas   = trim($this->input->post('Berkas'));
                $data        = $this->Model_Laporan->getbyId($Id_laporan);
                // $new_name = $NIM . "-" . $_FILES["Berkas"]['name'];
                // var_dump($new_name);
                // die;
                $proses      = 'assets/laporan/file/' . $Berkas;
                // $proses      = 'assets/laporan/file/D1041131036-Sertifikat.pdf';
                unlink($proses);

                $config         = $this->upload->data();
                // $new_name = $NIM . "-" . $_FILES["Berkas"]['name'];
                // $config['file_name'] = $new_name;
                $Berkas          = $config['file_name'];
                $Tanggal        = date('Y-m-d');

                $this->Model_Laporan->ubahData($NIM, $Keterangan, $Berkas, $Tanggal);
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('mahasiswa/laporan');
            }
            // Kondisi dimana tidak ada file terbaru yg diuploud. Maka yg diuploud adalah file yg lama
        } else {
            $NIM            = $this->input->post('NIM');
            $Keterangan     = $this->input->post('Keterangan');
            $Berkas         = $this->input->post('old_file');
            $Tanggal        = date('Y-m-d');

            $this->Model_Laporan->ubahData($NIM, $Keterangan, $Berkas, $Tanggal);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mahasiswa/laporan');
        }
    }
}
