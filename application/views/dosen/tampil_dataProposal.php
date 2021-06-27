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
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
                <h3 class="page-title">Data Proposal</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Proposal </h6>
                  </div>
                <div class="table-responsive">
                   <div class="card-body">
                    <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th  class="text-center "><b>No. </b></th>
                          <th class="text-center "><b>NIM</b></th>
                          <th class="text-center "><b>Nama</b></th>
                          <th class="text-center "><b>Topik </b></th>
                          <th class="text-center "><b>Berkas</b></th>
                          <th class="text-center "><b>Status</b></th>
                          <th class="text-center "><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($proposal as $data) { ?>
                        <tr>
                          <td class="text-center "><?= $no++ ?>.</td>
                          <td><?= $data->NIM ?></td>
                          <td><?= $data->nama ?></td>
                          <td><?= $data->topik?></td>
                          <td class="text-center "><a class="mb-2 btn btn-sm btn-light mr-1" href="<?= base_url('assets/proposal/file/').$data->Berkas ?>"><img width="20" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar"></a></td>
                         <!--  <button type="button" class="mb-2 btn btn-sm btn-primary mr-1">Primary</button> -->
                          <td class="text-center "><?= $data->Icon ?></td>
                          <td class="text-center ">
                          <div class="btn-group btn-group-sm " role="group" aria-label="Table row actions">
                              <a  class="mb-2 btn  btn-success" href="<?= base_url('')?>dosen/proposal/setuju?setujui=<?= $data->Id_proposal ?>"  data-placement="top" title="Lihat" ><i class="fas fa-check"></i></a>
                              <a  class="mb-2 btn  btn-danger" href="<?= base_url('')?>dosen/proposal/tolak?ditolak=<?= $data->Id_proposal ?>"  data-placement="top" title="Lihat" ><i class="fas fa-times"></i></a>
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
          


             <?php foreach ($proposal as $data) { ?>
            <div class="modal fade" id="modal-edit<?=$data->Id_proposal; ?>" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">PILIH </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?= base_url('dosen/Proposal/pilihStatusProposal') ?>" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                   
                      <div class="md-form mb-5">
                        <input type="text" name="Id_proposal"  class="form-control" value="<?= $data->Id_proposal; ?>">                   
                      </div>
                      <div class="md-form mb-5">
                         
                        <select class="form-control" name="Status">
                          <option value="1"><b>Diproses</b></option>
                          <option value="2"><b>Diterima</b></option>
                          <option value="3"><b>Ditolak</b></option>
                        </select>
                      </div>
                  
                    </div>
                   
                    <div class="modal-footer d-flex justify-content-center">
                       <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                      <button class="btn btn-primary">PILIH<i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
         
  <?php $this->load->view('dosen/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
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
  function terima() {
      $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>/dosen/proposal/terima',
           data:{action:'call_this'},
           success:function(html) {
             alert(html);
           }

      });
 }
</script>