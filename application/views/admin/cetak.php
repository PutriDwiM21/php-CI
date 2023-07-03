<!doctype html>
<html lang="en">
<head>
	<title>Officer</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url(); ?>assets/modal/modal-01/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/modal/modal-01/css/style.css">
</head>
<body>

	<main id="main" class="main">
		<div class="col-sm-12 col-md-12" >
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><center><b>PUBLIC COMPLAINT REPORT DATA</b></center></h5>
					<h4 class="card-title"><center>NityPlain</center></h4>
					<div class="col-sm-12 col-md-6" style="right;">
						</div><br>
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th scope="col"><center>No</center></th>
									<th scope="col"><center>Complaint Date</center></th>
									<th scope="col"><center>Response Date</center></th>
									<th scope="col"><center>Nik</center></th>
									<th scope="col"><center>Community Name</center></th>
									<th scope="col"><center>Complaint</center></th>
									<th scope="col"><center>Picture</center></th>
									<th scope="col"><center>Response</center></th>
									<th scope="col"><center>Status</center></th>
								</tr>
							</thead>
							<tbody>

								<?php $no = 1; ?>
								<?php foreach($laporan as $l) : ?>
								<tr>
									<th scope="row"><center><?= $no++; ?></center></th>
									<td><center><?= $l['tgl_pengaduan'] ?></center></td>
									<td><center><?= $l['tgl_tanggapan'] ?></center></td>
									<td><center><?= $l['nik'] ?></center></td>
									<td><center><?= $l['nama'] ?></center></td>
									<td><center><?= $l['isi_laporan'] ?></center></td>
									<td><center><img src="<?php echo base_url() ?>/assets/foto/<?php echo $l['foto'] ?>" width="90" height="110"></center></td>
									<td><center><?= $l['tanggapan'] ?></center></td>
									<td><center><?= $l['status'] ?></center></td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>

						<!-- akhir tabel -->
					</section>

						

					<script>
						window.print();  
					</script>

				</main><!-- End #main --> 

