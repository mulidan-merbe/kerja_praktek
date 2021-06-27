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
                <h3 class="page-title">Data KP-TI-A04A</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Pernilaian Seminar Dosen Pembimbing</h6>
                  </div>
                <div class="table-responsive">
                   <div class="card-body">
                     <table class="table  mb-0 table-bordered">
                    
                              <tr>
                                <td style="text-align: center;"><b>No.</b></td>
                                <td style="text-align: center;"><b>Komponen Penilaian</b></td>
                                <td style="text-align: center;" ><b>Nilai ( 0 - 100 )</td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"><b>1.</b></td>
                                <td ><b>Hasil Kerja Praktek</b></td>
                                <td><input type="text" name="Nilai_satu" class="form-control" value="" disabled></td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"><b>2.</b></td>
                                <td><b>Isi dan Tata Tulis Laporan Kerja Praktek</b></td>
                                <td><input type="number" name="Nilai_dua" class="form-control" value="" disabled></td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"><b>3.</b></td>
                                <td><b>Penguasaan Materi Kerja Praktek</b></td>
                                <td><input type="number" name="Nilai_tiga" class="form-control" value="" disabled></td>
                              </tr>
                               <tr>
                                <td style="text-align: center;"><b>4.</b></td>
                                <td><b>Kemampuan Menjawab Pertanyaan yang <br>Diberikan Serta Mempertahankan Isi <br>Laporan Kerja Praktek</b></td>
                                <td><input type="number" name="Nilai_empat" class="form-control" value="" disabled></td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"><b>5.</b></td>
                                <td><b>Etika Seminar dan Metode Presentasi</b></td>
                                <td><input type="number" name="Nilai_lima" class="form-control" value="" disabled></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td style="text-align: right;"><b>Total</td>
                                <td style="text-align: center"><span class="badge badge-success"></span></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td style="text-align: right;"><b>Rata-rata</td>
                                <td style="text-align: center"><span class="badge badge-info"></span></td>
                              </tr>
                           
                     </table>
                     <br>
                     <hr>
                    <label for="">Catatan :</label><br>
                    <textarea name="catatan" id="" cols="140" rows="7" disabled></textarea>
                	<br><br>
                   </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
            <!-- Default Dark Table -->
          </div>

          <!-- Modal Lihat -->
         
  <?php $this->load->view('mahasiswa/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
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