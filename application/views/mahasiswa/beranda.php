<!DOCTYPE html>
<html class="no-js h-100" lang="en">
<?php $this->load->view('mahasiswa/template/head') ?>

<body class="h-100">
  <div class="container-fluid">
    <div class="row">
      <!-- Main Sidebar -->
      <?php $this->load->view('mahasiswa/template/sidebar') ?>
      <!-- End Main Sidebar -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <?php $this->load->view('mahasiswa/template/header') ?>
        <div class="alert alert-primary alert-dismissible fade show mb-0" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <i class="fa fa-check mx-2"></i> Selamat Datang di Sistem Informasi Manajemen Kerja Praktek Informatika Universitas Tanjungpura
        </div>
        <!-- / .main-navbar -->
        <div class="main-content-container container-fluid px-4">
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
          </div>
          <div class="row">
            <div class="col-md-5 mb-4">
              <?php if ($draft) { ?>
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Draft pengajuan</h6>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                      Draft pengajuan anda telah disetujui.
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lihat">Lihat</button>
                  </div>
                </div>

              <?php } else { ?>
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Draft pengajuan</h6>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-warning" role="alert">
                      Draft pengajuan belum disetujui.
                    </div>
                  </div>
                </div>
              <?php } ?>

              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Data terbaru</h5>
                </div>
                <div class="card-body" style="min-height: 150px;">
                  <?php if ($rencanaTopik > 0) { ?>
                    <div class="alert alert-warning" role="alert">
                      Rencana Topik <span class="badge badge-pill badge-primary" id="total-data"><?= $rencanaTopik ?></span><a href="<?= base_url('mahasiswa/rencana_topik') ?>" class="alert-link float-right">Lihat</a>
                    </div>
                  <?php } ?>
                  <?php if ($dua > 0) { ?>
                    <div class="alert alert-success" role="alert">
                      Surat Pengantar <span class="badge badge-pill badge-primary"><?= $dua ?></span><a href="<?= base_url('mahasiswa/pembimbingLapangan') ?>" class="alert-link float-right">Lihat</a>
                    </div>
                  <?php } ?>
                  <?php if ($empat > 0) { ?>
                    <div class="alert alert-info" role="alert">
                      Jadwal Seminar <span class="badge badge-pill badge-primary"><?= $empat ?></span><a href="<?= base_url('mahasiswa/seminar') ?>" class="alert-link float-right">Lihat</a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>

            <div class="col-md-7">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Jadwal Pelaksanaan</h6>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item p-3">
                    <div class="row">
                      <div class="col">
                        <?php

                        foreach ($jadwal as $data) {
                          $format1 = format_indo(date('Y-m-d', strtotime($data->Tanggal_mulai)));
                          $format2 = format_indo(date('Y-m-d', strtotime($data->Tanggal_selesai)));
                          $format3 = format_indo(date('Y-m-d', strtotime($data->Pengajuan_seminar)));
                          $format4 = format_indo(date('Y-m-d', strtotime($data->Pelaksanaan_seminar)));
                          $format5 = format_indo(date('Y-m-d', strtotime($data->RevisiDpengumpulan)));
                        ?>
                          <span class="badge badge-pill badge-info mb-4"><?php if ($data->Periode == 1) { ?>BERJALAN <?php } else { ?>LIBURAN <?php } ?></span><br>
                          <table class="table table-bordered table-striped">
                            <tr>
                              <th style="text-align: center">No.</th>
                              <th style="text-align: center">Kegiatan </th>
                              <th style="text-align: center">Tanggal</th>
                            </tr>
                            <tr>
                              <td>1.</td>
                              <td>Pelaksanaan Kerja Praktek </td>
                              <td> <?= $format1; ?> - <?= $format2; ?></td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td>Pengajuan Seminar Kerja Praktek </td>
                              <td><?= $format3; ?></td>
                            </tr>
                            <tr>
                              <td>3.</td>
                              <td>Pelaksanaan Seminar Kerja Praktek </td>
                              <td><?= $format4; ?></td>
                            </tr>
                            <tr>
                              <td>4.</td>
                              <td>Revisi dan Pengumpulan Laporan Kerja Praktek </td>
                              <td><?= $format5; ?></td>
                            </tr>
                          </table>
                        <?php } ?>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <br>

        <div class="modal fade" id="modal-lihat" tabindex="-1" role="dialog" labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">DETAIL </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="card-body border-bottom">
                <?php foreach ($draft as $data) { ?>

                  <table class="table table-bordered table-striped">
                    <tr>
                      <th style="text-align: center">NIM</th>
                      <th><?= $data['mahasiswa']['nim']; ?></th>
                    </tr>
                    <tr>
                      <th style="text-align: center">Nama</th>
                      <th><?= $data['mahasiswa']['nama']; ?></th>
                    </tr>
                    <tr>
                      <th style="text-align: center">Topik</th>
                      <th><?= $data['topik'] ?> </th>
                    </tr>
                    <tr>
                      <th style="text-align: center">NIP</th>
                      <th><?= $data['pembimbingLapangan']['nip'] ?> </th>
                    </tr>
                    <tr>
                      <th style="text-align: center">Dosen Pembimbing</th>
                      <th><?= $data['pembimbingLapangan']['nama'] ?> </th>
                    </tr>
                  </table>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('mahasiswa/template/footer') ?>