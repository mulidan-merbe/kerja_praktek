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

           <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Tawaran Topik</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Tawaran Topik</h6>
                  </div>
                      <div class="table-responsive">
                   <div class="card-body">
                    <ul class="nav nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link active " onclick="return tawaran();">Tawaran Topik</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" onclick="return rencanaTopik();">Rencana Topik</a>
                      </li>
                    </ul>
                    <div id="tawaran">
                       <h6 class="m-0"><a href="<?= base_url('dosen/tawaran_topik/tambah') ?>" class="mb-2 mt-5 btn  btn-primary mr-2" ><i class="fas fa-plus">&nbsp</i>Tambah</a></h6>
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  style="text-align: center"><b>No. </b></th>
                          <th style="text-align: center"><b>Topik</th>
                          <th style="text-align: center"><b>Instansi</b></th>
                          <th style="text-align: center"><b>Alamat</b></th>
                          <th style="text-align: center"><b>No Narahubung</b></th>
                          <th style="text-align: center"><b>Jumlah</b></th>
                          <th  style="text-align: center"><b>Periode</b></th>
                          <th style="text-align: center"><b>Tanggal</b></th>
                          <th style="text-align: center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($tawaranTopik as $data) { ?>
                        <tr>
                          <td style="text-align: center"><?= $no++ ?>.</td> 
                          <td style=""><?= $data->topik?></td>
                          <td style="text-align: justify;"><?= $data->Instansi?></td>
                          <td style="text-align: justify;"><?= $data->Alamat?></td>
                          <td style="text-align: center"><?= $data->No_Hp?></td>
                          <td style="text-align: center"><?= $data->Jumlah?></td>
                          <td style="text-align: center"><b><?php if($data->Periode == 1) {?><span class="badge badge-success">BERJALAN</span><?php } elseif($data->Periode == 2) { ?><span class="badge badge-info">LIBURAN</span><?php } ?></b></td>
                          <td style="text-align: center"><?= $data->Tanggal?></td>
                          <td>
                            <div class="btn-group btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
                              <a type="button" class="btn btn-info active-light" href="<?= base_url() ?>dosen/tawaran_topik/ubah/<?= $data->Id_tawaranjudul ?>">
                                <i class="material-icons">&#xE254;</i>
                              </a>
                              <a type="button" class="btn btn-danger tombol-hapus" href="<?= base_url() ?>dosen/tawaran_topik/hapus/<?= $data->Id_tawaranjudul ?>">
                                <i class="material-icons">&#xE872;</i>
                              </a>
                            </div> 
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    </div>
                   <div id="rencana">
                     <h1>rencana</h1>
                   </div>
                   </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

    
  <?php $this->load->view('dosen/template/footer') ?>
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
<script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('#form-semester, #form-tahun, #form-dosen' ).hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-dosen').hide(); // Tampilkan form tanggal
                $(' #form-tahun').show();
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $(' #form-tahun').hide(); 
                $('#form-dosen').show(); // Tampilkan form bulan dan tahun
            }
            $(' #form-tahun select, #form-dosen select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
</script>

<script type="text/javascript">
  $(document).ready(function(){ // Ketika halaman selesai di load
    $('#rencana').hide();


    $('#tawaran').on('click', function (event) {
      event.preventDefault()
      $(this).tab('show'),
      $(this).addClass('active')
    })

    $('#rencana').on('click', function (event) {
      event.preventDefault()
      $(this).tab('show'),
      $(this).addClass('active')
      $('#tawaran').hide();
    })

    // function rencanaTopik () {
    //   $('#tawaran').hide(); // Tampilkan form tanggal
    //   $('#rencana').show();
    // }
  })
</script>