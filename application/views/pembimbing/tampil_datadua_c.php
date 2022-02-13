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
              <h3 class="page-title">Data Konsultasi</h3>
            </div>
          </div>
          <div class="btn-group" role="group" aria-label="Basic example">
            <a type="button3" class="btn btn-info " href="<?= base_url('pembimbing/konsultasi') ?>">Konsultasi
            </a>
            <a type="button3" class="btn btn-info <?php if ($this->uri->segment(2) == "penilaianLapangan") {
                                                    echo "active";
                                                  } ?>" href="<?= base_url('pembimbing/penilaianLapangan') ?>">Penilaian lapangan
            </a>
          </div>
          <div class="row">
            <div class="col">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Penilaian Lapangan pembimbing</h6>
                </div>
                <div class="table-responsive ">
                  <div class="card-body">
                    <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead>
                        <!--  <thead class="bg-light"> -->
                        <tr>
                          <th class="text-center">No. </th>
                          <th class="text-center">NIM </th>
                          <th class="text-center col-4">Nama</th>
                          <th class="text-center">Nilai Rata-rata</th>
                          <th class="text-center">Tanggal</th>
                          <th class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($dua_C as $data) {
                          $Total = $data->Nilai_satu + $data->Nilai_dua + $data->Nilai_tiga + $data->Nilai_empat + $data->Nilai_lima;
                          $Jumlah = 5;
                          $Rata   = $Total / $Jumlah;
                        ?>
                          <tr>
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td class="text-center"><?= $data->NIM ?></td>
                            <td class=""><?= $data->nama ?></td>
                            <td class="text-center"><span class="badge badge-info"><?= $Rata ?></span></td>
                            <td class="text-center"><?= $format1 = format_indo(date('Y-m-d', strtotime($data->Tanggal))); ?></td>
                            <td class="text-center">
                              <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                                <a class="mb-2 btn btn-success " data-toggle="modal" data-target="#modal-lihat<?= $data->Id_duaC; ?>" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a>
                                <a class="mb-2 btn btn-info " href="<?= base_url() ?>pembimbing/penilaianLapangan/ubah/<?= $data->Id_duaC ?>"><i class="material-icons">&#xE254;</i></a>
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
        <?php foreach ($dua_C as $data) { ?>
          <div class="modal fade" id="modal-lihat<?= $data->Id_duaC; ?>" tabindex="-1" role="dialog" labelledby="myModalLabel">
            <div class="modal-dialog modal-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">DETAIL </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6"></div>
                </div>
                <form method="post" action="<?= base_url('dosen/rencana_judul/updateRencanajudul') ?>" enctype="multipart/form-data">
                  <div class="modal-body mx-3">
                    <table class="table  mb-0 table-bordered">
                      <tr>
                        <td><b>Kerajian dan Aktivitas di Lapangan</b></td>
                        <td><input type="text" name="Nilai_satu" class="form-control" value="<?= $data->Nilai_satu ?>" disabled></td>
                      </tr>
                      <tr>
                        <td><b>Kemampuan Mengemukakan Ide</b></td>
                        <td><input type="number" name="Nilai_dua" class="form-control" value="<?= $data->Nilai_dua ?>" disabled></td>
                      </tr>
                      <tr>
                        <td><b>Kemampuan Menganalisa Persoalan</b></td>
                        <td><input type="number" name="Nilai_tiga" class="form-control" value="<?= $data->Nilai_tiga ?>" disabled></td>
                      </tr>
                      <tr>
                        <td><b>Hasil Penugasan</b></td>
                        <td><input type="number" name="Nilai_empat" class="form-control" value="<?= $data->Nilai_empat ?>" disabled></td>
                      </tr>
                      <tr>
                        <td><b>Etika Seminar dan Metode Presentasi</b></td>
                        <td><input type="number" name="Nilai_lima" class="form-control" value="<?= $data->Nilai_lima ?>" disabled></td>
                      </tr>
                    </table>
                  </div>

                  <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>

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