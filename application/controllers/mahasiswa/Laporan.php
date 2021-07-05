<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Laporan', 'Model_Pembimbing_lapangan', 'Model_Proposal','Model_Kpempat_c','Model_Kpempat_a','Model_Kpempat_b','Model_Jadwal']);
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }
    }

    public function index()
    {
    	$NIM  = $this->session->userdata('NIM');
    	$data = [
            'title'	            => 'Mahasiswa | Laporan ',
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

        if($this->form_validation->run() == false) 
        { 
            $this->load->view('mahasiswa/tambah_dataLaporan', $data);
        
        } else 
        {
        

        $config['upload_path'] = 'assets/laporan/file/';
        $config['allowed_types'] = 'zip|rar';
        $config['max_size']      = 10000;
        $this->load->library('upload' , $config);
                // Cek apakah berkas sudah sesuai dengan konfigurasi
            if (!$this->upload->do_upload('Berkas')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berkas tidak sesuai</div>' );
                $this->load->view('mahasiswa/tambah_dataLaporan', $data);
            } else {
            $result             = $this->upload->data();
            $Id_pelaksanaan     = $this->input->post('Id_pelaksanaan');
            $NIM                = $this->session->userdata('NIM');
            $NIP                = $this->input->post('NIP');
            $No_identitas       = $this->input->post('No_identitas');
            $Keterangan         = $this->input->post('Keterangan');
            $Berkas             = $result['file_name'];
            $Tanggal            = date('Y-m-d');

            $this->Model_Laporan->tambahData($Id_pelaksanaan, $NIM, $NIP, $No_identitas, $Keterangan,  $Berkas, $Tanggal);
            $this->session->set_flashdata('flash', 'Ditambahkan');
             redirect('mahasiswa/laporan');
            }
        }
    }


    public function ubah($NIM)
    {
        $data['title']  = 'Mahasiswa | Laporan ';
        // $NIM    = $_GET['NIM'];
        $data['ubah']   = $this->Model_Laporan->getbyNIM($NIM);
        $this->load->view('mahasiswa/ubah_dataLaporan', $data);
    }

    public function ubahData()
    {
        $data['title']  = 'Mahasiswa | Laporan ';
        $NIM    = $this->input->post('NIM');
        $data['ubah']   = $this->Model_Laporan->getbyNIM($NIM);
        

        $config['upload_path'] = 'assets/laporan/file/';
        $config['allowed_types'] = 'zip|rar';
        $config['max_size']      = 10000;
        $this->load->library('upload', $config);

        // Cek apakah ada berkas yang diuploud atau tidak
        if(!empty($_FILES['Berkas']['name']))
        {
            // Cek apakah Berkasi sudah sesuai dengan konfigurasi
            if (!$this->upload->do_upload('Berkas')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berkas tidak sesuai</div>' );
                $this->load->view('mahasiswa/ubah_dataLaporan', $data);
            }else{
                    
                $NIM         = $this->input->post('NIM');
                $Keterangan  = $this->input->post('Keterangan');
                $data        = $this->Model_Laporan->getDatabyNIM($NIM);
                $proses      = 'assets/laporan/file/'.$data->Berkas;
                unlink($proses);

                $result         = $this->upload->data();
                $Berkas          = $result['file_name'];
                $Tanggal        = date('Y-m-d');

                $this->Model_Laporan->ubahData($NIM, $Keterangan, $Berkas, $Tanggal);
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('mahasiswa/laporan');
                }
        // Kondisi dimana tidak ada file terbaru yg diuploud. Maka yg diuploud adalah file yg lama
        }else {
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