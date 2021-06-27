<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(['Model_Jadwal', 'Model_Draft','Model_beranda','Model_Kpdua','Model_Kpempat','Model_rencanaTopik']);
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("auth_mahasiswa"));
	    }

	 //    if($this->session->userdata('Mahasiswa') != TRUE) {
		// 	redirect(base_url("login"));
		// }

    }

	public function index()
	{
		// $id = 18;
		// $Draft = file_get_contents('http://informatika.untan.ac.id/API/public/dataKP.php?key=MfQE6ej2ffxEKgVx7YXVA3HbHg3d4hRhXyBnRnYgkjwuSaLNW2V5PxeVSKWySUsbbhVyEWVSs');
  //       $dataDraft = json_decode($Draft, true);

  //       $Draft2 = file_get_contents('http://informatika.untan.ac.id/API/public/dataKPbyNIM.php?key=MfQE6ej2ffxEKgVx7YXVA3HbHg3d4hRhXyBnRnYgkjwuSaLNW2V5PxeVSKWySUsbbhVyEWVSs&nim=D1041131036');

		$NIM = $this->session->userdata('NIM');
		$nim = 'D1041131036';

 		$data['jadwal'] = $this->Model_Jadwal->getAll();

		foreach ($data['jadwal'] as $data) {
			$tgl_awal	= $data->Tanggal_mulai;
			$tgl_akhir	=  $data->Tanggal_selesai;
		}

		$data = [
			'title' 		=> 'Mahasiswa | Beranda',
			'jadwal' 		=> $this->Model_Jadwal->getAll(),
			'rencanaTopik'  => $this->Model_rencanaTopik->cek_statuss($NIM),
			'dua'			=> $this->Model_Kpdua->cek_status($NIM),
			'empat'			=> $this->Model_Kpempat->get_tanggal($tgl_awal, $tgl_akhir),
			'draft' 		=> $this->Model_beranda->getMahasiswa($nim)
		];
        $this->load->view('mahasiswa/beranda', $data);
        // var_dump($data['draft']);
        // die;
	}

}
