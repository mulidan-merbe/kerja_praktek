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
                    <h6>Tambah Tawaran Topik
                    <button type="button" class="btn btn-sm btn-warning mr-1 float-right" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></h6>
                  </div>
                  <div class="card-body " style="min-height: 375px;">   
                      <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                      <form method="post" action="<?= base_url('dosen/tawaran_topik/tambah') ?>" enctype="multipart/form-data">
                        <?php foreach ($jadwal as $data) { 
                           $format = format_indo(date('Y-m-d', strtotime( $data->Tanggal_mulai )));
                           $format2 = format_indo(date('Y-m-d', strtotime( $data->Tanggal_selesai )));
                        ?>
                    <div class="row">
                      <input type="hidden" class="form-control" name="Id_pelaksanaan" placeholder="Tanggal_mulai" value="<?= $data->Id_pelaksanaan ?>" multiple>
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
                          <label >Topik :</label>
                          <textarea name="topik" type="text" class="form-control"  cols="50" rows="5" placeholder="Topik Kerja Praktek" value="<?= set_value('topik') ?>" autofocus></textarea>
                          <?= form_error('topik', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                         <label for="email">Nama Instansi :</label>
                         <input type="text" class="form-control" name="Instansi" placeholder="Nama Instansi / Organisasi" value="<?= set_value('Instansi') ?>" multiple>
                         <?= form_error('Instansi', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <label for="email">Jumlah :</label>
                          <input type="number" class="form-control" name="Jumlah" placeholder="Jumlah" value="<?= set_value('Jumlah') ?>" multiple>
                          <?= form_error('Jumlah', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12"> 
                        <div class="form-group">
                          <label >Alamat :</label>
                          <textarea name="Alamat" type="text" class="form-control" cols="50" rows="5" placeholder="Alamat kerja praktek" value="<?= set_value('Alamat') ?>" ></textarea>
                         <?= form_error('Alamat', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        
                        <div class="form-group">
                          <label for="email">No Narahubung :</label>
                          <input type="text" class="form-control" name="No_hp" placeholder="No Narahubung" value="<?= set_value('No_hp') ?>" multiple>
                          <?= form_error('No_hp', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="Periode" value="<?= $data->Periode ?>" multiple >
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="Tanggal_mulai" value="<?= $data->Tanggal_mulai; ?>" multiple >
                        </div>
                        <div class="form-group">
                         <input type="hidden" class="form-control" name="Tanggal_selesai" value="<?= $data->Tanggal_selesai; ?>" multiple >
                        
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12"> 
                        <?php if(date('Y-m-d') > $data->Tanggal_selesai ) { ?>
                         <a class="btn btn-primary mb-4" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                              Simpan
                          </a>
                          <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                              Maaf data tidak bisa ditambahkan, jadwal pelaksanaan belum ada. Terima Kasih.
                            </div>
                          </div>
                        <?php } else { ?>
                          <button class="btn btn-primary mb-4" type="submit" >Simpan</button>
                        <?php } ?>
                          <button class="btn btn-info mb-4" type="reset">Reset</button>
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