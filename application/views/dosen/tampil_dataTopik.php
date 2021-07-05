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
          <?= $this->session->unset_userdata('flash'); ?>
            <!-- Page Header -->
             <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Topik</h3>
              </div>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button2" class="btn btn-info <?php if($this->uri->segment(2)=="topik"){echo "active";} ?>">Tawaran</button>
              <a type="button3" class="btn btn-info" href="<?= base_url('dosen/topik/rencana') ?>">Rencana
                <?php if($rencanaTopik > 0) {  ?>
                        <span class="badge badge-light">
                          <?= $rencanaTopik ?>
                        </span>
                 <?php } ?>
              </a>
            </div>
            <div class="row mt-2">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Tawaran Topik
                      
                    </h6>
                  </div>
                  <div class="table-responsive">
                  <div class="card-body">
                    <a href="<?= base_url('dosen/tawaran_topik/tambah') ?>" class="mb-2 btn  btn-primary mr-2" ><i class="fas fa-plus">&nbsp</i>Tambah</a>
                    <table id="dtBasicExample" class="table mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  class="text-center"><b>No. </b></th>
                          <th class="text-center"><b>Topik</b></th>
                          <th class="text-center"><b>Instansi </b></th>
                          <th class="text-center"><b>Alamat </b></th>
                          <th class="text-center"><b>Jumlah</b></th>
                          <th class="text-center"><b>Periode</b></th>
                          <th class="text-center"><b>Tanggal</b></th>
                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($tawaranTopik as $data) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?>.</td>
                          <td ><?= $data->topik?></td>
                          <td class="text-center"><?= $data->Instansi?></td>
                          <td class="text-center"><?= $data->Alamat?></td>
                          <td class="text-center"><?= $data->Jumlah?></td>
                          <td class="text-center"><b><?php if($data->Periode == 1) {?><span class="badge badge-success">BERJALAN</span><?php } elseif($data->Periode == 2) { ?><span class="badge badge-info">LIBURAN</span><?php } ?></b></td>
                          <td class="text-center"><?= $data->Tanggal ?></td>
                          <td>
                            <div class="btn-group btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
                              <a type="button" class="btn btn-info active-light" href="<?= base_url() ?>dosen/tawaran_topik/ubah/<?= $data->Id_tawaranjudul ?>">
                                <i class="material-icons">&#xE254;</i>
                              </a>
                              <a type="button" class="btn btn-danger tombol-hapus" href="<?= base_url() ?>dosen/topik/hapus/<?= $data->Id_tawaranjudul ?>">
                                <i class="material-icons">&#xE872;</i>
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
          </div>
          
       
            


         
  <?php $this->load->view('dosen/template/footer') ?>
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