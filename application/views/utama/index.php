<!doctype html>
<html lang="en">
<?php $this->load->view('utama/template/head') ?>

<body>
	<?php $this->load->view('utama/template/header') ?>
	<div class="depan mb-5" id="beranda">
		<div class="container">
			<div class="row">
				<div class="right2 d-sm-block d-md-none col-sm-12 mt-5">
					<img src="<?= base_url() ?>assets/fotos/informatika.png" style="width: 100%" alt="">
				</div>
				<div class="left d-md-block  col-md-6 col-sm-12 mt-5 ">
					<h1 class="mt-5 mb-3 font-weight-bold animate__animated animate__zoomIn animate__slow">Sistem Informasi Manajemen Kerja Praktek</h1>
					<h3 class="font-weight-normal text-uppercase">Jurusan Informatika</h3>
					<h3 class="text-uppercase">Fakultas Teknik Universitas Tanjungpura</h3>
					<div class="tombol mt-5">
						<!-- <button class="btn btn-lg btn-success text-uppercase font-weight-normal">Topik</button> -->
						<button class="btn btn-lg btn-info text-uppercase font-weight-normal " onclick=" window.open('https://drive.google.com/drive/folders/1AnoxSf9wQCTus4UmggUiA4gZei0klCnb','_blank')">SOP</button>

					</div>
				</div>
				<div class=" right d-md-block d-sm-none   col-md-5 col-sm-12 offset-md-1 mt-5 ">
					<img src=" <?= base_url() ?>assets/fotos/informatika.png" class="shadow" style="width: 100%" alt="">
				</div>
			</div>
		</div>

	</div>
	<div class="jadwal mt-5" id="jadwal">
		<div class="container">
			<div class="row">
				<div class="col-md-5 mt-5 ">
					<h4>Periode Pelaksanaan</h4>
					<p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas minus fugiat odit optio vel repellendus amet incidunt tempora! Iure quam voluptate assumenda optio laudantium doloribus vero, a enim illum, sapiente dolores fuga omnis nam neque deserunt accusamus saepe, aperiam iusto blanditiis. Atque illum quis, facilis quod accusamus sit expedita accusantium. Non dicta fuga, iste eaque, enim error minima obcaecati ad ab sapiente optio suscipit unde placeat, accusantium tenetur eveniet accusamus voluptatem ex nostrum? Saepe, ducimus iure iusto consectetur neque ea modi? Doloremque nulla dignissimos ratione repellat aperiam maiores excepturi blanditiis, earum voluptates corrupti quia adipisci est fugiat quibusdam, soluta quidem.</p>
				</div>
				<div class="col-md-6  offset-md-1 mt-5">
					<table class="table table-bordered table-striped w-100">
						<tr class="mb-3">
							<th class="text-center">No.</th>
							<th class="text-center">Kegiatan </th>
							<th class="text-center">Tanggal</th>
						</tr>
						<tr>
							<td class="text-center">1.</td>
							<td>Pelaksanaan Kerja Praktek </td>
							<td class="text-center"> 11</td>
						</tr>
						<tr>
							<td class="text-center">2.</td>
							<td>Pengajuan Seminar Kerja Praktek </td>
							<td class="text-center">11</td>
						</tr>
						<tr>
							<td class="text-center">3.</td>
							<td>Pelaksanaan Seminar Kerja Praktek </td>
							<td class="text-center">11</td>
						</tr>
						<tr>
							<td class="text-center">4.</td>
							<td>Revisi dan Pengumpulan Laporan Kerja Praktek </td>
							<td class="text-center"> 11</td>
						</tr>
					</table>
				</div>
			</div>

		</div>
	</div>
	<div class="topik mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h3 class="text-center">Topik</h3>

				</div>
			</div>
			<div class="row mt-3 ">
				<div class="col-md-8 offset-md-2">
					<p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos atque fugiat maxime dolorem sed odio voluptate tempore ipsa numquam id iste voluptatibus dicta, vel inventore dolorum est aspernatur blanditiis mollitia unde magnam incidunt repudiandae! Quod aliquid suscipit labore modi vel maiores, maxime harum error, molestiae similique expedita laudantium ad enim beatae consequatur esse est dignissimos illo omnis ullam nemo nam numquam. Nihil laborum natus repellat blanditiis beatae ducimus ipsa, adipisci inventore autem voluptates nam reiciendis nemo necessitatibus animi similique quia voluptatum omnis sequi pariatur voluptatibus ex? Porro excepturi in corporis libero nulla illum ea laudantium. Unde aut velit nihil nemo?</p>
					<div class="text-center">
						<button class="btn btn-sm btn-info text-uppercase font-weight-normal" onclick=" location.href='<?= base_url('topik') ?>'">Pengajuan Topik</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('utama/template/footer') ?>

	<!-- <script>
		var header = document.getElementById("nav");
		var btns = header.getElementsByClassName("tombol");
		for (var i = 0; i < btns.length; i++) {
			btns[i].addEventListener("click", function() {
				var current = document.getElementsByClassName("active");
				current[0].className = current[0].className.replace(" active", "");
				this.className += " active";
			});
		}
	</script> -->
</body>

</html>