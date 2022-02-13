<!doctype html>
<html class="no-js h-100" lang="en">
<?php $this->load->view('admin/template/head') ?>

<body class="h-100">
  <div class="container-fluid">
    <div class="row">
      <!-- Main Sidebar -->
      <?php $this->load->view('admin/template/sidebar') ?>
      <!-- End Main Sidebar -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <?php $this->load->view('admin/template/header') ?>
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
            <div class="col-md-3">
              <div class="card card-small mb-4">
                <div class="card-header">
                  <h6 class="m-0 text-center">Proposal</h6>
                </div>
                <div class="card-body border-bottom">
                  <?php if ($proposal_periode > 0) { ?>
                    <h1 class=" text-center"><?= $proposal_periode ?></h1>
                  <?php } else { ?>
                    <h1 class=" text-center">0</h1>
                  <?php } ?>
                </div>
                <div class="card-footer">
                  <?php if ($proposal > 0) { ?>
                    <h6><b>Data terbaru</b>
                      <span class="badge badge-pill badge-primary"><?= $proposal ?></span>
                      <a href="<?= base_url('admin/proposal') ?>" class="alert-link float-right">Lihat</a>
                    </h6>
                  <?php } else { ?>
                    <h6><b>Data terbaru</b>
                      <span class="badge badge-pill badge-primary">0</span>
                      <a href="<?= base_url('admin/proposal') ?>" class="alert-link float-right">Lihat</a>
                    </h6>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-small mb-4">
                <div class="card-header">
                  <h6 class="m-0 text-center">Pernyataan Siap Seminar</h6>
                </div>
                <div class="card-body border-bottom">
                  <?php if ($tiga > 0) { ?>
                    <h1 class=" text-center"><?= $tiga ?></h1>
                  <?php } else { ?>
                    <h1 class=" text-center">0</h1>
                  <?php } ?>
                </div>
                <div class="card-footer">
                  <?php if ($tiga > 0) { ?>
                    <h6><b>Data terbaru</b>
                      <span class="badge badge-pill badge-primary"><?= $tiga ?></span>
                      <a href="<?= base_url('admin/seminar') ?>" class="alert-link float-right">Lihat</a>
                    </h6>
                  <?php } else { ?>
                    <h6><b>Data terbaru</b>
                      <span class="badge badge-pill badge-primary">0</span>
                      <a href="<?= base_url('admin/seminar') ?>" class="alert-link float-right">Lihat</a>
                    </h6>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-small mb-4">
                <div class="card-header">
                  <h6 class="m-0 text-center">Laporan</h6>
                </div>
                <div class="card-body border-bottom">
                  <?php if ($laporan > 0) { ?>
                    <h1 class=" text-center"><?= $laporan ?></h1>
                  <?php } else { ?>
                    <h1 class=" text-center">0</h1>
                  <?php } ?>
                </div>
                <div class="card-footer">
                  <?php if ($laporan > 0) { ?>
                    <h6><b>Data terbaru</b>
                      <span class="badge badge-pill badge-primary"><?= $laporan ?></span>
                      <a href="<?= base_url('admin/laporan') ?>" class="alert-link float-right">Lihat</a>
                    </h6>
                  <?php } else { ?>
                    <h6><b>Data terbaru</b>
                      <span class="badge badge-pill badge-primary">0</span>
                      <a href="<?= base_url('admin/laporan') ?>" class="alert-link float-right">Lihat</a>
                    </h6>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-small mb-4">
                <div class="card-header">
                  <h6 class="m-0 text-center">BA & DPNA</h6>
                </div>
                <div class="card-body border-bottom">
                  <?php if ($empatC > 0) { ?>
                    <h1 class=" text-center"><?= $empatC ?></h1>
                  <?php } else { ?>
                    <h1 class=" text-center">0</h1>
                  <?php } ?>
                </div>
                <div class="card-footer">
                  <?php if ($empatC > 0) { ?>
                    <h6><b>Data terbaru</b>
                      <span class="badge badge-pill badge-primary"><?= $empatC ?></span>
                      <a href="<?= base_url('admin/beritaAcara') ?>" class="alert-link float-right">Lihat</a>
                    </h6>
                  <?php } else { ?>
                    <h6><b>Data terbaru</b>
                      <span class="badge badge-pill badge-primary">0</span>
                      <a href="<?= base_url('admin/beritaAcara') ?>" class="alert-link float-right">Lihat</a>
                    </h6>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-md-4">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Data Terbaru</h5>
                </div>
                <div class="card-body" style="min-height: 375px">
                  <?php if ($proposal > 0) { ?>
                    <div class="alert alert-success" role="alert">
                      Proposal <span class="badge badge-pill badge-primary"><?= $proposal ?></span><a href="<?= base_url('admin/Proposal') ?>" class="alert-link float-right">Lihat</a>
                    </div>
                  <?php } ?>
                  <?php if ($pembimbing > 0) { ?>
                    <div class="alert alert-warning" role="alert">
                      Konsultasi Mahasiswa <span class="badge badge-pill badge-primary"><?= $pembimbing ?></span><a href="<?= base_url('admin/Pembimbing_lapangan') ?>" class="alert-link float-right">Lihat</a>
                    </div>
                  <?php } ?>
                  <?php if ($tiga > 0) { ?>
                    <div class="alert alert-info" role="alert">
                      Pernyataan Siap Seminar <span class="badge badge-pill badge-primary"><?= $tiga ?></span><a href="<?= base_url('admin/KP_TI_A03') ?>" class="alert-link float-right">Lihat</a>
                    </div>
                  <?php } ?>
                  <?php if ($empatC > 0) { ?>
                    <div class="alert alert-info" role="alert">
                      Berita Acara Penilaian <span class="badge badge-pill badge-primary"><?= $empatC ?></span><a href="<?= base_url('admin/KP_TI_A04C') ?>" class="alert-link float-right">Lihat</a>
                    </div>
                  <?php } ?>
                  <?php if ($laporan > 0) { ?>
                    <div class="alert alert-info" role="alert">
                      Laporan <span class="badge badge-pill badge-primary"><?= $laporan ?></span><a href="<?= base_url('dosen/laporan') ?>" class="alert-link float-right">Lihat</a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div> -->
            <div class="col-md-12">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Periode Pelaksanaan</h6>
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
                          <span class="badge badge-pill badge-info mb-4"><?php if ($data->Periode == 1) { ?>BERJALAN <?php } else { ?>LIBURAN <?php } ?></span>
                          <table class="table table-bordered table-striped">
                            <tr>
                              <th class="text-center">No.</th>
                              <th class="text-center">Kegiatan </th>
                              <th class="text-center">Tanggal</th>
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
        <?php $this->load->view('admin/template/footer') ?>