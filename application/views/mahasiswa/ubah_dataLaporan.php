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
                <h3 class="page-title"> Data Laporan</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            

           <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6>Ubah Laporan
                      <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </h6>
                  </div>
                  <div class="card-body " style="min-height: 375px;"> 
                    <div class="row"> 
                      <div class="col-md-2"> </div>
                      <div class="col-md-8 col-sm-12"> 
                      <?php foreach ($ubah as $data) { ?>
                      <form method="post" action="<?= base_url('mahasiswa/Laporan/ubahData') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="NIM"  value="<?= $data->NIM ?>"   multiple >
                        </div>
                        <div class="form-group">
                          <label for="email">NIM :</label>
                          <input type="text" class="form-control" name="NIM"  value="<?= $data->NIM ?>"   disabled >
                          <?= form_error('topik', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <label for="email">Keterangan :</label>
                          <select class="form-control" name="Keterangan" autofocus="">
                            <option value="<?= $data->Keterangan ?>"><b><?= $data->Keterangan ?></b></option>
                            <option value="Seminar"><b>Seminar</b></option>
                            <option value="Revisi" ><b>Revisi</b></option>
                           <?= form_error('Keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="email">Berkas :</label>
                          <br>
                          <?php echo $this->session->flashdata('message'); ?>
                          <small><b><?= $data->Berkas ?></b></small>
                          <input type="file" class="form-control" name="Berkas" value="<?= $data->Berkas ?>" multiple>
                          <?= form_error('Berkas', '<small class="text-danger pl-3">', '</small>') ?>
                          <i><small><b>* Pastikan format berkas adalah ZIP/RAR</b></small></i>
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="old_file" value="<?= $data->Berkas ?>" multiple>
                        </div>
                        <button class="btn btn-primary" type="submit">simpan</button>
                        <!-- <button class="btn btn-success" type="submit" name="btn "><i class="fa fa-paper-plane"></i> Tambah</button> -->
                      </form>
                    <?php } ?>
                      <br>
                    </div>
                    </div>

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