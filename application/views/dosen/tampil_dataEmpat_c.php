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
              <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Seminar</h3>
              </div>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a type="button3" class="btn btn-info " href="<?= base_url('dosen/seminar') ?>">Jadwal Seminar 
              </a>
              <a type="button3" class="btn btn-info " href="<?= base_url('dosen/seminar/penilaian') ?>">Penilaian Seminar
              </a>
              <a type="button3" class="btn btn-info <?php if($this->uri->segment(2)=="KP_TI_A04C"){echo "active";} ?>" href="<?= base_url('dosen/KP_TI_A04C') ?>">Berita Acara
              </a>
            </div>
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Berita Acara Penilaian Kerja Praktek</h6>
                  </div>
                <div class="table-responsive">
                   <div class="card-body">
                    <!-- <a href="<?= base_url() ?>dosen/KP_TI_A04C/seminar" class="mb-3 btn btn-primary mr-2" >Lihat</a> -->
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th class="text-center col-1"><b>No. </b></th>
                          <th class="text-center col-2"><b>NIM</b></th>
                          <th class="text-center col-5"><b>Nama</b></th>
                          <th class="text-center"><b>Status</b></th>
                          <!-- <th class="text-center"><b>Status Kaprodi</b></th> -->
                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($nilai as $data) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?>.</td>
                          <td><?= $data->NIM ?></td>
                          <td><?= $data->nama ?></td>
                          <!-- <td class="text-center"><?= $data->Icon ?></td> -->
                          <td class="text-center"><?= $data->Icon ?></td>
                          <td class="text-center">
                            <div class="btn-group btn-group-sm " role="group" aria-label="Table row actions">
                            
                              <a class="mb-2 btn  btn-info "  href="<?= base_url() ?>dosen/KP_TI_A04C/ubah/<?= $data->NIM?>"><i class="material-icons">&#xE254;</i></a>
                            </div>
                            
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tbody>
                        
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
      <?php foreach ($nilai as $data) { ?>
            <div class="modal fade" id="modal-lihat<?=$data->Id_empatC; ?>" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">CATATAN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="modal-body mx-3">  
                       <div class="form-group">
                          <label for="uraian">Catatan :</label>
                          <textarea name="Uraian" type="text" class="form-control" id="uraian" cols="90" rows="10" placeholder="<?= $data->Catatan ?>"  readonly></textarea>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">TUTUP</button>
                    </div>
                </div>
              </div>
            </div>
            <?php } ?>
         
  <?php $this->load->view('dosen/template/footer') ?>
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