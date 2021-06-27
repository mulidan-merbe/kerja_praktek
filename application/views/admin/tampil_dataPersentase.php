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
              <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Persentase Penilaian Seminar</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Persentase Penilaian Seminar
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
                          <th  style="text-align: center"><b>Nilai Lapangan</b></th>
                          <th  style="text-align: center"><b>Nilai Seminar Lapangan</b></th>
                          <th  style="text-align: center"><b>Nilai Seminar Dosen</b></th>
                          <th style="text-align: center"><b>Tanggal</b></th>
                          <th style="text-align: center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $no = 1;
                        foreach ($persentase as $data) { ?>
                        <tr>
                          <td style="text-align: center"><?= $no++ ?>.</td>
                          <td style="text-align: center"><?= $data->Tahun?></td>
                          <td style="text-align: center"><?php if($data->Periode == 1 ) { ?>BERJALAN <?php } else { ?>LIBURAN <?php } ?></td>
                          <td style="text-align: center"><?= $data->Nilai_lapangan?>%</td>
                          <td style="text-align: center"><?= $data->Nilai_Seminar_lapangan?>%</td>
                          <td style="text-align: center"><?= $data->Nilai_Seminar_dosen?>%</td>
                          <td style="text-align: center"><?= $format1 = format_indo(date('Y-m-d', strtotime( $data->Tanggal )));?></td>
                          <td style="text-align: center">
                            <div class="btn-group btn-group-sm " role="group" aria-label="Table row actions">
                              <a class="mb-2 btn  btn-info " data-toggle="modal" data-target="#modal-ubah<?= $data->Id?>"> 
                                <i class="material-icons">&#xE254;</i>
                              </a>
                              <a class="mb-2 btn btn-danger tombol-hapus" href="<?= base_url() ?>admin/KP_TI_A04/hapusData?Id=<?= $data->Id ?>">
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

          <!-- Modal tambah -->
          	 <?php foreach ($jadwal as $data) { ?>
           <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Tambah Persentase Penilaian Seminar </h4>
                    <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?= base_url('admin/KP_TI_A04C/tambahPersentase') ?>" enctype="multipart/form-data">
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
                        <label for="uraian">Pesentase Penilaian Lapangan :</label>
                        <input type="number" placeholder="100%" class="form-control" name="Nilai_lapangan" autofocus>
                         <?= form_error('Nilai_lapangan', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="uraian">Persentase Penilaian Seminar Lapangan :</label>
                        <input type="number" placeholder="100%" class="form-control" name="Nilai_Seminar_lapangan" autofocus>
                         <?= form_error('Nilai_Seminar_lapangan', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="uraian">Persentase Penilaian Seminar Dosen :</label>
                        <input type="number" placeholder="100%" class="form-control" name="Nilai_Seminar_dosen" autofocus>
                         <?= form_error('Nilai_Seminar_dosen', '<small class="text-danger pl-3">', '</small>') ?>
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
            </div>
            <?php } ?>

            <!-- modal edit -->
            <?php foreach ($persentase as $data) { ?>
           <div class="modal fade" id="modal-ubah<?= $data->Id?>" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Ubah Persentase Penilaian Seminar </h4>
                    <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?= base_url('admin/KP_TI_A04C/ubahPersentase') ?>" enctype="multipart/form-data">
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
                        <label for="uraian">Pesentase Penilaian Lapangan :</label>
                        <input type="number" class="form-control" name="Nilai_lapangan"  value="<?= $data->Nilai_lapangan ?>">
                         <?= form_error('Nilai_lapangan', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="uraian">Persentase Penilaian Seminar Lapangan :</label>
                        <input type="number" class="form-control" name="Nilai_Seminar_lapangan"  value="<?= $data->Nilai_Seminar_lapangan?>">
                         <?= form_error('Nilai_Seminar_lapangan', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="uraian">Persentase Penilaian Seminar Dosen :</label>
                        <input type="number" class="form-control" name="Nilai_Seminar_dosen"  value="<?= $data->Nilai_Seminar_dosen ?>">
                         <?= form_error('Nilai_Seminar_dosen', '<small class="text-danger pl-3">', '</small>') ?>
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

