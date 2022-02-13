<!doctype html>
<html class="no-js h-100" lang="en">
<?php $this->load->view('dosen/template/head') ?>
<!-- MDBootstrap Datatables  -->
<link href="<?php echo base_url('assets/template') ?>/back/MDB-Free/css/addons/datatables.min.css" rel="stylesheet">

<body class="h-100">
  <div class="container-fluid">
    <div class="row">
      <!-- Main Sidebar -->
      <?php $this->load->view('dosen/template/sidebar') ?>
      <!-- End Main Sidebar -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <?php $this->load->view('dosen/template/header') ?>
        <!-- / .main-navbar -->
        <div class="main-content-container container-fluid px-4">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
              <h3 class="page-title">Data Seminar</h3>
            </div>
          </div>
          <div class="btn-group" role="group" aria-label="Basic example">
            <a type="button3" class="btn btn-info <?php if ($this->uri->segment(2) == "seminar") {
                                                    echo "active";
                                                  } ?>" href="<?= base_url('dosen/seminar') ?>">Jadwal Seminar
            </a>
            <a type="button3" class="btn btn-info " href="<?= base_url('dosen/seminar/penilaian') ?>">Penilaian Seminar
            </a>
            <a type="button3" class="btn btn-info " href="<?= base_url('dosen/beritaAcara') ?>">Berita Acara
            </a>
          </div>
          <div class="row">
            <div class="col">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Jadwal Seminar</h6>
                </div>
                <div class="table-responsive">
                  <div class="card-body" style="min-height: 330px;">
                    <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th class="text-center"><b>No. </b></th>
                          <th class="text-center"><b>NIM </b></th>
                          <th class="text-center col-4"><b>Nama </b></th>
                          <th class="text-center"><b>Hari </b></th>
                          <th class="text-center"><b>Tanggal Seminar </b></th>
                          <th class="text-center"><b>Waktu</b></th>
                          <th class="text-center"><b>Ruangan</b></th>
                          <th class="text-center"><b>Penilaian Seminar</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($kpempat as $data) { ?>
                          <tr>
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td class="text-center"><?= $data->NIM ?></td>
                            <td class=""><?= $data->nama ?></td>
                            <td class="text-center"><?= $data->Hari ?></td>
                            <td class="text-center"><?= $format1 = format_indo(date('Y-m-d', strtotime($data->Tanggal_seminar))); ?></td>
                            <td class="text-center"><?= $data->Waktu ?></td>
                            <td class="text-center"><?= $data->Ruangan ?></td>
                            <td class="text-center">
                              <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                                <a href="<?= base_url() ?>dosen/penilaian/tambah/<?= $data->NIM ?>" class="mb-2 btn  btn-primary mr-2">
                                  <i class="material-icons">add</i>
                                </a>
                              </div>
                            </td>
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

        <?php $this->load->view('dosen/template/footer') ?>
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