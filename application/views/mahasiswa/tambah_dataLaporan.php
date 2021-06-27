<!doctype html>
<html class="no-js h-100" lang="en">
  <?php $this->load->view('mahasiswa/template/head') ?>
      <!-- MDBootstrap Datatables  -->
      <link href="<?php echo base_url('assets/template') ?>/back/MDB-Free/css/addons/datatables.min.css" rel="stylesheet">
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <?php $this->load->view('mahasiswa/template/sidebar') ?>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <?php $this->load->view('mahasiswa/template/header') ?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Laporan</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
                <div class="row">  
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Tambah Laporan
                      <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </h6>
                  </div>
                  <div class="card-body " style="min-height: 375px;"> 
                      <div class="">
                        <div class="card-body">
                          <div class="row"> 
                            <div class="col-md-8 offset-md-2"> 
                            <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                            <form method="post" action="<?= base_url('mahasiswa/laporan/tambah') ?>" enctype="multipart/form-data">
                              <?php foreach ($dosen as $data){ ?>
                              <div class="form-group">
                                <input type="hidden" name="NIP" class="form-control" value="<?= $data->NIP ?>">
                              </div>
                              <?php } ?>
                              <?php foreach ($pembimbing as $data){ ?>
                              <div class="form-group">
                                <input type="hidden" name="No_identitas"  class="form-control" value="<?= $data->No_identitas ?>">
                              </div>
                              <?php } ?>
                              <?php foreach ($jadwal as $data){ ?>
                              <div class="form-group">
                                <input type="hidden" name="Id_pelaksanaan"  class="form-control" value="<?= $data->Id_pelaksanaan ?>">
                              </div>
                              <?php } ?>
                              <div class="form-group">
                                <label for="email">NIM:</label>
                                <input type="hidden" name="NIM" id="form1" class="form-control" value="<?= $this->session->userdata('NIM') ?>">
                                <input type="text" name="NIMm" id="form1" class="form-control" value="<?= $this->session->userdata('NIM') ?>" disabled>
                              </div>
                              <div class="form-group">
                               <label for="email">Berkas :</label><br>
                                <?php echo $this->session->flashdata('message'); ?>
                               <input type="file" class="form-control" name="Berkas" value="" multiple>
                               <i><small><b>* Pastikan format berkas adalah ZIP/RAR</b></small></i>
                              </div>
                              <button class="btn btn-primary" type="submit">simpan</button>
                              <!--  <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                              Tambah
                               </a>
                               </p>
                              <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                Maaf data tidak bisa ditambahkan, Data KP-IF-07 anda belum ada. Terima Kasih.
                                </div>
                              </div> -->
                            </form>
                          
                          </div>
                          </div>
                        </div>
                      </div>
                  </div>
                 </div>
                </div>  
             </div>
           </div>
          
          
 

     
         
  <?php $this->load->view('mahasiswa/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
  <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>