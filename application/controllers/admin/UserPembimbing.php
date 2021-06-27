<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPembimbing extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_userPembimbing');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Admin'))) {
	    	redirect(base_url("auth_admin"));
	    }
	}

	public function index()
	{
		$data['title']	= 'Admin | Akun Pembimbing Lapangan';
		$data['user']	= $this->Model_userPembimbing->getData();
		$this->load->view('admin/tampil_userPembimbing', $data);

	}

	public function tambah()
	{
		$data['title']	= 'Admin | Akun Pembimbing Lapangan';
		$this->form_validation->set_rules('Nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('No_identitas', 'No Identitas', 'trim|required');
		$this->form_validation->set_rules('Password', 'Password', 'trim|required');
		
		if($this->form_validation->run() == false)
		{

			$this->load->view('admin/tambah_userPembimbing', $data);

		} else { 

			$No_identitas	= htmlspecialchars($this->input->post('No_identitas', true));
			$Identitas = $this->Model_userPembimbing->get($No_identitas);

			if($Identitas >0 ){

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data identitas sudah ada</div>' );
	            $this->load->view('admin/tambah_userPembimbing', $data);

			} else {

			
				$Nama			= htmlspecialchars($this->input->post('Nama', true));
				$No_identitas	= htmlspecialchars($this->input->post('No_identitas', true));
				$Password		= password_hash($this->input->post('Password'), PASSWORD_DEFAULT);
				// $Password		= $this->input->post('Password');
				$Status			= 1;
				$Tanggal		= date('Y-m-d');

				$this->Model_userPembimbing->tambahData($Nama, $No_identitas, $Password, $Status, $Tanggal);
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('admin/UserPembimbing');

			}
		}
	}

	public function ubah()
	{
		$data['title'] = 'Admin | Akun Pembimbing Lapangan';
		$Id_user = $_GET['Id'];
		$data['ubah'] = $this->Model_userPembimbing->getbyId($Id_user);
		$this->load->view('admin/ubah_dataUserPembimbing', $data);
		}
	public function hapusData()
	{
		$Id_user = $_GET['Id'];
		$this->Model_userPembimbing->hapusData($Id_user);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/UserPembimbing');
	}
}