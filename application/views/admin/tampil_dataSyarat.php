<!doctype html>
<html class="no-js h-100" lang="en">
  <?php $this->load->view('dosen/template/head') ?>
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
                <h3 class="page-title">Data Seminar</h3>
              </div>
            </div>
            <div class="btn-group mb-2" role="group" aria-label="Basic example">
              <a type="button2" class="btn btn-info <?php if($this->uri->segment(2)=="seminar"){echo "active";} ?>" href="<?= base_url('admin/seminar') ?>">pernyataan siap seminar
              
              </a>
              <a type="button3" class="btn btn-info " href="<?= base_url('admin/seminar/jadwal') ?>">jadwal seminar</a>
            </div>
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Syarat Pengajuan Pernyataan Siap Seminar
                    <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></h6>
                  </div>
                <div class="table-responsive">

                   <div class="card-body" style="min-height: 380px">
                     <a  class="btn btn-primary mb-4" data-toggle="modal" data-target="#modal-tambah">Tambah</a>
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  style="text-align: center"><b>No. </b></th>
                          <th  style="text-align: center"><b>Tahun </b></th>
                          <th  style="text-align: center"><b>Periode</b></th>
                          <th  style="text-align: center"><b>Jumlah Konsultasi </b></th>
                          <th style="text-align: center"><b>Tanggal</b></th>
                          <th style="text-align: center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $no = 1;
                        foreach ($syarat as $data) { ?>
                        <tr>
                          <td style="text-align: center"><?= $no++ ?>.</td>
                          <td style="text-align: center"><?= $data->Tahun?></td>
                          <td style="text-align: center"><?php if($data->Periode == 1 ) { ?>BERJALAN <?php } else { ?>LIBURAN <?php } ?></td>
                          <td style="text-align: center"><?= $data->Jumlah?></td>
                          <td style="text-align: center"><?= $format1 = format_indo(date('Y-m-d', strtotime( $data->Tanggal_upload )));?></td>
                          <td style="text-align: center">
                            <div class="btn-group btn-group-sm " role="group" aria-label="Table row actions">
                              <a class="mb-2 btn  btn-info " data-toggle="modal" data-target="#modal-ubah<?= $data->Id?>"> 
                                <i class="material-icons">&#xE254;</i>
                              </a>
                              <a class="mb-2 btn btn-danger tombol-hapus" href="<?= base_url() ?>admin/KP_TI_A03/hapusData?Id=<?= $data->Id ?>">
                                <i class="material-icons">&#xE872;</i>
                              </a>
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
          <!-- Modal Edit -->

          <?php foreach ($jadwal as $data) { ?>
           <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Tambah Syarat Pernyataan Seminar </h4>
                    <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?= base_url('admin/KP_TI_A03/syaratPengajuan') ?>" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                      <div class="form-group">
                        <label for="uraian">Tahun :</label>
                        <input type="text" class="form-control" name="Tahun" value="<?= $data->Tahun ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="uraian">Periode :</label>
                        <input type="text" class="form-control" name="Periode" value="<?php if($data->Periode == 1 ) { ?>BERJALAN <?php } else { ?>LIBURAN <?php } ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="uraian">Jumlah :</label>
                        <input type="number" class="form-control" name="Jumlah" autofocus>
                         <?= form_error('Jumlah', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="Id_pelaksanaan" value="<?= $data->Id_pelaksanaan ?>">
                      </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="submit" class="btn btn-primary">simpan</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>

            <?php foreach ($syarat as $data) { ?>
           <div class="modal fade" id="modal-ubah<?= $data->Id?>" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Ubah Syarat Pernyataan Seminar </h4>
                    <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?= base_url('admin/KP_TI_A03/ubahData') ?>" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                      <div class="form-group">
                        <label for="uraian">Tahun :</label>
                        <input type="text" class="form-control" name="Tahun" value="<?= $data->Tahun ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="uraian">Periode :</label>
                        <input type="text" class="form-control" name="Periode" value="<?php if($data->Periode == 1 ) { ?>BERJALAN <?php } else { ?>LIBURAN <?php } ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="uraian">Jumlah :</label>
                        <input type="number" class="form-control" name="Jumlah" value="<?= $data->Jumlah ?>" autofocus>
                         <?= form_error('Jumlah', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="Id" value="<?= $data->Id?>">
                      </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="submit" class="btn btn-primary">simpan</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
         
  <?php $this->load->view('admin/template/footer') ?>

  <script>
  
      $(document).ready(function() {
        $(".btn-primary").remove();
      });
    ?>
  </script>
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

