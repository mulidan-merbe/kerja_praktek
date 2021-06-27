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
                <h3 class="page-title">Data Pembimbing Lapangan</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
             <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Tambah Pembimbing Lapangan
                       <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </h6>
                  </div>
                  <div class="card-body " style="min-height: 375px;"> 
                      <div class="">
                        <div class="card-body">
                          <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                          <form method="post" action="<?= base_url('mahasiswa/pembimbing_lapangan/tambah') ?>" enctype="multipart/form-data">

                          <div class="row"> 
                            <div class="col-md-6 col-sm-12">
                               <div class="form-group">
                                <label >Nama Pembimbing :</label>
                                <input type="text" name="Username"  class="form-control" placeholder="Nama Pembimbing" value="<?= set_value('Username') ?>" autofocus>
                                <?= form_error('Username', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                 <label for="email">No Identitas :</label>
                                 <input type="text" name="No_identitas" id="form2" class="form-control" placeholder="No Identitas" value="<?= set_value('No_identitas') ?>">
                                 <?= form_error('No_identitas', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                 <label for="email">Jabatan :</label>
                                 <input type="text" name="Jabatan" id="form3" class="form-control" placeholder="Jabatan" value="<?= set_value('Jabatan') ?>">
                                 <?= form_error('Jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12"> 
                              <div class="form-group">
                                 <label for="email">Alamat Instansi :</label>
                                 <input type="text" name="Alamat_kantor" id="form4" class="form-control" placeholder="Alamat Instansi" value="<?= set_value('Alamat_kantor') ?>">
                                  <?= form_error('Alamat_kantor', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                <label for="form5">No Handphone :</label>
                               <input type="text" name="No_hp" id="form5" class="form-control" placeholder="No Handphone" value="<?= set_value('No_hp') ?>">
                                <?= form_error('No_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                               <label for="email">Berkas :</label>
                               <input type="file" class="form-control" name="File" value="<?= set_value('File') ?>" multiple>
                               <?= form_error('File', '<small class="text-danger pl-3">', '</small>') ?>
                              </div>
                            </div>
                            <?php foreach ($proposal as $data): ?>
                                <input type="hidden" class="form-control"  name="Id_proposal"  value="<?= $data->Id_proposal ?>"   multiple >
                            <?php endforeach ?>
                            <div class="col-md-6 col-sm-12">
                              <button class="btn btn-primary" type="submit">Simpan</button>
                              <button class="btn btn-info" type="Reset">Reset</button>
                            </div>
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