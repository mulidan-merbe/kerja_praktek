<!doctype html>
<html lang="en">
<?php $this->load->view('utama/template/head') ?>

<body>
	<?php $this->load->view('utama/template/header') ?>
	<div class="depan " id="beranda">
		<div class="container">
			<div class="row">
				<div class="right2 d-sm-block d-md-none col-sm-12 mt-5">
					<img src="<?= base_url() ?>assets/fotos/informatika.png" style="width: 100%" alt="">
				</div>
				<div class="left d-md-block   col-md-4  offset-md-1 col-sm-12 mt-5 ">
					<h4 class="mt-5 mb-5 text-center text-uppercase">Login Admin</h4>
					<?php echo $this->session->flashdata('message'); ?>
					<?= $this->session->unset_userdata('message'); ?>
					<form method="POST" action="<?php echo base_url('admin/login/Auth') ?>" class=" my-login-validation" novalidate="">
						<div class="form-group">
							<label for="username">No Identitas</label>
							<input id="username" type="text" class="form-control" name="No_identitas" value="<?= set_value('No_identitas') ?>" autofocus>
							<?= form_error('No_identitas', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group">
							<label for="password">Password
							</label>
							<input id="password" type="password" class="form-control" name="Password" data-eye>
							<?= form_error('Password', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group m-0">
							<button type="submit" class="btn btn-primary btn-sm">
								Login
							</button>
						</div>
					</form>

				</div>
				<div class="right d-md-block d-sm-none  col-md-5 col-sm-12 offset-md-2 mt-5 ">
					<img src="<?= base_url() ?>assets/fotos/informatika.png" class="" style="width: 100%" alt="">
				</div>
			</div>
		</div>

	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>