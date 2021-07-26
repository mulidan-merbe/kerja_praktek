<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Model_Laporan', 'Model_Jadwal']);
        $this->load->library('form_validation');
        if (is_null($this->session->userdata('Admin'))) {
            redirect(base_url("admin/login"));
        }
    }

    public function index()
    {
        $data['title']  = 'Admin | Laporan ';
        $data['tahun'] = $this->Model_Jadwal->Tahun();

        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];

            if ($filter == '1') {

                $Tahun = $_GET['Tahun'];
                $ket = 'Data Laporan Tahun ' . $Tahun;
                $cetak = 'laporan/cetak?filter=1&Tahun=' . $Tahun;
                $data['dataLaporan'] = $this->Model_Laporan->lihatTahun($Tahun);
            } elseif ($filter == '2') {
                $NIP = $_GET['NIP'];
                $ket = 'Data Laporan' . $NIP;
                $cetak = 'laporan/cetak?filter=2&Tahun=&NIP=' . $NIP;
                $data['dataLaporan'] = $this->Model_Laporan->getbydataNIP($NIP);
            }
        } else {
            $ket = 'Data Semua Laporan';
            $cetak = 'laporan/cetak';
            $data['dataLaporan'] = $this->Model_Laporan->getAll();
        }

        $data['ket'] = $ket;
        $data['cetak'] = $cetak;
        $this->load->view('admin/tampil_dataLaporan', $data);
    }

    public function cetak()
    {
        $data['title']  = 'Admin | Laporan ';
        $data['tahun'] = $this->Model_Jadwal->Tahun();

        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];

            if ($filter == '1') {

                $Tahun = $_GET['Tahun'];
                $ket = 'Data Laporan Tahun ' . $Tahun;
                $laporan = $data['dataLaporan'] = $this->Model_Laporan->lihatTahun($Tahun);
            } elseif ($filter == '2') {
                $NIP = $_GET['NIP'];
                $ket = $NIP;
                $laporan = $data['dataLaporan'] = $this->Model_Laporan->getbydataNIP($NIP);
            }
        } else {
            $ket = 'Data Laporan Tahun ';
            $laporan = $data['dataLaporan'] = $this->Model_Laporan->getAll();
        }

        $data['ket'] = $ket;
        $data['laporan'] = $laporan;

        $this->load->library('Mypdf');
        $this->mypdf->generate('Cetak/laporan', $data);
    }
}
