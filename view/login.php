<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/web/style/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/web/style/css/style.css">
		<title>Giriş</title>
	</head>

	<body>
		<!-- header -->
		<?php include('header.php'); ?>
		
		<!-- content -->
		<div class="container loginb minHeight">
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<h3>Giriş Yap</h3>
						<div class="d-flex justify-content-end social_icon">
							<a href="<?=$loginUrl?>"><span><i class="fa fa-facebook-square"></i></span></a>
							<a href="<?=$google_login_url?>"><span><i class="fa fa-google-plus-square"></i></span></a>
						</div>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-user"></i></span>
								</div>
								<input type="text" name="ka" class="form-control" placeholder="Kullanıcı Adı">
								
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-key"></i></span>
								</div>
								<input type="password" name="sfr" class="form-control" placeholder="Şifre">
							</div>
							<!-- <div class="row align-items-center remember">
								<input type="checkbox">Beni Hatırla
							</div> -->
							<div class="form-group">
								<input type="submit" value="Giriş Yap" class="btn float-right login_btn my-2">
							</div>
							<div class="clear"></div>
							<?php
								if(isset($ret)) {
									echo "<div class='alert alert-info'>{$ret}</div>";
								}
							?>
						</form>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							Hesabın yok mu?<a href="/web/?page=signup">Üye Ol</a>
						</div>
						<!-- <div class="d-flex justify-content-center">
							<a href="#">Şifreni mi unuttun ?</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>

		<!-- footer -->
		<?php include('footer.php'); ?>
	</body>
</html>
