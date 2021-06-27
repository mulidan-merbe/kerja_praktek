<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?= base_url('assets/back')?>/images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">ADMIN</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
          </form>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="beranda"){echo "active";} ?>" href="<?= base_url('admin/beranda')?>">
                  <i class="material-icons" >home</i>
                  <span>Beranda</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="topik" || $this->uri->segment(2)=="tawaran_topik" || $this->uri->segment(2)=="rencana_topik" ){echo "active";} ?>" href="<?= base_url('admin/topik')?>">
                  <i class="material-icons" >description</i>
                  <span>Topik</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="proposal" || $this->uri->segment(2)=="proposal" ){echo "active";} ?>" href="<?= base_url('admin/proposal')?>">
                  <i class="material-icons" >description</i>
                  <span>Proposal</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if( $this->uri->segment(2)=="pembimbingLapangan" ){echo "active";} ?>" href="<?= base_url('admin/pembimbingLapangan')?>">
                  <i class="material-icons" >description</i>
                  <span>Pembimbing Lapangan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="konsultasi" || $this->uri->segment(2)=="konsultasiLapangan" ){echo "active";} ?>" href="<?= base_url('admin/konsultasi')?>">
                  <i class="material-icons" >description</i>
                  <span>Konsultasi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="seminar"){echo "active";} ?>" href="<?= base_url('admin/seminar')?>">
                  <i class="material-icons" >description</i>
                  <span>Seminar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="penilaian"  ){echo "active";} ?>" href="<?= base_url('admin/penilaian')?>">
                  <i class="material-icons" >description</i>
                  <span>Penilaian</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="laporan"  ){echo "active";} ?>" href="<?= base_url('admin/laporan')?>">
                  <i class="material-icons" >description</i>
                  <span>Laporan</span>
                </a>
              </li>
            
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php if($this->uri->segment(2)== "proposal" || $this->uri->segment(2)=="KP_TI_A02" || $this->uri->segment(2)=="pembimbing_lapangan" || $this->uri->segment(2)=="KP_TI_A02A" || $this->uri->segment(2)== "KP_TI_A02B" || $this->uri->segment(2)== "KP_TI_A02C" || $this->uri->segment(2)== "KP_TI_A03" || $this->uri->segment(2)== "KP_TI_A04" || $this->uri->segment(2)== "KP_TI_A04A" || $this->uri->segment(2)== "KP_TI_A04B" || $this->uri->segment(2)== "KP_TI_A04C" || $this->uri->segment(2)== "laporan"){echo "active";} ?> " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">description</i>
                  <span>KP-IF </span></a>
               <ul  class=" dropdown-menu  " >
                  <li  >
                    <a class="dropdown-item <?php if($this->uri->segment(2)=="proposal"){echo "active";} ?>" href="<?= base_url('admin/proposal') ?>">
                    <i class="material-icons">note_add</i>
                    <span>Proposal </span>
                  </a>
                  </li>
                  <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="KP_TI_A02"){echo "active";} ?>"  href="<?= base_url('admin/KP_TI_A02')?>">  <i class="material-icons">note_add</i><span>Surat Pernyataan</span></a>
                  </li>
                  <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="pembimbing_lapangan"){echo "active";} ?>"  href="<?= base_url('admin/pembimbing_lapangan')?>">  <i class="material-icons">note_add</i><span>Pembimbing Lapangan</span></a>
                  </li>
                  <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="KP_TI_A02A"){echo "active";} ?>"  href="<?= base_url('admin/KP_TI_A02A')?>">  <i class="material-icons">note_add</i><span>Konsultasi Dosen</span></a>
                  </li>
                  <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="KP_TI_A02B"){echo "active";} ?>"  href="<?= base_url('admin/KP_TI_A02B')?>">  <i class="material-icons">note_add</i><span>Konsultasi Pembimbing Lapangan</span></a>
                  </li>
                  <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="KP_TI_A02C"){echo "active";} ?>"  href="<?= base_url('admin/KP_TI_A02C')?>">  <i class="material-icons">note_add</i><span>Penilaian Lapangan</span></a>
                  </li>
                  <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="KP_TI_A03"){echo "active";} ?>"  href="<?= base_url('admin/KP_TI_A03')?>">  <i class="material-icons">note_add</i><span>Pernyataan Siap Seminar</span></a>
                  </li>
                  <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="KP_TI_A04"){echo "active";} ?>"  href="<?= base_url('admin/KP_TI_A04"')?>">  <i class="material-icons">note_add</i><span>Jadwal Seminar</span></a>
                  </li>
                  <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="KP_TI_A04A"){echo "active";} ?>"  href="<?= base_url('admin/KP_TI_A04A')?>">  <i class="material-icons">note_add</i><span>Penilaian Seminar Dosen</span></a>
                  </li>
                  <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="KP_TI_A04B"){echo "active";} ?>"  href="<?= base_url('admin/KP_TI_A04B')?>">  <i class="material-icons">note_add</i><span>Penilaian Seminar Pembimbing Lapangan</span></a>
                  </li>
                  <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="laporan"){echo "active";} ?>"  href="<?= base_url('admin/laporan')?>">  <i class="material-icons">note_add</i><span>Laporan</span></a>
                  </li>
                  <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="KP_TI_A04C"){echo "active";} ?>"  href="<?= base_url('admin/KP_TI_A04C')?>">  <i class="material-icons">note_add</i><span>Berita Acara Seminar</span></a>
                  </li>
                  </ul>
              </li>
              <li class="nav-item dropdown  ">
                <a class="nav-link dropdown-toggle   <?php if($this->uri->segment(2)=="jadwal_pelaksanaan"){echo "active";} ?> " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">date_range</i>
                  <span>PERIODE </span></a>
              <ul class="dropdown-menu">
                <li class="  " >
                        <a class="dropdown-item  <?php if($this->uri->segment(2)=="jadwal_pelaksanaan"){echo "active";} ?> "  href="<?= base_url('admin/jadwal_pelaksanaan')?>">  <i class="material-icons">note_add</i><span>Periode Pelaksanaan</span></a>
                  </li>
               <!--  <li  >
                      <a class="dropdown-item <?php if($this->uri->segment(2)=="periode_pelaksanaan"){echo "active";} ?> "  href="<?= base_url('admin/jadwal_pelaksanaan')?>"> <i class="material-icons">date_range</i><span>Periode Pelaksanaan</span></a>
                </li> -->
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="userPembimbing"){echo "active";} ?>" href="<?= base_url('admin/userPembimbing')?>">
                <i class="material-icons">account_circle</i>
                  <span>Akun Pembimbing Lapangan</span>
                </a>
              </li>
            </ul>
          </div>
        </aside>