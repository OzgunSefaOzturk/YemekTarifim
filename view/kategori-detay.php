<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/web/style/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/web/style/css/style.css">
		<title><?php echo($fetch[0]['kategori_adi']);  ?></title>
	</head>

	<body>
		<!-- header -->
		<?php include('header.php'); ?>
		
		<div class="container-fluid cızgı"></div>
		<div class="container">
			<a href="/web/?page=kategori-detay&id=<?=$id?>&order=puan-asc" class="siralama">Puan Düşük</a>
			<a href="/web/?page=kategori-detay&id=<?=$id?>&order=puan-desc" class="siralama">Puan Yüksek</a>
		</div>

		<div class="container minHeight">			
			<div class="container col-md-12">
				<?php
						
						

						foreach($fetch as $f){
							echo "
								<div class=\"col-md-3 float-left\">
									<a href=\"/web/?page=tarif-detay&id={$f['tarif_id']}\" class=\"a\">
										<div class=\"col-md-12 yemek\">
											<img src=\"/web/image/{$f['tarif_resim']}\" class=\"img-responsive oval\">		
										</div>
										
										<div class=\"col-md-12\">
											<p class=\"tarifb\">{$f['tarif_adi']}</p>	
										</div>
									</a>
								</div>
							";
						}

					
				?>				
			</div>
		</div>
			<!-- footer -->
			<?php include('footer.php'); ?>

	</body>
</html>
