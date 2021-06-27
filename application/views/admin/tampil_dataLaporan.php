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
                <h3 class="page-title">Data Laporan </h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Laporan </h6>
                  </div>
                <div class="table-responsive">
                   <div class="card-body" style="min-height: 375px">
                    <form method="get" action="">
                    <div class="row">
                        <div class="col-md-4">
                          <label>Filter Berdasarkan</label><br>
                          <select name="filter" id="filter"  class="form-control">
                              <option value="">Pilih</option>
                              <option value="1">Per Tahun</option>
                              <option value="2">Per Dosen</option>
                             <!--  <option value="3">Per </option> -->
                          </select>
                          <button type="submit" class="btn btn-primary mt-4 " >Tampilkan</button>
                          <a href="<?php echo $cetak; ?>" class=" btn btn-warning  mt-4">Cetak</a>
                          </div>
                          <div class="col-md-3">
                            <div id="form-tahun" >
                              <label>Tahun</label><br>
                              <select name="Tahun" class="form-control">>
                                  <option value="">Pilih</option>
                                  <?php
                                  foreach($tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                      echo '<option value="'.$data->Tahun.'">'.$data->Tahun.'</option>';
                                  }
                                  ?>
                              </select>
                            </div>
                            <div id="form-dosen" >
                              <label>Dosen</label><br>
                              <select name="NIP"  class="form-control">
                              <option value="">Pilih</option>
                              <option value="Novi Safriadi, S.T, M.T">Novi Safriadi, S.T, M.T</option>
                              <option value="987654321">Pak Dosen</option>
                             <!--  <option value="3">Per </option> -->
                              </select>
                              </div>
                            
                          </div>
                           </div>
                        </form>
                        <hr>
                    <b>  <?php echo $ket; ?></b><br />
                      <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th class="text-center"><b>No.</b></th>
                          <th  class="text-center"><b>NIM </b></th>
                          <th  class="text-center"><b>Nama </b></th>
                          <th  class="text-center"><b>Berkas </b></th>
                          <th  class="text-center"><b>Tanggal </b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($dataLaporan as $data){ 
                        ?>
                        <tr>
                        	<td class="text-center"><?= $no++ ?>.</td>
                          	<td class="text-center col-2"><?= $data->NIM ?></td>
                            <td class="col-4"><?= $data->nama ?></td>
                          	<td class="text-center"><a class="btn btn-sm btn-light" href="<?= base_url('assets/laporan/file/').$data->Berkas ?>"><img width="20" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/zipp.svg" alt="User Avatar"></a></td>
                          	<td class="text-center"><?= $format1 = format_indo(date('Y-m-d', strtotime( $data->Tanggal ))); ?></td>
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
<script>
    $(document).ready(function(){ 
        $(' #form-tahun, #form-dosen' ).hide(); 
        $('#filter').change(function(){ 
            if($(this).val() == '1'){ 
                $('#form-dosen').hide();
                $('#form-tahun').show();
            }else if($(this).val() == '2'){ 
                $('#form-tahun').hide(); 
                $('#form-dosen').show(); 
            }
            $(' #form-tahun select, #form-dosen select').val('');
        })
    })
</script>