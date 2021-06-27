
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswaa extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model( 'Model_auth_pembimbing');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title']  = 'mahasiswa | Login';
        $this->load->view('Auth_mahasiswa', $data);
    }
    public function Auth()
    {
        $data['title']  = 'mahasiswa | Login';
    	$this->form_validation->set_rules('No_identitas', 'Username', 'trim|required');
    	$this->form_validation->set_rules('Password', 'Password', 'trim|required');

    	if($this->form_validation->run() == false ) {

    		$this->load->view('Auth_mahasiswa', $data);

    	} else {

    		$this->_login();
    	}
    }



    private function _login()
    {

    	$No_identitas   = htmlspecialchars($this->input->post('No_identitas', true));
    	$Password 	    = $this->input->post('Password');

    	$Mahasiswa      = $this->Model_auth_pembimbing->getMahasiswa($No_identitas);
        // $hash = '$2y$10$5cIXc3ywILRju2FtK0qwQ.r';

    	if($Mahasiswa){
                if(password_verify($Password, $Mahasiswa['Password'])) 
                // if($Mahasiswa['Password']) 
                {
                    $data = array (

                        'Nama'          => $Mahasiswa['Nama'],
                        'No_identitas'  => $Mahasiswa['No_identitas'],
                        'Status'        => $Mahasiswa['Status'],
                        'Login'    => 'Login'

                        );
                    $this->session->set_userdata($data);
                    redirect(base_url("test/Beranda"));
        

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak terdaftar!</div>' );
                    redirect('Mahasiswa');  
                }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar!</div>' );
            redirect('Mahasiswa');
        }
        

    	
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Mahasiswa'));
    
    }
}