<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Topik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Model_Pengajuan');
        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';
    }

    public function index()
    {
        $data['title'] = 'Tawaran Topik';
        $this->load->view('utama/topik', $data);
    }

    public function tambahTopik()
    {

        $Topik          = htmlspecialchars($this->input->post('Topik'));
        $Abstrak        = htmlspecialchars($this->input->post('Abstrak'));
        $Jumlah         = htmlspecialchars($this->input->post('Jumlah'));
        $Instansi       = htmlspecialchars($this->input->post('Instansi'));
        $Alamat         = htmlspecialchars($this->input->post('Alamat'));
        $Narahubung     = htmlspecialchars($this->input->post('Narahubung'));
        $Email          = htmlspecialchars($this->input->post('Email'));
        $Tanggal        = date('Y-m-d');

        $id = $this->Model_Pengajuan->simpanData($Topik, $Abstrak, $Jumlah, $Instansi, $Alamat, $Narahubung, $Email, $Tanggal);
        $email_to = $Email;

        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();


        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = 'mulidan131296@gmail.com'; // user email
        $mail->Password = 'zdzpyyicdyyhrusr'; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('mulidan131296@gmail.com', ''); // user email
        $mail->addReplyTo('mulidan131296@gmail.com', ''); //user email

        // Add a recipient
        $mail->addAddress($email_to); //email tujuan pengiriman email

        // Email subject
        $mail->Subject = 'Konfirmasi Pengajuan Tawaran Topik'; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<h1>Konfirmasi Pengajuan Tawaran Topik</h1>
           <p>Terima kasih telah mengajukan tawaran topik, silahkan tekan link konfirmasi dibawah ini.</p>
           <h4><a href='" . base_url() . "topik/konfirmasi/" . $id .  "'>Konfirmasi</a></h4>"; // isi email
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            redirect('topik');
        } else {
            redirect('topik/berhasil');
        }
    }

    public function berhasil()
    {
        $data['title'] = 'Tawaran Topik';
        $this->load->view('utama/pesan_berhasil', $data);
    }

    public function konfirmasiPengajuan()
    {
        $data['title'] = 'Tawaran Topik';
        $this->load->view('utama/pesan_konfirmasi', $data);
    }

    public function konfirmasi()
    {
        $id =  $this->uri->segment(3);
        $nilai = 2;

        $this->Model_Pengajuan->konfirmasi($id, $nilai);
        redirect('topik/konfirmasiPengajuan');
    }
}
