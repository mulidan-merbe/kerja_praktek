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
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Data KP-TI-A04A</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Jadwal Seminar 
                    <button style="float: right;" type="button" class="btn btn-sm btn-warning mr-1" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></h6>
                  </div>
                  <div class="table-responsive">
                   <div class="card-body">  
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  class="text-center col-1"><b>No. </b></th>
                          <th  class="text-center col-2"><b>NIM </b></th>
                          <th  class="text-center col-3"><b>Nama </b></th>
                          <th class="text-center col-4"><b>Topik </b></th>
                          <!-- <th class="text-center"><b>Catatan </b></th> -->
                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($jadwal as $data) { ?> 
                        <tr>
                          <td class="text-center"><?= $no++ ?>.</td>
                          <td class="text-center"><?= $data->NIM ?></td>
                          <td><?= $data->nama ?></td>
                          <td><?= $data->topik ?></td> 
                          <td class="text-center">
                             <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                               <a href="<?= base_url() ?>dosen/KP_TI_A04A/tambah/<?= $data->NIM?>" class="mb-2 btn  btn-primary mr-2" >
                                <i class="material-icons">add</i>
                              </a>
                            </div>
                            
							             
                           <!--  <?php if($seminar['NIM']) { ?> -->

                            <!-- <?php } else { ?>
                              asdasd
                            <?php } ?> -->
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

          <!-- Modal Lihat -->
          <!-- <?php foreach ($seminar as $data) { ?>
            <div class="modal fade" id="modal-lihat<?=$data->Id_empatA; ?>" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog modal-centered" role="document">
                <div class="modal-content" style="width: 800px;">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">DETAIL </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="row">
                  	<div class="col-md-6"></div>
                  	<div class="col-md-6"></div>
                  </div>
                  <form method="post" action="<?= base_url('dosen/rencana_judul/updateRencanajudul') ?>" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                      <div class="form-group">
                          <label for="uraian">Uraian :</label>
                          <textarea name="Uraian" type="text" class="form-control" id="uraian" cols="90" rows="15" placeholder=""  readonly></textarea>
                        </div>
                        <hr>  
                       <div class="form-group">
                          <label for="uraian">Masukkan :</label>
                          <textarea name="Uraian" type="text" class="form-control" id="uraian" cols="90" rows="10" placeholder="" value="" readonly=""></textarea>
                        </div>
                    </div>
                   
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?> -->
         
  <?php $this->load->view('dosen/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
  <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>