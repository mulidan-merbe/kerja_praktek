<!doctype html>
<html class="no-js h-100" lang="en">
  <?php $this->load->view('dosen/template/head') ?>
      <!-- MDBootstrap Datatables  -->
   
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
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title"> Data Tawaran Topik</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            

           <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6>Ubah Tawaran Topik
                    <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></h6>
                  </div>
                  <div class="card-body " style="min-height: 375px;">   
                      <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                    <form method="post" action="<?= base_url('dosen/tawaran_topik/ubahData') ?>" enctype="multipart/form-data">
                    <?php foreach ($tawaran as $data) { 
                      $format = format_indo(date('Y-m-d', strtotime( $data->Tanggal_mulai )));
                      $format2 = format_indo(date('Y-m-d', strtotime( $data->Tanggal_selesai )));
                        ?>
                    <div class="row">
                      <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                        <label for="email">Periode :</label>
                         <input type="text" class="form-control" name="disabled" placeholder="Tanggal_mulai" value="<?php if($data->Periode == 1 ) { ?>BERJALAN <?php } else { ?>LIBURAN <?php } ?>" multiple disabled>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                        <label for="email">Tanggal Mulai :</label>
                         <input type="text" class="form-control" name="disabled" placeholder="Tanggal_mulai" value="<?= $format; ?>" multiple disabled>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                          <label for="email">Tanggal Berakhir :</label>
                          <input type="text" class="form-control" name="disabled" placeholder="Tanggal_selesai" value="<?= $format2; ?>" multiple disabled>
                        </div>
                      </div>
                    </div> 
                    <div class="row"> 
                      <div class="col-md-6 col-sm-12"> 
                        <div class="form-group">
                          <label for="email">Topik :</label>
                         <!--  <input type="text" class="form-control" name="Judul"  value="<?= $data->topik ?>" multiple> -->
                          <textarea name="topik" type="text" class="form-control" id="" cols="50" rows="5"  value="<?= $data->topik ?>" ><?= $data->topik ?></textarea>
                          <?= form_error('topik', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                         <label for="email">Nama Instansi :</label>
                         <input type="text" class="form-control" name="Instansi"  value="<?= $data->Instansi ?>" multiple>
                         <?= form_error('Instansi', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <label for="email">Jumlah :</label>
                          <input type="number" class="form-control" name="Jumlah"  value="<?= $data->Jumlah ?>" multiple>
                          <?= form_error('Jumlah', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <br>
                       
                        <!-- <button class="btn btn-info" type="reset">Reset</button> -->
                      </div>
                      <div class="col-md-6 col-sm-12"> 
                        <div class="form-group">
                          <label for="email">Alamat :</label>
                          <textarea name="Alamat" type="text" class="form-control" id="" cols="50" rows="5" value="<?= set_value('Alamat') ?>" ><?= $data->Alamat ?></textarea>
                         <?= form_error('Alamat', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <label for="email">No Narahubung :</label>
                          <input type="text" class="form-control" name="No_hp"  value="<?= $data->No_Hp ?>" multiple>
                          <?= form_error('No_hp', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="Id_tawaranjudul" value="<?= $data->Id_tawaranjudul ?>"  multiple>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12"> 
                       <button class="btn btn-primary mb-4" type="submit">simpan</button>
                    </div>
                        <?php } ?>
                      </form>
                    </div>
                  </div>
                 </div>
                </div>   
            </div>
          </div>
          
     
  <?php $this->load->view('dosen/template/footer') ?>
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
  <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>