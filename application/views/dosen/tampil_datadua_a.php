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
              <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Konsultasi Mahasiswa</h3>
              </div>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button2" class="btn btn-info <?php if($this->uri->segment(2)=="konsultasi"){echo "active";} ?>">Konsultasi
                    <?php if($duaA > 0) {  ?>
                        <span class="badge badge-light">
                          <?= $duaA ?>
                        </span>
                    <?php } ?>
              </button>
              <a type="button3" class="btn btn-info" href="<?= base_url('dosen/PernyataanSiapSeminar') ?>">Pernyataan Siap Seminar
                <?php if($tiga > 0) {  ?>
                        <span class="badge badge-light">
                          <?= $tiga ?>
                        </span>
                 <?php } ?>
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
                      
                      <br>
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  class="col-1 text-center "><b>No.</b></th>
                          <th  class="col-3 text-center"><b>NIM</b></th>
                          <th  class="col-5 text-center"><b>Nama</b></th>
                          <!-- <th  class="text-center"><b>Tema</b></th>
                          <th  class="text-center"><b>Berkas</b></th> -->
                          <!-- <th  class="text-center"><b>Status</b></th> -->
                          <th  class="text-center"><b>Jumlah</b></th>
                          
                          <th  class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($kpdua_a as $data) { ?>
                        <tr>
                          <td class="col-1 text-center"><?= $no++ ?>.</td>
                          <td class="col-2 text-center"><?= $data->NIM ?></td>
                          <td class="col-4"><?= $data->nama ?></td> 
                          <td class="col-3 text-center">
                            <!-- <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:40%">
                              
                            </div><?= $data->total ?></td> -->
                            <div class="progress-bar progress-bar-info progress-bar-striped progress-bar-animated" role="progressbar"  style="min-height: 2em; width:40%" value="3">
                             <?= $data->total ?>
                            </div>
                          </td>
                          <td class="text-center">
                            <div class="btn-group btn-group-sm " role="group" aria-label="Table row actions">
                              <a   class="mb-2 btn  btn-success"  href="<?= base_url('')?>dosen/konsultasi/detail/<?= $data->NIM ?>" data-placement="top" title="Lihat" ><i class="fas fa-eye"></i></a>
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