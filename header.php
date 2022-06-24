<?php

$path = $_SERVER["SCRIPT_NAME"];

$file = basename($path);

?>
<header>
      <div class="top">
        <div class="container">
          <div class="row">
            <div class="span6">
              
            </div>
            <div class="span6">

              <ul class="social-network">
                <li><a href="https://www.facebook.com/G%C3%BCvenlik-cim-2038473382878538/" target="_blank" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-white"></i></a></li>
                <li><a href="https://www.instagram.com/guvenlikcim/" data-placement="bottom" target="_blank" title="İnstagram"><i class="icon-instagram icon-white"></i></a></li>
                <li><a href="https://www.linkedin.com/in/emre-calmaz-4a6b29168/edit/photo-opt-out/" target="_blank" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-white"></i></a></li>
         
              </ul>

            </div>
          </div>
        </div>
      </div>
      <div class="container">
         <div class="row nomargin">
          <div class="span4">
            <div class="logo">
              <a href="index.php"><img width="250" height="40" src="img/logo1.png" alt="" /></a>
            </div>
          </div>
          <div class="span8">
            <div class="navbar navbar-static-top">
              <div class="navigation">
                <nav>
                  <ul class="nav topnav">
                    <li class="<?php if($file == 'index.php'){echo "active";} ?>">
                      <a href="index.php"><i class="icon-home"></i> Anasayfa</a>
                     
                    </li>
                    <li class="<?php if($file == 'urunler.php'){echo "active";} ?>">
                      <a href="urunler.php"><i class="icon-shopping-cart"></i> Ürünler</a>
                     
                    </li>
                    <li class="<?php if($file == 'referanslar.php'){echo "active";} ?>">
                      <a href="referanslar.php"><i class="icon-quote-left"></i> Referanslar</a>
                     
                    </li>
                    <li class="<?php if($file == 'galeri.php'){echo "active";} ?>">
                      <a href="galeri.php"><i class="icon-picture"></i> Galeri</a>
                     
                    </li>
                 
                    <li class="dropdown <?php if($file == 'hdd.php' || $file == 'yazilimlar.php' ){echo "active";} ?>">
                    <a href="#"><i class="icon-asterisk"></i> Destek</a>
                      <ul class="dropdown-menu">
                        <li class="<?php if($file == 'hdd.php'){echo "active";} ?>"><a href="hdd.php">HDD Hesaplama</a></li>
                        <li class="<?php if($file == 'yazilimlar.php'){echo "active";} ?>"><a href="yazilimlar.php">Yazılımlar</a></li>
                        
                      </ul>
                    </li>
                       <li class="<?php if($file == 'hakkimizda.php'){echo "active";} ?>">
                      <a href="hakkimizda.php"><i class="icon-picture"></i> Hakkımızda</a>
                    </li>
                    
                    <li class="<?php if($file == 'iletisim.php'){echo "active";} ?>">
                      <a href="iletisim.php"><i class="icon-pencil"></i> İletişim </a>
                    </li>
                  </ul>
                </nav>
              </div>
          
              <!-- end navigation -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->
