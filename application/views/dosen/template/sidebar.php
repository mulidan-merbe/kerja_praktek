<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?= base_url('assets/back')?>/images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">DOSEN</span>
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
                <a class="nav-link <?php if($this->uri->segment(2)=="beranda"){echo "active";} ?>" href="<?= base_url('dosen/beranda') ?>">
                  <i class="material-icons">home</i>
                  <span>Beranda</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="topik" || $this->uri->segment(2)=="tawaran_topik" || $this->uri->segment(2)=="rencana_topik" ){echo "active";} ?>" href="<?= base_url('dosen/topik')?>">
                  <i class="material-icons" >description</i>
                  <span>Topik</span>
                </a>
              </li>
               <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle <?php if($this->uri->segment(2)=="tawaran_topik" || $this->uri->segment(2)=="rencana_topik" ){echo "active";} ?>    " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons" >description</i>
                  <span>TOPIK </span></a>
                <ul class=" dropdown-menu  " >
                  <li class="  ">  
                        <a class="dropdown-item <?php if($this->uri->segment(2)=="tawaran_topik"){echo "active";} ?> "  href="<?= base_url('dosen/tawaran_topik')?>">  <i class="material-icons">note_add</i><span>Tawaran Topik</span></a>
                  </li>
                  <li  class=" ">
                        <a class="dropdown-item <?php if($this->uri->segment(2)=="rencana_topik"){echo "active";} ?> " href="<?= base_url('dosen/rencana_topik') ?>">
                    <i class="material-icons">note_add</i>
                    <span>Rencana Topik</span>
                  </a>
                  </li>
                     
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="proposal"){echo "active";} ?>"  href="<?= base_url('dosen/proposal')?>">
                  <i class="material-icons">description</i>
                  <span>Proposal</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="KP_TI_A02A"){echo "active";} ?>"  href="<?= base_url('dosen/KP_TI_A02A')?>">
                  <i class="material-icons">description</i>
                  <span>Konsultasi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="KP_TI_A03"){echo "active";} ?>"  href="<?= base_url('dosen/KP_TI_A03')?>">
                  <i class="material-icons">description</i>
                  <span>Pernyataan Siap Seminar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="KP_TI_A04"){echo "active";} ?>"  href="<?= base_url('dosen/KP_TI_A04')?>">
                  <i class="material-icons">description</i>
                  <span>Jadwal Seminar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="KP_TI_A04A"){echo "active";} ?>"  href="<?= base_url('dosen/KP_TI_A04A')?>">
                  <i class="material-icons">description</i>
                  <span>Penilaian Seminar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="laporan"){echo "active";} ?>"  href="<?= base_url('dosen/laporan')?>">
                  <i class="material-icons">description</i>
                  <span>Laporan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="KP_TI_A04C"){echo "active";} ?>"  href="<?= base_url('dosen/KP_TI_A04C')?>">
                  <i class="material-icons">description</i>
                  <span>Berita Acara</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="profil"){echo "active";} ?>" href="<?= base_url('dosen/profil') ?>">
                  <i class="material-icons">&#xE7FD;</i>
                  <span>Profil</span>
                </a>
              </li>
            </ul>
          </div>
        </aside>