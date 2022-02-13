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
            <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
              <h3 class="page-title">Data Berita Acara</h3>
            </div>
          </div>
          <!-- End Page Header -->
          <!-- Default Light Table -->
          <div class="row">
            <div class="col">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Berita Acara Penilaian Kerja Praktek</h6>
                </div>
                <div class="table-responsive">
                  <div class="card-body">
                    <a href="<?= base_url() ?>admin/beritaAcara/persentase" class="mb-2 btn btn-primary mr-2">Persentase Penilaian</a>
                    <a class="mb-2 btn  btn-primary" data-toggle="modal" data-target="#modal-DPNA" data-placement="top" title="Lihat">DPNA</a>
                    <!-- <div class="dropdown "> -->
                    <a class="btn btn-primary dropdown-toggle inline" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Cetak
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <!-- <form class="" action="<?php echo base_url('admin/beritaAcara/excel') ?>" method="post">
                        <button type="submit" name="button" class="btn btn-primary">Export data</button>
                      </form> -->
                      <a class="dropdown-item" href="<?= base_url() ?>admin/beritaAcara/excel">EXCEL</a>
                      <button class="dropdown-item" onclick=" window.open('<?= $cetak; ?>','_blank')">PDF</button>
                    </div>
                    <!-- </div> -->
                    <!--  <a href="<?= $cetak; ?>" class=" btn btn-warning  ">Cetak</a> -->
                    <table id="dtBasicExample" class=" table  mb-0 table-bordered table-striped">
                      <thead class="">
                        <tr>
                          <th class="text-center"><b>No. </b></th>
                          <th class="text-center"><b>NIM</b></th>
                          <th class="text-center col-4"><b>Nama</b></th>
                          <th class="text-center"><b>Status</b></th>
                          <th class="text-center"><b>Tanggal</b></th>
                          <th class="text-center"><b>Aksi</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($nilai as $data) { ?>
                          <tr>
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td class="text-center"><?= $data->NIM ?></td>
                            <td class=""><?= $data->nama ?></td>
                            <!-- <td class="text-center"><?= $data->Icon ?></td> -->
                            <td class="text-center"><?= $data->Icon ?></td>
                            <td class="text-center"><?= $format1 = format_indo(date('Y-m-d', strtotime($data->Tanggal_kaprodi))); ?></td>
                            <td class="text-center">
                              <div class="btn-group btn-group-sm " role="group" aria-label="Table row actions">
                                <?php if ($this->session->userdata('Status') == 1) { ?>
                                  <a class="mb-2 btn  btn-success " href="<?= base_url() ?>admin/beritaAcara/detail/<?= $data->NIM ?>"><i class="fas fa-eye"></i></a>
                                  <a class="mb-2 btn  btn-primary" href="<?= base_url('') ?>admin/beritaAcara/setuju?setujui=<?= $data->NIM ?>" data-placement="top" title="Lihat"><i class="fas fa-check"></i></a>
                                  <a class="mb-2 btn  btn-danger" href="<?= base_url('') ?>admin/beritaAcara/tolak?ditolak=<?= $data->NIM ?>" data-placement="top" title="Lihat"><i class="fas fa-times"></i></a>
                                <?php } ?>
                                <?php if ($this->session->userdata('Status') == 2) { ?>
                                  <a class="mb-2 btn  btn-success " href="<?= base_url() ?>admin/beritaAcara/detail/<?= $data->NIM ?>"><i class="fas fa-eye"></i></a>
                                <?php } ?>

                              </div>
                            </td>

                          </tr>
                        <?php } ?>
                      </tbody>
                      <tbody>

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
        <?php foreach ($nilai as $data) { ?>
          <div class="modal fade" id="modal-lihat<?= $data->Id_empatC; ?>" tabindex="-1" role="dialog" labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">CATATAN</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body mx-3">
                  <div class="form-group">
                    <label for="uraian">Catatan :</label>
                    <textarea name="Uraian" type="text" class="form-control" id="uraian" cols="90" rows="10" placeholder="<?= $data->Catatan ?>" readonly></textarea>
                  </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                  <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>


        <div class="modal fade" id="modal-DPNA" tabindex="-1" role="dialog" labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Cetak DPNA </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="GET" action="" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                  <div class="form-group">
                    <label>Pilih Berdasarkan :</label>
                    <select name="filter" id="filter" class="form-control">
                      <option value="">Pilih</option>
                      <option value="1">Per Mahasiswa</option>
                      <option value="2">Per Periode</option>
                      <!--  <option value="3">Per </option> -->
                    </select>
                    <div class="form-group mt-2">
                      <div id="form-mahasiswa">
                        <label>NIM :</label><br>
                        <select name="NIM" class="form-control">>
                          <option value="">Pilih</option>
                          <?php
                          foreach ($mahasiswa as $data) { // Ambil data tahun dari model yang dikirim dari controller
                            echo '<option value="' . $data->NIM . '">' . $data->NIM . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group mt-2">
                      <div id="form-periode">
                        <label>Periode</label><br>
                        <select name="Periode" class="form-control">>
                          <option value="">Pilih</option>
                          <?php
                          foreach ($periode as $data) { ?>
                            <option value="<?= $data->Id_pelaksanaan ?>"><?= $data->Tahun ?> / <?= ($data->Periode == 1) ? 'BERJALAN' : 'LIBURAN'; ?>
                            </option>
                          <?php }
                          ?>
                        </select>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary ">Tampilkan</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <?php $this->load->view('admin/template/footer') ?>
        <!-- MDBootstrap Datatables  -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/back/MDB-Free/js/addons/datatables.min.js"></script>
        <script type="text/javascript">
          $('#dtBasicExample').dataTable({
            "aLengthMenu": [
              [10, 25, 50, 100, 250, 500, -1],
              [10, 25, 50, 100, 250, 500, 'All']
            ],
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
          $(document).ready(function() { // Ketika halaman selesai di load
            $('#form-mahasiswa, #form-periode').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
            $('#filter').change(function() { // Ketika user memilih filter
              if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                $('#form-periode').hide(); // Tampilkan form tanggal
                $(' #form-mahasiswa').show();
              } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
                $(' #form-mahasiswa').hide();
                $('#form-periode').show(); // Tampilkan form bulan dan tahun
              }
              $(' #form-mahasiswa select, #form-periode select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
            })
          })
        </script>