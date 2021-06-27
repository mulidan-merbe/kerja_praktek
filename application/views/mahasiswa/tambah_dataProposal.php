<!doctype html>
<html class="no-js h-100" lang="en">
  <?php $this->load->view('mahasiswa/template/head') ?>
      <!-- MDBootstrap Datatables  -->
      <link href="<?php echo base_url('assets/template') ?>/back/MDB-Free/css/addons/datatables.min.css" rel="stylesheet">
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <?php $this->load->view('mahasiswa/template/sidebar') ?>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <?php $this->load->view('mahasiswa/template/header') ?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title"> Proposal</h3>
              </div>
            </div>
           <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6>Tambah Proposal
                      <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                   </h6>
                  </div>
                  <div class="card-body " style="min-height: 375px;"> 
                    <div class="row"> 
                      <div class="col-md-8 offset-md-2"> 
                      <!-- <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?> -->

                      <?php if($this->session->flashdata('Gagal') == TRUE) { ?>
                      <div role="alert" class="alert alert-success alert-dismissible fade in">
                        <button arial-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span>
                        </button>
                       <p> <?php echo $this->session->flashdata('Gagal') ?></p>
                      </div>
                      <?php } ?>
                      <?php foreach ($jadwal as $data):
                       $Id_pelaksanaan = $data->Id_pelaksanaan;?>
                          
                      
                      <?php foreach ($rencana as $data) { ?>
                      <form method="post" action="<?= base_url('mahasiswa/proposal/tambah') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                          <input type="hidden" class="form-control" id="topik" name="Judul"  value="<?= $data->topik ?>"   multiple >
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control"  name="Id_pelaksanaan"  value="<?php echo $Id_pelaksanaan?>"   multiple >
                        </div>

                        <div class="form-group">
                          <input type="hidden" class="form-control" id="NIP" name="NIP" placeholder="NIP" value="<?= $data->NIP ?>"  multiple >
                         <?= form_error('NIP', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control"  name="Username" placeholder="Username" value="<?= $data->Username ?>"  multiple >
                         <?= form_error('Username', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <label for="topik">Topik :</label>
                          <input type="text" class="form-control" id="topik"  placeholder="Topik Proposal" value="<?= $data->topik ?>"   multiple disabled>
                          <?= form_error('Judul', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                          <label for="file">Berkas :</label><br>
                          <?php echo $this->session->flashdata('message'); ?>
                          <input type="file" class="form-control" id="file" name="berkas_proposal" value="<?= set_value('berkas_proposal') ?>" multiple>
                          <?= form_error('berkas_proposal', '<small class="text-danger pl-3">', '</small>') ?>
                         <i><small>* Pastikan format file adalah PDF</small></i>
                        </div>
                        <button type="submit" class="btn btn-primary">simpan</button>
                      </form>
                    <?php } ?>
                    <?php endforeach ?>
                      <br>
                    </div>
                    </div>
                  </div>
                 </div>
                </div>   
            </div>
          </div>
          
       
          <!-- Modal Edit -->
         
  <?php $this->load->view('mahasiswa/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
 