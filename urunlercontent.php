 <?php include 'baglan.php'; ?>
 <section id="content">
      <div class="container">
         <div class="row">
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="inner-heading">
              <ul class="breadcrumb">
                <li><a href="index.php">Anasayfa</a> <i class="icon-angle-right"></i></li>
                <li class="active">Ürunler</li>
              </ul>
              <h2>Ürunler</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
        <?php 
                      $sql =mysqli_query($con,"select * from urunler");

                      while ($veri=mysqli_fetch_assoc($sql)) {
                    ?>
   
       <div class="responsive">
        <div class="gallery">
            <a href="<?php echo $veri['urunler_url']; ?>" data-pretty="prettyPhoto[gallery1]"><img src="<?php echo $veri['urunler_url']; ?>" alt="<?php echo $veri['urunler_aciklama']; ?>" style="width: 800px; height: 400px;"></a>
          
        </div>
      </div>
      <?php } ?>
      </div>
      </div>
      </section>    