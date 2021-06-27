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
                <h3 class="page-title">Data Konsultasi</h3>
              </div>
            </div>
            <div class="btn-group mb-2" role="group" aria-label="Basic example">
              <a type="button2" class="btn btn-info <?php if($this->uri->segment(2)=="konsultasi"){echo "active";} ?>" href="<?= base_url('admin/konsultasi') ?>">Konsultasi Dosen</a>
              <a type="button3" class="btn btn-info " href="<?= base_url('admin/konsultasi/Lapangan') ?>">Konsultasi Lapangan</a>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Konsultasi Dosen Pembimbing </h6>
                  </div>
                <div class="table-responsive">
                  <div class="card-body">
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  style="text-align: center"><b>No.</b></th>
                          <th  style="text-align: center"><b>NIM</b></th>
                          <th  style="text-align: center"><b>Tema</b></th>
                          <th  style="text-align: center"><b>Berkas</b></th>
                          <th  style="text-align: center"><b>Status</b></th>
                          <th  style="text-align: center"><b>Tanggal</b></th>
                          
                          <th  style="text-align: center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($kpduaA as $data) { ?>
                        <tr>
                          <td style="text-align: center"><?= $no++ ?>.</td>
                          <td style="text-align: center"><?= $data->NIM ?></td>
                          <td style="text-align: center"><?= $data->Tema ?></td>
                          <td style="text-align: center">
                            <a class="btn btn-sm btn-light" href="<?= base_url('assets/KonsultasiDosen/file/').$data->File ?>"><img width="20" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar">
                            </a>
                          </td>
                          <td style="text-align: center"><?= $data->Icon ?></td> 
                          <td style="text-align: center"><?= $format1 = format_indo(date('Y-m-d', strtotime( $data->Tanggal ))); ?></td>
                          <td style="text-align: center">
                            <div class="btn-group btn-group-sm " role="group" aria-label="Table row actions">
                              <a   class="mb-2 btn btn-success mr-2" data-toggle="modal" data-target="#modal-lihat<?=$data->Id_duaA; ?>" data-placement="top" title="Pilih Status" ><i class="fas fa-eye"></i></a>
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
            </div>
            <!-- End Default Light Table -->
            <!-- Default Dark Table -->
         <?php foreach ($kpduaA as $data) { ?>
            <div class="modal fade" id="modal-lihat<?=$data->Id_duaA; ?>" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">DETAIL </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?= base_url('dosen/rencana_judul/updateRencanajudul') ?>" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                      <div class="form-group">
                          <label for="uraian">Uraian :</label>
                          <textarea name="Uraian" type="text" class="form-control" id="uraian" cols="90" rows="15" placeholder="<?= $data->Uraian ?>"  readonly></textarea>
                        </div>
                    </div>
                   
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>

          <?php $this->load->view('admin/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
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