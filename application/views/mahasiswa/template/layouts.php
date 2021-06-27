<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo base_url('public/assets/back/styles/css') ?>/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/back/styles/css') ?>/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="<?php echo base_url('public/assets/back') ?>/styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/back') ?>/styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/template/back/MDB-Free/') ?>css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <!--   <link rel="stylesheet" href="css/style.css"> -->
    <!-- MDBootstrap Datatables  -->
    <link href="<?php echo base_url('public/assets/template/back/MDB-Free/') ?>css/addons/datatables.min.css" rel="stylesheet">
    <!-- <link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
<link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css' rel='stylesheet'>
<link type="text/css" href='https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css' rel='stylesheet'> -->
</head>

<body class="h-100">
    <div class="container-fluid">
        <div class="row">
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <?= $this->include('template/sidebar'); ?>
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                        <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                            <div class="input-group input-group-seamless ml-3">
                                <!--  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search"></i>
                    </div>
                  </div> -->
                                <!--   <input class="navbar-search form-control" > -->
                                <p class="mt-3"><b>SISTEM INFORMASI MANAJEMEN KERJA PRAKTEK</b></p>
                            </div>
                        </form>
                        <ul class="navbar-nav border-left flex-row ">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/back') ?>/images/avatars/user.jpg" alt="User Avatar">
                                    <span class="d-none d-md-inline-block"><?php echo $this->session->userdata("Username"); ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small">
                                    <a class="dropdown-item" href="user-profile-lite.html" href="<?= base_url('logout') ?>">
                                        <i class="material-icons">&#xE7FD;</i> Profile</a>
                                    <a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">
                                        <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                                </div>
                            </li>
                        </ul>
                        <nav class="nav">
                            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                                <i class="material-icons">&#xE5D2;</i>
                            </a>
                        </nav>
                    </nav>
                </div>


                <?= $this->renderSection('content'); ?>

                <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                    <span class="copyright ml-auto my-auto mr-2">Copyright © 2019

                    </span>
                </footer>
            </main>
        </div>
    </div>
    <script src="<?php echo base_url('public/assets/back/styles/js') ?>/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('public/assets/back/styles/js') ?>/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('public/assets/back/styles/js') ?>/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('public/assets/back/styles/js') ?>/Chart.min.js"></script>
    <script src="<?php echo base_url('public/assets/back/styles/js') ?>/shards.min.js"></script>
    <!--  <script src="<?php echo base_url('public/assets/back/styles/js') ?>/jquery.sharrre.min.js"></script> 
    <script src="<?php echo base_url('public/assets/back') ?>/scripts/extras.1.1.0.min.js"></script>  -->
    <script src="<?php echo base_url('public/assets/back') ?>/scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="<?php echo base_url('public/assets/back') ?>/scripts/app/app-blog-overview.1.1.0.js"></script>

    <!-- jQuery -->
    <!--  <script type="text/javascript" src="js/jquery.min.js"></script> -->
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('public/assets/template/back/MDB-Free/') ?>js/mdb.min.js"></script>
    <!-- MDBootstrap Datatables  -->
    <!-- Sweetalert -->
    <script src="<?php echo base_url('public/assets/back/sweetalert') ?>/sweetalert.min.js"></script>
    <script src="<?php echo base_url('public/assets/back/sweetalert') ?>/myscriptalert.js"></script>

    <script type="text/javascript" src="<?php echo base_url('public/assets/template/back/MDB-Free/') ?>js/addons/datatables.min.js"></script>
    <!--  <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script> -->
    <!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
       <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
       <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
       <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
       <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script> -->
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');

        });
    </script>


</body>

</html>