<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/web/style/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/web/style/css/style.css">
		<title>Yorumlarım</title>
	</head>

	<body>
		<!-- header -->
		<?php include('header.php'); ?>
		
		

		<div class="container minHeight">			
		
				<?php 


					foreach ($fetch as $f ) {
						echo "
							<div class=\"media yorumb\">                      
                            <div class=\"media-body\">     
                              	<h4 class=\"media-heading user_name\">{$_SESSION['user']}</h4>
                             	{$f['yorum']}
                            </div>
							
                         </div>

						";
					}

				?>

		</div>
			
			<!-- footer -->
			<?php include('footer.php'); ?>
	</body>
</html>
