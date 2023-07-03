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
        <h5 class="card-title">OFFICER DATA</h5>
        <div class="col-sm-12 col-md-6" style="right;">



          <div id="dataTable_filter" class="dataTables_filter">
            <label>
              <div class="wrap-input100 validate-input m-b-15">
                <?php echo form_open('dashboard/pencarian_petugas') ?>
                <input type="text" class="input100" placeholder="Search" name="keyword" >
                <div class="btn btn-default btn-sm" type="submit"><i class="bi bi-search"></i></div>
                <?php echo form_close() ?>
              </div>
            </label>
          </div>
        </div><br>

        <nav class="navbar navbar-light">
         <div  class="row">
           <div class="col-sm-12 col-md-12">
            <button class="btn btn-default btn-sm mb-3" data-toggle="modal" data-target="#tambahmodal" >+ Add Officer</button>
          </div>
        </div>
        <form class="form-inline">
          <table>
            <tr>
              <td>
                <!-- login gagal -->
                <?php if ($error = $this->session->flashdata("message_login_error")):?>
                  <div class="row">
                    <div class="col-sm">
                      <div class="alert alert-dismissible alert-danger">
                        <?= $error ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <!-- end login gagal -->
              </td>
            </tr>
          </table>
        </form>
      </nav>


      <!-- Tabel Petugas -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col"><center>ID</center></th>
            <th scope="col"><center>Name</center></th>
            <th scope="col"><center>Username</center></th>
            <th scope="col"><center>Password</center></th>
            <th scope="col"><center>Telp</center></th>
            <th scope="col"><center>Level</center></th>
            <th scope="col" colspan="2"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($petugas as $a){ ?>
            <tr>
              <td><center><?php echo $a->id_petugas ?></center></td>
              <td><center><?php echo $a->nama_petugas ?></center></td>
              <td><center><?php echo $a->username ?></center></td>
              <td><center><?php echo $a->password?></center></td>
              <td><center><?php echo $a->telp?></center></td>
              <td><center><?php echo $a->level?></center></td>
              <td width="50px"><center><div class="btn btn-default btn-sm" data-toggle="modal" data-target="#modaledit<?php echo $a->id_petugas ?>"><i class="bi bi-pen"></i></div></center></td>
              <td width="50px"><center><div class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalhapus<?php echo $a->id_petugas ?>"><i class="bi bi-trash"></i></div></center></td>
            </td>
          </tr>


          <!-- Modal hapus-->
          <div class="modal fade" id="modalhapus<?php echo $a->id_petugas ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header p-4 p-md-5">
                  <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete data?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                  </button>
                </div>
                <?php echo form_open_multipart('dashboard/hapus_petugas') ?>
                <div class="modal-footer">
                  <input type="hidden" name="id_petugas" value="<?php echo $a->id_petugas ?>">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-default">Delete</button>
                </div>
                <?php echo form_close() ?>
              </div>
            </div>
          </div> 
          <!-- end modal hapus -->


          <!-- modal edit -->
          <div class="modal fade" id="modaledit<?php echo $a->id_petugas ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <h4><b>Edit Officer Data</h4>
                    </center>
                    <?php echo form_open_multipart('dashboard/ubah_data_petugas') ?>
                    <div class="form-group">
                      <input type="hidden" name="id_petugas" class="form-control" value="<?php echo $a->id_petugas ?>">
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input type="varchar" name="nama_petugas" class="form-control" placeholder="Name" value="<?php echo $a->nama_petugas ?>">
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="varchar" name="username" class="form-control" placeholder="Username" value="<?php echo $a->username ?>">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $a->password ?>">
                    </div>
                    <div class="form-group">
                      <label>Telp</label>
                      <input type="varchar" name="telp" class="form-control" placeholder="Telp" value="<?php echo $a->telp ?>">
                    </div>
                    <div class="form-group">
                      <label>Level</label>
                      <select type="varchar" class="form-control" name="level" value="<?php echo $a->level ?>">
                        <option>Admin</option>
                        <option>Petugas</option>
                      </select>
                    </div>
                    <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default btn-sm" style="float: right;">Save</button>
                    <?php echo form_close() ?>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- end edit modal -->

          <!-- modal tambah -->
          <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <h4><b>Create Officer Data</h4>
                    </center>
                    <form method="post" action="<?php echo site_url('dashboard/tambah_petugas') ?>">
                      <div class="form-group">
                        <input type="hidden" name="id_petugas" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="varchar" name="nama_petugas" class="form-control" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <input type="varchar" name="username" class="form-control" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <input type="varchar" name="telp" class="form-control" placeholder="Telp">
                      </div>
                      <div class="form-group">
                        <select type="varchar" class="form-control" name="level">
                          <option>-- Select Level --</option>
                          <option>Admin</option>
                          <option>Petugas</option>
                        </select>
                      </div><br>
                      <a class="btn btn-default btn-sm" href="<?php echo base_url('dashboard/data_petugas') ?>">Back</a>
                      <button type="submit" class="btn btn-default btn-sm" style="float: right;">Save</button>
                    </form>
                  </div>
                </div>
              </div>
            </div><!-- end tambah modal -->


          </tbody>
        </table>
        <a class="btn btn-default btn-sm mb-3" href="<?php echo base_url('dashboard/data_petugas') ?>">Back</a>
        <!-- akhir tabel -->
      </section>

    </main><!-- End #main -->  

    <script src="<?= base_url(); ?>assets/modal/modal-01/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/modal/modal-01/js/popper.js"></script>
    <script src="<?= base_url(); ?>assets/modal/modal-01/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/modal/modal-01/js/main.js"></script>
  </body>
  </html>
