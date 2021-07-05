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
                <h3 class="page-title">Data Pembimbing Lapangan</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Surat Pengatar</h6>
                  </div>
                   <div class="card-body" style="min-height: 375px">
                      <div class="alert alert-info" role="alert">
                        Surat Pengantar untuk tempat kerja praktek.
                      </div>
                        <?php foreach ($dua as $data) { ?>
                        
                        <div class="button pt-10 text-center">
                        <a class="btn btn-lg  btn-block btn-primary" href="<?= base_url('assets/KP_TI_A02/file/').$data->File ?>"><img width="30" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar"></a>
                        <small><b>Silahkan unduh berkas</b></small>
                        </div>
                        <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card card-small mb-4" >
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Pembimbing Lapangan</h6>
                  </div>
                  <div class="table-responsive">
                   <div class="card-body" style="min-height: 375px;">
                    <?php foreach ($pembimbing as $data) {
                      $Id_proposal = $data->Id_proposal;
                     ?>

                    <?php foreach ($proposal as $data) {
                      $Id_proposal2 = $data->Id_proposal;
                     ?>
                     <?php } ?>
                    <?php } ?>
                    <?php if($pembimbing){ ?>
                      <?php if($Id_proposal == $Id_proposal2 ) { ?>
                          <button type="button" class="btn btn-primary" disabled><i class="fas fa-plus">&nbsp</i>Tambah</button>
                      <?php } else { ?>
                          <a class="btn btn-primary" href="<?= base_url('mahasiswa/pembimbing_lapangan/tambah') ?>"><i class="fas fa-plus">&nbsp</i>Tambah </a>
                      <?php } ?>
                    <?php } else { ?>
                      <?php if($dua) { ?>
                        <a class="btn btn-primary" href="<?= base_url('mahasiswa/pembimbing_lapangan/tambah') ?>"><i class="fas fa-plus">&nbsp</i>Tambah </a>
                      <?php } else { ?>
                        <button type="button" class="btn btn-primary" disabled><i class="fas fa-plus">&nbsp</i>Tambah</button>
                       <?php } ?>
                    <?php } ?>
                    
                      <table id="" class=" table mt-2  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  class="text-center"><b>Nama</b></th>
                          <th  class="text-center"><b>No Identitas </b></th>
                          <!-- <th  class="text-center"><b>Jabatan </b></th> -->
                          <th class="text-center"><b>Alamat Kantor</b></th>
                          <th class="text-center"><b>Narahubung </b></th>
                          <th class="text-center"><b>Berkas </b></th>
                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($pembimbing as $data) { ?>
                        <tr>
                          <td class="text-center"><?= $data->Nama ?></td>
                          <td class="text-center"><?= $data->No_identitas ?></td>
                         <!--  <td class="text-center"><?= $data->Jabatan?></td> -->
                          <td class="text-center"><?= $data->Alamat_kantor ?></td>
                          <td class="text-center"><?= $data->No_hp ?></td>
                          <td class="text-center">
                            <a class="btn btn-sm btn-light" href="<?= base_url('assets/kpifempat/file/').$data->File ?>"><img width="20" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar"></a></td>
                          <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                            <a class="mb-2 btn btn-info "  href="<?= base_url() ?>mahasiswa/pembimbingLapangan/ubah/<?= $data->NIM ?>"> <i class="material-icons">&#xE254;</i></a>
                            </div>
                            
                            <!-- <a class="mb-2 btn btn-danger tombol-hapus" href="<?= base_url() ?>mahasiswa/Pembimbing_lapangan/hapusData?Id=<?= $data->Id ?>"><i class="far fa-trash-alt"></i></a> -->
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
  <!-- <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script> -->

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

