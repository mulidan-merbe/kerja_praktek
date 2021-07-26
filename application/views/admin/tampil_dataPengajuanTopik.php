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
                            <h3 class="page-title">Data Topik</h3>
                        </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button1" class="btn btn-info <?php if ($this->uri->segment(3) == "pengajuan") {
                                                                        echo "active";
                                                                    } ?>">Pengajuan</button>
                        <a type="button3" class="btn btn-info" href="<?= base_url('admin/topik') ?>">Tawaran</a>
                        <a type="button3" class="btn btn-info" href="<?= base_url('admin/topik/rencana') ?>">Rencana</a>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Pengajuan Tawaran Topik

                                    </h6>
                                </div>
                                <div class="table-responsive">
                                    <div class="card-body">
                                        <table id="dtBasicExample" class="table mb-0 table-bordered table-striped">
                                            <thead class="">
                                                <tr>
                                                    <th class="text-center"><b>No. </b></th>
                                                    <th class="text-center"><b>Pengirim</b></th>
                                                    <th class="text-center col-4"><b>Topik</b></th>
                                                    <th class="text-center"><b>Jumlah</b></th>
                                                    <th class="text-center"><b>Email</b></th>
                                                    <th class="text-center"><b>Tanggal</b></th>
                                                    <th class="text-center"><b>Aksi</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($PengajuanJudul as $data) { ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++ ?>.</td>
                                                        <td class=""><?= $data->Topik ?></td>
                                                        <td style="text-align: "><?= $data->Topik ?></td>
                                                        <td class="text-center"><?= $data->Jumlah ?></td>
                                                        <td class=""><?= $data->Email ?></td>
                                                        <td class="text-center"><?= $format1 = format_indo(date('Y-m-d', strtotime($data->Tanggal))); ?></td>
                                                        <td>
                                                            <div class="btn-group btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
                                                                <a class="mb-2 btn  btn-info" data-toggle="modal" data-target="#modal-lihat<?= $data->Id; ?>" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a>
                                                                <a class="mb-2 btn  btn-success" href="<?= base_url('') ?>admin/rencana_topik/setuju?setujui=<?= $data->Id ?>" data-placement="top" title="Lihat"><i class="fas fa-check"></i></a>
                                                                <a class="mb-2 btn  btn-danger" href="<?= base_url('') ?>admin/rencana_topik/tolak?ditolak=<?= $data->Id ?>" data-placement="top" title="Lihat"><i class="fas fa-times"></i></a>
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

                <?php foreach ($PengajuanJudul as $data) { ?>
                    <div class="modal fade" id="modal-lihat<?= $data->Id; ?>" tabindex="-1" role="dialog" labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">DETAIL </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="modal-body mx-3">
                                        <div class="form-group">
                                            <label>Abstrak :</label>
                                            <textarea name="Uraian" type="text" class="form-control" cols="90" rows="10" placeholder="<?= $data->Abstrak ?>" readonly></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Instansi/Organisasi :</label>
                                            <input type="text" class="form-control" value="<?= $data->Instansi ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat :</label>
                                            <textarea name="Uraian" type="text" class="form-control" cols="90" rows="5" placeholder="<?= $data->Alamat ?>" readonly></textarea>
                                        </div>

                                    </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>




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