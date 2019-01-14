<div class="container-fluid header col-md-12">
			 	<div class="container col-md-12">
						<nav class="navbar navbar-expand-lg navbar-light bg-light selo">
						  <a class="navbar-brand " href="/web/?page=index">Yemek Tarifim</a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>

						  <div class="collapse navbar-collapse" id="navbarSupportedContent">
						    <ul class="navbar-nav mr-auto">						    
						      <li class="nav-item">
						        <a class="nav-link buton" href="/web/?page=tartisma">Tartışma Paneli</a>
						      </li>
						      <li class="nav-item">
						        <a class="nav-link buton" href="/web/?page=sikayet">Şikayet/Öneri</a>
						      </li>
						        <?php
								  	if(isset($_SESSION['user'])) {
								  		echo "
								  			<li class=\"nav-item\">
								  				<a class=\"nav-link buton\" href=\"/web/?page=profil\">Profil</a>
								  			</li>

								  			<li class=\"nav-item\">
								  				<a class=\"nav-link buton\" href=\"/web/?page=tarif-ekle\">Tarif Ekle</a>
								  			</li>
								  		";
								  	}
								  ?>
						      		
						      <li class="nav-item dropdown ">
						        <a class="nav-link dropdown-toggle buton" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          Kategoriler
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						            <?php
							    		$kat = $db->prepare("SELECT * FROM kategori");
										$kat->execute();
										$fkat = $kat->fetchAll(PDO::FETCH_ASSOC);

										foreach($fkat as $kk) {
											echo "<a class=\"dropdown-item\" href=\"/web/?page=kategori-detay&id={$kk['kategori_id']} \">{$kk['kategori_adi']}</a>";
										}
							    	?>		        
						        </div>
						      </li>
						      <?php
								if(isset($_SESSION['user'])) {
									echo "
										 <li class=\"nav-item\">
										 	<a class=\"nav-link buton\" href=\"/web/?page=logout\">Çıkış Yap</a>
										 </li>
									";
								} else {
									echo "
										<li class=\"nav-item\">
											<a class=\"nav-link buton\" href=\"/web/?page=login\">Giriş Yap</a>
										</li>
										
										<li class=\"nav-item\">
											<a class=\"nav-link buton\" href=\"/web/?page=signup\">Üye ol</a>
										</li>
									";
								}
							?>	
						    </ul>
						    
						    <form class="form-inline my-2 my-lg-0" action="/web/?page=search" method="post">
						      <input class="form-control mr-sm-2" type="search" placeholder="Arama Yap" aria-label="Search" name="search">
						      <button class="btn btn-outline-success my-2 my-sm-0 aramabutonu" type="submit">Ara</button>
						    </form>
						  </div>
						</nav>
				</div>
		</div>


<!-- <div class="container-fluid header">
		 	<div class="container">
					<div class="btn-group butongrup">
					  <a class="buton" href="/web/">
					  	Anasayfa
					  </a>
					  <a class="buton" href="/web/?page=tartisma">
					  	Tartışma Paneli
					  </a>
					  <a class="buton" href="/web/?page=sikayet">
					  	Şikayet/Öneri
					  </a>
					  <?php
					  	if(isset($_SESSION['user'])) {
					  		echo "
					  			<a class=\"buton\" href=\"/web/?page=profil\">
					  				Profil
					  			</a>

					  			<a class=\"buton\" href=\"/web/?page=tarif-ekle\">
					  				Tarif Ekle
					  			</a>
					  		";
					  	}
					  ?>
					  <div class="btn-group">
					    <button type="button" class="btn btn-primary dropdown-toggle buton" data-toggle="dropdown">
					       Kategoriler
					    </button>
					    <div class="dropdown-menu">
					    	<?php
					    		$kat = $db->prepare("SELECT * FROM kategori");
								$kat->execute();
								$fkat = $kat->fetchAll(PDO::FETCH_ASSOC);

								foreach($fkat as $kk) {
									echo "<a class=\"dropdown-item\" href=\"/web/?page=kategori-detay&id={$kk['kategori_id']} \">{$kk['kategori_adi']}</a>";
								}
					    	?>
					    </div>
					  </div>
					  <nav class="navbar navbar-expand-sm arama ">
						  <form class="form-inline" action="/web/?page=search" method="post">
						    <input class="form-control mr-sm-1" type="text" name="search" placeholder="Arama Yap">
						    <button class="btn btn-success aramabutonu" name="submit" type="submit">Ara</button>
						  </form>
					  </nav>
				      </button>	
				</div>
				
				<div class="giris">
					<?php
						if(isset($_SESSION['user'])) {
							echo "
								<a class=\"link\" href=\"/web/?page=logout\">Çıkış Yap</a>
							";
						} else {
							echo "
								<a class=\"link\" href=\"/web/?page=login\">Giriş Yap</a>
								&nbsp;
								<div class=\"slash\">/</div>
								&nbsp;
								<a class=\"link\" href=\"/web/?page=signup\">Üye ol</a>
							";
						}
					?>
				</div>
			</div>
		</div> -->