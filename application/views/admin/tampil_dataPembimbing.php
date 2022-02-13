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
              <h3 class="page-title">Data Pembimbing Lapangan</h3>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Pembimbing Lapangan</h6>
                </div>
                <div class="table-responsive">
                  <div class="card-body">
                    <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th class="text-center"><b>No. </b></th>
                          <th class="text-center"><b>NIM </b></th>
                          <th class="text-center"><b>Nama </b></th>
                          <th class="text-center"><b>No Identitas </b></th>
                          <th class="text-center"><b>Nama</b></th>
                          <th class="text-center"><b>Berkas </b></th>
                          <th class="text-center"><b>Tanggal </b></th>
                          <th class="text-center"><b>Aksi </b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($pembimbing as $data) { ?>
                          <tr>
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td><?= $data->NIM ?></td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->No_identitas ?></td>
                            <td><?= $data->Nama ?></td>
                            <td class="text-center">
                              <a class="btn btn-sm btn-light" href="<?= base_url('assets/kpifempat/file/') . $data->File ?>"><img width="20" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back') ?>/images/avatars/pdf.svg" alt="User Avatar"></a>
                            </td>
                            <td class="text-center"><?= $format1 = format_indo(date('Y-m-d', strtotime($data->Tanggal))); ?></td>
                            <td>
                              <div class="btn-group btn-group-sm " role="group" aria-label="Table row actions">
                                <a class="mb-2 btn  btn-info" data-toggle="modal" data-target="#modal-lihat<?= $data->NIM; ?>" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a>
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
        <!-- lihat -->
        <?php foreach ($pembimbing as $data) { ?>
          <div class="modal fade" id="modal-lihat<?= $data->NIM; ?>" tabindex="-1" role="dialog" labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">DETAIL </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="<?= base_url('admin/rencana_judul/updateRencanajudul') ?>" enctype="multipart/form-data">
                  <div class="modal-body mx-3">
                    <div class="form-group">
                      <label>Jabatan :</label>
                      <input type="text" class="form-control" value="<?= $data->Jabatan ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Alamat :</label>
                      <input type="text" class="form-control" value="<?= $data->Alamat_kantor ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>No Handphone :</label>
                      <input type="text" class="form-control" value="<?= $data->No_hp ?>" readonly>
                    </div>
                  </div>

                  <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>

        <?php $this->load->view('admin/template/footer') ?>
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