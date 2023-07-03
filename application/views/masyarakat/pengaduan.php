
	<main id="main" class="main">
		<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

		<script>
			tinymce.init({
				selector: '#mytextarea'
			});
		</script> -->
		<?= $this->session->flashdata('msg'); ?>
		<div class="col-sm-12 col-md-12" >
			<div class="card">
				<div class="card-body">
					<br>
					<div class="container-fluid">
						<h3><i class="fas fa-edit"></i><b>Community Complaints</h3><br>
							<form method="post" action="<?php echo site_url('dashboard/tambah_pengaduan') ?>" enctype="multipart/form-data">
								<div class="for-group">
									<label>Contents of the report</label>
									<textarea class="form-control" id="#mytextarea" name="isi_laporan"></textarea>
								</div><br>
								<div class="for-group">
									<label>Upload Picture</label>
									<input type="file" id="foto" name="foto" class="form-control" >
								</div><br>
								<button type="submit" class="btn btn-default btn-sm">Save</button>
							</form>

						</div>
						<?php form_close(); ?>
					</div>
				</div>
			</main>

		<!-- <script>
			$(document).ready(function() {
				$('#table_default').DataTable();
			});

      //retrieve data for edit user
      $('#edit_area').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)

        // Isi nilai pada field
        modal.find('#erecid_area').attr("value", div.data('recid_area'));
        modal.find('#earea').attr("value", div.data('area'));
        modal.find('#enama_area').attr("value", div.data('nama_area'));
        modal.find('#edirektorat').val(div.data('direktorat'));
        modal.find('#elokasi').val(div.data('lokasi'));
     });
  </script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
-->

