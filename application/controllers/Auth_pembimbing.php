
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_pembimbing extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model( 'Model_auth_pembimbing');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title']  = 'Pembimbing | Login';
        $this->load->view('Auth_pembimbing', $data);
    }
    public function Auth()
    {
        $data['title']  = 'Pembimbing | Login';
    	$this->form_validation->set_rules('No_identitas', 'Username', 'trim|required');
    	$this->form_validation->set_rules('Password', 'Password', 'trim|required');

    	if($this->form_validation->run() == false ) {

    		$this->load->view('Auth_pembimbing', $data);

    	} else {

    		$this->_login();
    	}
    }



    private function _login()
    {

    	$No_identitas   = htmlspecialchars($this->input->post('No_identitas', true));
    	$Password 	    = $this->input->post('Password');

    	$Pembimbing      = $this->Model_auth_pembimbing->getPembimbing($No_identitas);
        // $hash = '$2y$10$5cIXc3ywILRju2FtK0qwQ.r';

    	if($Pembimbing){
            if($Pembimbing['Status'] == 1)
            {
                if(password_verify($Password, $Pembimbing['Password'])) 
                // if($Pembimbing['Password']) 
                {
                    $data = array (

                        'Nama'          => $Pembimbing['Nama'],
                        'No_identitas'  => $Pembimbing['No_identitas'],
                        'Status'        => $Pembimbing['Status'],
                        'Pembimbing'    => 'Pembimbing'

                        );
                    $this->session->set_userdata($data);
                    redirect(base_url("pembimbing/beranda"));
        

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak terdaftar!</div>' );
                    redirect('Auth_pembimbing');  
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak aktif!</div>' );
                redirect('auth_pembimbing'); 
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar!</div>' );
            redirect('auth_pembimbing');
        }
        

    	
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('auth_pembimbing'));
    
    }
}