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
                <h3 class="page-title">Data KP-TI-A02</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              	<div class="col">
                	<div class="card card-small mb-4">
                  		<div class="card-header border-bottom">
                    	<h6 class="m-0">Ubah Surat Pengantar
                    		<button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    	</h6>
                  		</div>
                  	<div class="card-body " style="min-height: 420px;"> 
                        <div class="row"> 
                            <div class="col-md-8 offset-md-2"> 
                            <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                              	<form method="post" action="<?= base_url('admin/KP_TI_A02/ubahData') ?>" enctype="multipart/form-data">
                              	<?php foreach ($ubah as $data){ ?>
                              	<div class="form-group">
                                	<input type="hidden" name="Id" class="form-control"  value="<?= $data->Id_Kpdua ?>">
                              	</div>
                              	<div class="form-group">
                                	<label for="NIM">NIM :</label>
                                	<input type="text" name="NIM" id="NIM" class="form-control"  value="<?= $data->NIM ?>">
                                	<?= form_error('NIM', '<small class="text-danger pl-3">', '</small>'); ?>
                              	</div>
                              	<!-- <div class="form-group">
                                	<label for="nama">Nama  :</label>
                                	<input type="text" name="nama" id="nama" class="form-control"  value="<?= $data->nama ?>">
                                	<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                              	</div> -->
                              	<div class="form-group">
                               		<label for="email">Berkas :</label><br>
                               		<?php echo $this->session->flashdata('message'); ?>
                               		<small><b><?= $data->File ?></b></small>
                               		<input type="file" class="form-control" name="File" value="<?= set_value('File') ?>" multiple>
                               		<?= form_error('File', '<small class="text-danger pl-3">', '</small>') ?>
                              	</div>
                              	<div class="form-group">
                               	<input type="hidden" class="form-control" name="old_file" value="<?= $data->File ?>" multiple>
                              	</div>
                          		<?php } ?>
                              	<button type="submit" class="btn btn-primary">simpan</button>
                          		<br>
                            	</form>
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
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>