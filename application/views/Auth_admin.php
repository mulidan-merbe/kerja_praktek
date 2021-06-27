<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/template/front/login/') ?>css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/template/front/login/') ?>css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="<?php echo base_url('assets/template/front/login/') ?>img/user.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">LOGIN</h4>
							<?php echo $this->session->flashdata('message'); ?>
							<form method="POST" action="<?php echo base_url('Auth_admin/Auth') ?>"class=" my-login-validation" novalidate="">
								<div class="form-group">
									<label for="username">Username</label>
									<input id="username" type="text" class="form-control" name="No_identitas" value="<?= set_value('No_identitas') ?>" autofocus>
									<?= form_error('No_identitas', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="Password" value="<?= set_value('Password') ?>" data-eye>
									<?= form_error('Password', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
					<!-- <div class="footer">
						Copyright &copy; 2017 &mdash; Your Company 
					</div> -->
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url('assets/template/front/login/') ?>js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="<?php echo base_url('assets/template/front/login/') ?>js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="<?php echo base_url('assets/template/front/login/') ?>js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- <script src="<?php echo base_url('assets/template/front/login/') ?>js/my-login.js"></script> -->
	<!-- Sweetalert -->
	<script src="<?php echo base_url('assets/template/back/plugins') ?>/sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo base_url('assets/template/back/bower_components') ?>/jquery/dist/jquery.min.js"></script>
	<!-- Myscript alert -->
	<script src="<?php echo base_url('assets/template/back/plugins') ?>/sweetalert/myscriptalert.js"></script>
</body>
</html>
