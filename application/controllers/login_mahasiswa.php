
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_mahasiswa extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model( 'Model_authMahasiswa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title']  = 'Mahasiswa | Login';

        $this->load->view('login_mahasiswa', $data);
    }
    public function Auth()
    {
        $data['title']  = 'Mahasiswa | Login';
    	$this->form_validation->set_rules('NIM', 'NIM', 'trim|required');
    	$this->form_validation->set_rules('Password', 'Password', 'trim|required');

    	if($this->form_validation->run() == false ) {

    		$this->load->view('Auth_mahasiswa', $data);

    	} else {

    		$this->_login();
    	}
    }



    private function _login()
    {

    	$NIM	 = htmlspecialchars($this->input->post('NIM'));
		$Password = $this->input->post('Password');
		
		// Get data by NIM	 & password
		$Mahasiswa = $this->Model_authMahasiswa->getMahasiswa($NIM);
        // $hash = '$2y$10$5cIXc3ywILRju2FtK0qwQ.r';

        if($Mahasiswa){
                if(password_verify($Password, $Mahasiswa['Password'])) 
                // if($Mahasiswa['Password']) 
                {
                    $data = array (

                        'NIM'           => $Mahasiswa['NIM'],
                        'Username'      => $Mahasiswa['Username'],
                        'IPK'           => $Mahasiswa['IPK'],
                        'SKS'           => $Mahasiswa['SKS'],
                        'Login'         => 'Login'

                        );
                    $this->session->set_userdata($data);
                    redirect(base_url("mahasiswa/beranda"));
        

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak terdaftar!</div>' );
                    redirect('auth_mahasiswa');  
                }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar!</div>' );
            redirect('auth_mahasiswa');
        }
        

    	
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth_mahasiswa'));       
    }
}