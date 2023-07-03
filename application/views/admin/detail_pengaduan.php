 <main id="main" class="main">
 	<div class="col-sm-12 col-md-12" >
 		<div class="card">
 			<div class="card-body">
 				<br>
 				<div class="container-fluid">
 					<!-- <div class="card"> -->
 						<div class="card-header">
 							Detail 
 						</div>
 						<div class="card-body"><br>
 							<?php foreach ($pengaduan as $p) { ?>
 								<div class="row">
 									<div class="col-md-4">
 										<img src="<?php echo base_url(); ?>assets/foto/<?php echo $p->foto ?>" width="90" height="110" class="card-img-top">
 									</div>
 									<div class="col-md-8">
 										<table class="table">
 											<tr>
 												<td>Date</td>
 												<td><strong><?php echo $p->tgl_pengaduan ?></strong></td>
 											</tr>
 											<tr>
 												<td>Compalaint</td>
 												<td><strong><?php echo $p->isi_laporan ?></strong></td>
 											</tr>
 										</table>
 										<a class="btn btn-default btn-sm" href="<?php echo base_url('dashboard/pengaduan') ?>">Back</a>
 									</div>
 								</div>
 							<?php } ?>
 						</div>
 					</div>
 				</div>