<!doctype html>
<html class="no-js h-100" lang="en">
  <?php $this->load->view('admin/template/head') ?>
      <!-- MDBootstrap Datatables  -->
      <link href="<?php echo base_url('assets/template') ?>/back/MDB-Free/css/addons/datatables.min.css" rel="stylesheet">
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <?php $this->load->view('admin/template/sidebar') ?>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <?php $this->load->view('admin/template/header') ?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Akun Pembimbing</h3>
              </div>
            </div>
             <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Tambah Akun Pembimbing Lapangan
                    <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></h6>
                  </div>
                  <div class="card-body " style="min-height: 375px;"> 
                      <div class="">
                        <div class="card-body">
                          <div class="row"> 
                            <div class="col-md-8 offset-md-2"> 
                            <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                             <?php echo $this->session->flashdata('message'); ?>
                              <form method="post" action="<?= base_url('admin/UserPembimbing/tambah') ?>" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="email">Nama  :</label>
                                <input type="text" name="Nama" id="form1" class="form-control" placeholder="Nama " value="<?= set_value('Nama') ?>">
                                <?= form_error('Nama', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                 <label for="email">No Identitas :</label>
                                 <input type="text" name="No_identitas" id="form2" class="form-control" placeholder="No Identitas" value="<?= set_value('No_identitas') ?>">
                                 <?= form_error('No_identitas', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                 <label for="email">Password :</label>
                                 <input type="password" name="Password" id="form2" class="form-control" placeholder="Password" >
                                 <small>Pastikan password default sama dengan no identitas</small><br>
                                 <?= form_error('Password', '<small class="text-danger pl-3">', '</small>'); ?>                              </div>
                             <button type="submit" class="btn btn-primary">SIMPAN</button>
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
          
 
         
  <?php $this->load->view('admin/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
  <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>