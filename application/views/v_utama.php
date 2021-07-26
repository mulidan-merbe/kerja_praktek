<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
	<div class="container">
		<nav>
			<div class="nav-brand">
				<img src="<?= base_url('assets/fotos/logo.png')?>" >
			</div>
			<div class="nav-items">
				<ul class="nav-links">
					<li><a href="#" class="nav-link active">Beranda</a></li>
					<li><a href="https://drive.google.com/drive/folders/1AnoxSf9wQCTus4UmggUiA4gZei0klCnb" class="nav-link ">SOP</a></li>
					<li><a href="#" class="nav-link ">Jadwal</a></li>		
					<li><a href="#" class="nav-link">Topik</a></li>
				</ul>
			</div>
			<div class="burger">
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
			</div>
		</nav>
	

		<section class="home">
			<div class="text-section">
				<h1 class=" animate__animated animate__zoomIn animate__slow title">
					Sistem Informasi Manajemen Kerja Praktek
				</h1>
				<p class="namakampus animate__animated animate__bounceIn">Jurusan Informatika <br>Fakultas Teknik Universitas Tanjungpura</p>
				<button class="btn btn-primary animate__animated animate__slideInLeft " onclick="location.href='<?= base_url('mahasiswa/login') ?>'" >Mahasiswa</button>
				<button class="btn btn-sm btn-primary animate__animated animate__slideInLeft  "onclick="location.href='<?= base_url('dosen/login') ?>'">Dosen Pembimbing</button>
				<button class="btn btn-primary animate__animated animate__slideInLeft  " onclick="location.href='<?= base_url('auth_pembimbing') ?>'">Pembimbing Lapangan</button>
			</div>
			<div class="image">
				<img src="<?= base_url('assets/fotos/informatika.png')?>" class="animate__animated animate__zoomIn" alt="">
			</div>
		</section>
	</div>
	
</body>
</html>