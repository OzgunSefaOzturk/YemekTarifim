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
					<div class="card-body">
						<form action="" method="post">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-user"></i></span>
								</div>
								<input type="text" name="secret" class="form-control" placeholder="Onay kodu">
								
							</div>
							
							<div class="form-group">
								<input type="submit" value="Doğrula" class="btn float-right login_btn my-2">
							</div>
							<div class="clear"></div>
							<?php
								if(isset($ret)) {
									echo "<div class='alert alert-info'>{$ret}</div>";
								}
							?>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- footer -->
		<?php include('footer.php'); ?>
	</body>
</html>
