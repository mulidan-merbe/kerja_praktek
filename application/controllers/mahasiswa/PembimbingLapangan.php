<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

class PembimbingLapangan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		require APPPATH . 'libraries/phpmailer/src/Exception.php';
		require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH . 'libraries/phpmailer/src/SMTP.php';
		$this->load->model(['Model_Pembimbing_lapangan', 'Model_Kpdua', 'Model_Jadwal', 'Model_Proposal']);
		$this->load->library('form_validation');
		if (is_null($this->session->userdata('Login'))) {
			redirect(base_url("mahasiswa/login"));
		}
	}

	public function index()
	{
		$NIM 	= $this->session->userdata('NIM');
		$data = [
			'title' 		=> 'Mahasiswa | Pembimbing lapangan',
			'dua' 			=> $this->Model_Kpdua->getbyNIM($NIM),
			'pembimbing'	=> $this->Model_Pembimbing_lapangan->getbyNIM($NIM),
			'cekdata'		=> $this->Model_Pembimbing_lapangan->getbyNIM2($NIM),
			'proposal' 		=> $this->Model_Proposal->getDataNIMLimit($NIM)

		];
		// menampilkan data surat pengantar dan pembimbing lapangan
		$this->load->view('mahasiswa/tampil_data_pembimbing_lapangan', $data);
	}

	public function tambah()
	{
		$NIM 	= $this->session->userdata('NIM');
		$data = [
			'title' 	=> 'Mahasiswa | Pembimbing lapangan',
			'jadwal' 	=> $this->Model_Jadwal->getAll(),
			'proposal' 		=> $this->Model_Proposal->getDataNIMLimit($NIM)
		];

		$this->form_validation->set_rules('Username', 'Nama', 'trim|required');
		$this->form_validation->set_rules('No_identitas', 'No Identitas', 'trim|required');
		$this->form_validation->set_rules('Jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('Alamat_kantor', 'Alamat Kantor', 'trim|required');
		$this->form_validation->set_rules('No_hp', 'No Hp', 'trim|required');
		// if (empty($_FILES['Berkas']['name'])) {
		// 	$this->form_validation->set_rules('Berkas', 'Berkas', 'required');
		// }
		if ($this->form_validation->run() == false) {

			$this->load->view('mahasiswa/tambah_data_pembimbing_lapangan', $data);
		} else {
			$config['upload_path'] = 'assets/pembimbingLapangan';
			$config['allowed_types'] = 'pdf';
			$config['max_size']      = 5000;
			$this->load->library('upload', $config);
			// Cek apakah berkas sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('Berkas')) {
				$this->session->set_flashdata('message', '<small class="text-danger pl-3">Berkas tidak sesuai</small>');
				$this->load->view('mahasiswa/tambah_data_pembimbing_lapangan', $data);
			} else {
				$result         =  $this->upload->data();
				$Id_proposal	=  $this->input->post('Id_proposal');
				$NIM   			=  $this->session->userdata("NIM");
				$File           = $result['file_name'];
				$Username		= htmlspecialchars($this->input->post('Username'));
				$No_identitas	= htmlspecialchars($this->input->post('No_identitas'));
				$Password		= password_hash($this->input->post('No_identitas'), PASSWORD_DEFAULT);
				$Jabatan		= htmlspecialchars($this->input->post('Jabatan'));
				$Alamat_kantor  = htmlspecialchars($this->input->post('Alamat_kantor'));
				$No_hp			= htmlspecialchars($this->input->post('No_hp'));
				$Tanggal		= date('Y-m-d');

				$email_to = 'mulidan131296@gmail.com';

				// PHPMailer object
				$response = false;
				$mail = new PHPMailer();


				// SMTP configuration
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
				$mail->addAddress($email_to); //email tujuan pengiriman email

				// Email subject
				$mail->Subject = 'Akun Pembimbing Lapangan Kerja Praktek'; //subject email

				// Set email format to HTML
				$mail->isHTML(true);

				// Email body content
				$mailContent = "<h1>Akun Pembimbing Lapangan Kerja Praktek</h1>
				<h4>Username  : $Username</h4>
				<h4>Password  : $Username</h4>
           
           <h4><a href='" . base_url() . "pembimbing/login/'>Login halaman pembimbing</a></h4>"; // isi email
				$mail->Body = $mailContent;

				// Send email
				if (!$mail->send()) {
					$this->Model_Pembimbing_lapangan->tambahData($Id_proposal, $NIM, $File, $Username, $No_identitas, $Password, $Jabatan, $Alamat_kantor, $No_hp, $Tanggal);
					$this->session->set_flashdata('flash', 'Ditambahkan');
					redirect('mahasiswa/pembimbingLapangan');
				} else {
					$this->Model_Pembimbing_lapangan->tambahData($Id_proposal, $NIM, $File, $Username, $No_identitas, $Password, $Jabatan, $Alamat_kantor, $No_hp, $Tanggal);
					$this->session->set_flashdata('flash', 'Ditambahkan');
					redirect('mahasiswa/pembimbingLapangan');
				}
			}
		}
	}

	public function ubah($NIM)
	{
		$data['title']	= 'Mahasiswa | Pembimbing lapangan';
		$NIM = $NIM;
		$data['edit'] = $this->Model_Pembimbing_lapangan->getbyNIM($NIM);
		$this->load->view('mahasiswa/ubah_dataPembimbing', $data);
	}



	public function ubahData()
	{
		$data['title']	= 'Mahasiswa | Pembimbing lapangan';
		$NIM = $this->input->post('NIM');
		$data['edit'] = $this->Model_Pembimbing_lapangan->getbyNIM($NIM);


		$config['upload_path'] = 'assets/pembimbingLapangan/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']      = 5000;
		$this->load->library('upload', $config);

		// Cek apakah ada berkas yang diuploud atau tidak
		if (!empty($_FILES['File']['name'])) {
			// Cek apakah berkasi sudah sesuai dengan konfigurasi
			if (!$this->upload->do_upload('File')) {
				// $error = $this->upload->display_errors();
				// // menampilkan pesan error
				// print_r($error);
				$this->session->set_flashdata('message', '<small class="text-danger pl-3">Berkas tidak sesuai</small>');
				$this->load->view('mahasiswa/ubah_dataPembimbing', $data);
			} else {

				$NIM 		= $this->input->post('NIM');
				$data 		= $this->Model_Pembimbing_lapangan->getDatabyNIM($NIM);
				$proses 	= 'assets/kpifempat/file/' . $data->File;
				unlink($proses);

				$result         = $this->upload->data();
				// $Id 			= $this->input->post('Id');
				$NIM   			= $this->session->userdata("NIM");
				$File           = $result['file_name'];
				$Username		= htmlspecialchars($this->input->post('Username'));
				$No_identitas	= htmlspecialchars($this->input->post('No_identitas'));
				$Password		= password_hash($this->input->post('No_identitas'), PASSWORD_DEFAULT);
				$Jabatan		= htmlspecialchars($this->input->post('Jabatan'));
				$Alamat_kantor  = htmlspecialchars($this->input->post('Alamat_kantor'));
				$No_hp			= htmlspecialchars($this->input->post('No_hp'));
				$Tanggal		= date('Y-m-d');

				$this->Model_Pembimbing_lapangan->ubahData($NIM, $File, $Username, $No_identitas, $Password, $Jabatan, $Alamat_kantor, $No_hp, $Tanggal);
				$this->session->set_flashdata('flash', 'Diubah');
				redirect('mahasiswa/pembimbingLapangan');
			}
			// Kondisi dimana tidak ada file terbaru yg diuploud. Maka yg diuploud adalah file yg lama
		} else {
			$Id 			= $this->input->post('Id');
			$data 			 = $this->Model_Pembimbing_lapangan->getbyId($Id);
			$NIM   			= $this->session->userdata("NIM");
			$File  			= $this->input->post('old_file');
			$Username		= htmlspecialchars($this->input->post('Username'));
			$No_identitas	= htmlspecialchars($this->input->post('No_identitas'));
			$Password		= password_hash($this->input->post('No_identitas'), PASSWORD_DEFAULT);
			$Jabatan		= htmlspecialchars($this->input->post('Jabatan'));
			$Alamat_kantor  = htmlspecialchars($this->input->post('Alamat_kantor'));
			$No_hp			= htmlspecialchars($this->input->post('No_hp'));
			$Tanggal		= date('Y-m-d');

			$this->Model_Pembimbing_lapangan->ubahData($NIM, $File, $Username, $No_identitas, $Password, $Jabatan, $Alamat_kantor, $No_hp, $Tanggal);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('mahasiswa/pembimbingLapangan');
		}
	}
}
