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
                <h3 class="page-title">Data Berita Acara</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Berita Acara Pengesahan Penilaian Kerja Praktek </h6>
                  </div>
                <div class="table-responsive">
                   <div class="card-body" style="min-height: 350px;">
                   	<!-- <span class="badge badge-info"><b>Dosen Pembimbing</b></span>
                    <br> <br> -->
                    
                    <table class="table  mb-0 table-bordered">
                 
                              <tr>
                                <td style="text-align: center;" colspan="2"><b>KOMPONEN</b></td>
                                <td style="text-align: center;" ><b>NILAI</td>
                                <td style="text-align: center;" ><b>BOBOT</td>
                                <td style="text-align: center;" ><b>NILAI X BOBOT</td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"><b>Penilaian Lapangan</b></td>
                                <td style="text-align: center;"><b>Pembimbing Lapangan</b></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;">40 %</td>
                                <td style="text-align: center;"></td>
                              </tr>
                              <tr>
                              <tr>
                                <td style="text-align: center;"><b>Penilaian Seminar Kerja Praktek</b></td>
                                <td style="text-align: center;"><b>Pembimbing Lapangan</b></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;">20 %</td>
                                <td style="text-align: center;"></td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"><b>Penilaian Seminar Kerja Praktek</b></td>
                                <td style="text-align: center;"><b>Dosen Pembimbing</b></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;">40 %</td>
                                <td style="text-align: center;"></td>
                              </tr>
                              <tr>
                              	<td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"><b>TOTAL</b></td>
                                <td style="text-align: center;">100 %</td>
                                <td style="text-align: center;"><span class="badge badge-info">0</span></td>
                              </tr>

                     </table>
          			<br>

                    <table class="table  mb-0 table-bordered">
            
                      <tr>
                        <!-- <td style="text-align: center;"><b>No.</b></td> -->
                        <td style="text-align: center;" ><b>Dosen Pembimbing</td>
                        <td style="text-align: center;" ><b>Ketua Jurusan</td>
                      </tr>
                      <tr>
                        <td style="text-align: center;"></td>
                        <td style="text-align: center;"></td>
                       
                      </tr>
                     </table>
                   </div>
                  </div>
                </div>
              </div>
          </div>    
</div>
          
  <?php $this->load->view('mahasiswa/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
  <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>