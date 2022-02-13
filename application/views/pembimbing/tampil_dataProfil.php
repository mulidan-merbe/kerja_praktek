<!doctype html>
<html class="no-js h-100" lang="en">
<?php $this->load->view('pembimbing/template/head') ?>

<body class="h-100">
  <div class="container-fluid">
    <div class="row">
      <!-- Main Sidebar -->
      <?php $this->load->view('pembimbing/template/sidebar') ?>
      <!-- End Main Sidebar -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <?php $this->load->view('pembimbing/template/header') ?>
        <!-- <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i> Selamat Datang di Sistem Informasi Manajemen Kerja Praktek Informatika Universitas Tanjungpura </div> -->
        <!-- / .main-navbar -->
        <div class="main-content-container container-fluid px-4">
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">

          </div>

          <!-- Top Referrals Component -->
          <div class="row">
            <div class="col-lg-4">
              <div class="card card-small mb-4 pt-3">
                <div class="card-header border-bottom text-center">
                  <div class="mb-3 mx-auto">
                    <img class="rounded-circle" src="<?= base_url('assets/back') ?>/images/avatars/user.jpg" alt="User Avatar" width="110">
                  </div>
                  <h4 class="mb-0"><?php echo $this->session->userdata("Username"); ?></h4>
                  <span class="text-muted d-block mb-2">pembimbing</span>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Informasi Akun</h6>
                </div>
                <div class="card-body" style="min-height: 355px;">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <?php foreach ($profil as $data) { ?>
                            <table class="table table-striped">
                              <tbody>
                                <tr>
                                  <td style="width : 50px">Nama</td>
                                  <td style="width : 10px">: </td>
                                  <!-- Ambil data session yang sedang login -->
                                  <td><?= $data->Nama ?></td>
                                </tr>
                                <tr>
                                  <td>No Identitas</td>
                                  <td>:</td>
                                  <td><?= $data->No_identitas ?></td>
                                </tr>
                                <tr>
                                  <td>Instansi</td>
                                  <td>:</td>
                                  <td><?= $data->Nama ?></td>
                                </tr>
                                <!-- <tr>                         
                              <td>No Handphone</td>
                              <td>:</td>
                              <td><?= $data->No_hp ?></td>
                            </tr> -->
                              </tbody>
                            </table>
                            <a class="btn btn-primary" href="<?= base_url() ?>pembimbing/profil/ubah?Identitas=<?= $data->No_identitas ?>">Ubah Password</a>
                          <?php } ?>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- End Top Referrals Component -->


        </div>
        <?php $this->load->view('pembimbing/template/footer') ?>