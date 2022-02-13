<!doctype html>
<html lang="en">
<?php $this->load->view('utama/template/head') ?>

<body>
	<?php $this->load->view('utama/template/header') ?>
	<div class="atas " id="beranda">
		<div class="container">
			<div class="row">
				<div class="title col-sm-12 mt-5">
					<h3 class="text-center text-uppercase text-dark">pengajuan Tawaran Topik</h3>
				</div>
			</div>
		</div>

	</div>
	<div class="form-inputan">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-10 offset-md-1">
					<div class="card">
						<div class="card-body">
							<form method="POST" action="<?= base_url() ?>topik/tambahTopik">
								<div class="form-group row">
									<label for="topik" class="col-md-3 col-form-label">Topik</label>
									<div class="col-sm-9">
										<input type="text" name="Topik" class="form-control" id="topik" placeholder="Topik" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Abstrak</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="Abstrak" id="exampleFormControlTextarea1" rows="5" placeholder="Abstrak" required></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Jumlah</label>
									<div class="col-sm-9">
										<input type="number" name="Jumlah" class="form-control" id="inputEmail3" placeholder="Jumlah" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Instansi/Organisasi</label>
									<div class="col-sm-9">
										<input type="text" name="Instansi" class="form-control" id="inputEmail3" placeholder="Instansi/Organisasi" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Alamat</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="Alamat" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat" required></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Narahubung</label>
									<div class="col-sm-9">
										<input type="text" name="Narahubung" class="form-control" id="inputEmail3" placeholder="Narahubung" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-md-3 col-form-label">Email</label>
									<div class="col-sm-9">
										<input type="email" name="Email" class="form-control" id="inputEmail3" placeholder="Email" required>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-sm mt-3 text-center">Simpan</button>
								<?php echo $this->session->flashdata('message'); ?>
								<?= $this->session->unset_userdata('message'); ?>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('utama/template/footer') ?>


</body>

</html>