<!doctype html>
<html class="no-js h-100" lang="en">
  <?php $this->load->view('admin/template/head') ?>
      <!-- MDBootstrap Datatables  -->
   
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
                <h3 class="page-title"> Periode Pelaksanaan</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            

           <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6>Ubah Periode Pelaksanaan
                      <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </h6>
                  </div>
                  <div class="card-body " style="min-height: 375px;">   
                    <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                    <?php foreach ($ubah as $data) { ?>
                    
                    <form method="post" action="<?= base_url('admin/jadwal_pelaksanaan/ubahData') ?>" enctype="multipart/form-data">
                    <div class="row"> 
                      <div class="col-md-6 col-sm-12"> 
                        <div class="form-group">
                          <label>Tahun  :</label>
                          <select class="form-control" name="Tahun" >
                            <option value="<?= $data->Tahun ?>"><b><?= $data->Tahun ?></b></option>
                            <option value="2021"><b>2021</b></option>
                            <option value="2022"><b>2022</b></option>
                            <option value="2023"><b>2023</b></option>
                            <option value="2024"><b>2024</b></option>
                            <option value="2025"><b>2025</b></option>
                            <option value="<?= set_value('Tahun') ?>"><b></b></option>
                          </select>
                          <?= form_error('Tahun', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <label>Tanggal Mulai :</label>
                          <input type="date"  class="form-control" id="date" name="Tanggal_mulai" placeholder="dd-mm-yyyy" value="<?= $data->Tanggal_mulai ?>" multiple>
                        <?= form_error('Tanggal_mulai', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                        <label>Pengajuan Seminar :</label>
                         <input type="date"  class="form-control" id="date3" name="Pengajuan_seminar" placeholder="dd-mm-yyyy" value="<?= $data->Pengajuan_seminar ?>" multiple>
                        <?= form_error('Pengajuan_seminar', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <label>Revisi dan Pengumpulan Laporan :</label>
                          <input type="date"  class="form-control" id="date5" name="RevisiDpengumpulan" placeholder="dd-mm-yyyy" value="<?= $data->RevisiDpengumpulan ?>" multiple>
                        <?= form_error('RevisiDpengumpulan', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Periode :</label>
                          <select class="form-control" name="Periode" >
                            <option value="<?= $data->Periode ?>"><b><?php if($data->Periode == 1 ) { ?>BERJALAN<?php } else  { ?>
                            LIBURAN <?php } ?>  </b></option>
                            <option value="1"><b>BERJALAN</b></option>
                            <option value="2"><b>LIBURAN</b></option>
                            <option value="<?= set_value('Pelaksanaan') ?>"><b></b></option>
                          </select>
                          <?= form_error('Periode', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                         <div class="form-group">
                          <label>Tanggal Berakhir :</label>
                          <input type="date"  class="form-control" id="date2" name="Tanggal_selesai" placeholder="dd-mm-yyyy" value="<?= $data->Tanggal_selesai ?>" multiple>
                          <?= form_error('Tanggal_selesai', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <label>Pelaksanaan seminar :</label>
                          <input type="date"  class="form-control" id="date4" name="Pelaksanaan_seminar" placeholder="dd-mm-yyyy" value="<?= $data->Pelaksanaan_seminar ?>" multiple>
                          <?= form_error('Pelaksanaan_seminar', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        
                        <div class="form-group">
                          <input type="hidden"  class="form-control"  name="Id" value="<?= $data->Id_pelaksanaan ?>" multiple>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">simpan</button>
                      </div>
                    </form>
                   <?php } ?>
                  </div>
                 </div>
                </div>   
            </div>
          </div>
          </div>
         
     
  <?php $this->load->view('admin/template/footer') ?>
  <script src="<?php echo base_url('assets/back/datepicker/dist/js') ?>/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url('assets/back/datepicker/dist/locales') ?>/bootstrap-datepicker.id.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
  <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>

<script>
$( function() {
  $( "#date" ).datepicker({
    autoclose:true,
    todayHighlight:true,
    format:'yyyy-mm-dd',
    language: 'id'
  });
} );

$( function() {
  $( "#date2" ).datepicker({
    autoclose:true,
    todayHighlight:true,
    format:'yyyy-mm-dd',
    language: 'id'
  });
} );

$( function() {
  $( "#date3" ).datepicker({
    autoclose:true,
    todayHighlight:true,
    format:'yyyy-mm-dd',
    language: 'id'
  });
} );

$( function() {
  $( "#date4" ).datepicker({
    autoclose:true,
    todayHighlight:true,
    format:'yyyy-mm-dd',
    language: 'id'
  });
} );

$( function() {
  $( "#date5" ).datepicker({
    autoclose:true,
    todayHighlight:true,
    format:'yyyy-mm-dd',
    language: 'id'
  });
} );
</script>

