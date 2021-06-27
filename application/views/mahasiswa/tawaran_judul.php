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
                <h3 class="page-title">Data Judul</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-body">
                    <table id="dtBasicExample" class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th  style="text-align: center">No. </th>
                          <th style="text-align: center">Judul</th>
                          <th style="text-align: center">Alamat</th>
                          <th style="text-align: center">Jumlah</th>
                          <th style="text-align: center">No Handphone</th>
                          <th style="text-align: center">Instansi / Organisasi</th>
                          <th style="text-align: center">Tanggal</th>
                          <th style="text-align: center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($tawaranJudul as $data) { ?>
                        <tr>
                          <td style="text-align: center"><?= $no++ ?></td>
                          <td style="text-align: center"><?= $data->Judul?></td>
                          <td style="text-align: center"><?= $data->Alamat?></td>
                          <td style="text-align: center"><?= $data->Jumlah?></td>
                          <td style="text-align: center"><?= $data->No_Hp?></td>
                          <td style="text-align: center"><?= $data->InstansiOrganisasi?></td>
                          <td style="text-align: center"><?= $data->Tanggal?></td>
                          <td style="text-align: center">
                          <a class="mb-2 btn btn-info tombol-konfirmasiJudul" href="<?= base_url('')?>mahasiswa/rencana_judul/aksiInputRencanaJudul?Id_tawaranjudul=<?= $data['Id_tawaranjudul'] ?>">PILIH JUDUL</a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
            <!-- Default Dark Table -->
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