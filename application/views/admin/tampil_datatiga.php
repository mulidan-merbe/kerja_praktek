<!doctype html>
<html class="no-js h-100" lang="en">
  <?php $this->load->view('dosen/template/head') ?>
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
                <h3 class="page-title">Data Seminar</h3>
              </div>
            </div>
            <div class="btn-group mb-2" role="group" aria-label="Basic example">
              <a type="button2" class="btn btn-info <?php if($this->uri->segment(2)=="seminar"){echo "active";} ?>" href="<?= base_url('admin/seminar') ?>">pernyataan siap seminar</a>
              <a type="button3" class="btn btn-info " href="<?= base_url('admin/seminar/jadwal') ?>">jadwal seminar</a>
            </div>
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Pernyataan Siap Seminar</h6>
                  </div>
                <div class="table-responsive">

                   <div class="card-body" style="min-height: 380px">
                     <a href="<?= base_url('admin/seminar/syaratPengajuan')?>" class="btn btn-primary mb-4">Syarat Pengajuan Pernyataan Siap Seminar</a>
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered">
                      <thead class="">
                        <tr>
                          <th  class="text-center"><b>No. </b></th>
                          <th  class="text-center"><b>NIM </b></th>
                          <th  class="text-center"><b>Nama</b></th>
                          <th  class="text-center"><b>Topik </b></th>
                          <th  class="text-center"><b>Status </b></th>
                          <!-- <th  class="text-center"><b>Dosen </b></th> -->
                          <th class="text-center"><b>Tanggal</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($kptiga as $data) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?>.</td>
                          <td class="text-center"><?= $data->NIM ?></td>
                          <td><?= $data->nama ?></td>
                          <td><?= $data->topik ?></td>
                          <td class="text-center"><?= $data->Icon?></td>
                          <!-- <td style="text-align: center"><?= $data->Username?></td> -->
                          <!-- <td style="text-align: center"><?= $data->NamaDosen?></td> -->
                          <td style="text-align: center"><?= $format1 = format_indo(date('Y-m-d', strtotime( $data->Tanggal ))); ?></td>
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

        
         
  <?php $this->load->view('admin/template/footer') ?>

  <script>
  
      $(document).ready(function() {
        $(".btn-primary").remove();
      });
    ?>
  </script>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
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