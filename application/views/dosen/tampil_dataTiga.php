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
                <h3 class="page-title">Data Pernyataan Siap Seminar</h3>
              </div>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a type="button3" class="btn btn-info" href="<?= base_url('dosen/konsultasi') ?>">Konsultasi 
                <?php if($duaA > 0) {  ?>
                        <span class="badge badge-light">
                          <?= $duaA ?>
                        </span>
                    <?php } ?>
              </a>
              <a type="button3" class="btn btn-info <?php if($this->uri->segment(2)=="PernyataanSiapSeminar"){echo "active";} ?>" href="<?= base_url('dosen/PernyataanSiapSeminar') ?>">Pernyataan Siap Seminar
                <?php if($tiga > 0) {  ?>
                        <span class="badge badge-light">
                          <?= $tiga ?>
                        </span>
                 <?php } ?>
              </a>
            </div>
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Pernyataan Siap Seminar</h6>
                  </div>
                <div class="table-responsive">
                   <div class="card-body">
                     <!-- <a href="<?= base_url('dosen/KP_TI_A03/tambah') ?>" class="btn btn-primary" ><i class="fas fa-plus">&nbsp</i>Tambah </a> -->
                      <br>
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  class="text-center"><b>No. </b></th>
                          <th  class="text-center"><b>NIM </b></th>
                          <th  class="text-center"><b>Nama</b></th>
                          <th  class="text-center"><b>Topik </b></th>
                          <th  class="text-center"><b>Status </b></th>
                          <th  class="text-center"><b>Tanggal </b></th>
                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($kptiga as $data) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?>.</td>
                          <td class="text-center"><?= $data->NIM ?></td>
                          <td class="text-center"><?= $data->nama ?></td>
                          <td class="text-center"><?= $data->topik ?></td>
                          <td class="text-center"><?= $data->Icon?></td>
                          <td class="text-center"><?= $format1 = format_indo(date('Y-m-d', strtotime( $data->Tanggal ))); ?></td>
                          <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                             <!--  <a class="mb-2 btn btn-primary " data-toggle="modal" data-target="#modal-edit<?=$data->Id_Kptiga; ?>" data-placement="top" ><i class="material-icons">add</i></a> -->
                              <a  class="mb-2 btn  btn-success" href="<?= base_url('')?>dosen/PernyataanSiapSeminar/setuju/<?= $data->Id_Kptiga ?>"  data-placement="top" title="Lihat" ><i class="fas fa-check"></i></a>
                              <a  class="mb-2 btn  btn-danger" href="<?= base_url('')?>dosen/PernyataanSiapSeminar/tolak/<?= $data->Id_Kptiga ?>"  data-placement="top" title="Lihat" ><i class="fas fa-times"></i></a>
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
          <!-- Modal Edit -->

          <?php foreach ($kptiga as $data) { ?>
            <div class="modal fade" id="modal-edit<?=$data->Id_Kptiga; ?>" tabindex="-1" role="dialog"labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">PILIH</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?= base_url('dosen/KP_TI_A03/pilihData') ?>" enctype="multipart/form-data">
                    <div class="modal-body mx-3"> 
                    	<div class="md-form mb-5">
                        <input type="hidden" name="Id_Kptiga"  class="form-control" value="<?= $data->Id_Kptiga; ?>">                   
                      	</div>
                        <div class="form-group mb-5">
                        	<label >Pilih :</label>
	                       <select class="form-control" name="Status">
                            <!-- <option><b>--Pilih--</b></option> -->
	                        	<option value="1"><b>Diproses</b></option>
	                        	<option value="2"><b>Diterima</b></option>
	                        	<option value="3"><b>Ditolak</b></option>
	                        </select>
                      	</div>
                    </div>
                   
                    <div class="modal-footer d-flex justify-content-center">
                    	<button class="btn btn-sm btn-primary">PILIH<i class="fas fa-paper-plane-o ml-1"></i></button>
                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">TUTUP</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
         
  <?php $this->load->view('dosen/template/footer') ?>

  <script>
  
      $(document).ready(function() {
        $(".btn-primary").remove();
      });
    ?>
  </script>
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