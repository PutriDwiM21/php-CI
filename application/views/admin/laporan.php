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
					<h5 class="card-title">REPORT DATA</h5>
					<!-- <div class="col-sm-12 col-md-6" style="right;"> -->
						<div id="dataTable_filter" class="dataTables_filter">

							<!-- searching -->
							<label>
								<div class="wrap-input100 validate-input m-b-15">
									<table>
										<tr>
											<td>
												<form method="post" action="<?php echo base_url('dashboard/laporan') ?> ">
													<div class="col-md-12">
													<br>
													<select type="varchar" class="form-control" name="status">
														<option value="">All</option>
														<option value="New">New</option>
														<option value="Process">Process</option>
														<option value="Finished">Finished</option>
													</select>
												</td>
												<td>
													<label class="col-sm-8 col-form-label">From Date</label>
													<div class="col-sm-12">
														<input type="date" name="daritgl" class="form-control">
													</div>
												</td>
												<td>
													<label class="col-sm-8 col-form-label">Till Date</label>
													<div class="col-sm-12">
														<input type="date" name="sampaitgl" class="form-control">
													</div>
												</td>		
												<td> <br>	 
													<button type="submit" class="btn btn-outline-info" href="<?= base_url('dashboard/laporan') ?>">Search</button>
												</form>
											</td>
										</tr>
									</table>
								
							</label>
							<!-- end searching -->


						</div>
					</div><br>
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Complaint Date</th>
								<th scope="col">Nik</th>
								<th scope="col">Name</th>
								<th scope="col">Complaint</th>
								<th scope="col">Picture</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>

							<?php $no = 1; ?>
							<?php foreach($laporan as $l) : ?>
								<tr>
									<th scope="row"><center><?= $no++; ?></center></th>
									<td><center><?= $l->tgl_pengaduan ?></center></td>
									<td><center><?= $l->nik ?></center></td>
									<td><center><?= $l->nama ?></center></td>
									<td><center><?= $l->isi_laporan ?></center></td>
									<td><center><img src="<?php echo base_url() ?>/assets/foto/<?php echo $l->foto ?>" width="90" height="110"></center></td>
									<td><center><?= $l->status ?></center></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					
					<a href="<?= site_url('dashboard/generate_laporan')?>" class="btn btn-default mt-2">Preview or Download</a>
					<!-- akhir tabel -->
				</section>

				</main><!-- End #main --> 