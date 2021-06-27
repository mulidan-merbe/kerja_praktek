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
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Rencana Topik</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            
            <div class="row">
              <div class="col-md-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Detail Rencana Topik
                     <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></h6>
                  </div>
                <div class="table-responsive">
                  <div class="card-body">
                      
                      <br>
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  class="text-center col-1"><b>No.</b></th>
                          <th  class="text-center col-2"><b>NIM</b></th>
                          <th  class="text-center col-5"><b>Nama</b></th>
                          <th  class="text-center"><b>Status</b></th>
                          <th  class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($detail as $data) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?>.</td>
                          <td class="text-center"><?= $data->NIM ?></td>
                          <td><?= $data->Username ?></td>
                          <td class="text-center"><?= $data->Icon ?></td>
                          <td class="text-center">
                            <div class="btn-group btn-group-sm " role="group" aria-label="Table row actions">
                           
                               <a  class="mb-2 btn  btn-success" href="<?= base_url('')?>dosen/rencana_topik/setuju?setujui=<?= $data->Id_rencanajudul ?>"  data-placement="top" title="Lihat" ><i class="fas fa-check"></i></a>
                              <a  class="mb-2 btn  btn-danger" href="<?= base_url('')?>dosen/rencana_topik/tolak?ditolak=<?= $data->Id_rencanajudul ?>"  data-placement="top" title="Lihat" ><i class="fas fa-times"></i></a>
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
   <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
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