<!doctype html>
<html class="no-js h-100" lang="en">
  <?php $this->load->view('dosen/template/head') ?>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <?php $this->load->view('dosen/template/sidebar') ?>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <?php $this->load->view('dosen/template/header') ?>
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
                      <img class="rounded-circle" src="<?= base_url('assets/back')?>/images/avatars/user.jpg" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0"><?php echo $this->session->userdata("Username"); ?></h4>
                    <span class="text-muted d-block mb-2">DOSEN</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Informasi Profil</h6>
                  </div>
                  <div class="card-body" style="min-height: 410px">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                        <table class="table " >
                          <tbody>
                            <tr>             
                              <td style="width : 10px">Nama</td>
                              <td style="width : 10px">: </td>
                              <!-- Ambil data session yang sedang login -->
                              <td><?php echo $this->session->userdata("Username"); ?></td>
                            </tr>
                            <tr>                         
                              <td>NIP</td>
                              <td>:</td>
                              <td><?php echo $this->session->userdata("NIP"); ?></td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                      </div>
                      <!-- <button type="submit" class="btn btn-primary">Update Account</button> -->
                    </li>
                  </ul>
                  </div>
                </div>
              </div>
            </div>
              <!-- End Top Referrals Component -->
            

          </div>
<?php $this->load->view('dosen/template/footer') ?>