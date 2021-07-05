<!doctype html>
<html class="no-js h-100" lang="en">
  <?php $this->load->view('mahasiswa/template/head') ?>
      <!-- MDBootstrap Datatables  -->
       <!-- <link href='<?= base_url('assets/dropzone/dist/dropzone.css') ?>' type='text/css' rel='stylesheet'>
      <script src="<?= base_url('assets/dropzone/dist/dropzone.js') ?>"></script>
      <link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script> -->
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
          <?= $this->session->unset_userdata('flash'); ?>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Proposal</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-md-4">
                <div class="card card-small mb-4" >
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Tambah Proposal</h6>
                  </div>
                   <div class="card-body" style="min-height: 375px;">
                    <!-- <form action="" class="dropzone" id="fileupload">
                      <input type="file" name="file" >
                    </form> -->
                    <form method="POST" action="<?= base_url('mahasiswa/proposal/tambah')?>" >
                      <input type="file" id="actual-btn" name="berkas" hidden/>
                        <!-- our custom upload button -->
                        <i><small><b>* Pastikan format file adalah PDF | Maksimal 10 MB</b></small></i>
                        <label for="actual-btn" class="label btn-block">Pilih Berkas</label>
                        <span id="file-chosen">Tidak ada berkas terpilih</span>
                        <br>
                      <?php foreach ($proposal as $data) {
                      $Id_pelaksanaan = $data->Id_pelaksanaan;
                     ?>
                    <?php foreach ($jadwal as $data) {
                      $Id_pelaksanaan2 = $data->Id_pelaksanaan;
                     ?>
                     <?php } ?>
                    <?php } ?>
                    <?php if ($rencana) { ?>     
                      <?php if($proposal) { ?>
                        <?php if($Id_pelaksanaan == $Id_pelaksanaan2) { ?>
                           <button type="button" class="btn btn-primary" disabled>Simpan</button>
                        <?php } else { ?>  
                          <a href="<?= base_url('mahasiswa/proposal/tambah') ?>" class="btn btn-primary" >Simpan</a>
                        <?php } ?>
                      <?php } else { ?>
                        <a href="<?= base_url('mahasiswa/proposal/tambah') ?>" class="btn btn-primary" >Simpan</a>
                      <?php } ?>
                    <?php } else { ?>
                       <button type="button" class="btn btn-primary" disabled>Simpan</button> 
                    <?php } ?>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card card-small mb-4" style="min-height: 410px;">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Proposal</h6>
                  </div>
                <div class="table-responsive">
                   <div class="card-body">
                  <!--   <?php foreach ($proposal as $data) {
                      $Id_pelaksanaan = $data->Id_pelaksanaan;
                     ?>
                    <?php foreach ($jadwal as $data) {
                      $Id_pelaksanaan2 = $data->Id_pelaksanaan;
                     ?>
                     <?php } ?>
                    <?php } ?>
                    <?php if ($rencana) { ?>     
                      <?php if($proposal) { ?>
                        <?php if($Id_pelaksanaan == $Id_pelaksanaan2) { ?>
                           <button type="button" class="btn btn-primary" disabled><i class="fas fa-plus">&nbsp</i>Tambah</button>
                        <?php } else { ?>  
                          <a href="<?= base_url('mahasiswa/proposal/tambah') ?>" class="btn btn-primary" ><i class="fas fa-plus">&nbsp</i>Tambah</a>
                        <?php } ?>
                      <?php } else { ?>
                        <a href="<?= base_url('mahasiswa/proposal/tambah') ?>" class="btn btn-primary" ><i class="fas fa-plus">&nbsp</i>Tambah</a>
                      <?php } ?>
                    <?php } else { ?>
                       <button type="button" class="btn btn-primary" disabled><i class="fas fa-plus">&nbsp</i>Tambah</button> 
                    <?php } ?>
                     -->
                    <table id="" class=" table mt-4 mb-0 table-bordered table-striped">
                      <thead class="">
                        <!-- <thead class="bg-light"> -->
                        <tr>
                          <th class="text-center"><b>NIP</b></th>
                          <th class="text-center"><b>Nama Dosen</b></th>
                          <th class="text-center"><b>Topik</b></th>
                          <th class="text-center"><b>Berkas</b></th>
                          <th class="text-center"><b>Status</b></th>
                          <th class="text-center"><b>Tanggal</b></th>
                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($proposal as $data) { ?>
                        <tr>
                          <td class="text-center"><?= $data->NIP ?></td>
                          <td class="text-center"><?= $data->NamaDosen ?></td>
                          <td class="text-center"><?= $data->topik?></td>
                          <td class="text-center"><a class="btn btn-sm btn-light" href="<?= base_url('assets/proposal/file/').$data->Berkas ?>"><img width="20" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar"></a></td>
                          <td class="text-center"><?= $data->Icon ?></td>
                          <td class="text-center"><?= $format1 = format_indo(date('Y-m-d', strtotime( $data->Tanggal_upload ))); ?></td>
                          <td class="text-center">
                          <!-- <a class="mb-2 btn btn-info " data-toggle="modal" data-target="#ModalEdit" href="<?= base_url() ?>mahasiswa/proposal/ubahProposal?Id_proposal=<?= $data->Id_proposal?> ?>"><i class="fas fa-edit"></i></a> -->
                          <!-- <a class="mb-2 btn btn-info "  href="<?= base_url() ?>mahasiswa/Proposal/Ubah?NIM=<?= $data->NIM?>"><i class="fas fa-edit"></i></a> -->
                          <!-- <a class="mb-2 btn btn-danger tombol-hapus" href="<?= base_url() ?>mahasiswa/proposal/hapusProposal?Id_proposal=<?= $data->Id_proposal?>"><i class="far fa-trash-alt"></i></a> -->
                          <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                            <a class="mb-2 btn btn-info "  href="<?= base_url() ?>mahasiswa/proposal/ubah?NIM=<?= $data->NIM?>"> <i class="material-icons">&#xE254;</i></a>
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
         
  <?php $this->load->view('mahasiswa/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
  <!-- <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script> -->
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
<script>
    const actualBtn = document.getElementById('actual-btn');

const fileChosen = document.getElementById('file-chosen');

actualBtn.addEventListener('change', function(){
  fileChosen.textContent = this.files[0].name
})
    </script>