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
                <h3 class="page-title">Data KP-IF</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
         

             <div class="row">
                      <!-- <div class="col-12">
                        <div class="card mb-4">
                          <div class="card-body">
                            <h5 class="card-title"><b>KP-IF-01</b></h5>
                            <hr>
                            <p>Senin, 02 Maret 2020</p>
                            <p class="card-text " style="text-align: justify;"><b>Sistem Informasi Manajemen Kerja Praktek Informatika</b></p>
                            <br>  
                            <span class="badge badge-light">Mulidan</span><br>
                            <span class="badge badge-light">D1041151007</span>
                            <hr>
                            
                            <br>
                            
                            <a href="#" ><span class="badge badge-primary">Ubah</span></a>
                            <a href="#" ><span class="badge badge-danger">Hapus</span></a>
                             
                             <br>
                             <a class="btn btn-warning text-center" href="#"><img width="30" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar">Unduh</a>
                          </div>
                        </div>
                      </div> -->

                <div class="col-lg-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">KP-IF-01</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
<!--                       <div class="row"> -->
                       <!--  <div class="col-sm-3 ">
                        <div class="card mb-4">
                          <div class="card-body">
                            <h5 class="card-title"><b>KP-IF-01</b></h5>
                            <hr>
                            <p>Senin, 02 Maret 2020</p>
                            <p class="card-text " style="text-align: justify;"><b>Sistem Informasi Manajemen Kerja Praktek Informatika</b></p>
                            <br>  
                            <span class="badge badge-light">Mulidan</span><br>
                            <span class="badge badge-light">D1041151007</span>
                            <hr>
                            
                            <br>
                            
                            <a href="#" ><span class="badge badge-primary">Ubah</span></a>
                            <a href="#" ><span class="badge badge-danger">Hapus</span></a>
                             
                             <br>
                             <a class="btn btn-warning text-center" href="#"><img width="30" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar">Unduh</a>
                          </div>
                        </div>
                      </div>  -->
                      
                  

                        <table id="dtBasicExample" class=" table  mb-0 ">
                      <thead class="bg-light">
                        <tr>
                          <th  style="text-align: center">No. </th>
                          <th style="text-align: center">Judul </th>
                          <th style="text-align: center">Perusahaan </th>
                          <th style="text-align: center">Alamat)</th>
                          <th style="text-align: center">Status</th>
                          <th style="text-align: center">AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($kpsatu as $data) { ?>
                        <tr>
                          <td style="text-align: center"><?= $no++ ?></td>
                          <td style="text-align: center"><?= $data->Judul ?></td>
                          <td style="text-align: center"><?= $data->Nama_perusahaan?></td>
                          <td style="text-align: center"><?= $data->Alamat ?></td>
                          <td style="text-align: center">Diproses</td>
                          <td style="text-align: center">
                          <a class="mb-2 btn btn-info " data-toggle="modal" data-target="#ModalEdit" href="">Ubah</a>
                          <a class="mb-2 btn btn-danger tombol-hapus" href="">Hapus</a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
  

                      </div>
                     
                    </li>
                  </ul>
                </div>
              </div>

                      <!-- <div class="col-sm-4">
                        <div class="card mb-4">
                          <div class="card-body">
                            <h5 class="card-title"><b>KP-IF-02</b></h5>
                            <hr>
                            <p>Senin, 02 Maret 2020</p>
                            <p class="card-text " style="text-align: justify;"><b>Dosen Pembimbing : Novi Safriadi S.T M.T.</b></p>
                            <br>  
                            <span class="badge badge-info">Operator</span>
                            <hr>
                            <br>
                             <a class="btn btn-warning text-center" href="#"><img width="30" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar">Unduh</a>
                          </div>
                        </div>
                      </div>

                       <div class="col-sm-4">
                        <div class="card mb-4">
                          <div class="card-body">
                            <h5 class="card-title"><b>KP-IF-03</b></h5>
                            <hr>
                            <p>Senin, 02 Maret 2020</p>
                            <p class="card-text " style="text-align: justify;"><b>Surat Pengantar Kerja Praktek</b></p>
                            <br>  
                            <span class="badge badge-light">Mulidan</span><br>
                            <span class="badge badge-light">D1041151007</span>
                            <hr>
                            <br>
                            <div style="text-align: justify;">
                             <a class="btn btn-warning text-center" href="#"><img width="30" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar">Unduh</a>
                             </div>
                          </div>
                        </div>
                      </div> -->

          <!--    </div> -->

         <!--     <div class="row"> -->
                     <!--  <div class="col-sm-4">
                        <div class="card mb-4">
                          <div class="card-body">
                            <h5 class="card-title"><b>KP-IF-04</b></h5>
                            <hr>
                            <p>Senin, 02 Maret 2020</p>
                            <p class="card-text " style="text-align: justify;"><b>Surat Pembimbing Lapangan</b></p>
                            <br>  
                            <span class="badge badge-light">Mulidan</span><br>
                            <span class="badge badge-light">D1041151007</span>
                            <hr>
                            
                            <br>
                            
                            <a href="#" ><span class="badge badge-primary">Ubah</span></a>
                            <a href="#" ><span class="badge badge-danger">Hapus</span></a>
                             
                             <br>
                             <a class="btn btn-warning text-center" href="#"><img width="30" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar">Unduh</a>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="card mb-4">
                          <div class="card-body">
                            <h5 class="card-title"><b>KP-IF-05</b></h5>
                            <hr>
                            <p>Senin, 02 Maret 2020</p>
                            <p class="card-text " style="text-align: justify;"><b>Laporan Konsultasi Kerja Praktek </b><br>
                              Dosen Pembimbing : 5 <br>
                              Pembimbing Lapangan : 6
                            </p>
                            <br>  
                           <span class="badge badge-light">Mulidan</span><br>
                            <span class="badge badge-light">D1041151007</span>
                            <hr>
                            <a href="#" ><span class="badge badge-primary">Tambah</span></a>
                            <br>
                             <a class="btn btn-warning text-center" href="#"><img width="30" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar">Unduh</a>
                          </div>
                        </div>
                      </div>

                       <div class="col-sm-4">
                        <div class="card mb-4">
                          <div class="card-body">
                            <h5 class="card-title"><b>KP-IF-06</b></h5>
                            <hr>
                            <p>Senin, 02 Maret 2020</p>
                            <p class="card-text " style="text-align: justify;"><b>Penilaian Lapangan Kerja Praktek</b></p>
                            <br>  
                            <span class="badge badge-info">Pembimbing Lapangan</span>
                            <hr>
                            <br>
                            <div style="text-align: justify;">
                             <a class="btn btn-warning text-center" href="#"><img width="30" class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back')?>/images/avatars/pdf.svg" alt="User Avatar">Unduh</a>
                             </div>
                          </div>
                        </div>
                      </div> -->
             </div>
          </div>

          <!-- <div class="col-2"> </div>
                            <div class="col-8 col-"> 
                            <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                             <button type="button" class="btn btn-primary" id="btn-tambah-form">Tambah Data Form</button>
                              <button type="button" class="btn btn-warning" id="btn-reset-form">Reset Form</button><br><br>

                            <form method="post" action="<?= base_url('admin/KP_IF_02/tambahData') ?>" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="email">No Surat :</label>
                                <input type="text" name="No_surat[]" id="form1" class="form-control" value="<?= set_value('No_surat') ?>">
                                <?= form_error('No_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                 <label for="email">NIM :</label>
                                 <input type="text" name="NIM[]" id="form2" class="form-control" value="<?= set_value('NIM') ?>">
                                 <?= form_error('NIM', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                 <label for="email">Nama :</label>
                                 <input type="text" name="Username[]" id="form3" class="form-control" value="<?= set_value('Username') ?>">
                                 <?= form_error('Username', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                 <label for="email">Alamat/Judul :</label>
                                 <input type="text" name="Judul[]" id="form4" class="form-control" value="<?= set_value('Judul') ?>">
                                  <?= form_error('Judul', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                               <div class="form-group">
                                 <label for="email">Dosen Pembimbing :</label>
                                 <input type="text" name="Dosen_pembimbing[]" id="form4" class="form-control" value="<?= set_value('Dosen_pembimbing') ?>">
                                  <?= form_error('Dosen_pembimbing', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div id="insert-form"></div>
                              <input class="btn btn-success" type="submit" name="btn" value="Tambah" />
                              
                            </form>

                            <input type="hidden" id="jumlah-form" value="1">
                          </div>
                          </div> -->
          
          <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">INPUT PROPOSAL</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?= base_url('mahasiswa/proposal/aksiInputProposal') ?>" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                      <div class="md-form mb-5">
                        <i class="fas fa-file prefix grey-text"></i>
                        <input type="text" name="judul_proposal" id="form3" class="form-control">
                        <label for="form3">Judul Proposal</label>
                      </div>

                      <div class="md-form mb-4">
                      <span>Uploud Proposal (.pdf File)</span>
                      <div class="file-field">
                        <div class="btn btn-primary btn-sm float-left">
                          <input type="file" name="berkas_proposal" multiple>
                        </div>
                      </div>
                      </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <button class="btn btn-primary">UPLOUD <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                  </form>
                </div>
              </div>
          </div>

          <!-- Modal Edit -->
         
  <?php $this->load->view('mahasiswa/template/footer') ?>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
  <script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>



 <script>

    $(document).ready(function() {
      for(B=1; B<=1; B++){
        Barisbaru();
      }
      $('#BarisBaru').click(function(e) {
        e.preventDefault();
        Barisbaru();
      $("#tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
      })
    });
     function Barisbaru() {
      $(document).ready(function () {
        $("[data-toggle+'tooltip'").tooltip();
      }) 
      var Nomor = $("#tableLoop tbody tr").length + 1;
      var Baris = '<tr>';
            Baris += '<td class"text-center">'+Nomor+'</td>';
            Baris += '<td>';
             Baris += '<input type="text" name="No_surat[]" class="form-control" placeholder="Nomor Surat" required="">';
            Baris += '</td>';
            Baris += '<td>';
              Baris += '<input type="text" name="NIM[]" class="form-control" placeholder="NIM" required="">';
            Baris += '</td>';
            Baris += '<td>';
              Baris += '<input type="text" name="Username[]" class="form-control" placeholder="Nama Mahasiswa" required="">';
            Baris += '</td>';
            Baris += '<td>';
              Baris += '<textarea name="Judul[]" type="text" class="form-control" id="" cols="50" rows="7"  placeholder="Alamat / Judul" ></textarea>';
            Baris += '</td>';
            Baris += '<td>';
              Baris += '<input type="text" name="Dosen_pembimbing[]" class="form-control" placeholder="Dosen Pembimbing" required="">';
            Baris += '</td>';
            Baris += '<td class="text-center">';
              Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times"></i></a>';
          Baris += '</tr>';

        $("#tableLoop tbody").append(Baris);
        $("#tableLoop tbody tr").each(function() {
          $(this).find('td:nth-child(2) input').focus();
        });
     }  

     $(document).on('click','#HapusBaris', function(e) {
        e.preventDefault();
        var Nomor = 1;
        $(this).parent().parent().remove();
        $('tableLoop tbody tr').each(function() {
          $(this).find('td:nth-child(1)').html(Nomor);
          Nomor++;
        });
     })
  </script>
 