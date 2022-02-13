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
              <h3 class="page-title">Data Seminar</h3>
            </div>
          </div>
          <!-- End Page Header -->
          <!-- Default Light Table -->
          <div class="row">
            <div class="col">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Tambah Penilaian Seminar
                    <button style="float: right;" type="button" class="btn btn-sm btn-warning" onclick="javascript:history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                  </h6>
                </div>
                <div class="card-body " style="min-height: 375px;">
                  <?php if ($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                  } ?>
                  <form method="post" action="<?= base_url('pembimbing/penilaian/tambahData') ?>" enctype="multipart/form-data">
                    <?php foreach ($jadwal as $data) { ?>

                      <div class="row">
                        <div class="col-md-12">
                          <table class="table  mb-0 table-bordered">
                            <tr>
                              <td class="col-md-2"><b>NIM</b></td>
                              <td>
                                <input type="hidden" name="NIM" id="form2" class="form-control " value="<?= $data->NIM ?>">
                                <input type="text" style="font-weight: bold;" class="form-control" value="<?= $data->NIM ?>" disabled>
                              </td>
                            </tr>
                            <tr>
                              <td><b>Nama</b></td>
                              <td>
                                <input type="text" name="" style="font-weight: bold;" class="form-control" value="<?= $data->nama ?>" disabled>
                              </td>
                            </tr>
                            <tr>
                              <td><b>Judul</b></td>
                              <td>
                                <textarea name="" style="font-weight: bold;" class="form-control" placeholder="Alamat / Judul" disabled><?= $data->topik ?></textarea>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    <?php
                    } ?>

                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <table class="table  mb-0 table-bordered">
                          <tr>
                            <td class="col-5"><b>Hasil Kerja Praktek</b></td>
                            <td><input type="number" name="Nilai_satu" class="form-control" placeholder="Hasil Kerja Praktek" value="<?= set_value('Nilai_satu') ?>">
                              <?= form_error('Nilai_satu', '<small class="text-danger pl-3">', '</small>'); ?>
                            </td>
                          </tr>
                          <tr>
                            <td><b>Isi dan Tata Tulis Laporan Kerja Praktek</b></td>
                            <td><input type="number" name="Nilai_dua" class="form-control" placeholder="Isi dan Tata Tulis Laporan Kerja Praktek" value="<?= set_value('Nilai_dua') ?>"><?= form_error('Nilai_dua', '<small class="text-danger pl-3">', '</small>'); ?></td>
                          </tr>
                          <tr>
                            <td><b>Penguasaan Materi Kerja Praktek</b></td>
                            <td><input type="number" name="Nilai_tiga" class="form-control" placeholder="Penguasaan Materi Kerja Praktek" value="<?= set_value('Nilai_tiga') ?>"><?= form_error('Nilai_tiga', '<small class="text-danger pl-3">', '</small>'); ?></td>
                          </tr>
                          <tr>
                            <td><b>Kemampuan Menjawab Pertanyaan yang <br>Diberikan Serta Mempertahankan Isi <br>Laporan Kerja Praktek</b></td>
                            <td><input type="number" name="Nilai_empat" class="form-control" placeholder="Kemampuan Menjawab Pertanyaan yang Diberikan Serta Mempertahankan Isi Laporan Kerja Praktek" value="<?= set_value('Nilai_empat') ?>"><?= form_error('Nilai_empat', '<small class="text-danger pl-3">', '</small>'); ?></td>
                          </tr>
                          <tr>
                            <td><b>Etika Seminar dan Metode Presentasi</b></td>
                            <td><input type="number" name="Nilai_lima" class="form-control" placeholder="Etika Seminar dan Metode Presentasi" value="<?= set_value('Nilai_lima') ?>"><?= form_error('Nilai_lima', '<small class="text-danger pl-3">', '</small>'); ?></td>
                          </tr>
                        </table>
                      </div>
                    </div><br>
                    <p>* Pastikan satuan penilaian adalah <strong>(1-100)</strong></p>
                    <hr>
                    <div class="form-group">
                      <label for="Catatan">Catatan :</label>
                      <textarea name="Catatan" id="Catatan" cols="70" rows="10" class="form-control"></textarea>
                    </div>
                    <?php if ($nilai) { ?>
                      <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Simpan
                      </a>
                      <button type="reset" class="btn btn-info">reset</button>
                      <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                          Data sudah ada.
                        </div>
                      </div>
                    <?php } else { ?>
                      <button type="submit" class="btn btn-primary">simpan</button>
                      <button type="reset" class="btn btn-info">Reset</button>
                    <?php } ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>



        <?php $this->load->view('pembimbing/template/footer') ?>
        <!-- MDBootstrap Datatables  -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
        <script>
          $(document).ready(function() {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
          });
        </script>