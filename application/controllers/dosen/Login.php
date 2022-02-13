
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_authDosen');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title']  = 'Dosen | Login';

        $this->load->view('utama/login_dosen', $data);
    }
    public function Auth()
    {
        $data['title']  = 'Dosen | Login';
        $this->form_validation->set_rules('NIP', 'NIP', 'trim|required');
        $this->form_validation->set_rules('Password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $this->load->view('utama/login_dosen', $data);
        } else {

            $this->_login();
        }
    }



    private function _login()
    {

        $NIP     = htmlspecialchars($this->input->post('NIP'));
        $Password = $this->input->post('Password');

        // Get data by NIM	 & password
        $Dosen = $this->Model_authDosen->getDosen($NIP);
        // $hash = '$2y$10$5cIXc3ywILRju2FtK0qwQ.r';

        if ($Dosen) {
            if (password_verify($Password, $Dosen['Password']))
            // if($Dosen['Password']) 
            {
                $data = array(

                    'NIP'           => $Dosen['NIP'],
                    'Username'      => $Dosen['Username'],
                    'Dosen'         => 'Dosen'

                );
                $this->session->set_userdata($data);
                redirect(base_url("dosen/beranda"));
            } else {
                $this->session->set_flashdata('password', '<small class="text-danger pl-3">Password belum terdaftar!</small>');
                redirect('dosen/login/auth');
            }
        } else {
            $this->session->set_flashdata('nip', '<small class="text-danger pl-3">NIP belum terdaftar!</small>');
            redirect('dosen/login/auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('dosen/login'));
    }
}
