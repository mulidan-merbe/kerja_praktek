<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/style2.css') ?>">

    <title>Sistem Informasi Manajemen Kerja Praktek</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light ">
	  <div class="container">
	    <img src="<?= base_url('assets/fotos/logo.png')?>" style="width: 30%;">
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	<!--     <div class=" d-flex justify-content-between "> -->
	    	<div class="collapse navbar-collapse mx-auto"  id="navbarNav">
	      		<ul class="navbar-nav ">
	        		<li class="nav-item mx-4">
	          			<a class="nav-link active " aria-current="page" href="#">Home</a>
	        		</li>
	        		<li class="nav-item mx-4">
	          			<a class="nav-link " aria-current="page" href="#">Home</a>
	        		</li>
	        		<li class="nav-item mx-4">
	          			<a class="nav-link " aria-current="page" href="#">Home</a>
	        		</li>
	      		</ul>
	    	</div>
	   <!--  </div> -->
	  </div>
	</nav>
	<!-- <div class="header">
		<div class="container ">
			<div class="logo ">
				<img src="<?= base_url('assets/fotos/logo.png')?>" style="width: 30%;">
			</div>
			<div class="menu d-flex justify-content-between">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      	<span class="navbar-toggler-icon"></span>
	    		</button>
	      	<div class="collapse navbar-collapse"  id="navbarNav">
	      		<ul class="navbar-nav ">
	        		<li class="nav-item ">
	          			<a class="nav-link active nav-link-hover" aria-current="page" href="#">Home</a>
	        		</li>
	        		<li class="nav-item ">
	          			<a class="nav-link active" aria-current="page" href="#">Home</a>
	        		</li>
	        		<li class="nav-item ">
	          			<a class="nav-link active" aria-current="page" href="#">Home</a>
	        		</li>
	      		</ul>
	    	</div>
				</div>
		</div>
	</div> -->
	<div class="container py-5">
		<div class="row">
			<div class="d-md-none d-sm-block col-sm-12">
				<img src="<?= base_url('assets/fotos/informatika.png')?>" class="image animate__animated animate__zoomIn img-fluid rounded" alt="">
			</div> 

			<div class="content d-md-block col-md-6 col-sm-12 pt-5">
				<h1>Sistem Informasi Manajemen Kerja Praktek</h1>
				<h3 class="pt-3">Jurusan Informatika</h3>
				<h3>Fakultas Teknik Universitas Tanjungpura</h3>
				<div class="tombol  pt-5">
					<button class="btn btn-lg btn-primary animate__animated animate__slideInLeft px-4 my-1 rounded" onclick="location.href='<?= base_url('mahasiswa/login') ?>'" >Mahasiswa</button>
					<button class="btn btn-lg btn-primary animate__animated animate__slideInLeft  px-4 my-1 rounded"onclick="location.href='<?= base_url('dosen/login') ?>'">Dosen </button>
					<button class="btn btn-lg btn-primary animate__animated animate__slideInLeft  px-4 my-1 rounded" onclick="location.href='<?= base_url('auth_pembimbing') ?>'"> Lapangan</button>
				</div>
			</div>
			<div class="d-md-block d-sm-none col-md-5 ">
				<img src="<?= base_url('assets/fotos/informatika.png')?>" class="image animate__animated animate__zoomIn img-fluid rounded" alt="">
			</div>
		</div>
	</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>