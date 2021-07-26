<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

	function __construct() {
        parent::__construct();


    }

	 public function index()
    {
        $data['title']  = 'Selamat Datang | Sistem Informasi Manajemen Kerja Praktek';
        $this->load->view('utama/index', $data);
    }
}