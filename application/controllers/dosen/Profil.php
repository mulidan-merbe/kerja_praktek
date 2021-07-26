<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_admin', 'admin');
		if (is_null($this->session->userdata('Dosen'))) {
			redirect(base_url("dosen/login"));
		}
	}

	public function index()
	{
		// $dosen = file_get_contents('http://spota.untan.ac.id/steven/API/login.php?0000');
		//       $dataDraft = json_decode($Draft, true);
		$data['title']  = 'Dosen | Profil';
		$this->load->view('dosen/profil', $data);
	}
}
