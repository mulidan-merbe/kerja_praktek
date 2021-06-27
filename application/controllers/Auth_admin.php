
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_admin extends CI_Controller {

  function __construct() {
        parent::__construct();
        $this->load->model( 'Model_auth_admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title']  = 'Login';
        $this->load->view('Auth_admin', $data);
    }
    public function Auth()
    {
      $data['title']  =  'Login';
      $this->form_validation->set_rules('No_identitas', 'Username', 'trim|required');
      $this->form_validation->set_rules('Password', 'Password', 'trim|required');

      if($this->form_validation->run() == false ) {

        $this->load->view('Auth_admin', $data);

      } else {

        $this->_login();
      }
    }



    private function _login()
    {

      $No_identitas   = htmlspecialchars($this->input->post('No_identitas', true));
      $Password       = $this->input->post('Password');

      $admin      = $this->Model_auth_admin->getAdmin($No_identitas);

      if($admin){
          if(password_verify($Password, $admin['Password'])) 
            {
                    $data = array (

                        'Nama'          => $admin['Nama'],
                        'No_identitas'  => $admin['No_identitas'],
                        'Status'        => $admin['Status'],
                        'Admin'    => 'Admin',

                        );
                    $this->session->set_userdata($data);
                    redirect(base_url("admin/beranda"));
        

            } else {
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak terdaftar!</div>' );
                    redirect('auth_admin');  
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar!</div>' );
            redirect('auth_admin');
        }
        

      
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('auth_admin'));
    
    }
}