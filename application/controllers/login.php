<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_auth', 'auth');
    }

	
	public function index()
	{
		$data['title']	= 'Login | Selamat Datang';
		$this->load->view('v_login', $data);
	}

	public function aksiLogin()
	{

		// Tangkap inputan
		$Username = htmlspecialchars($this->input->post('Username'));
		$password = htmlspecialchars($this->input->post('password'));
		
		// Get data by Username & password
		$mahasiswa = $this->auth->getMahasiswa($Username, $password);
		// $admin = $this->auth->getAdmin($username, $password);
		$dosen = $this->auth->getDosen($Username, $password);


		// Cek kembalian data
		if ($mahasiswa != 404) {
			// Ambil data dari array
			$Id_mahasiswa 	= $mahasiswa['Id_mahasiswa'];
			$Username 		= $mahasiswa['Username'];
			$NIM 			= $mahasiswa['NIM'];
			$IPK 			= $mahasiswa['IPK'];
			$Alamat 		= $mahasiswa['Alamat'];
			$SKS 			= $mahasiswa['SKS'];
			// Masukkan data array kedalam session
			$dataSessionmahasiswa = array(
				'Id_mahasiswa' 	=> $Id_mahasiswa,
				'Username' 		=> $Username,
				'NIM' 			=> $NIM,
				'IPK' 			=> $IPK,
				'Alamat' 		=> $Alamat,
				'SKS' 			=> $SKS,
				'Login' 		=> 'Login'
			);

			// Simpan data ke dalam sessuin
			$this->session->set_userdata($dataSessionmahasiswa);
			//Load halaman
			redirect(base_url("mahasiswa/Beranda"));

		// }elseif($admin != 404) {
		// 	// Ambil data dari array
		// 	$Id_admin = $admin['Id_admin'];
		// 	$Username = $admin['Username'];
			
		// 	// Masukkan data array kedalam session
		// 	$dataSessionadmin = array(
		// 		'Id_admin' 	=> $Id_admin,
		// 		'Username' 	=> $Username,
		// 		'Admin' 	=> 'Admin'
		// 	);
		// 	// Simpan data ke dalam sessuin
		// 	$this->session->set_userdata($dataSessionadmin);
		// 	//Load halaman
		// 	redirect(base_url("admin/Beranda"));

		}elseif($dosen != 404) {
			// Ambil data dari array
			$Id_dosen 	= $dosen['Id_dosen'];
			$Username 	= $dosen['Username'];
			$NIP 		= $dosen['NIP'];

			// Masukkan data array kedalam session
			$dataSession = array(
				'Id_dosen' 	=> $Id_dosen,
				'Username' 	=> $Username,
				'NIP' 		=> $NIP,
				'Dosen' 	=> 'Dosen'
			);
			// Simpan data ke dalam sessuin
			$this->session->set_userdata($dataSession);
			//Load halaman
			redirect(base_url("dosen/Beranda"));

		}else {
			$this->session->set_flashdata('msg', '
			<div class="alert alert-block alert-danger"></i></button>
			<i class="ace-icon fa fa-bullhorn green"></i> Username atau Password anda salah
			</div>');
        	redirect('/login');
		}

		
	}
}
