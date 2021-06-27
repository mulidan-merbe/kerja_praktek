<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.line-title{
			border : 0;
			border-style: inset;
			border-top: 1px solid #000;

		}

		.table {
			font-size: 12px;
		}
	</style>
</head>
<body>
	<table width="100%">
		<tr>
			<td align="center">
				<span style="line-height: 1.6; font-weight: bold">
					REKAPITULASI PROPOSAL KERJA PRAKTEK
					<br>
					JURUSAN INFORMATIKA FAKULTAS TEKNIK
					<br>
					UNIVERSITAS TANJUNGPURA
				</span>
			</td>
		</tr>
	</table>
	<hr class="line-title">
	<p>Rekapitulasi Laporan Kerja Praktek
	<br><?php echo $ket; ?></p>
	<table width="100%" class="table table-bordered">
		<thead class="">
          <tr>
            <th  style="text-align: center"><b>No. </b></th>
            <th style="text-align: center"><b>NIM</b></th>
            <th style="text-align: center"><b>Nama</b></th>
            <th style="text-align: center"><b>Berkas</b></th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach ($laporan as $data) { ?>
          <tr>
            <td style="text-align: center"><?= $no++ ?>.</td>
            <td style="text-align: center"><?= $data->NIM ?></td>
            <td style="text-align: center"><?= $data->nama ?></td>
            <td style="text-align: center"><?= $data->Berkas ?></td>
          </tr>
          <?php } ?>
        </tbody>
	</table>
</body>
</html>

