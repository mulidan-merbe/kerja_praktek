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
        <!--   <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div> -->
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Tawaran Topik</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Tawaran Topik</h6>
                  </div>
                  <div class="table-responsive">
                  <div class="card-body">
                  <?php echo $this->session->flashdata('message'); ?>
                  <?= $this->session->unset_userdata('message'); ?>
                    <table id="dtBasicExample" class="table mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  class="text-center"><b>No. </b></th>
                          <th class="text-center col-3"><b>Nama</b></th>
                          <th class="text-center"><b>Topik</th>
                          <th class="text-center"><b>Instansi</b></th>
                          <th class="text-center"><b>Jumlah</b></th>
                          <th  class="text-center"><b>Periode</b></th>
                          <th class="text-center"><b>Pemilih</b></th>
                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($rencana as $data){
                          $Id_tawaranjudul2 = $data->Id_tawaranjudul;
                        ?>
                          
                        <?php } ?>
                        <?php 
                        
                        foreach ($hitung as $dataHasil) {
                          $hasil = $dataHasil->hitung;
                        }
                        ?>
                        <?php
                        $no = 1;
                        foreach ($data_judul as $data) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?>.</td>
                          <td><?= $data->Username?></td>
                          <td style="text-align: justify"><?= $data->topik?></td>
                          <td style="text-align: justify"><?= $data->Instansi?></td>
                          <td class="text-center"><?= $data->Jumlah?></td>
                          <td class="text-center">
                            <b><?php if($data->Periode == '1') {?>
                            <span class="badge badge-success">BERJALAN</span>
                              <?php } else { ?>
                            <span class="badge badge-info">LIBURAN</span>
                              <?php } ?></b>
                          </td>
                          <td class="text-center"><?= $hasil?></td>
                          <td class="text-center">
                            <?php if ( $data->Tanggal_selesai > date('Y-m-d')) { ?>
                              <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                                  <a class="btn btn-blue tombol-konfirmasiJudul" href="<?= base_url('')?>mahasiswa/tawaran_topik/tambah?tawaran=<?= $data->Id_tawaranjudul ?>">
                                   <i class="material-icons">add</i></a>
                                </div> 
                            <?php } else { ?>
                              <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                                <button type="button" class="btn btn-blue" disabled="">
                                  <i class="material-icons">add</i>
                                </button>
                              </div>
                            <?php } ?>
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
          </div>      
  <?php $this->load->view('mahasiswa/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>

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

