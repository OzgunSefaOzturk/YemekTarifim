<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/web/style/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/web/style/css/style.css">
		<title>Tartışma Paneli</title>
	</head>

	<body>
		<!-- header -->
		<?php include('header.php'); ?>
		
		

		<div class="container minHeight">			
							
			<?php 

			foreach ($fetch as $f ) {
				echo "

					<div class=\"container tartisma\">
				<a href=\"/web/?page=tartisma-detay&id={$f['tartisma_id']}\" class=\"tp\"><h1>{$f['tartisma_konu']}</h1></a>
			</div>

				";
			}


			?>

		</div>
			
			<!-- footer -->
			<?php include('footer.php'); ?>
	</body>
</html>
