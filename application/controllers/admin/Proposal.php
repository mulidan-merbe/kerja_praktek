<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proposal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model(['Model_Proposal', 'Model_Jadwal', 'Model_Kpdua']);
		if (is_null($this->session->userdata('Admin'))) {
			redirect(base_url("admin/login"));
		}
	}

	public function index()
	{
		$data['title']  = 'Admin | Proposal';

		$data['tahun'] = $this->Model_Jadwal->Tahun();



		// var_dump($data['tahun']);
		// die;
		if (isset($_GET['filter']) && !empty($_GET['filter'])) {
			$filter = $_GET['filter'];

			if ($filter == '1') {
				$Tahun = $_GET['Tahun'];
				$Periode = $_GET['Periode'];
				$ket = 'Data Proposal Periode ' . $Tahun . '/' . $Periode;
				$cetak	= 'proposal/cetak?filter1&Tahun=' . $Tahun . '&NIP=&Periode=' . $Periode;
				$data['dataProposal'] = $this->Model_Proposal->lihatPeriode($Tahun, $Periode);
			} elseif ($filter == '2') {
				$Tahun = $_GET['Tahun'];
				$ket = 'Data Proposal Tahun ' . $Tahun;
				$cetak = 'proposal/cetak?filter=2&Tahun=' . $Tahun . '&NIP=&Periode=';
				$data['dataProposal'] = $this->Model_Proposal->lihatTahun($Tahun);
			} elseif ($filter == '3') {
				$NIP = $_GET['NIP'];
				$ket = $NIP;
				$cetak = 'proposal/cetak?filter=3&Tahun=&NIP=' . $NIP . '&Periode=';
				$data['dataProposal'] = $this->Model_Proposal->getbydataNIP($NIP);
			}
		} else {
			$ket = 'Semua Data Proposal';
			$cetak = 'proposal/cetak';
			$data['dataProposal'] = $this->Model_Proposal->getAllAdmin();
		}

		$data['ket'] = $ket;
		$data['cetak'] = $cetak;
		$this->load->view('admin/tampil_dataProposal', $data);
	}

	public function cetak()
	{
		$data['title']  = 'Admin | Proposal';

		$data['tahun'] = $this->Model_Jadwal->Tahun();

		// if (isset($_GET['filter']) && !empty($_GET['filter'])) {
		// 	$filter = $_GET['filter'];

		// 	if ($filter == '1') {

		// 		$Tahun = $_GET['Tahun'];
		// 		$ket = 'Data Proposal Tahun ' . $Tahun;
		// 		$proposal = $data['dataProposal'] = $this->Model_Proposal->lihatTahun($Tahun);
		// 	} elseif ($filter == '2') {
		// 		$NIP = $_GET['NIP'];
		// 		$ket = 'Data Proposal Dosen Pembimbing' . $NIP;
		// 		$proposal = $data['dataProposal'] = $this->Model_Proposal->getbydataNIP($NIP);
		// 	}
		// } else {
		// 	$ket = 'Data Semua Proposal ';
		// 	$proposal = $data['dataProposal'] = $this->Model_Proposal->getAllAdmin();
		// }

		if (isset($_GET['filter']) && !empty($_GET['filter'])) {
			$filter = $_GET['filter'];

			if ($filter == '1') {
				$Tahun = $_GET['Tahun'];
				$Periode = $_GET['Periode'];
				$ket = 'Data Proposal Periode ' . $Tahun . '/' . $Periode;
				$proposal = $data['dataProposal'] = $this->Model_Proposal->lihatPeriode($Tahun, $Periode);
			} elseif ($filter == '2') {
				$Tahun = $_GET['Tahun'];
				$ket = 'Data Proposal Tahun ' . $Tahun;
				$proposal = $data['dataProposal'] = $this->Model_Proposal->lihatTahun($Tahun);
			} elseif ($filter == '3') {
				$NIP = $_GET['NIP'];
				$ket = $NIP;
				$proposal = $data['dataProposal'] = $this->Model_Proposal->getbydataNIP($NIP);
			}
		} else {
			$ket = 'Semua Data Proposal';
			$proposal = $data['dataProposal'] = $this->Model_Proposal->getAllAdmin();
		}

		$data['ket'] = $ket;
		$data['proposal'] = $proposal;

		//       $this->load->library('mypdf');
		// $this->mypdf->generate('Cetak/proposal', $data);
		$this->load->view('Cetak/test', $data);
	}

	public function suratPengantar()
	{
		$Id = $this->Model_Jadwal->getAll();
		foreach ($Id as $data) {
			$Id = $data->Id_pelaksanaan;
		}

		$Id_pelaksanaan = $Id;
		$data = [
			'title'  => 'Admin | Surat Pengantar',
			'proposal'	=> $this->Model_Proposal->caribyId($Id_pelaksanaan),
			'kpdua' => $this->Model_Kpdua->getAll()
		];
		$this->load->view('admin/tampil_dataDua', $data);
	}

	// surat pengantar
	public function tambahSuratPengantar()
	{
		$data['title']  = 'Admin | Proposal';
		$data['tahun'] = $this->Model_Jadwal->Tahun();



		// var_dump($data['tahun']);
		// die;
		if (isset($_GET['filter']) && !empty($_GET['filter'])) {
			$filter = $_GET['filter'];

			if ($filter == '1') {
				$Tahun = $_GET['Tahun'];
				$Periode = $_GET['Periode'];
				$ket = 'Data Proposal Periode ' . $Tahun . '/' . $Periode;
				$cetak	= 'proposal/cetak?filter1&Tahun=' . $Tahun . '&NIP=&Periode=' . $Periode;
				$data['dataProposal'] = $this->Model_Proposal->lihatPeriode($Tahun, $Periode);
			} elseif ($filter == '2') {
				$Tahun = $_GET['Tahun'];
				$ket = 'Data Proposal Tahun ' . $Tahun;
				$cetak = 'proposal/cetak?filter=2&Tahun=' . $Tahun . '&NIP=&Periode=';
				$data['dataProposal'] = $this->Model_Proposal->lihatTahun($Tahun);
			} elseif ($filter == '3') {
				$NIP = $_GET['NIP'];
				$ket = $NIP;
				$cetak = 'proposal/cetak?filter=3&Tahun=&NIP=' . $NIP . '&Periode=';
				$data['dataProposal'] = $this->Model_Proposal->getbydataNIP($NIP);
			}
		} else {
			$ket = 'Semua Data Proposal';
			$cetak = 'proposal/cetak';
			$data['dataProposal'] = $this->Model_Proposal->getAllAdmin();
		}

		$data['ket'] = $ket;
		$data['cetak'] = $cetak;

		if (empty($_FILES['File']['name'])) {
			$this->form_validation->set_rules('File', 'Berkas', 'required');
			$this->load->view('admin/tampil_dataProposal', $data);
		} else {

			$config['upload_path'] = 'assets/KP_TI_A02/file/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']      = 5000;
			$this->load->library('upload', $config);
			// Cek apakah berkas sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('File')) {
				$this->session->set_flashdata('message', '<small class="text-danger pl-3">Berkas tidak sesuai</small>');
				$this->load->view('admin/tampil_dataProposal', $data);
			} else {
				$result        	  =  $this->upload->data();
				$NIM 	  		  = htmlspecialchars($this->input->post('NIM', true));
				$File 			  =	$result['file_name'];
				$Tanggal		  = date('Y-m-d');

				$this->Model_Kpdua->tambahDataSuratPengantar($NIM, $File, $Tanggal);
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('admin/proposal/suratPengantar');
			}
		}
	}

	public function ubah($Id_Kpdua)
	{
		$data['title']  = 'Admin | KP-TI-A02';
		// $Id_Kpdua = $_GET['Id'];
		$data['ubah'] = $this->Model_Kpdua->getbyId($Id_Kpdua);
		$this->load->view('admin/ubah_dataDua', $data);
	}

	// surat pengantar
	public function ubahData()
	{
		$data['title']  = 'Admin | KP-TI-A02';
		$Id_Kpdua	= $this->input->post('Id');
		$data['ubah'] 	= $this->Model_Kpdua->getbyId($Id_Kpdua);


		$config['upload_path'] = 'assets/KP_TI_A02/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 5000;
		$this->load->library('upload', $config);

		// Cek apakah ada berkas yang diuploud atau tidak
		if (!empty($_FILES['File']['name'])) {
			// Cek apakah Filei sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('File')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File tidak sesuai</div>');
				$this->load->view('admin/tambah_dataDuaaa', $data);
			} else {

				$Id_Kpdua 	 = $this->input->post('Id');
				$data 		 = $this->Model_Kpdua->getDatabyId($Id_Kpdua);
				$proses 	 = 'assets/KP_TI_A02/file/' . $data->File;
				unlink($proses);

				$result         = $this->upload->data();
				$NIM 			= htmlspecialchars($this->input->post('NIM'));
				$nama 			= htmlspecialchars($this->input->post('nama'));
				$File           = $result['file_name'];
				$Tanggal		= date('Y-m-d');

				$this->Model_Kpdua->ubahData($Id_Kpdua, $NIM, $nama, $File, $Tanggal);
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('admin/proposal/suratPengantar');
			}
			// Kondisi dimana tidak ada file terbaru yg diuploud. Maka yg diuploud adalah file yg lama
		} else {
			$Id_Kpdua 		= $this->input->post('Id');
			$NIM 			= htmlspecialchars($this->input->post('NIM'));
			$nama 			= htmlspecialchars($this->input->post('nama'));
			$File  			= $this->input->post('old_file');
			$Tanggal		= date('Y-m-d');

			$this->Model_Kpdua->ubahData($Id_Kpdua, $NIM, $nama, $File, $Tanggal);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/proposal/suratPengantar');
		}
	}

	// hapus surat pernyataan
	public function hapus($Id_Kpdua)
	{
		// $Id  = $_GET['Id'];
		$data = $this->Model_Kpdua->getDatabyId($Id_Kpdua);
		$proses = 'assets/KP_TI_A02/file/' . $data->File;
		if (is_readable($proses) && unlink($proses)) {
			$hapus =	$this->Model_Kpdua->hapusData($Id_Kpdua);
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect('admin/proposal/suratPengantar');
		} else {
			'error';
		}
	}
}
