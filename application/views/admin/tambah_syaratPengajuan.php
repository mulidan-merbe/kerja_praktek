<!doctype html>
<html class="no-js h-100" lang="en">
<?php $this->load->view('admin/template/head') ?>
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
              <h3 class="page-title">Data KP-TI-A03</h3>
            </div>
          </div>
          <!-- End Page Header -->
          <!-- Default Light Table -->
          <div class="row">

            <div class="col">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Tambah Syarat Pengajuan Pernyataan Siap Seminar
                    <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                  </h6>
                </div>
                <div class="card-body " style="min-height: 420px;">
                  <div class="">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-8 offset-md-2 col-sm-12">
                          <?php if ($this->session->flashdata('msg')) {
                            echo $this->session->flashdata('msg');
                          } ?>
                          <?php foreach ($jadwal as $data) { ?>
                            <form method="post" action="<?= base_url('admin/KP_TI_A03/tambah') ?>" enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="hidden" class="form-control" name="Id_pelaksanaan" value="<?= $data->Id_pelaksanaan ?>">
                              </div>
                              <div class="form-group">
                                <label>Tahun :</label>
                                <input type="text" class="form-control" name="Tahun" value="<?= $data->Tahun ?>" disabled>
                                <?= form_error('Tahun', '<small class="text-danger pl-3">', '</small>') ?>
                              </div>
                              <div class="form-group">
                                <label>Periode :</label>
                                <input type="text" class="form-control" name="Pelaksanaan" value="<?php if ($data->Periode == 1) { ?>BERJALAN<?php } else { ?>
                            LIBURAN <?php } ?>">
                                <?= form_error('Pelaksanaan', '<small class="text-danger pl-3">', '</small>') ?>
                              </div>
                              <div class="form-group">
                                <label for="jumlah">Jumlah :</label>
                                <input type="number" name="Jumlah" id="jumlah" class="form-control" placeholder="Jumlah " value="<?= set_value('Jumlah') ?>" autofocus>
                                <?= form_error('Jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                            <?php } ?>
                            <input class="btn btn-primary" type="submit" name="btn" value="simpan" />
                            </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        


        <?php $this->load->view('admin/template/footer') ?>
        <!-- MDBootstrap Datatables  -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
        <script>
          $(document).ready(function() {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
          });
        </script>