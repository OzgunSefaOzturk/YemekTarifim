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
		
		
			<div class="container konub">
			    <div class="row">
			        <div class="col-md-8">
			            <div class="page-header">
			                <h2><small class="pull-right"></small><?php echo $fetch['tartisma_konu'] ?></h2>
			            </div>
			        </div>
			    </div>
			</div>    


		<?php 

		foreach ($fetch2 as $f ) {
			
		echo "

			<div class=\"media yorumb\">                      
                            <div class=\"media-body\">     
                              	<h4 class=\"media-heading user_name\">{$f['k_adi']}</h4>
                             	{$f['tartisma_yorum']}
                            </div>
							
                         </div>
			";




		}


		?>


		<div class="col-md-6 mx-auto addrecipe">
			<!-- Default form contact -->
			<form class="text-center p-5" action="" method="post">

			    <h1 class="yorumunuz">Yorumunuz</h1>
			   
			    <!-- Message -->
			    <div required class="form-group">
			        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="konu" placeholder="Ne Düşünüyorsun?"></textarea>
			        <div class="clear my-2"></div>
			    <?php if(isset($ret)) { echo "<div class='alert alert-info' >{$ret}</div>"; } ?>
			    </div>
				
			    <!-- Send button -->
			    <button class="btn btn-info btn-block gonderb" name="yolla" value="yolla" type="submit">Gönder</button>
			    <div class="clear my-2"></div>
			    <?php if(isset($ret2)) { echo "<div class='alert alert-info' >{$ret2}</div>"; } ?>
			</form>
		</div>





		</div>
			
			<!-- footer -->
			<?php include('footer.php'); ?>
	</body>
</html>
