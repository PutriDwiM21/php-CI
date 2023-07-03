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
 							<div class="row">	
 								<div class="col-md-12">
 									<table class="table">
 										<thead>
 											<tr>
 												<th scope="col"><center>Date</center></th>
 												<th scope="col"><center>Officer Name</center></th>
 												<th scope="col"><center>Response</center></th>
 												<th scope="col"><center>Status</center></th>
 											</tr>
 										</thead>
 										<?php foreach ($pengaduan as $p) { ?>
 											<tbody>
 												<tr>
 													<td><center><?= $p->tgl_tanggapan ?></center></td>
 													<td><center><?= $p->nama_petugas ?></center></td>
 													<td><center><?= $p->tanggapan ?></center></td>
 													<td><center>
 														<?php
 														if ($p->status == 'Baru') :
 															echo '<span class="btn btn-secondary">Unprocessed</span>';
 														elseif ($p->status == 'proses') :
 															echo '<span class="btn btn-primary">Process</span>';
 														elseif ($p->status == 'selesai') :
 															echo '<span class="btn btn-success">Finished</span>';
 														else :
 															echo '-';
 														endif;
 														?></center></td>
 													</tr>
 												</tbody>
 											<?php } ?>
 										</table>
 										<a class="btn btn-default btn-sm" href="<?php echo base_url('dashboard/pengaduanM') ?>">Back</a>
 									</div>
 								</div>

 							</div>
 						</div>
 					</div>
 				</div>
 			</main>

