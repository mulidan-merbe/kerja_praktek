<nav class="navbar navbar-expand-lg bg-transparent">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/fotos/logo.png" style="width: 50%;" alt=""></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse " id="navbarNavAltMarkup">
			<ul class="navbar-nav ml-auto" id="nav">
				<!-- <a class="nav-link  mr-3 text-uppercase font-weight-bold " href="<?= base_url() ?>">Beranda <span class="sr-only">(current)</span></a> -->
				<!-- <a class="nav-link mr-3 text-uppercase font-weight-bold" href="https://drive.google.com/drive/folders/1AnoxSf9wQCTus4UmggUiA4gZei0klCnb">SOP</a>
				<a class="nav-link mr-3 text-uppercase font-weight-bold" href="#">Jadwal</a>
				<a class="nav-link mr-3 text-uppercase font-weight-bold <?php if ($this->uri->segment(1) == "topik") {
																			echo "active";
																		} ?>" href="<?= base_url('topik') ?>" href="<?= base_url() ?>topik">Topik</a> -->
				<!-- <button class="btn btn-info btn-radius btn-sm">Login</button> -->
				<div class="dropdown">
					<button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Login
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item text-uppercase font-weight-normal" href="<?= base_url() ?>mahasiswa/login">Mahasiswa</a>
						<a class="dropdown-item text-uppercase font-weight-normal" href="<?= base_url() ?>dosen/login">Dosen</a>
						<a class="dropdown-item text-uppercase font-weight-normal" href="<?= base_url() ?>pembimbing/login">Lapangan</a>
					</div>
				</div>
			</ul>
		</div>
	</div>
</nav>