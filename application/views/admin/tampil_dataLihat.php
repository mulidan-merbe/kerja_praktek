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
                <h3 class="page-title">Data Berita Acara
                </h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Berita Acara Pengesahan Penilaian Kerja Praktek 
                    <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></h6>
                  </div>
                <div class="table-responsive">
                   <div class="card-body" style="min-height: 350px;">
                   	<!-- <span class="badge badge-info"><b>Dosen Pembimbing</b></span>
                    <br> <br> -->
                    
                    <table class="table  mb-0 table-bordered table-striped">
                   	<?php 
                        $no = 1;
                        foreach ($empatA as $data) { 
                          $Total = $data->Nilai_satu + $data->Nilai_dua + $data->Nilai_tiga + $data->Nilai_empat + $data->Nilai_lima; 
                          $Jumlah = 5;
                          $Rata1   = $Total / $Jumlah;

                          $total = ($Rata1 * 40) / 100



                          // $Nilai = if($Rata > 80) { 'A'; } elseif($Rata > 60){ 'B'; } elseif ($Rata > 40) { 'C'; };
                           // $Nilai = $Rata > 80 === 'A' or $Rata > 60 === 'B' or  $Rata > 40 === 'C';
                        ?> 
                    <?php 
                        $no = 1;
                        foreach ($empatB as $data) { 
                          $Total = $data->Nilai_satu + $data->Nilai_dua + $data->Nilai_tiga + $data->Nilai_empat + $data->Nilai_lima; 
                          $Jumlah = 5;
                          $Rata2   = $Total / $Jumlah;

                          $total2 = ($Rata2 * 20) / 100;

                          $Rata3   = 90;
                          $total3 = ($Rata3 * 40) / 100

                        
                          // $Nilai = if($Rata > 80) { 'A'; } elseif($Rata > 60){ 'B'; } elseif ($Rata > 40) { 'C'; };
                           // $Nilai = $Rata > 80 === 'A' or $Rata > 60 === 'B' or  $Rata > 40 === 'C';
                        ?> 

                        <?php 
                        $totalsemua	= ($total + $total2 + $total3)
                         ?>
                              <tr>
                              	<td style="text-align: center;"></td>
                                <td style="text-align: center;"><b>KOMPONEN</b></td>
                                <td style="text-align: center;" ><b>NILAI</td>
                                <td style="text-align: center;" ><b>BOBOT</td>
                                <td style="text-align: center;" ><b>NILAI X BOBOT</td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"><b>Penilaian Lapangan</b></td>
                                <td style="text-align: center;"><b>Pembimbing Lapangan</b></td>
                                <td style="text-align: center;"><?= $Rata3 ?></td>
                                <td style="text-align: center;">40 %</td>
                                <td style="text-align: center;"><?= $total3 ?></td>
                              </tr>
                              <tr>
                              <tr>
                                <td style="text-align: center;"><b>Penilaian Seminar Kerja Praktek</b></td>
                                <td style="text-align: center;"><b>Pembimbing Lapangan</b></td>
                                <td style="text-align: center;"><?= $Rata2 ?></td>
                                <td style="text-align: center;">20 %</td>
                                <td style="text-align: center;"><?= $total2 ?></td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"><b>Penilaian Seminar Kerja Praktek</b></td>
                                <td style="text-align: center;"><b>Dosen Pembimbing</b></td>
                                <td style="text-align: center;"><?= $Rata1 ?></td>
                                <td style="text-align: center;">40 %</td>
                                <td style="text-align: center;"><?= $total ?></td>
                              </tr>
                              <tr>
                              	<td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"><b>TOTAL</b></td>
                                <td style="text-align: center;">100 %</td>
                                <td style="text-align: center;"><span class="badge badge-info"><?= $totalsemua ?></span></td>
                              </tr>

                           <?php } ?>    
                           <?php } ?> 
                     </table>
          			<br>
               
                    <?php foreach ($empatC as $data) { 
                      // $terima = if($data->Status_kaprodi == 2)
                    ?>
                    <table class="table  mb-0 table-bordered table-striped">
            
                      <tr>
                        <!-- <td style="text-align: center;"><b>No.</b></td> -->
                        <td style="text-align: center;" ><b>Dosen Pembimbing</td>
                        <td style="text-align: center;" ><b>Ketua Jurusan</td>
                      </tr>
                      <tr>
                        <td style="text-align: center;"><?= $data->Icon ?></td>
                        <!--  masih error -->
                        <td style="text-align: center;"><?php if($data->Status_kaprodi == 2 ) { ?><span class="badge badge-success">Diterima</span><?php  } else{ ?><span class="badge badge-danger">Ditolak</span><?php }  ?></td> 
                        <!-- <td style="text-align: center;"></td> -->
                       
                      </tr>
                     </table>
                     <!-- <br>
                    <small>Adapun catatan yang perlu dan telah diperbaiki pada Laporan Kerja Praktek adalah:</small>
                     <div class="form-group">
                        <label for="Catatan">Catatan :</label><br>
                        <textarea name="Catatan" id="Catatan" cols="70" rows="7"  class="form-control" disabled=""><?= $data->Catatan ?></textarea>
                      </div> -->
                       <?php } ?>       
                     <br>
                   </div>
                  </div>
                </div>
              </div>
              
            <!-- End Default Light Table -->
            <!-- Default Dark Table -->
          </div>

          
</div>
          
  <?php $this->load->view('admin/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
  <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>