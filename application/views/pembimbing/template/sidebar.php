<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?= base_url('assets/back')?>/images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">PEMBIMBING LAPANGAN</span>
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
                <a class="nav-link <?php if($this->uri->segment(2)=="beranda"){echo "active";} ?>" href="<?= base_url('pembimbing/beranda')?>">
                  <i class="material-icons">home</i>
                  <span>Beranda</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="beranda"){echo "active";} ?>" href="<?= base_url('pembimbing/beranda')?>">
                  <i class="material-icons" >description</i>
                  <span>Konsultasi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="beranda"){echo "active";} ?>" href="<?= base_url('pembimbing/beranda')?>">
                  <i class="material-icons" >description</i>
                  <span>Penilaian Lapangan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="beranda"){echo "active";} ?>" href="<?= base_url('pembimbing/beranda')?>">
                  <i class="material-icons" >description</i>
                  <span>Jadwal Seminar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="beranda"){echo "active";} ?>" href="<?= base_url('pembimbing/beranda')?>">
                  <i class="material-icons" >description</i>
                  <span>Penilaian Seminar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="beranda"){echo "active";} ?>" href="<?= base_url('pembimbing/beranda')?>">
                  <i class="material-icons" >description</i>
                  <span>Laporan</span>
                </a>
              </li>
              <li class="nav-item dropdown <?php if($this->uri->segment(2)=="KP_TI_A02B" || $this->uri->segment(2)=="KP_TI_A02C" || $this->uri->segment(2)== "KP_TI_A04" || $this->uri->segment(2)== "KP_TI_A04B" || $this->uri->segment(2)== "laporan"){echo "active";} ?> ">
                <a class="nav-link dropdown-toggle    " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons" >description</i>
                  <span>KP-TI</span></a>
                <ul class=" dropdown-menu  " >
                  <li class="  ">  
                        <a class="dropdown-item <?php if($this->uri->segment(2)=="KP_TI_A02B"){echo "active";} ?> "  href="<?= base_url('pembimbing/KP_TI_A02B')?>">  <i class="material-icons">note_add</i><span>Konsultasi Mahasiswa</span></a>
                  </li>
                  <li  class=" ">
                        <a class="dropdown-item <?php if($this->uri->segment(2)=="KP_TI_A02C"){echo "active";} ?> " href="<?= base_url('pembimbing/KP_TI_A02C') ?>">
                    <i class="material-icons">note_add</i>
                    <span>Penilaian Lapangan</span>
                  </a>
                  </li>
                  <li  class=" ">
                        <a class="dropdown-item <?php if($this->uri->segment(2)=="KP_TI_A04"){echo "active";} ?> " href="<?= base_url('pembimbing/KP_TI_A04') ?>">
                    <i class="material-icons">note_add</i>
                    <span>Jadwal Seminar</span>
                  </a>
                  </li>
                  <li  class=" ">
                        <a class="dropdown-item <?php if($this->uri->segment(2)=="KP_TI_A04B"){echo "active";} ?> " href="<?= base_url('pembimbing/KP_TI_A04B') ?>">
                    <i class="material-icons">note_add</i>
                    <span>Penilaian Seminar</span>
                  </a>
                  </li>
                  <li  class=" ">
                        <a class="dropdown-item <?php if($this->uri->segment(2)=="laporan"){echo "active";} ?> " href="<?= base_url('pembimbing/laporan') ?>">
                    <i class="material-icons">note_add</i>
                    <span>Laporan</span>
                  </a>
                  </li>
                     
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2)=="profil"){echo "active";} ?>" href="<?= base_url('pembimbing/profil') ?>">
                  <i class="material-icons">&#xE7FD;</i>
                  <span>Profil</span>
                </a>
              </li>

            
            </ul>
          </div>
        </aside>