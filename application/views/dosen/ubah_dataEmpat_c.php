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
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
              <h3 class="page-title">Data Seminar</h3>
            </div>
          </div>
          <!-- End Page Header -->
          <!-- Default Light Table -->
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Berita Acara Pengesahan Penilaian Kerja Praktek
                    <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                  </h6>
                </div>
                <div class="table-responsive">
                  <div class="card-body">
                    <table class="table  mb-0 table-bordered">
                      <?php foreach ($persentase as $data) {
                        $Lapangan = $data->Nilai_lapangan;
                        $Nilai_Seminar_lapangan = $data->Nilai_Seminar_lapangan;
                        $Nilai_Seminar_dosen = $data->Nilai_Seminar_dosen;
                      ?>

                        <?php
                        $no = 1;
                        foreach ($empatA as $data) {
                          $Total = $data->Nilai_satu + $data->Nilai_dua + $data->Nilai_tiga + $data->Nilai_empat + $data->Nilai_lima;
                          $Jumlah = 5;
                          $Rata1   = $Total / $Jumlah;

                          $total = ($Rata1 * $Nilai_Seminar_dosen) / 100



                          // $Nilai = if($Rata > 80) { 'A'; } elseif($Rata > 60){ 'B'; } elseif ($Rata > 40) { 'C'; };
                          // $Nilai = $Rata > 80 === 'A' or $Rata > 60 === 'B' or  $Rata > 40 === 'C';
                        ?>
                          <?php
                          $no = 1;
                          foreach ($empatB as $data) {
                            $Total_lapangan = $data->Nilai_satu + $data->Nilai_dua + $data->Nilai_tiga + $data->Nilai_empat + $data->Nilai_lima;
                            $Jumlah_lapangan = 5;
                            $Rata_lapangan   = $Total_lapangan / $Jumlah_lapangan;

                            $total2 = ($Rata_lapangan * $Nilai_Seminar_lapangan) / 100;




                            // $Nilai = if($Rata > 80) { 'A'; } elseif($Rata > 60){ 'B'; } elseif ($Rata > 40) { 'C'; };
                            // $Nilai = $Rata > 80 === 'A' or $Rata > 60 === 'B' or  $Rata > 40 === 'C';
                          ?>

                            <?php foreach ($duaC as $data) {

                              $TotalduaC = $data->Nilai_satu + $data->Nilai_dua + $data->Nilai_tiga + $data->Nilai_empat + $data->Nilai_lima;
                              $Jumlah = 5;
                              $Rata2   = $TotalduaC / $Jumlah;
                              $RataduaC   = $Rata2;
                              $total3 = ($RataduaC * $Lapangan) / 100

                            ?>
                              <?php
                              $totalsemua  = ($total + $total2 + $total3)
                              ?>
                              <tr>
                                <td style="text-align: center;" colspan="2"><b>KOMPONEN</b></td>
                                <td style="text-align: center;"><b>NILAI</td>
                                <td style="text-align: center;"><b>BOBOT</td>
                                <td style="text-align: center;"><b>NILAI X BOBOT</td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"><b>Penilaian Lapangan</b></td>
                                <td style="text-align: center;"><b>Pembimbing Lapangan</b></td>
                                <td style="text-align: center;"><?= $RataduaC ?></td>
                                <td style="text-align: center;"><?= $Lapangan ?> %</td>
                                <td style="text-align: center;"><?= $total3 ?></td>
                              </tr>
                              <tr>
                              <tr>
                                <td style="text-align: center;"><b>Penilaian Seminar Kerja Praktek</b></td>
                                <td style="text-align: center;"><b>Pembimbing Lapangan</b></td>
                                <td style="text-align: center;"><?= $Rata_lapangan ?></td>
                                <td style="text-align: center;"><?= $Nilai_Seminar_lapangan ?> %</td>
                                <td style="text-align: center;"><?= $total2 ?></td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"><b>Penilaian Seminar Kerja Praktek</b></td>
                                <td style="text-align: center;"><b>Dosen Pembimbing</b></td>
                                <td style="text-align: center;"><?= $Rata1 ?></td>
                                <td style="text-align: center;"><?= $Nilai_Seminar_dosen ?> %</td>
                                <td style="text-align: center;"><?= $total ?></td>
                              </tr>
                              <tr>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"><b>TOTAL</b></td>
                                <td style="text-align: center;">100 %</td>
                                <td style="text-align: center;"><span class="badge badge-info"><?= $totalsemua ?></span></td>
                              </tr>



                    </table>
                  <?php } ?>
                <?php } ?>
              <?php } ?>
            <?php } ?>
            <br>
            <hr style="border: 2px solid #00000038;">
            <div class="row">
              <?php foreach ($nilai as $data) { ?>

                <div class="col-md-4 col-sm-12">
                  <form method="post" action="<?= base_url('dosen/beritaAcara/ubahData') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="hidden" name="NIM" value="<?= $data->NIM ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="Id_empatC" value="<?= $data->Id_empatC ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Status :</label>
                      <select class="form-control" name="Status">
                        <option value="<?= $data->Status_dosen ?>"><b><?php if ($data->Status_dosen == 2) { ?>Diterima <?php } elseif ($data->Status_dosen == 3) { ?>Ditolak <?php } ?></b></option>
                        <option value="2"><b>Diterima</b></option>
                        <option value="3"><b>Ditolak</b></option>
                        <?= form_error('Status', '<small class="text-danger pl-3">', '</small>'); ?>
                      </select>
                    </div>
                    <!-- <div class="form-group">
                     			<label for="Catatan">Catatan :</label><br>
                     			<textarea name="Catatan" id="Catatan" cols="70" rows="7"  class="form-control"><?= $data->Catatan ?></textarea>
                     		</div> -->
                    <button class="btn btn-primary" type="submit">Simpan</button>
                  </form>
                </div>
              <?php } ?>
            </div>

            <br>
                  </div>
                </div>
              </div>
            </div>

            <!-- End Default Light Table -->
            <!-- Default Dark Table -->
          </div>


        </div>

        <?php $this->load->view('dosen/template/footer') ?>
        <!-- MDBootstrap Datatables  -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
        <script>
          $(document).ready(function() {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
          });
        </script>