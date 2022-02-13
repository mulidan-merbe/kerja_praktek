
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Model_auth_admin');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title']  = 'Login';
    $this->load->view('utama/login_admin', $data);
  }
  public function Auth()
  {
    $data['title']  =  'Login';
    $this->form_validation->set_rules('No_identitas', 'Username', 'trim|required');
    $this->form_validation->set_rules('Password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {

      $this->load->view('utama/login_admin', $data);
    } else {

      $this->_login();
    }
  }



  private function _login()
  {

    $No_identitas   = htmlspecialchars($this->input->post('No_identitas', true));
    $Password       = $this->input->post('Password');

    $admin      = $this->Model_auth_admin->getAdmin($No_identitas);

    if ($admin) {
      if (password_verify($Password, $admin['Password'])) {
        $data = array(

          'Nama'          => $admin['Nama'],
          'No_identitas'  => $admin['No_identitas'],
          'Status'        => $admin['Status'],
          'Admin'    => 'Admin',

        );
        $this->session->set_userdata($data);
        redirect(base_url("admin/beranda"));
      } else {
        $this->session->set_flashdata('password', '<small class="text-danger pl-3">Password belum terdaftar!</small>');
        redirect('admin/login');
      }
    } else {
      $this->session->set_flashdata('noidentitas', '<small class="text-danger pl-3">No Identitas belum terdaftar!</small>');
      redirect('admin/login');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('admin/login'));
  }
}
