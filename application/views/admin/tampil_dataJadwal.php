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

           <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-8 text-center text-sm-left mb-0">
                <h3 class="page-title">Periode Pelaksanaan</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Periode Pelaksanaan</h6>
                  </div>
                      <div class="table-responsive">
                   <div class="card-body">
                       <h6 class="m-0"><a href="<?= base_url('admin/jadwal_pelaksanaan/tambah') ?>" class="mb-2 btn btn-primary mr-2" ><i class="fas fa-plus">&nbsp</i>Tambah</a></h6>
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th style="text-align: center"><b>No.</b></th>
                          <th style="text-align: center"><b>Tahun</b></th>
                          <th style="text-align: center"><b>Periode</b></th>
                          <th style="text-align: center"><b>Pelaksanaan KP</b></th>
                          <th style="text-align: center"><b>Pengajuan Seminar</b></th>
                          <th style="text-align: center"><b>Pelaksanaan Seminar</b></th>
                          <th style="text-align: center"><b>Pengumpulan Laporan</b></th>
                          <th style="text-align: center"><b>Tanggal</b></th>
                          <th style="text-align: center"><b>Aksi </b></th>
                        </tr>
                      </thead>
                      <tbody>
	                 <?php 
									   $no = 1;
                            foreach ($jadwal as $data) { 
                            	$format1 = format_indo(date('Y-m-d', strtotime( $data->Tanggal_mulai )));
                            	$format2 = format_indo(date('Y-m-d', strtotime( $data->Tanggal_selesai )));
                            	$format3 = format_indo(date('Y-m-d', strtotime( $data->Pengajuan_seminar )));
                            	$format4 = format_indo(date('Y-m-d', strtotime( $data->Pelaksanaan_seminar )));
                            	$format5 = format_indo(date('Y-m-d', strtotime( $data->RevisiDpengumpulan )));
                            	 ?>
                        <tr>
                          <td style="text-align: center"><?= $no++ ?>.</td>
                          <td style="text-align: center"><?= $data->Tahun ? $data->Tahun : "-" ?></td>
                          <td style="text-align: center"><?php if($data->Periode == 1 ) { ?>BERJALAN<?php } else  { ?>
                            LIBURAN <?php } ?>  
                          </td>
                          <td style="text-align: center"> <?= $format1; ?> - <?= $format2; ?></td>
                          <td style="text-align: center"><?= $format3; ?></td>
                          <td style="text-align: center"><?= $format4; ?></td>
                          <td style="text-align: center"><?= $format5; ?></td>
                          <td style="text-align: center"><?= $format1 = format_indo(date('Y-m-d', strtotime( $data->Tanggal_upload ))); ?></td> 
                          <td style="text-align: center">
                            <div class="btn-group btn-group-sm " role="group" aria-label="Table row actions">
                              <a class="mb-2 btn btn-info "  href="<?= base_url() ?>admin/jadwal_pelaksanaan/ubah?Id=<?= $data->Id_pelaksanaan?>">
                                <i class="material-icons">&#xE254;</i>
                              </a>
                              <a class="mb-2 btn btn-danger tombol-hapus" href="<?= base_url() ?>admin/jadwal_pelaksanaan/hapusData?Id=<?= $data->Id_pelaksanaan?>">
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
            </div>
          
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