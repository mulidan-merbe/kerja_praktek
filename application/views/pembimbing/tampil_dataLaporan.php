<!doctype html>
<html class="no-js h-100" lang="en">
<?php $this->load->view('pembimbing/template/head') ?>
<!-- MDBootstrap Datatables  -->
<link href="<?php echo base_url('assets/template') ?>/back/MDB-Free/css/addons/datatables.min.css" rel="stylesheet">

<body class="h-100">
  <div class="container-fluid">
    <div class="row">
      <!-- Main Sidebar -->
      <?php $this->load->view('pembimbing/template/sidebar') ?>
      <!-- End Main Sidebar -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <?php $this->load->view('pembimbing/template/header') ?>
        <!-- / .main-navbar -->
        <div class="main-content-container container-fluid px-4">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
          <?= $this->session->unset_userdata('flash'); ?>
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
              <h3 class="page-title">Data Laporan</h3>
            </div>
          </div>
          <!-- End Page Header -->
          <!-- Default Light Table -->
          <div class="row">
            <div class="col">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Laporan</h6>
                </div>
                <div class="table-responsive">
                  <div class="card-body">
                    <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th class="text-center"><b>No.</b></th>
                          <th class="text-center"><b>NIM </b></th>
                          <th class="text-center"><b>NIM </b></th>
                          <th class="text-center"><b>Berkas </b></th>
                          <th class="text-center"><b>Tanggal </b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($laporan as $data) {
                        ?>
                          <tr>
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td class="text-center"><?= $data->NIM ?></td>
                            <td class="col-5"><?= $data->nama ?></td>
                            <td class="text-center"><a class="btn btn-sm btn-light" href="<?= base_url('assets/laporan/file/') . $data->Berkas ?>"><img width="30" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back') ?>/images/avatars/zipp.svg" alt="User Avatar"></a></td>
                            <td class="text-center"><?= $format1 = format_indo(date('Y-m-d', strtotime($data->Tanggal))); ?></td>
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

        <!-- Modal Lihat -->


        <?php $this->load->view('pembimbing/template/footer') ?>
        <!-- MDBootstrap Datatables  -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
        <script type="text/javascript">
          $('#dtBasicExample').dataTable({
            "aLengthMenu": [
              [10, 25, 50, 100, 250, 500, -1],
              [10, 25, 50, 100, 250, 500, 'All']
            ],
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