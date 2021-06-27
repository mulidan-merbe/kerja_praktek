

<!doctype html>
<html class="no-js h-100" lang="en">
  <?php $this->load->view('admin/template/head') ?>
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
                <h3 class="page-title">Data KP-IF-02</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="table-responsive">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">KP-IF-02</h6>
                  </div>
                  <div class="card-body " style="min-height: 375px;"> 
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong> Masukkan data KP-IF-02 berdasarkan data KP-IF-01 yang telah ditambahkan mahasiswa.</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                      <form action="">
                          <div class="col-md-12">
                            <table class="table " id="tableLoop">
                              <thead>
                                <tr>
                                  <td class="text-center"> # </td>
                                  <td>No Surat</td>
                                  <td>NIM</td>
                                  <td>Nama</td>
                                  <td>Alamat/Judul</td>
                                  <td>Dosen Pembimbing</td>
                                  <td><button class="btn btn-success btn-block" id="BarisBaru"><i class="fa fa-plus"></i></button></td>
                                </tr>
                              </thead>
                              <tbody> 
                              </tbody>
                              
                            </table>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Simpan</button>
                            <button type="reset" class="btn btn-default">Batal</button>
                          </div>
                      </form>
                 </div>
                </div>
                </div>  
             </div>
             </div>
           </div>
    

  <?php $this->load->view('admin/template/footer') ?>
 
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
 
  
  