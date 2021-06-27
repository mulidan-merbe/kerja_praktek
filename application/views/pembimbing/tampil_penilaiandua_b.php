<!doctype html>
<html class="no-js h-100" lang="en">
  <?php $this->load->view('pembimbing/template/head') ?>
      <!-- MDBootstrap Datatables  -->
      <link href="<?php echo base_url('assets/template') ?>/back/MDB-Free/css/addons/datatables.min.css" rel="stylesheet">
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <?php $this->load->view('pembimbing/template/sidebar') ?>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <?php $this->load->view('pembimbing/template/header') ?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Data KP-TI-A02C</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Penilaian Lapangan Mahasiswa
                    <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></h6>
                  </div>
                  <div class="table-responsive">
                   <div class="card-body">  
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  style="text-align: center"><b>No. </b></th>
                          <th  style="text-align: center"><b>NIM </b></th>
                          <!-- <th style="text-align: center"><b>Catatan </b></th> -->
                          <th style="text-align: center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                    
                        <?php 
                        $no = 1; 
                        foreach ($distinctPembimbing as $data) { ?> 
                        <tr>
                          <td style="text-align: center"><?= $no++ ?>.</td>
                          <td style="text-align: center"><?= $data->NIM ?></td>
                          <td style="text-align: center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                                  <a href="<?= base_url() ?>pembimbing/KP_TI_A02C/tambah?NIM=<?= $data->NIM?>" class="mb-2 btn btn-primary mr-2" >
                                   <i class="material-icons">add</i></a>
                              </div>
                          
                           <!--  <a href="<?= base_url() ?>pembimbing/KP_TI_A02C/Tambah?Id=<?= $data->Id_duaB?>" class="mb-2 btn btn-primary mr-2" ><i class="fas fa-plus">&nbsp</i>blm</a> -->
                         
                          </td>
                         <!--  <?php if($dua_B) { ?>
                          
                          <td style="text-align: center"><?= $dua_B['nama']; ?></td>
                          <td style="text-align: center"><?= $dua_B->topik ?></td>  -->
                        <!--   <?php } ?> -->
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
                  <form method="post" action="<?= base_url('pembimbing/rencana_judul/updateRencanajudul') ?>" enctype="multipart/form-data">
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
         
  <?php $this->load->view('pembimbing/template/footer') ?>
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