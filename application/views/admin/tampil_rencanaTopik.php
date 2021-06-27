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
                <h3 class="page-title">Data Topik</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="btn-group mb-2" role="group" aria-label="Basic example">
              <a type="button1" class="btn btn-info " href="<?= base_url('admin/topik/pengajuan') ?>">Pengajuan</a>
              <a type="button2" class="btn btn-info " href="<?= base_url('admin/topik') ?>">Tawaran</a>
              <a type="button3" class="btn btn-info <?php if($this->uri->segment(3)=="rencana"){echo "active";} ?>" href="<?= base_url('admin/topik/rencana') ?>">Rencana</a>
            </div>
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Rencana Topik</h6>
                  </div>
                  <div class="table-responsive">
                  <div class="card-body">
                    <table id="dtBasicExample" class="table mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  class="text-center col-1"><b>No. </b></th>
                          <th class="text-center col-5"><b>Topik</b></th>
                          <th class="text-center col-3"><b>Instansi</b></th>
                          <th class="text-center"><b>Jumlah</b></th>
                          <th class="text-center"><b>Status</b></th>
                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($rencanaTopik as $data) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?>.</td>
                          <!-- <td><?= $data->NIM?></td>
                          <td><?= $data->Username?></td > -->
                          <td><?= $data->topik ?></td>
                          <td><?= $data->Instansi?></td>
                           <td class="text-center"><?= $data->Jumlah?></td>
                          <td class="text-center"> <?= $data->total ?> terpilih</td>
                          <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                              <a   class="mb-2 btn  btn-success"  href="<?= base_url('')?>admin/rencana_topik/detail/<?= $data->Id_tawaranjudul ?>" data-placement="top" title="Lihat" ><i class="fas fa-eye"></i></a>
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
    
          

 			<!-- EDIT -->

       
            


         
  <?php $this->load->view('admin/template/footer') ?>
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