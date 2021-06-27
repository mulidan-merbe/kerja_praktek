<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Draft_topik extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_Draft');
		if(is_null($this->session->userdata('Login'))) {
	    	redirect(base_url("not_found"));
	    }

	 //    if($this->session->userdata('Mahasiswa') != TRUE) {
		// 	redirect(base_url("login"));
		// }

    }

    function tambahData() 
    {
    	$data['draft'] = $this->Model_Draft->get();
    	foreach ($draft as $data) {

            $idKerjaPraktek     = $data['idKerjaPraktek'];
            $topik              = $data['topik'];
            $instansi           = $data['instansi'];
            $narahubung         = $data['narahubung'];
            $telpNarahubung     = $data['telpNarahubung'];
            $deskripsiKP        = $data['deskripsiKP'];
            $pimpinan           = $data['pimpinan'];
            $alamatInstansi     = $data['alamatInstansi'];
            $waktuInput         = $data['waktuInput'];
            $periodeKP          = $data['periodeKP'];

    		$data_get = array (
    			'idKerjaPraktek' 	=> $idKerjaPraktek,
    			'topik'				=> $topik,      
    			'instansi'			=> $instansi,
    			'narahubung'		=> $narahubung,
    			'telpNarahubung' 	=> $telpNarahubung,
    			'deskripsiKP'		=> $deskripsiKP,
    			'pimpinan'			=> $pimpinan,
    			'alamatInstansi'	=> $alamatInstansi,
    			'waktuInput'		=> $waktuInput, 
    			'periodeKP'			=> $periodeKP,

    		);

    		$this->Model_Draft->simpan($data_get);
    	}
    }

    // idKerjaPraktek": "18",
    //     "topik": "Aplikasi Surat Masuk Berbasis Android Di PSP-IG UNTAN",
    //     "instansi": "PSP-IG UNTAN",
    //     "narahubung": "Septian Osa Komara",
    //     "telpNarahubung": "085348300619",
    //     "deskripsiKP": "Aplikasi Surat Masuk ini merupakan salah satu cara dalam menangani pengolahan data surat menyurat di PSPIG UNTAN mulai dari pencatatan dan pengarsipan surat masuk dan diharapkan bisa mengolah data surat masuk tanpa memakan waktu yang lama",
    //     "pimpinan": "Heri Priyanto,S.T.,M.T.",
    //     "alamatInstansi": "Jalan subarkah Nomor 12",
    //     "waktuInput": "21-07-2020 14:11:58",
    //     "periodeKP": {
    //         "semester": "GASAL",
    //         "tahun": "2020"
    //     },
    //     "mahasiswa": {
    //         "nama": "SEPTIAN OSA KOMARA",
    //         "nim": "D1042141019"
    //     },
    //     "pembimbingAkademik": {
    //         "nama": "HERI PRIYANTO, S.T., M.T.",
    //         "nip": "197504122003121001"
    //     },