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
                <h3 class="page-title"> Data KP-TI-A02A</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            

           <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6>Tambah Konsultasi Dosen Pembimbing
                     <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                   </h6>

                  </div>
                  <div class="card-body " style="min-height: 375px;"> 
                    <div class="row"> 
                      <div class="col-md-8 offset-md-2"> 
                      <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                      <form method="post" action="<?= base_url('mahasiswa/konsultasi/tambahKonsultasiDosen') ?>" enctype="multipart/form-data">
                       <?php foreach ($proposal as  $data) { ?>
                            <input type="hidden" name="Id_proposal" class="form-control"  value="<?= $data->Id_proposal ?>">
                            <input type="hidden" name="NIP" class="form-control"  value="<?= $data->NIP ?>">  
                         <?php } ?> 
                        <div class="form-group">
                          <label>Perihal  :</label>
                          <select class="form-control" name="Tema" autofocus="">
                            <option value=""><b>-- PILIH --</b></option>
                            <option value="BAB I"><b>BAB I</b></option>
                            <option value="BAB II"><b>BAB II</b></option>
                            <option value="BAB III"><b>BAB III</b></option>
                            <option value="BAB IV"><b>BAB IV</b></option>
                            <option value="BAB V"><b>BAB V</b></option>
                            <option value="<?= set_value('Tema') ?>"><b></b></option>
                          </select>
                          <?= form_error('Tema', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <!-- <div class="form-group">
                          <label for="">Tema :</label>
                          <input type="text" name="Tema" class="form-control" placeholder="Tema" value="" autofocus>  
                          <?= form_error('Tema', '<small class="text-danger pl-3">', '</small>') ?>         
                        </div> -->
                        <div class="form-group">
                          <label for="uraian">Uraian :</label>
                          <textarea name="Uraian" type="text" class="form-control" id="uraian" cols="90" rows="15" placeholder="Uraian Konsultasi" value="<?= set_value('Uraian') ?>" ><?= set_value('Uraian') ?></textarea>
                        <?= form_error('Uraian', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                          <label for="uraian">Berkas :</label><br>
                          <?php echo $this->session->flashdata('message'); ?>
                          <input type="file" name="berkas_file" class="form-control"  value="<?= set_value('Tema')?>">  
                          <?= form_error('File', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="Status" class="form-control"  value="1">         
                        </div>
                        <button type="submit" class="btn btn-primary" >simpan</button>
                        <button class="btn btn-info" type="Reset">Reset</button>
                        <br>
                      </form>
                    </div>
                    </div>
                      <!-- <div class="">
                       <h6 class="m-0"><a href="" class="mb-2 btn btn-primary mr-2" data-toggle="modal" data-target="#modalSubscriptionForm">Tambah</a></h6>
                      </div> -->
                  </div>
                 </div>
                </div>   
            </div>
          </div>
          
         

          <!-- Modal Edit -->
         
  <?php $this->load->view('mahasiswa/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
  <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>


