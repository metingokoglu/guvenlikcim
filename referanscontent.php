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
                <li class="active">Referanslar</li>
              </ul>
              <h2>Referanslar</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

  <div class="row">
    <?php 
                      $sql =mysqli_query($con,"select * from referanslar");

                      while ($veri=mysqli_fetch_assoc($sql)) {
                    ?>
  <div class="referansbox span6" style="margin-top: 15px;">
    
    <div class="row">
      <div class="resim span2">
        <a href="#" class="thumbnail">
            <img style="width: 310px; height: 80px;" src="<?php echo $veri['referans_url']; ?>" alt="">
        </a>
      </div>
      <div class="yazi span4">
      <h6><?php echo $veri['referans_baslik']; ?></h6>  
        <p>
          <?php echo $veri['referans_yazi']; ?>
        </p>
       
      </div>
    </div>

  </div>
   <?php } ?>


</div>





</div>
<hr>


</div>             
 </div>
</div>
</div>




      </section>        
