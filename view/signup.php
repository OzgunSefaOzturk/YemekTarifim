<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/web/style/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/web/style/css/style.css">
		<title>Kayıt</title>
	</head>

	<body>
		<!-- header -->
		<?php include('header.php'); ?>
		
		<!-- content -->
		<div class="container loginb minHeight">
			 <form action="#" method="POST" class="uyeolgirdi">
				<h1 class="uyeolbaslik">Üye Ol</h1>
                <input type="text" name="ad" class="button" placeholder="Ad" required>
                <input type="text" name="sa" class="button" placeholder="Soyad" required>
                <input type="text" name="ka" class="button" placeholder="Kullanıcı Adı" required>
				<input type="text" name="mail" class="button" placeholder="Email" required>
				<input type="password" name="sfr" class="button" placeholder="Şifre" required>
                <button type="submit" value="Add" name="submit" class="signupbutton">Üye Ol</button>
                <div class="clear"></div>
                <?php
                	if(isset($ret)){ echo "<div class='alert alert-info my-2'>$ret</div>"; }
                ?>
            </form>
		</div>

		<!-- footer -->
		<?php include('footer.php'); ?>
	</body>
</html>