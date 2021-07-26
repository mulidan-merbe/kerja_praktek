<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Topik extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Tawaran Topik';
        $this->load->view('utama/topik', $data);
    }

    public function tambahTopik()
    {
        $this->load->Model('Model_Pengajuan');
        $Topik          = htmlspecialchars($this->input->post('Topik'));
        $Abstrak        = htmlspecialchars($this->input->post('Abstrak'));
        $Jumlah         = htmlspecialchars($this->input->post('Jumlah'));
        $Instansi       = htmlspecialchars($this->input->post('Instansi'));
        $Alamat         = htmlspecialchars($this->input->post('Alamat'));
        $Narahubung     = htmlspecialchars($this->input->post('Narahubung'));
        $Email          = htmlspecialchars($this->input->post('Email'));
        $Tanggal        = date('Y-m-d');

        $id = $this->Model_Pengajuan->simpanData($Topik, $Abstrak, $Jumlah, $Instansi, $Alamat, $Narahubung, $Email, $Tanggal);
        $id =
            $konfirmasi = 0;
        $email_from = "mulidan131296@gmail.com";
        $email_to = $Email;
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $email_from, // change it to yours
            'smtp_pass' => 'koponboncet1996', // change it to yours
            'mailtype' => 'html',
            'wordwrap' => TRUE
        );

        $message =     "
                  <html>
                  <head>
                      <title>Verification Code</title>
                  </head>
                  <body>
                      <h2>Terima Kasih, Pengajuan Tawaran Topik Anda berhasil.</h2>
                      <p>Silahkan Konfirmasi pengajuan anda dengan mengklik tombol dibawah ini.</p>
                      <h4><a href='" . base_url() . "topik/konfirmasi/" . $id . "/" . $konfirmasi . "'>Konfirmasi</a></h4>
                  </body>
                  </html>
                  ";

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($email_from);
        $this->email->to($email_to);
        $this->email->subject('Konfirmasi Pengajuan Tawaran Topik');
        $this->email->message($message);

        // if ($this->email->send()) {
        //     $this->session->set_flashdata('message', 'Data berhasil ditambahkan, silahkan konfirmasi E-mail anda');
        // } else {
        //     $this->session->set_flashdata('message', 'Email tidak terdaftar');
        // }

        redirect('topik/berhasil');
    }

    public function berhasil()
    {
        $this->load->view('utama/pesan_berhasil');
    }

    public function konfirmasi()
    {
        $id =  $this->uri->segment(3);
        $konfirmasi = $this->uri->segment(4);

        //fetch user details
        $pengajuan = $this->Model_Pengajuan->getPengajuan($id);

        //if code matches
        if ($pengajuan['Konfirmasi'] == $konfirmasi) {
            //update penga$pengajuan active status
            $nilai = 1;
            $query = $this->Model_Pengajuan->konfirmasi($nilai, $id);

            if ($query) {
                $this->session->set_flashdata('message', 'User activated successfully');
            } else {
                $this->session->set_flashdata('message', 'Something went wrong in activating account');
            }
        } else {
            $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
        }

        redirect('topik');
    }
}
