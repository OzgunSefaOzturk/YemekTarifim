<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/web/style/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/web/style/css/style.css">
		<title>Profilim</title>
	</head>

	<body>
		<!-- header -->
		<?php include('header.php'); ?>
		
		

		<div class="container minHeight">			
			
			<div class="container col-md-12">
				<?php
	foreach($fetch as $t) {
		echo "
		<div class=\"col-md-3 float-left\">
					<a href=\"/web/?page=tarif-detay&id={$t['tarif_id']}\" class=\"a\">
						<div class=\"col-md-12 yemek\">
							<img src=\"/web/image/{$t['tarif_resim']}\" class=\"img-responsive\">		
						</div>
						
						<div class=\"col-md-12\">
							<p class=\"tarif\">{$t['tarif_adi']}</p>	
						</div>
					</a>
					<div class=\"clear\"></div>
					<div class=\"col-md-11 edittarif mx-auto\">
					   <a href=\"/web/?page=tarif-guncelle&id={$t['tarif_id']}\" class=\"b\">Düzenle</a>
					   &nbsp;/&nbsp;
					   <a href=\"/web/?page=tarif-sil&id={$t['tarif_id']}\" class=\"b\" >Sil</a>
				    </div>					
				</div> ";
	}
?>

			</div>


		</div>
			
			<!-- footer -->
			<?php include('footer.php'); ?>
	</body>
</html>













