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
                <h3 class="page-title">Data KP-TI-A03</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">

                    <h6 class="m-0">Tambah KP-TI-A03
                    <button style="float: right;" type="button" class="btn btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </h6>
                  </div>
                  <div class="card-body " style="min-height: 375px;"> 
                      <div class="">
                        <div class="card-body">

                          <div class="alert alert-primary alert-dismissible fade show" role="alert">
                          <strong> 
                            Keterangan Siap Seminar Kerja Praktek
                          </strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                          <div class="row"> 
                          <div class="col-2"></div>
                            <div class="col-md-8 col-sm-12"> 
                            <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                            <?php foreach ($proposal as $data) {?>
                              
                           
                            <form method="post" action="<?= base_url('mahasiswa/KP_TI_A03/tambahData') ?>" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="email">Topik  :</label>
                                <input type="text" name="topik" id="form1" class="form-control" value="<?= $data->topik ?>">
                               <?= form_error('topik', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                <label for="email">NIP  :</label>
                                <input type="text" name="NIP" id="form1" class="form-control" value="<?= $data->NIP ?>">
                                 <?= form_error('NIP', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                <input type="hidden" name="Status" id="form1" class="form-control" value="1">
                              </div>
                              <input class="btn btn-primary" type="submit" name="btn" value="simpan" />
                            </form>
                           <?php } ?>
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