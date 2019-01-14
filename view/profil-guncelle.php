<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/web/style/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/web/style/css/style.css">
		<title>YemekTarifim</title>
	</head>

	<body>
		<!-- header -->
		<?php include('header.php'); ?>
		
		

		<div class="container minHeight">			
			<div class="page-container">
            
            <form action="#" method="POST" class="uyeolgirdi">
			<h1 class="uyeolbaslik">Profil Güncelle</h1>
                <input type="text" name="ad" class="button" placeholder="Ad" value="<?php echo($fetch[k_isim]) ?>" >
                <input type="text" name="sa" class="button" placeholder="Soyad" value="<?php echo($fetch[k_soy]) ?>" >
                <input type="text" name="ka" class="button" placeholder="Kullanıcı Adı" value="<?php echo($fetch[k_adi]) ?>" >
				<input type="text" name="mail" class="button" placeholder="Email" value="<?php echo($fetch[k_mail]) ?>" >
				<input type="password" name="password" class="button" placeholder="Şifre">
                <button type="submit" value="Düzenle" name="guncelle" class="signupbutton">Güncellemeleri Kaydet</button>
            </form>
            <div class="clear my-2"></div>
							<?php
								if(isset($ret)) {
									echo "<div class='alert alert-info'>{$ret}</div>";
								}
							?>
        </div>			
		</div>
			
			<!-- footer -->
			<?php include('footer.php'); ?>
	</body>
</html>








