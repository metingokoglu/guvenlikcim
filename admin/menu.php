<?php

$path = $_SERVER["SCRIPT_NAME"];

$file = basename($path);

?>
<div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="galeri.php">
                          Admin Panel
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                       
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="assets/images/emre2.jpg" class="img-radius" alt="User-Profile-Image">
                                  <span>Emre CALMAZ</span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  
                                  <li class="waves-effect waves-light">
                                      <a href="cikis.php">
                                          <i class="ti-layout-sidebar-left"></i> Çıkış Yap
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

  <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="assets/images/emre2.jpg" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">Emre CALMAZ<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                         
                                          <a href="cikis.php"><i class="ti-layout-sidebar-left"></i>Çıkış Yap</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                     
                          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Menu</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="<?php if($file == 'galeri.php'){echo "active";} ?>">
                                  <a href="galeri.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-gallery"></i><b>G</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Galeri Resim Yukle</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                                <li class="<?php if($file == 'galerigoruntule.php'){echo "active";} ?>">
                                  <a href="galerigoruntule.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-gallery"></i><b>G</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Galeri Resim Silme</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                            </ul>
                           <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php if($file == 'referans.php'){echo "active";} ?>">
                                  <a href="referans.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers-alt"></i><b>R</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Referans Yukle</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                                <li class="<?php if($file == 'referansgoruntule.php'){echo "active";} ?>">
                                  <a href="referansgoruntule.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers-alt"></i><b>R</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Referans Silme</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                              <li class="<?php if($file == 'urunler.php'){echo "active";} ?>">
                                  <a href="urunler.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-folder"></i><b>Ü</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Ürün Yukle</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                                 <li class="<?php if($file == 'urungoruntule.php'){echo "active";} ?>">
                                  <a href="urungoruntule.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-folder"></i><b>Ü</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Ürün Silme</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                              <ul class="pcoded-item pcoded-left-item">
                              <li class="<?php if($file == 'yenikayit.php'){echo "active";} ?>">
                                  <a href="yenikayit.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-agenda"></i><b>K</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Kayıt Ekle</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li class="<?php if($file == 'kayitgoruntule.php'){echo "active";} ?>">
                                  <a href="kayitgoruntule.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-agenda"></i><b>K</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Kayıt Görüntüleme </span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                             
                                  </ul>
                                  <ul class="pcoded-item pcoded-left-item">
                                    <li class="<?php if($file == 'musteri.php'){echo "active";} ?>">
                                        <a href="musteri.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-user"></i><b>M</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Müşteri Ekle</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="<?php if($file == 'musterigoruntule.php'){echo "active";} ?>">
                                        <a href="musterigoruntule.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-user"></i><b>M</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Müşteri Görüntüleme</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                  </ul>
                                  <ul class="pcoded-item pcoded-left-item">
                                     <li class="<?php if($file == 'iletisimmesaj.php'){echo "active";} ?>">
                                        <a href="iletisimmesaj.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-email"></i><b>M</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Mesaj Sayfası</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                          </ul>
                      </div>
                  </nav>
