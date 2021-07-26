<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Model_userPembimbing');
		$this->load->library('form_validation');
		if(is_null($this->session->userdata('Pembimbing'))) {
	    	redirect(base_url("pembimbing/login"));
	    }
    }

    public function index()
    {
    	$data['title']  	= 'Pembimbing | Profil';
    	$No_identitas 	= $this->session->userdata('No_identitas');
    	$data['profil']	= $this->Model_userPembimbing->getPembimbing($No_identitas);
    	$this->load->view('pembimbing/tampil_dataProfil', $data);
    }

    public function ubah()
    {
    	$data['title']  	= 'Pembimbing | Profil';
    	$this->load->view('pembimbing/ubah_dataProfil', $data);
    }

    public function ubahPassword()
    {
    	$data['title']  	= 'Pembimbing | Profil';
    	$No_identitas 	= $this->session->userdata('No_identitas');
    	$data['user']	= $this->Model_userPembimbing->getPembimbingubah($No_identitas);
    	

    	$this->form_validation->set_rules('current_password', 'Password', 'trim|required');
    	$this->form_validation->set_rules('new_password1', 'Password baru', 'trim|required|min_length[3]|matches[new_password2]');
    	$this->form_validation->set_rules('new_password2', 'Konfirmasi Password ', 'trim|required|min_length[3]|matches[new_password1]');

    	if($this->form_validation->run() == false) {

    		$this->load->view('pembimbing/ubah_dataProfil', $data);

    	} else {

    		$current_password = $this->input->post('current_password');
    		$new_password	= $this->input->post('new_password1');

    		if(!password_verify($current_password, $data['user']['Password'])) {

    			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak sesuai</div>' );
    			$this->load->view('pembimbing/ubah_dataProfil', $data);
    		} else {
    			if($current_password == $new_password ) {

    				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak boleh sama</div>' );
    				$this->load->view('pembimbing/ubah_dataProfil', $data);
    			} else {

    				$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
    				$No_identitas = $this->session->userdata('No_identitas');

    				$this->Model_userPembimbing->ubahPassword($No_identitas, $password_hash);
    				$this->session->set_flashdata('flash', 'Diubah');
            		redirect('pembimbing/Profil');
    			}
    		}
    	}
    }
}