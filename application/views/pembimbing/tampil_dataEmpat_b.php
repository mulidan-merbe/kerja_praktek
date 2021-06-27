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
              <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
                <h3 class="page-title">Data KP-TI-A04B</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Pernilaian Seminar Pembimbing Lapangan</h6>
                  </div>
                <div class="table-responsive">
                   <div class="card-body">
                     <a href="<?= base_url('pembimbing/KP_TI_A04B/jadwal') ?>" class="mb-2 btn btn-primary mr-2" ><i class="fas fa-plus">&nbsp</i>Tambah</a>
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <!-- <th  style="text-align: center"><b>No. </b></th> -->
                          <th  style="text-align: center"><b>NIM </b></th>
                          <th  style="text-align: center"><b>Nama </b></th>
                          <th style="text-align: center"><b>Total </b></th>
                          <th style="text-align: center"><b>Rata-rata </b></th>
                          <!-- <th style="text-align: center"><b>Nilai </b></th> -->
                          <th style="text-align: center"><b>Tanggal </b></th>
                          <!-- <th style="text-align: center"><b>Catatan </b></th> -->
                          <th style="text-align: center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($seminar as $data) { 
                          $Total = $data->Nilai_satu + $data->Nilai_dua + $data->Nilai_tiga + $data->Nilai_empat + $data->Nilai_lima; 
                          $Jumlah = 5;
                          $Rata   = $Total / $Jumlah;

                          // $Nilai = if($Rata > 80) { 'A'; } elseif($Rata > 60){ 'B'; } elseif ($Rata > 40) { 'C'; };
                           // $Nilai = $Rata > 80 === 'A' or $Rata > 60 === 'B' or  $Rata > 40 === 'C';
                        ?> 
                        <tr>
                         <!--  <td style="text-align: center"><?= $no++ ?>.</td> -->
                          <td style="text-align: center"><?= $data->NIM ?></td>
                          <td style="text-align: center"><?= $data->nama ?></td>
                           <!-- <td style="text-align: center"><?= $data->nama ?></td> -->
                          <td style="text-align: center"><span class="badge badge-success"><?= $Total ?></span></td>
                          <td style="text-align: center"><span class="badge badge-info"><?= $Rata ?></span></td>
                          <!-- <td style="text-align: center"><span class="badge badge-info"><?= $Nilai ?></span></td> -->
                          <td style="text-align: center"><?= $format1 = format_indo(date('Y-m-d', strtotime( $data->Tanggal ))); ?></td> 
                          <td style="text-align: center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                              <a class="mb-2 btn btn-success " data-toggle="modal" data-target="#modal-lihat<?=$data->Id_empatB; ?>" data-placement="top" title="Lihat" ><i class="fas fa-eye"></i></a> 
                              <a class="mb-2 btn btn-info "  href="<?= base_url() ?>pembimbing/KP_TI_A04B/Ubah?NIM=<?= $data->NIM?>"><i class="material-icons">&#xE254;</i></a>
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

          <!-- Modal Lihat -->
           <?php foreach ($seminar as $data) { ?>
            <div class="modal fade" id="modal-lihat<?=$data->Id_empatB; ?>" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog modal-centered" role="document">
                <div class="modal-content" >
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
                      <table class="table  mb-0 table-bordered">
                              <tr>
                                <td ><b>Hasil Kerja Praktek</td>
                                <td><input type="text" name="Nilai_satu" class="form-control" value="<?= $data->Nilai_satu ?>" disabled></td>
                              </tr>
                              <tr>
                                <td><b>Isi dan Tata Tulis Laporan Kerja Praktek</td>
                                <td><input type="number" name="Nilai_dua" class="form-control" value="<?= $data->Nilai_dua ?>" disabled></td>
                              </tr>
                              <tr>
                                <td><b>Penguasaan Materi Kerja Praktek</td>
                                <td><input type="number" name="Nilai_tiga" class="form-control" value="<?= $data->Nilai_tiga ?>" disabled></td>
                              </tr>
                               <tr>
                                <td><b>Kemampuan Menjawab Pertanyaan yang <br>Diberikan Serta Mempertahankan Isi <br>Laporan Kerja Praktek</td>
                                <td><input type="number" name="Nilai_empat" class="form-control" value="<?= $data->Nilai_empat ?>" disabled></td>
                              </tr>
                              <tr>
                                <td><b>Etika Seminar dan Metode Presentasi</td>
                                <td><input type="number" name="Nilai_lima" class="form-control" value="<?= $data->Nilai_lima ?>" disabled></td>
                              </tr>
                            </table>
                    </div>
                   
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>

            <?php foreach ($seminar as $data) { ?>
            <div class="modal fade" id="modal-edit<?=$data->Id_empatB; ?>" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog modal-centered" role="document">
                <div class="modal-content" >
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">UBAH </h4>
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
                      <table class="table  mb-0 table-bordered">
                              <tr>
                                <td ><b>Hasil Kerja Praktek</td>
                                <td><input type="text" name="Nilai_satu" class="form-control" value="<?= $data->Nilai_satu ?>" ></td>
                              </tr>
                              <tr>
                                <td><b>Isi dan Tata Tulis Laporan Kerja Praktek</td>
                                <td><input type="number" name="Nilai_dua" class="form-control" value="<?= $data->Nilai_dua ?>" ></td>
                              </tr>
                              <tr>
                                <td><b>Penguasaan Materi Kerja Praktek</td>
                                <td><input type="number" name="Nilai_tiga" class="form-control" value="<?= $data->Nilai_tiga ?>" ></td>
                              </tr>
                               <tr>
                                <td><b>Kemampuan Menjawab Pertanyaan yang <br>Diberikan Serta Mempertahankan Isi <br>Laporan Kerja Praktek</td>
                                <td><input type="number" name="Nilai_empat" class="form-control" value="<?= $data->Nilai_empat ?>" ></td>
                              </tr>
                              <tr>
                                <td><b>Etika Seminar dan Metode Presentasi</td>
                                <td><input type="number" name="Nilai_lima" class="form-control" value="<?= $data->Nilai_lima ?>" ></td>
                              </tr>
                            </table>
                    </div>
                   
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
         
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