<!-- header -->
<!doctype html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	
	<link href="<?= base_url(); ?>assets/admin/assets/img/u.png" rel="icon">
	<link href="<?= base_url(); ?>assets/admin/assets/img/u.png" rel="apple-touch-icon">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?= base_url();?>assets/login/css/style.css">

	<style type="text/css">
	.pertama {
		color: white;
	}
</style> 
</head>
<!-- end header -->


<body class="img js-fullheight" style="background-image: url('<?= base_url('assets');?>/login/images/u.jpg');">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 text-center mb-8"><br>
					<h2 class="heading-section">LOGIN</h2>
				</div>
			</div>
		
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">

					<!-- notif -->
					<?php if ($error = $this->session->flashdata("message_login_error")):?>
						<div class="row">
							<div class="col-sm">
								<div class="alert alert-dismissible alert-danger">
									<?= $error ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<!-- end notif -->
					
					<div class="login-wrap p-0"><br><br>
						<form action="<?php echo site_url('login/aksi_login_petugas')?>" class="signin-form" method	="post">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Username" name="username" required>
							</div>
							<div class="form-group">
								<input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
							</div>
							<form>
								<div class="form-group">
									<center><a class="txt" href="<?php echo base_url('awal') ?>">Back</a></center>
								</div>
								<div class="form-group d-md-flex">
								</div>
							</form>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?= base_url();?>assets/login/js/jquery.min.js"></script>
	<script src="<?= base_url();?>assets/login/js/popper.js"></script>
	<script src="<?= base_url();?>assets/login/js/bootstrap.min.js"></script>
	<script src="<?= base_url();?>assets/login/js/main.js"></script>

</body>
</html>

