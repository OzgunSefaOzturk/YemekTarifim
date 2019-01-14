<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/web/style/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/web/style/css/style.css">
        <title>Şikayet/Öneri</title>
    </head>

    <body>
        <!-- header -->
        <?php include('header.php'); ?>
        
        

        <div class="container minHeight">         
            
            <div class="col-md-6 mx-auto addrecipe">
            <!-- Default form contact -->
            <form class="text-center p-5" action="" method="post">

                <h1 class="sikayetoneri">Şikayet Ve Önerileriniz</h1>

                <!-- Name -->
                <input type="text" id="defaultContactFormName" class="form-control mb-4" name="s_baslik" placeholder="Şikayet Veya Önerilerinizin Başlığı" >
                <!-- Subject -->
               
                <!-- Message -->
                <div required class="form-group">
                    <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="sikayet" placeholder="Şikayetiniz veya öneriniz"></textarea>
                </div>
                
                <!-- Send button -->
                <button class="btn btn-info btn-block gonder" type="submit" name="sikayet-ekle" value="Gönder">Gönder</button>
                <div class="clear my-2"></div>
                    <?php if(isset($ret)) { echo "<div class='alert alert-info'>{$ret}</div>"; } ?>
        </div> 

        </div>
            
            <!-- footer -->
            <?php include('footer.php'); ?>
    </body>
</html>






