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
			
			<div class="col-md-6 mx-auto">
		  	<div class="panel panel-default profil">
		        <div class="panel-heading">
		            <h3 class="text-center">Profilim</h3>
		            <div class="text-right" style="padding-bottom:10px;">
		                
		  </div>
		        </div>
		        <div class="panel-body">		           
		            <table class="table">
		                  <tbody>                  
		 
		                     <tr>
		                        <td>Adınız :</td>
		                        <td><?php echo $fetch['k_isim']; ?></td>
		                     </tr>
		                     <tr>
		                        <td>Soyadınız :</td>
		                        <td><?php echo $fetch['k_soy']; ?></td>
		                      <tr>
		                        <td>Kullanıcı Adınız :</td>
		                        <td><?php echo $fetch['k_adi']; ?></td>
		                     </tr>
		                     </tr>
		                     <tr>
		                        <td>Email :</td>
		                        <td><?php echo $fetch['k_mail']; ?></td>
		                     </tr>
		           		             
		                  </tbody>
		               </table>
		               <a class="profilbuton" href="/web/?page=profil-guncelle">
					  	Profilini Düzenle
					  </a>
					  <a class="profilbuton" href="/web/?page=tariflerim">
					  	Tariflerini Görüntüle
					  </a>
					  <a class="profilbuton" href="/web/?page=yorumlarim">
					  	Yorumlarını Görüntüle
					  </a>
		        </div>
		        
		  	</div>
		  </div>

		</div>
			
			<!-- footer -->
			<?php include('footer.php'); ?>
	</body>
</html>
