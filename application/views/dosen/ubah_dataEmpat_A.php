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
            <div class="col">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Ubah Penilaian Seminar
                    <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                  </h6>
                </div>
                <div class="card-body " style="min-height: 375px;">
                  <?php if ($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                  } ?>
                  <form method="post" action="<?= base_url('dosen/penilaian/ubahData') ?>" enctype="multipart/form-data">
                    <?php foreach ($ubah as $data) { ?>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <input type="hidden" name="Id_empatA" class="form-control" value="<?= $data->Id_empatA ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <table class="table  mb-0 table-bordered">
                            <tr>
                              <td class="col-6"><b>Hasil Kerja Praktek</b></td>
                              <td><input type="text" name="Nilai_satu" class="form-control" value="<?= $data->Nilai_satu ?>">
                                <?= form_error('Nilai_satu', '<small class="text-danger pl-3">', '</small>'); ?>
                              </td>
                            </tr>
                            <tr>
                              <td><b>Isi dan Tata Tulis Laporan Kerja Praktek</b></td>
                              <td><input type="number" name="Nilai_dua" class="form-control" value="<?= $data->Nilai_dua ?>">
                                <?= form_error('Nilai_dua', '<small class="text-danger pl-3">', '</small>'); ?></td>
                            </tr>
                            <tr>
                              <td><b>Penguasaan Materi Kerja Praktek</b></td>
                              <td><input type="number" name="Nilai_tiga" class="form-control" value="<?= $data->Nilai_tiga ?>">
                                <?= form_error('Nilai_tiga', '<small class="text-danger pl-3">', '</small>'); ?></td>
                            </tr>
                            <tr>
                              <td><b>Kemampuan Menjawab Pertanyaan yang Diberikan Serta Mempertahankan Isi <br>Laporan Kerja Praktek</b></td>
                              <td><input type="number" name="Nilai_empat" class="form-control" value="<?= $data->Nilai_empat ?>">
                                <?= form_error('Nilai_empat', '<small class="text-danger pl-3">', '</small>'); ?></td>
                            </tr>
                            <tr>
                              <td><b>Etika Seminar dan Metode Presentasi</b></td>
                              <td><input type="number" name="Nilai_lima" class="form-control" value="<?= $data->Nilai_lima ?>">
                                <?= form_error('Nilai_lima', '<small class="text-danger pl-3">', '</small>'); ?></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <br>
                      <p>* Pastikan satuan penilaian adalah <strong>(1-100)</strong></p>
                      <hr>
                      <div class="form-group">
                        <label for="Catatan">Catatan :</label>
                        <textarea name="Catatan" id="Catatan" cols="70" rows="10" class="form-control"><?= $data->Catatan ?></textarea>
                      </div>
                    <?php } ?>
                    <?php foreach ($pelaksanaan as $data) {
                      if (date('Y-m-d') > $data->Tanggal_selesai) { ?>
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                          Simpan
                        </a>
                        <button type="reset" class="btn btn-info">reset</button>
                        <div class="collapse" id="collapseExample">
                          <div class="card card-body">
                            Maaf data tidak bisa diubah, jadwal pelaksanaan sudah lewat. Terima Kasih.
                          </div>
                        </div>
                      <?php } else { ?>
                        <button type="submit" class="btn btn-primary">simpan</button>
                        <button type="reset" class="btn btn-info">reset</button>
                      <?php } ?>
                    <?php } ?>

                    <!-- <button type="reset" class="btn btn-info">Reset</button> -->
                  </form>
                </div>
              </div>
            </div>
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