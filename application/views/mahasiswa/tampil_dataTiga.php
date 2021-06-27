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
                <h3 class="page-title">Data Seminar</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4" style="min-height: 410px;">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Pernyataan siap seminar</h6>
                  </div>
                <div class="table-responsive">
                   <div class="card-body">
                    <?php foreach ($syarat as $data){ 
                      $jumlah = $data->Jumlah;
                    ?>
                    <?php foreach ($limit as $data) {
                      $Id_proposal = $data->Id_proposal;
                     ?>

                    <?php foreach ($proposal as $data) {
                      $Id_proposal2 = $data->Id_proposal;
                     ?>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>

                    <?php if ($dataDuaA ) { ?>
                      <?php if($Id_proposal == $Id_proposal2) { ?>
                        <?php if($kpdua >=  $jumlah) { ?>
                          <?php if($cek) { ?>
                            <button type="button" class="btn btn-primary" disabled><i class="fas fa-plus">&nbsp</i>Tambah</button>
                          <?php } else { ?>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus">&nbsp</i>Tambah </a>
                          <?php } ?>
                        <?php } else { ?>
                          <button type="button" class="btn btn-primary" disabled><i class="fas fa-plus">&nbsp</i>Tambah</button>
                        <?php } ?>
                      <?php } else { ?>
                        <button type="button" class="btn btn-primary" ><i class="fas fa-plus">&nbsp</i>Tambah</button>
                      <?php  } ?>
                    <?php } else { ?>
                      <button type="button" class="btn btn-primary" disabled><i class="fas fa-plus">&nbsp</i>Tambah</button>
                    <?php } ?>
                
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead >
                        <tr>
                          <th  class="text-center"><b>No. </b></th>
                          <th  class="text-center"><b>NIM </b></th>
                          <th  class="text-center"><b>Status </b></th>
                          <th  class="text-center"><b>Tanggal </b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($kptiga as $data) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?></td>
                          <td class="text-center"><?= $data->NIM ?></td>
                          <td class="text-center"><?= $data->Icon ?></td>
                          <td class="text-center"><?= $format1 = format_indo(date('Y-m-d', strtotime( $data->Tanggal ))); ?></td>
                         
                        </tr>
                        <?php } ?>
                        
                      </tbody>
                    </table>
  
                   </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
            <!-- Default Dark Table -->
          </div>

          <!-- Modal Edit -->
           <?php foreach ($dataDuaA as $data) { ?>
            <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">TAMBAH</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?= base_url('mahasiswa/KP_TI_A03/tambahData') ?>" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                   
                      <div class="alert alert-primary" role="alert">
                        Pernyataan Siap Seminar
                      </div>
                      <input type="hidden" name="NIP" class="form-control" value="<?= $data->NIP ?>">  
                      <input type="hidden" name="Status"  class="form-control" value="1">    
                    </div>
                    <div class="modal-footer d-flex justify-content-center"> 
                      <button class="btn btn-primary">SIMPAN<i class="fas fa-paper-plane-o ml-1"></i></button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
         
  <?php $this->load->view('mahasiswa/template/footer') ?>

  <script>
  
      $(document).ready(function() {
        $(".btn-primary").remove();
      });
    ?>
  </script>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
  <!-- <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script> -->

<script type="text/javascript">
    $('#dtBasicExample').dataTable({
    "aLengthMenu": [[10, 25, 50, 100, 250, 500, -1], [10, 25, 50, 100, 250, 500, 'All']],
    "oLanguage": { 
       "sInfo": 'Total _TOTAL_ Data ditampilkan (_START_ sampai _END_)',
     "sLengthMenu": 'Tampilkan _MENU_ Data',   
    "sInfoEmpty": 'Tidak ada Data.',
    "sSearch": 'Pencarian:',
    "sEmptyTable": 'Tidak ada Data di dalam Database',
    "oPaginate": {
     "sNext": 'Selanjutnya',
     "sLast": 'Terakhir',
     "sFirst": 'Pertama',
     "sPrevious": 'Sebelumnya'
     }
     }
   });
</script>