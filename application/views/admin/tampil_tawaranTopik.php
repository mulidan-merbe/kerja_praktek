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
          <?= $this->session->unset_userdata('flash'); ?>
            <!-- Page Header -->
             <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Tawaran Topik</h3>
              </div>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button1" class="btn btn-info <?php if($this->uri->segment(2)=="tawaran_topik"){echo "active";} ?>">Pengajuan</button>
              <button type="button2" class="btn btn-info ">Tawaran</button>
              <button type="button3" class="btn btn-info">Rencana</button>
            </div>
            <div class="row mt-2">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Tawaran Topik
                      
                    </h6>
                  </div>
                  <div class="table-responsive">
                  <div class="card-body">
                    <a href="<?= base_url('admin/tawaran_topik/tambah') ?>" class="mb-2 btn  btn-primary mr-2" ><i class="fas fa-plus">&nbsp</i>Tambah</a>
                    <table id="dtBasicExample" class="table mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  style="text-align: center"><b>No. </b></th>
                          <th style="text-align: center"><b>Dosen</b></th>
                          <th style="text-align: center"><b>Topik</b></th>
                          <th style="text-align: center"><b>Instansi </b></th>
                          <th style="text-align: center"><b>Alamat </b></th>
                          <th style="text-align: center"><b>Jumlah</b></th>
                          <th style="text-align: center"><b>Periode</b></th>
                          <th style="text-align: center"><b>Tanggal</b></th>
                          <th style="text-align: center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($tawaranJudul as $data) { ?>
                        <tr>
                          <td style="text-align: center"><?= $no++ ?>.</td>
                          <td style="text-align: center"><?= $data->Username?></td>
                          <td style="text-align: "><?= $data->topik?></td>
                          <td style="text-align: center"><?= $data->Instansi?></td>
                          <td style="text-align: center"><?= $data->Alamat?></td>
                          <td style="text-align: center"><?= $data->Jumlah?></td>
                          <td style="text-align: center"><b><?php if($data->Periode == 1) {?><span class="badge badge-success">BERJALAN</span><?php } elseif($data->Periode == 2) { ?><span class="badge badge-info">LIBURAN</span><?php } ?></b></td>
                          <td style="text-align: center"><?= $data->Tanggal ?></td>
                          <td>
                            <div class="btn-group btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
                              <a type="button" class="btn btn-info active-light" href="<?= base_url() ?>admin/tawaran_topik/ubah/<?= $data->Id_tawaranjudul ?>">
                                <i class="material-icons">&#xE254;</i>
                              </a>
                              <a type="button" class="btn btn-danger tombol-hapus" href="<?= base_url() ?>admin/Tawaran_topik/hapus/<?= $data->Id_tawaranjudul ?>">
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
          </div>
          
       
            


         
  <?php $this->load->view('admin/template/footer') ?>
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