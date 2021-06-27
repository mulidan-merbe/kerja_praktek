<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?= base_url('assets/back')?>/images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">MAHASISWA</span>
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
                <a class="nav-link <?php if($this->uri->segment(2)=="beranda"){echo "active";} ?>" href="<?= base_url('mahasiswa/beranda')?>">
                  <i class="material-icons">home</i>
                  <span>Beranda</span>
                </a>
              </li>
              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle <?php if($this->uri->segment(2)=="tawaran_topik" || $this->uri->segment(2)=="rencana_topik"){echo "active";} ?>    " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons" >description</i>
                  <span>TOPIK </span></a>
                <ul class=" dropdown-menu  " >
                  <li class="  ">  
                        <a class="dropdown-item <?php if($this->uri->segment(2)=="tawaran_topik"){echo "active";} ?> "  href="<?= base_url('mahasiswa/tawaran_topik')?>">  <i class="material-icons">description</i><span>Tawaran Topik</span></a>
                  </li>
                  <li  class=" ">
                        <a class="dropdown-item <?php if($this->uri->segment(2)=="rencana_topik"){echo "active";} ?> " href="<?= base_url('mahasiswa/rencana_topik') ?>">
                    <i class="material-icons">note_add</i>
                    <span>Rencana Topik</span>
                  </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="proposal"){echo "active";} ?>" href="<?= base_url('mahasiswa/proposal')?>">
                  <i class="material-icons">description</i>
                  <span>Proposal</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="pembimbingLapangan"){echo "active";} ?>" href="<?= base_url('mahasiswa/pembimbingLapangan')?>">
                  <i class="material-icons">description</i>
                  <span>Pembimbing Lapangan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="konsultasi"){echo "active";} ?>" href="<?= base_url('mahasiswa/konsultasi')?>">
                  <i class="material-icons">description</i>
                  <span>Konsultasi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="seminar"){echo "active";} ?>" href="<?= base_url('mahasiswa/seminar')?>">
                  <i class="material-icons">description</i>
                  <span>Seminar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="penilaian"){echo "active";} ?>" href="<?= base_url('mahasiswa/penilaian')?>">
                  <i class="material-icons">description</i>
                  <span>Penilaian</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="laporan"){echo "active";} ?>" href="<?= base_url('mahasiswa/laporan')?>">
                  <i class="material-icons">description</i>
                  <span>Laporan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="beritaAcara"){echo "active";} ?>" href="<?= base_url('mahasiswa/beritaAcara')?>">
                  <i class="material-icons">description</i>
                  <span>Berita Acara</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="profil"){echo "active";} ?>" href="<?= base_url('mahasiswa/profil')?>">
                  <i class="material-icons">&#xE7FD;</i>
                  <span>Profil</span>
                </a>
              </li>
              

            </ul>
          </div>
        </aside>