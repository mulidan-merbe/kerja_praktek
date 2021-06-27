
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_dosen2 extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model( 'Model_authDosen2');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title']  = 'Dosen | Login';
        // $username = '0000';
        // $password = '123456';
        // // $Dosen =  file_get_contents('http://spota.untan.ac.id/steven/API/login.php?username=0000&password=123456');
        // $Dosen = $this->Model_authDosen2->getDosen($username, $password);
        // var_dump($Dosen);
        // die;
        $this->load->view('Auth_dosen2', $data);
    }
    public function Auth()
    {
        $data['title']  = 'Dosen | Login';
    	$this->form_validation->set_rules('username', 'username', 'trim|required');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required');

    	if($this->form_validation->run() == false ) {

    		$this->load->view('Auth_dosen2', $data);

    	} else {

    		$this->_login();
    	}
    }



    private function _login()
    {

    	$username	 = htmlspecialchars($this->input->post('username'));
		$password    = $this->input->post('password');
		
		// Get data by NIM	 & password
		$Dosen = $this->Model_authDosen2->getDosen($username, $password);
        // $hash = '$2y$10$5cIXc3ywILRju2FtK0qwQ.r';

        if($Dosen){

                    $data = array (

                        'NIP'           => $Dosen['data']['nip'],
                        'Username'      => $Dosen['data']['nama'],
                        'Dosen'         => 'Dosen'

                        );
                    $this->session->set_userdata($data);
                    redirect(base_url("dosen/beranda"));
        

        
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar!</div>' );
            redirect('auth_dosen2');
        }
        

    	
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('auth_dosen2'));
    
    }
}