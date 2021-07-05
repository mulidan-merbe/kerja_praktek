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
          <?= $this->session->unset_userdata('flash'); ?>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Topik</h3>
              </div>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a type="button3" class="btn btn-info " href="<?= base_url('mahasiswa/tawaran_topik') ?>">Tawaran Topik
              </a>
              <a type="button3" class="btn btn-info <?php if($this->uri->segment(2)=="rencana_topik"){echo "active";} ?>" href="<?= base_url('mahasiswa/rencana_topik') ?>">rencana topik
              </a>
            </div>
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4" style="min-height: 410px;">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Rencana Topik</h6>
                  </div>
                  <div class="table-responsive">
                  <div class="card-body">
                    <table id="dtBasicExample" class="table mb-0 table-bordered">
                      <thead class="">
                        <tr>
                          <th  class="text-center col-1"><b>No. </b></th>
                          <th class="text-center col-4"><b>Nama</b></th>
                          <th class="text-center"><b>Topik</b></th>
                          <th class="text-center"><b>Instansi</b></th>
                          <th class="text-center"><b>Status</b></th>
                          <!-- <th class="text-center"><b>Aksi</b></th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($rencanaTopik as $data) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?>.</td>
                          <td class=""><?= $data->Username?></td>
                          <td class=""><?= $data->topik ?></td>
                          <td class="text-center"><?= $data->Instansi?></td>
                          <td class="text-center"><?= $data->Icon?></td>
                          <!-- <td class="text-center">
                          <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                            <?php if($data->Status == 2) { ?>
                               <a class="btn btn-white" disabled>
                                  <i class="far fa-trash-alt"></i>
                              </a>
                            <?php } else { ?>
                              <a class="btn btn-red tombol-hapus" href="<?= base_url('')?>mahasiswa/rencana_topik/hapusRencanaTopik?Id_rencanajudul=<?= $data->Id_rencanajudul ?>">
                              <i class="far fa-trash-alt"></i>
                              </a>
                            <?php } ?>
                          </div>
                          </td> -->
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
            <!-- Default Dark Table -->
          </div>
        </div>
          
       
            


         
  <?php $this->load->view('mahasiswa/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
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