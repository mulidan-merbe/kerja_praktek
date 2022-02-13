<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

class Topik extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		require APPPATH . 'libraries/phpmailer/src/Exception.php';
		require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH . 'libraries/phpmailer/src/SMTP.php';
		$this->load->model(['Model_tawaranTopik', 'Model_Jadwal', 'Model_Pengajuan', 'Model_rencanaTopik']);
		if (is_null($this->session->userdata('Admin'))) {
			redirect(base_url("admin/login"));
		}
	}

	public function index()
	{
		$data['title']  = 'Admin | Tawaran Topik';
		$data['tawaranJudul'] = $this->Model_tawaranTopik->getAll();

		// if($data['tawaranJudul'] != 404) {
		$this->load->view('admin/tampil_dataTopik', $data);
		// }else {
		// 	$this->load->view('mahasiswa/no_dataTawaranJudul');
		// }       
	}

	public function pengajuan()
	{
		$data['title']  = 'Admin | Pengajuan Topik';
		$data['PengajuanJudul'] = $this->Model_Pengajuan->getAll();

		$this->load->view('admin/tampil_dataPengajuanTopik', $data);
	}

	public function rencana()
	{
		$data['title']  = 'Admin | Rencana Topik';
		$NIP = $this->session->userdata('No_identitas');
		$data['rencanaTopik'] = $this->Model_rencanaTopik->getbyNIP($NIP);
		$this->load->view('admin/tampil_rencanaTopik', $data);
	}

	public function tambah()
	{
		$data['title']  = 'Admin | Tawaran Topik';
		$data['jadwal'] = $this->Model_Jadwal->getAll();
		$this->form_validation->set_rules('topik', 'Topik', 'trim|required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('Jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('No_hp', 'No Handphone', 'trim|required');
		$this->form_validation->set_rules('Instansi', 'Instansi ', 'trim|required');

		if ($this->form_validation->run() == false) {

			$this->load->view('admin/tambah_tawaranTopik', $data);
		} else {
			$topik 			 = htmlspecialchars($this->input->post('topik'));
			$Alamat 		 = htmlspecialchars($this->input->post('Alamat'));
			$Jumlah 		 = htmlspecialchars($this->input->post('Jumlah'));
			$No_hp 			 = htmlspecialchars($this->input->post('No_hp'));
			$Instansi 		 = htmlspecialchars($this->input->post('Instansi'));
			$NIP		 	 = $this->session->userdata("No_identitas");
			$Username		 = $this->session->userdata("Nama");
			$Id_pelaksanaan  = $this->input->post('Id_pelaksanaan');
			$Tanggal     	 = format_indo(date('Y-m-d'));
			$this->Model_tawaranTopik->tambahData($NIP, $topik, $Alamat, $Jumlah, $No_hp, $Instansi, $Username, $Id_pelaksanaan, $Tanggal);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/topik');
		}
	}

	public function ubah($Id_tawaranjudul)
	{
		$data['title']	= 'Admin | Tawaran Topik';
		$Id_tawaranjudul = $Id_tawaranjudul;
		$data['tawaran'] = $this->Model_tawaranTopik->getbyId($Id_tawaranjudul);
		$this->load->view('admin/ubah_dataTawaranTopik', $data);
	}

	public function ubahData()
	{
		$data['title']	= 'Admin | Tawaran Topik';
		$Id_tawaranjudul	= $this->input->post('Id_tawaranjudul');
		$data['tawaran'] = $this->Model_tawaranTopik->getbyId($Id_tawaranjudul);

		$this->form_validation->set_rules('topik', 'topik', 'trim|required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('Jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('No_hp', 'No Handphone', 'trim|required');
		$this->form_validation->set_rules('Instansi', 'Instansi ', 'trim|required');

		if ($this->form_validation->run() == false) {

			$this->load->view('admin/ubah_dataTawaranTopik', $data);
		} else {
			$Id_tawaranjudul	= $this->input->post('Id_tawaranjudul');
			$topik 			 	= htmlspecialchars($this->input->post('topik'));
			$Alamat 		 	= htmlspecialchars($this->input->post('Alamat'));
			$Jumlah 		 	= htmlspecialchars($this->input->post('Jumlah'));
			$No_hp 			 	= htmlspecialchars($this->input->post('No_hp'));
			$Instansi 		 	= htmlspecialchars($this->input->post('Instansi'));
			$NIP		 	 	= $this->session->userdata("No_identitas");
			$Tanggal     	 	= format_indo(date('Y-m-d'));
			$this->Model_tawaranTopik->ubahData($Id_tawaranjudul, $topik, $Alamat, $Jumlah, $No_hp, $Instansi, $NIP, $Tanggal);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin/topik');
		}
	}

	public function hapus($Id_tawaranjudul)
	{
		$Id_tawaranjudul = $Id_tawaranjudul;
		$this->Model_tawaranTopik->hapusDataJudul($Id_tawaranjudul);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/topik');
	}

	//pengajuan
	public function setuju($Id_pengajuan)
	{
		// $Id = $_GET['setujui'];
		$NIP = $this->session->userdata('No_identitas');
		$Id = $Id_pengajuan;
		$Status = 2;
		$this->Model_Pengajuan->status($Id, $Status);
		$data['pengajuan'] = $this->Model_Pengajuan->getbyId($Id);
		$data['jadwal'] = $this->Model_Jadwal->getAll();

		foreach ($data['pengajuan'] as $pengajuan) {
			$Id = $pengajuan->Id;
			$topik = $pengajuan->Topik;
			$Jumlah = $pengajuan->Jumlah;
			$Alamat = $pengajuan->Alamat;
			$Instansi = $pengajuan->Instansi;
			$Email = $pengajuan->Email;
		}

		foreach ($data['jadwal'] as $j) {
			$Id_pelaksanaan = $j->Id_pelaksanaan;
		}
		// $NIP = '11111';
		$Username = $this->session->userdata('Nama');

		$No_hp = '08';
		$Tanggal     	 	= format_indo(date('Y-m-d'));
		$this->Model_tawaranTopik->tambahData($NIP, $topik, $Alamat, $Jumlah, $No_hp, $Instansi, $Username, $Id_pelaksanaan, $Tanggal);

		$response = false;
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth = true;
		$mail->Username = 'mulidan131296@gmail.com'; // user email
		$mail->Password = 'zdzpyyicdyyhrusr'; // password email
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('mulidan131296@gmail.com', ''); // user email
		$mail->addReplyTo('mulidan131296@gmail.com', ''); //user email

		// Add a recipient
		$mail->addAddress($Email); //email tujuan pengiriman email

		// Email subject
		$mail->Subject = 'Pengajuan Tawaran Topik'; //subject email

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<h1>Konfirmasi Pengajuan Tawaran Topik</h1>
		   <p>Terima kasih telah mengajukan tawaran topik, tawaran topik anda disetujui.</p>
		   <p>nantikan info selanjutnya dari Kami</p>";
		$mail->Body = $mailContent;

		// Send email
		if (!$mail->send()) {
			redirect('admin/topik');
		} else {
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/topik');
		}
		// redirect('admin/topik');
	}

	public function tolak($Id_pengajuan)
	{
		$Id = $Id_pengajuan;
		$Status = 3;
		$this->Model_Pengajuan->status($Id, $Status);
		$data['pengajuan'] = $this->Model_Pengajuan->getbyId($Id);
		// $data['jadwal'] = $this->Model_Jadwal->getAll();
		foreach ($data['pengajuan'] as $pengajuan) {
			$Email = $pengajuan->Email;
		}

		// var_dump($test);
		// die;
		$response = false;
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth = true;
		$mail->Username = 'mulidan131296@gmail.com'; // user email
		$mail->Password = 'zdzpyyicdyyhrusr'; // password email
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('mulidan131296@gmail.com', ''); // user email
		$mail->addReplyTo('mulidan131296@gmail.com', ''); //user email

		// Add a recipient
		$mail->addAddress($Email); //email tujuan pengiriman email

		// Email subject
		$mail->Subject = 'Pengajuan Tawaran Topik'; //subject email

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<h1>Konfirmasi Pengajuan Tawaran Topik</h1>
           <p>Terima kasih telah mengajukan tawaran topik, tawaran topik anda ditolak.</p>
           <p>nantikan info selanjutnya dari Kami</p>";
		$mail->Body = $mailContent;

		// Send email
		if (!$mail->send()) {
			redirect('admin/topik/pengajuan');
		} else {
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/topik/pengajuan');
		}
	}
}
