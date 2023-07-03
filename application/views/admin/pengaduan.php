<!doctype html>
<html lang="en">
<head>
  <title>Complaint</title>
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
        <h5 class="card-title">COMPLAINT DATA</h5>
        <div class="col-sm-12 col-md-6" style="right;">
          <div id="dataTable_filter" class="dataTables_filter">
            </div>
          </div><br>
          <div  class="row">
           <!-- Tabel Hak Akses -->
           <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col"><center>ID</center></th>
                <th scope="col"><center>Name</center></th>
                <th scope="col"><center>Complaint</center></th>
                <th scope="col"><center>Date</center></th>
                <th scope="col"><center>Picture</center></th>
                <th scope="col"><center>Status</center></th>
                <th scope="col" colspan="2"><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pengaduan as $a) { ?>
                <tr>
                  <td><center><?php echo $a->id_pengaduan ?></center></td>
                  <td><center><?php echo $a->nama ?></center></td>
                  <td><center><?php echo $a->isi_laporan?></center></td>
                  <td><center><?php echo $a->tgl_pengaduan ?></center></td>
                  <td><center><img src="<?php echo base_url() ?>/assets/foto/<?php echo $a->foto ?>" width="90" height="110"></center></td>
                  <td><center><?php echo $a->status?></center></td>
                  <td width="50px"><center><div class="btn btn-default btn-sm" data-toggle="modal" data-target="#modaledit<?php echo $a->id_pengaduan ?>"><i class="bi bi-pen"></i></div></center></td>
                </td>
              </tr>

              <!-- modal edit -->
              <div class="modal fade" id="modaledit<?php echo $a->id_pengaduan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="ion-ios-close"></span>
                      </button>
                    </div>
                    <div class="modal-body p-4 p-md-5">
                      <div class="icon d-flex align-items-center justify-content-center">
                        <span class="ion-ios-person"></span>
                      </div>
                      <center>
                        <h4><b>Edit Status</h4>
                        </center>
                        <?php echo form_open_multipart('dashboard/ubah_status') ?>
                        <div class="form-group">
                          <input type="hidden" name="id_pengaduan" class="form-control" value="<?php echo $a->id_pengaduan ?>">
                        </div>
                        <div class="form-group">
                          <label>Name</label>
                          <input type="varchar" name="nama" class="form-control" value="<?php echo $a->nama ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Picture</label><br>
                          <img src="<?php echo base_url() ?>/assets/foto/<?php echo $a->foto; ?>" width="90" height="110">
                        </div>
                        <div class="form-group">
                          <label>Complaint</label>
                          <input type="varchar" name="isi_laporan" class="form-control" value="<?php echo $a->isi_laporan ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Date</label>
                          <input type="date" name="tgl_pengaduan" class="form-control" value="<?php echo $a->tgl_pengaduan ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Tanggapan</label>
                          <input type="input" name="tanggapan" class="form-control">
                          </div
                          <div class="form-group">
                            <label>Status</label>
                            <select type="varchar" class="form-control" name="status" value="<?php echo $a->status ?>">
                              <option value="0">Unprocessed</option>
                              <option value="proses">Process</option>
                              <option value="selesai">Finished</option>
                           </select><br>
                         <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-default btn-sm" style="float: right;">Save</button>
                         <?php echo form_close() ?>
                       </div>
                     </div>
                   </div>
                 </div>
               <?php } ?>

             </tbody>
           </table>
           <!-- akhir tabel -->
         </body>
         </html>
       </section>
      </main><!-- End #main -->

      <!-- script modal -->
      <script src="<?= base_url(); ?>assets/modal/modal-01/js/jquery.min.js"></script>
      <script src="<?= base_url(); ?>assets/modal/modal-01/js/popper.js"></script>
      <script src="<?= base_url(); ?>assets/modal/modal-01/js/bootstrap.min.js"></script>
      <script src="<?= base_url(); ?>assets/modal/modal-01/js/main.js"></script>



