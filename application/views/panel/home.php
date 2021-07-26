<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistem Informasi Manajemen Kerja Praktek</title>
</head>
<link rel="stylesheet" href="<?= base_url('assets/panel') ?> /style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

<body>
	<header>
		<div class="inner-width">
			<a href="#" class="logo"><img src="<?= base_url('assets/fotos') ?> /logo.png" alt=""></a>
			<i class="menu-toggle-btn fas fa-bars"></i>
		</div>
	</header>

	<nav>
		<div class="navigation-menu">
			<ul>

				<a href="#"><i class="fas fa-home active home"></i><b>Beranda</b></a>


				<a href="#"><i class="fas fa-align-left about"></i>SOP</a>


				<a href="#"><i class="fab fa-buffer works"></i>Jadwal</a>


				<a href="#"><i class="fas fa-headset contact"></i>Kontak</a>

			</ul>
		</div>
	</nav>


	<script type="text/javascript">
		$(".menu-toggle-btn").click(function() {
			$(this).toggleClass("fa-times");
			$(".navigation-menu").toggleClass("active");
		});
	</script>
</body>

</html>