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
            <a type="button3" class="btn btn-info <?php if ($this->uri->segment(2) == "konsultasi") {
                                                    echo "active";
                                                  } ?>" href="<?= base_url('pembimbing/konsultasi') ?>">Konsultasi
              <?php if ($duaB > 0) {  ?>
                <span class="badge badge-light">
                  <?= $duaB ?>
                </span>
              <?php } ?>
            </a>
            <a type="button3" class="btn btn-info " href="<?= base_url('pembimbing/penilaianLapangan') ?>">Penilaian lapangan
              <!-- <?php if ($tiga > 0) {  ?>
                        <span class="badge badge-light">
                          <?= $tiga ?>
                        </span>
                 <?php } ?> -->
            </a>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Konsultasi Mahasiswa</h6>
                </div>
                <div class="table-responsive">
                  <div class="card-body">
                    <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th class="col-1 text-center "><b>No.</b></th>
                          <th class="col-3 text-center"><b>NIM</b></th>
                          <th class="col-5 text-center"><b>Nama</b></th>
                          <!-- <th  class="text-center"><b>Tema</b></th>
                          <th  class="text-center"><b>Berkas</b></th> -->
                          <!-- <th  class="text-center"><b>Status</b></th> -->
                          <th class="text-center"><b>Jumlah</b></th>

                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($syarat as $data) {
                          $jumlah = $data->Jumlah;
                        ?>
                          <?php
                          $no = 1;
                          foreach ($kpdua_b as $data) { ?>
                            <tr>
                              <td class="col-1 text-center"><?= $no++ ?>.</td>
                              <td class="col-2 text-center"><?= $data->NIM ?></td>
                              <td class="col-4"><?= $data->nama ?></td>
                              <td class="col-3 text-center">
                                <!-- <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:40%">
                              
                            </div><?= $data->total ?></td> -->
                                <div class="progress-bar progress-bar-info progress-bar-striped progress-bar-animated" role="progressbar" style="min-height: 2em; width:40%" value="3">
                                  <?= $data->total ?>
                                </div>
                              </td>
                              <td class="text-center">
                                <div class="btn-group btn-group-sm " role="group" aria-label="Table row actions">
                                  <a class="mb-2 btn  btn-success" href="<?= base_url('') ?>pembimbing/konsultasi/detail/<?= $data->NIM ?>" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a>
                                  <?php if ($data->total >= $jumlah) { ?>
                                    <a class="mb-2 btn  btn-primary" href="<?= base_url('') ?>pembimbing/penilaianLapangan/tambah/<?= $data->NIM ?>" data-placement="top" title="Lihat"><i class="material-icons">add</i></a>
                                  <?php } ?>
                                </div>
                              </td>
                            </tr>
                          <?php } ?>
                        <?php } ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- lihat -->
        <?php foreach ($kpdua_b as $data) { ?>
          <div class="modal fade" id="modal-lihat<?= $data->Id_duaB; ?>" tabindex="-1" role="dialog" labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">DETAIL </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="<?= base_url('pembimbing/rencana_judul/updateRencanajudul') ?>" enctype="multipart/form-data">
                  <div class="modal-body mx-3">
                    <div class="form-group">
                      <label>Uraian :</label>
                      <textarea name="Uraian" type="text" class="form-control" cols="90" rows="15" placeholder="<?= $data->Uraian ?>" readonly></textarea>
                    </div>
                    <hr>
                  </div>

                  <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>

        <!-- edit -->
        <?php foreach ($kpdua_b as $data) { ?>
          <div class="modal fade" id="modal-edit<?= $data->Id_duaB; ?>" tabindex="-1" role="dialog" labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">PILIH</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="<?= base_url('pembimbing/KP_TI_A02B/masukkanData') ?>" enctype="multipart/form-data">
                  <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                      <input type="hidden" name="Id_duaB" class="form-control" value="<?= $data->Id_duaB; ?>">
                    </div>
                    <div class="form-group mb-5">
                      <label>Pilih:</label>
                      <select class="form-control" name="Status">
                        <option value="1"><b>Diproses</b></option>
                        <option value="2"><b>Diterima</b></option>
                        <option value="3"><b>Ditolak</b></option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-primary">PILIH<i class="fas fa-paper-plane-o ml-1"></i></button>
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
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
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