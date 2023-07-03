<div class="container-fluid">
	<div class="card">
		<!-- <div class="card-header">
			Response
		</div> -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
		<?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span aria-hidden="true">&times;</span></button></div>') ?>
		<?= $this->session->flashdata('msg'); ?>
		<?php if (! empty($data_pengaduan)) : ?>
		
		<div class="card-body">
			<?php foreach ($data_pengaduan as $p) { ?>
			<div class="col-md-4">
				<div class="card shadow md-4" style="width: 18rem;">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary"><?= $p['nama'] ?></h6>
					</div>
					<img height="250" src="<?php echo base_url() ?>assets/foto/<? $p['foto'] ?>" class="card-img-top">
				<div class="card-body">
					<span class="text-dark">Complaint :</span><p><?= $p['isi_laporan'] ?></p>
					<span class="text-dark">Telp :</span><p><?= $p['telp'] ?></p>
					<span class="text-dark">Complain Date :</span><p><?= $p['tgl_pengaduan'] ?></p>
					</div>
						<div class="text-center mb-2">
							<div class="">
								<?= form_open('dashboard/tanggapan_detail'); ?>
								<input type="hidden" name="id" value="<?= $p['id_pengaduan'] ?>">
								<button class="btn btn-success" name="terima">Detail</button>
								<?= form_close(); ?>
							</div>
						</div>
					</div>
				</div>
					<?php endforeach ; ?>
				</div>
				<?php else : ?>
					<div class="text-center">Not Complaint Yet</div>
				<?php endif; ?>
			</div>



