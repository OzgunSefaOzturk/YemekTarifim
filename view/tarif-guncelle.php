
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
			<div class="container col-md-12">
				<form class="text-center p-5" method="post" action="" enctype="multipart/form-data">

			    <h1 class="tarifeklebaslik">Tarif Ekle</h1>

			    <!-- Name -->
			    <input type="text" id="defaultContactFormName" class="form-control mb-4" name="tarif" placeholder="Tarif Adı" required  value="<?php echo $fetch['tarif_adi']; ?>">
			    <!-- Subject -->
			    <label class="yemekturu">Yemek Türü</label>
			    <select required class="browser-default custom-select mb-4" name="Kategori">
			    	<option value="" disabled selected>Kategori seçin</option>
					<?php
						foreach ($fetch2 as $k) {
						 	if($k['kategori_id'] == $fetch['kategori_id']) {
						 		echo "<option value = '{$k['kategori_id']}' selected> {$k['kategori_adi']} </option>";
						 	} else {
						 		echo "<option value = '{$k['kategori_id']}'> {$k['kategori_adi']} </option>";
						 	}
						 } 
					?>
			    </select>

			    <label class="yemekturu">Malzemeler</label>
			    <!-- Message -->
			    <div required class="form-group">
			        <textarea name="malzeme" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Malzemeleri giriniz"><?php echo $fetch['tarif_malzeme']; ?></textarea>
			    </div>

				<label class="yemekturu">Tarif Bilgileri</label>
			    <!-- Message -->
			    <div required class="form-group">
			        <textarea name="ekle" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Tarif Bilgileri giriniz" ><?php echo $fetch['tarif']; ?></textarea>
			    </div>
				<div class="input-group">
					  
					  <div class="custom-file">
					    <input type="file" name="resim" />
					    <!-- <label class="custom-file-label" for="inputGroupFile01">Dosya Seç</label> -->
					  </div>
				</div><br>
			    <!-- Send button -->
			    <button class="btn btn-info btn-block kaydet" name="yeniTarif" value="yeniTarif" type="submit">Kaydet</button>
					<div class="clear my-2"></div>
					<?php if(isset($ret)) { echo "<div class='alert alert-info'>{$ret}</div>"; } ?>
			</form>			
			</div>
			
			<!-- footer -->
			<?php include('footer.php'); ?>
	</body>
</html>











			
	