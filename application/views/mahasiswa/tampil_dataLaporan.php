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
              <h3 class="page-title">Data Laporan </h3>
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
                    <div class="col-4">
                      <div class="alert alert-info" role="alert">
                        Catatan Penilaian Seminar <span class="badge badge-pill badge-primary"></span><a href="<?= base_url('mahasiswa/KP_TI_A04') ?>" data-toggle="modal" data-target="#modal-lihat" class="alert-link" style="float: right;">Lihat</a>
                      </div>
                    </div>
                    <hr>

                    <?php foreach ($jadwal as $data) {
                      $tanggal_sekarang = date('Y-m-d');
                      $tanggal = $data->Tanggal_selesai;
                    ?>

                    <?php } ?>

                    <?php if ($tanggal_sekarang >= $tanggal) { ?>
                      <button type="button" class="btn btn-primary" disabled><i class="fas fa-plus">&nbsp</i>Tambah</button>
                    <?php } else { ?>
                      <a href="<?= base_url('mahasiswa/laporan/tambah') ?>" class="mb-2 btn btn-primary mr-2"><i class="fas fa-plus">&nbsp</i>Tambah</a>
                    <?php } ?>

                    <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th class="text-center"><b>No </b></th>
                          <th class="text-center"><b>NIM </b></th>
                          <th class="text-center"><b>Keterangan </b></th>
                          <th class="text-center"><b>Berkas </b></th>
                          <th class="text-center"><b>Tanggal </b></th>
                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($laporan as $data) {
                        ?>
                          <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $data->NIM ?></td>
                            <td class="text-center"><span class="badge badge-info"><?= $data->Keterangan ?></span></td>
                            <td class="text-center"><a class="btn btn-sm btn-light" onclick=" window.open('<?= base_url('assets/laporan/file/') . $data->Berkas ?>')"><img width="20" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back') ?>/images/avatars/zipp.svg" alt="User Avatar"></a></td>
                            <td class="text-center"><?= $format1 = format_indo(date('Y-m-d', strtotime($data->Tanggal))); ?></td>
                            <td class="text-center">
                              <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                                <a class="mb-2 btn btn-info " href="<?= base_url() ?>mahasiswa/laporan/ubah/<?= $data->Id_laporan ?>"><i class="material-icons">&#xE254;</i></a>
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

        <div class="modal fade" id="modal-lihat" tabindex="-1" role="dialog" labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="min-height: 300px;">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">DETAIL </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="card-body border-bottom">
                <?php foreach ($catatanDosen as $data) { ?>
                  <form action="">
                    <div class="form-group">
                      <label for="">Catatan Dosen</label>
                      <textarea class="form-control" name="" id="" cols="30" rows="10" readonly=""><?= $data->Catatan ?></textarea>

                    </div>

                  </form>
                <?php } ?>
                <?php foreach ($catatanLapangan as $data) { ?>
                  <hr>
                  <form action="">
                    <div class="form-group">
                      <label for="">Catatan Pembimbing Lapangan</label>
                      <textarea class="form-control" name="" id="" cols="30" rows="10" readonly=""><?= $data->Catatan ?></textarea>

                    </div>

                  </form>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Lihat -->


        <?php $this->load->view('mahasiswa/template/footer') ?>
        <!-- MDBootstrap Datatables  -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
        <!--  <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script> -->

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