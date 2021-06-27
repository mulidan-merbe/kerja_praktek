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
                <h3 class="page-title">Data KP-TI-A04</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
             <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Ubah Jadwal Seminar
                    <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></h6>
                  </div>
                  <div class="card-body " style="min-height: 420px;"> 
                      <div class="">
                        <div class="card-body">
                        	<?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                        	<form method="post" action="<?= base_url('admin/KP_TI_A04/ubahData') ?>" enctype="multipart/form-data">
                          <div class="row"> 
                          	<?php foreach ($ubah as $data){ ?>
                            <div class="col-md-4 col-sm-12">
                            	<div class="form-group">
                                 <label>NIM :</label>
                                 <input type="text" name="NIM" class="form-control" value="<?= $data->NIM ?>">
                                 <?= form_error('NIM', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              
                            </div>
                            <div class="col-md-4 col-sm-12">
                            	<div class="form-group">
                                 <label >NIP:</label>
                                 <input type="text" name="NIP"  class="form-control"  value="<?= $data->NIP ?>">
                                 <?= form_error('NIP', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              
                            </div>
                            <div class="col-md-4 col-sm-12 "> 
                              <div class="form-group">
                                <label>No Identitas  :</label>
                                <input type="text" name="No_identitas"  class="form-control" placeholder="no identitas " value="<?= $data->No_identitas ?>">
                                <?= form_error('No_identitas', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                          	</div>
                          </div>
                          <div class="row">
                          	<div class="col-md-6 col-sm-12">
                          		<div class="form-group">
                                 <label >Hari :</label>
                                 <select class="form-control" name="Hari" value="<?= $data->Hari ?>">
                                 	<option value="<?= $data->Hari ?>"><b><?= $data->Hari ?></b></option>
		                        	<option value="Senin"><b>Senin</b></option>
		                        	<option value="Selasa"><b>Selasa</b></option>
		                        	<option value="Rabu"><b>Rabu</b></option>
		                        	<option value="Kamis"><b>Kamis</b></option>
		                        	<option value="Jumat"><b>Jumat</b></option>
		                        	<?= form_error('Hari', '<small class="text-danger pl-3">', '</small>'); ?>
		                        </select>
                              </div>
                              <div class="form-group">
                                 <label >Waktu :</label>
                                 <select class="form-control" name="Waktu" value="<?= set_value('Waktu') ?>">
                                 	<option value="<?= $data->Waktu ?>"><b><?= $data->Waktu ?></b></option>
		                        	<option value="08.00"><b>08.00</b></option>
		                        	<option value="09.00"><b>09.00</b></option>
		                        	<option value="10.00"><b>10.00</b></option>
		                        	<option value="11.00"><b>11.00</b></option>
		                        	<option value="12.00"><b>12.00</b></option>
		                        	<?= form_error('Waktu', '<small class="text-danger pl-3">', '</small>'); ?>
		                        </select>
                              	</div>
                              	<input type="hidden" class="form-control" name="Id_Kpempat" value="<?= $data->Id_Kpempat ?>">
                          	</div>
                          	<div class="col-md-6 col-sm-12">
                          		<div class="form-group">
                                 <label>Tanggal Seminar:</label>
                                 <input type="date" name="Tanggal_seminar" class="form-control" placeholder="Tanggal_seminar" value="<?= $data->Tanggal_seminar ?>">
                                 <?= form_error('Tanggal_seminar', '<small class="text-danger pl-3">', '</small>'); ?>
                              	</div>
                              	<div class="form-group">
                               	<label>Ruangan :</label>
                               	<select class="form-control" name="Ruangan">
                                 	<option value="<?= $data->Ruangan ?>"><b><?= $data->Ruangan ?></b></option>
		                        	<option value="Ruang Sidang"><b>Ruang Sidang</b></option>
		                        	<option value="Kelas A"><b>Kelas A</b></option>
		                        	<option value="Kelas B"><b>Kelas B</b></option>
		                        	<option value="Kelas C"><b>Kelas C</b></option>
		                        	<option value="Kelas D"><b>Kelas D</b></option>
		                        	<?= form_error('Ruangan', '<small class="text-danger pl-3">', '</small>'); ?>
		                        </select>
                              	</div>
                          	</div>
                          </div>
                          <?php } ?>
                          <br>
                           <button type="submit" class="btn btn-primary">simpan</button>
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