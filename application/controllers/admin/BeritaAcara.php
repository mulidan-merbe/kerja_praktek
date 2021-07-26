<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BeritaAcara extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Model_Kpempat', 'Model_Kpempat_a', 'Model_Kpempat_b', 'Model_Kpempat_c', 'Model_Jadwal', 'Model_Laporan']);
        $this->load->library('form_validation');
        if (is_null($this->session->userdata('Admin'))) {
            redirect(base_url("admin/login"));
        }
    }

    public function index()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];

            if ($filter == '1') {
                $data['title']  = 'Admin | Berita Acara';
                $NIM = $_GET['NIM'];
                $ket = 'Data Proposal Mahasiswa ' . $NIM;
                $cetak = 'beritaAcara/cetak?filter=1&NIM=' . $NIM;
                $data['nilai'] = $this->Model_Kpempat_c->getbyNIM($NIM);
            } elseif ($filter == '2') {
                $data['title']  = 'Admin | Berita Acara';
                $Periode = $_GET['Periode'];
                $ket = 'Data Proposal Periode ' . $Periode;
                $cetak = 'beritaAcara/cetak?filter=2&NIM=&Periode=' . $Periode;
                $data['nilai'] = $this->Model_Kpempat_c->getbyPeriode($Periode);
            }
        } else {
            $ket = 'Semua';
            $cetak = 'beritaAcara/cetak';
            $data = [
                'title'     =>  'Admin | Berita Acara',
                'nilai'     =>  $this->Model_Kpempat_c->getStatusDosen(),
                'mahasiswa' =>  $this->Model_Kpempat_c->getAll(),
                'periode'   => $this->Model_Jadwal->get()

            ];
        }



        $data['ket'] = $ket;
        $data['cetak'] = $cetak;
        $this->load->view('admin/tampil_dataEmpat_c', $data);
    }

    public function cetak()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];

            if ($filter == '1') {
                $data['title']  = 'Admin | Berita Acara';
                $NIM = $_GET['NIM'];
                $ket = 'Data DPNA Mahasiswa ' . $NIM;
                $data['nilai'] = $this->Model_Kpempat_c->getbyNIM($NIM);
            } elseif ($filter == '2') {
                $data['title']  = 'Admin | Berita Acara';
                $Periode = $_GET['Periode'];
                $ket = 'Data DPNA Periode ' . $Periode;
                $data['nilai'] = $this->Model_Kpempat_c->getbyPeriode($Periode);
            }
        } else {
            $ket = 'Semua DPNA';
            $data = [
                'title'     =>  'Admin | Berita Acara',
                'nilai'     =>  $this->Model_Kpempat_c->getStatusDosen(),
                'mahasiswa' =>  $this->Model_Kpempat_c->getAll(),
                'periode'   => $this->Model_Jadwal->get()

            ];
        }



        $data['ket'] = $ket;
        $this->load->view('Cetak/tampil_dpna', $data);
    }

    public function excel()
    {
        // if (isset($_GET['filter']) && !empty($_GET['filter'])) {
        //     $filter = $_GET['filter'];

        //     if ($filter == '1') {
        //         $NIM = $_GET['NIM'];
        //         $ket = 'Data DPNA Mahasiswa ' . $NIM;
        //         $data['nilai'] = $this->Model_Kpempat_c->getbyNIM($NIM);
        //     } elseif ($filter == '2') {
        //         $Periode = $_GET['Periode'];
        //         $ket = 'Data DPNA Periode ' . $Periode;
        //         $data['nilai'] = $this->Model_Kpempat_c->getbyPeriode($Periode);
        //     }
        // } else {
        //     $ket = 'Semua DPNA';
        //     $data = [
        //         'title'     =>  'Admin | Berita Acara',
        //         'nilai'     =>  $this->Model_Kpempat_c->getStatusDosen(),
        //         'mahasiswa' =>  $this->Model_Kpempat_c->getAll(),
        //         'periode'   => $this->Model_Jadwal->get()
        //     ];
        // }

        include_once APPPATH . '/third_party/xlsxwriter.class.php';
        ini_set('display_errors', 0);
        ini_set('log_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);

        $filename = "DPNA-" . date('d-m-Y-H-i-s') . ".xlsx";
        header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        $styles = array('widths' => [3, 20, 30, 40], 'font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#eee', 'halign' => 'center', 'border' => 'left,right,top,bottom');
        $styles2 = array(['font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#eee', 'halign' => 'left', 'border' => 'left,right,top,bottom', 'fill' => '#ffc'], ['fill' => '#fcf'], ['fill' => '#ccf'], ['fill' => '#cff'],);

        $header = array(
            'No' => 'integer',
            'NIM' => 'string',
            'Nama' => 'string',
            'Nilai' => 'string',
            'Status' => 'string',
            'Periode' => 'string',
        );

        $writer = new XLSXWriter();
        $writer->setAuthor('Informatika');

        $writer->writeSheetHeader('Sheet1', $header, $styles);
        $no = 1;
        foreach ($data['nilai'] as $row) {
            $writer->writeSheetRow('Sheet1', [$no, $row['NIM'], $row['NIM'], $row['NIM'], $row['NIM'], $row['NIM'], $row['NIM']], $styles2);
            $no++;
        }
        $writer->writeToStdOut();
    }

    public function lihat()
    {
        $NIM = $_GET['NIM'];
        $data = [
            'title' =>  'Admin | Berita Acara',
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
            'title' =>  'Admin | Berita Acara',
            'persentase'     => $this->Model_Kpempat_c->getPersentase(),
            'jadwal'    => $this->Model_Jadwal->getAll()
        ];
        $this->load->view('admin/tampil_dataPersentase', $data);
    }

    public function Detail($NIM)
    {
        $data['title']  = 'Admin | Berita Acara';
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
            'seminar'       => $this->Model_Kpempat->getAdmin(),
            'title'            => 'Admin | Berita Acara'
        ];

        $this->load->view('admin/tampil_dataSeminar', $data);
    }

    public function setuju()
    {
        $No_identitas      = $this->session->userdata('No_identitas');
        $NIM                = $_GET['setujui'];
        $data['id']     = $this->Model_Laporan->getbyNIMlimit($NIM);
        foreach ($data['id'] as $data) {
            $Id_periode = $data->Id_pelaksanaan;
        }
        $Status_kaprodi     = 2;
        $Tanggal_kaprodi    = date('Y-m-d');

        $this->Model_Kpempat_c->tambahDataKaprodi($Id_periode, $NIM, $No_identitas, $Status_kaprodi, $Tanggal_kaprodi);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/beritaAcara');
    }

    public function tolak()
    {
        $No_identitas      = $this->session->userdata('No_identitas');
        $NIM                = $_GET['setujui'];
        $Status_kaprodi     = 3;
        $Tanggal_kaprodi    = date('Y-m-d');

        $this->Model_Kpempat_c->tambahDataKaprodi($NIM, $No_identitas, $Status_kaprodi, $Tanggal_kaprodi);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/beritaAcara');
    }

    public function tambahPersentase()
    {
        $data = [
            'title' =>  'Admin | Berita Acara',
            'jadwal'    => $this->Model_Jadwal->getAll(),
            'persentase'     => $this->Model_Kpempat_c->getPersentase()
        ];

        $this->form_validation->set_rules('Nilai_lapangan', 'Nilai Lapangan', 'trim|required');
        $this->form_validation->set_rules('Nilai_Seminar_lapangan', 'Nilai Seminar Lapangan', 'trim|required');
        $this->form_validation->set_rules('Nilai_Seminar_dosen', 'Nilai Seminar Dosen', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/tampil_dataPersentase', $data);
        } else {
            $Id_pelaksanaan             = $this->input->post('Id_pelaksanaan');
            $Nilai_lapangan             = htmlspecialchars($this->input->post('Nilai_lapangan'));
            $Nilai_Seminar_lapangan     = htmlspecialchars($this->input->post('Nilai_Seminar_lapangan'));
            $Nilai_Seminar_dosen        = htmlspecialchars($this->input->post('Nilai_Seminar_dosen'));
            $Tanggal                    = date('Y-m-d');

            $this->Model_Kpempat_c->tambahDataPersentase($Id_pelaksanaan, $Nilai_lapangan, $Nilai_Seminar_lapangan, $Nilai_Seminar_dosen, $Tanggal);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/beritaAcara/persentase');
        }
    }

    public function ubahPersentase()
    {
        $data = [
            'title' =>  'Admin | Berita Acara',
            'persentase'     => $this->Model_Kpempat_c->getPersentase()
        ];

        $this->form_validation->set_rules('Nilai_lapangan', 'Nilai Lapangan', 'trim|required');
        $this->form_validation->set_rules('Nilai_Seminar_lapangan', 'Nilai Seminar Lapangan', 'trim|required');
        $this->form_validation->set_rules('Nilai_Seminar_dosen', 'Nilai Seminar Dosen', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/tampil_dataPersentase', $data);
        } else {
            $Id                         = $this->input->post('Id');
            $Nilai_lapangan             = htmlspecialchars($this->input->post('Nilai_lapangan'));
            $Nilai_Seminar_lapangan     = htmlspecialchars($this->input->post('Nilai_Seminar_lapangan'));
            $Nilai_Seminar_dosen        = htmlspecialchars($this->input->post('Nilai_Seminar_dosen'));
            $Tanggal                    = date('Y-m-d');

            $this->Model_Kpempat_c->ubahDataPersentase($Id, $Nilai_lapangan, $Nilai_Seminar_lapangan, $Nilai_Seminar_dosen, $Tanggal);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/beritaAcara/persentase');
        }
    }

    public function Ubah()
    {
        $data['title']  = 'Admin | Berita Acara';
        $NIM    = $_GET['NIM'];
        $data['empatA'] = $this->Model_Kpempat_a->getbyNIM($NIM);
        $data['empatB'] = $this->Model_Kpempat_b->getbyNIM($NIM);
        $data['nilai']   = $this->Model_Kpempat_c->getbyNIMAdmin($NIM);
        $this->load->view('admin/ubah_dataEmpat_c', $data);
    }

    public function hapus($Id)
    {
        $this->Model_Kpempat_c->hapusData($Id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/beritaAcara/persentase');
    }
}
