<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/web/style/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/web/style/css/style.css">
    <script type="text/javascript" src="/web/style/js/jquery.js"></script>
    <script type="text/javascript" src="/web/style/js/oyla.js"></script>
    <title><?=$fetch['tarif_adi']?></title>
  </head>

  <body>
    <!-- header -->
    <?php include('header.php'); ?>
    
  
      <div class="container col-md-12">
       <div class="container">
        <div class="yemekfoto">
          <img src="/web/image/<?=$fetch['tarif_resim']?>" class="img-responsive">
        </div>
      </div>
      <div class="container minHeight">
        <div class="col-md-6 yapilis float-left">
          <h1><?=$fetch['tarif_adi']?></h1>
          <h3>Malzemeler:</h3>
          <p><?php echo nl2br($fetch['tarif_malzeme']); ?></p>
          <h3>Yapılışı:</h3>
          <p><?=$fetch['tarif']  ?></p>
          
        </div>
        <div class="col-md-6 yorum float-left">
            <div class="widget-area no-padding blank">
                <div class="status-upload">
                  <form action="" method="post">
                    <textarea placeholder=" Yorum...." name="yorum" ></textarea>


                    <button type="submit" name="yorum-ekle" value="yorum-ekle" class="btn btn-success gonder"><i class="fa fa-share"></i> Yorum yap </button>
                    <div class="favori">
                      <button type="button" id="favori" name="<?=$fetch['tarif_id']?>" class="btn btn-info">Favorilerime Ekle</button>
                    </div>

                    <div class="rating" id="<?=$fetch['tarif_id']?>">
                      <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                      <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                      <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                      <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                      <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                      
                    </div>
                    <div class="clear my-2"></div>
                    <div class="col-md-12" id="ortalama-puan"> Ortalama puan: <?php echo round($fetch6['ortalama'], 2); ?> </div>
                    <div class="clear my-2"></div>
                    <?php
                      if(isset($ret)){ echo "<div class='alert alert-info'>{$ret}</div>"; }
                    ?>
                  </form>
                </div><!-- Status Upload  -->
              </div>
         
              <?php
                foreach($fetch2 as $y) {
                  echo "
                    <div class=\"panel panel-white post panel-shadow alt\">
                      <div class=\"post-heading\">
                          
                          <div class=\"pull-left meta\">
                              <div class=\"title h5\">
                                  <h4>{$y['k_isim']}</h4>
                              </div>
                          </div>
                      </div>
                      <div class=\"clear\"></div> 
                      <div class=\"post-description\"> 
                          <p>{$y['yorum']}</p>
                      </div>
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
