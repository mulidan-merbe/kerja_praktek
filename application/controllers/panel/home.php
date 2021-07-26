<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Topik extends CI_Controller
{

	public function index()
	{

		$this->load->view('panel/home');
	}
}
