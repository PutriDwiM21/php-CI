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
                <th scope="col"><center>#</center></th>
                <th scope="col"><center>Name</center></th>
                <th scope="col"><center>Complaint</center></th>
                <th scope="col"><center>Date</center></th>
                <th scope="col"><center>Picture</center></th>
                <th scope="col"><center>Status</center></th>
                <th scope="col" colspan="2"><center>Aksi</center></th>
              </tr>
            </thead>
            <?php $no = 1; ?>
            <?php foreach ($pengaduan as $a) : ?>
              <tbody>
                <tr>
                  <th scope="row"><center><?= $no++; ?></center></th>
                  <td><center><?= $a->nama; ?></center></td>
                  <td><center><?= $a->isi_laporan; ?></center></td>
                  <td><center><?= $a->tgl_pengaduan; ?></center></td>
                  <td><center><img src="<?php echo base_url() ?>/assets/foto/<?php echo $a->foto; ?>" width="90" height="110"></center></td>
                  <td><center>
                    <?php
                    if ($a->status == 'Baru') :
                      echo '<span class="btn btn-secondary">Unprocessed</span>';
                    elseif ($a->status == 'proses') :
                      echo '<span class="btn btn-primary">Process</span>';
                    elseif ($a->status == 'selesai') :
                     echo '<span class="btn btn-success">Finished</span>';
                   else :
                    echo '-';
                  endif;
                  ?></center>
                  <td width="50px"><center><?php echo anchor('dashboard/detailtanggapan/' .$a->id_pengaduan, '<div class="btn btn-default btn-sm"><i class="bi bi-eye"></i></div>')?></center></td>
                </td>
              </tr>
            <?php endforeach ?>      
          </tbody>
        </table>

        
      </body>
      </html>
    </section>

  </main><!-- End #main -->

  <!-- script modal -->
  <script src="<?= base_url(); ?>assets/modal/modal-01/js/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/modal/modal-01/js/popper.js"></script>
  <script src="<?= base_url(); ?>assets/modal/modal-01/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/modal/modal-01/js/main.js"></script>