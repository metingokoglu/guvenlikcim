<?php
session_start();
include '../baglan.php';
if (isset($_SESSION['kvarmi'])) {
    ?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php'; ?>
</head>
<body>
<?php include 'menu.php'; ?>
<div class="pcoded-content">
						<div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Guvenlik-cim</h5>
                                            <p class="m-b-0">Admin Panel</p>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                  
                                    <!-- Page body start -->
                                    <div class="page-body">

                                         <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Galeri Resim Yukleme Formu</h5>
                                                       
                                                    </div>
                                                    <div class="card-block">
                                                        <h4 class="sub-title">Galeri</h4>
                                                        <form action="galeriyukle.php" method="post" enctype="multipart/form-data">
                                                          
                                                            <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Resim Yazısı:</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="aciklama" class="form-control"
                                                                    placeholder="Resim Açıklaması">
                                                                </div>
                                                            </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-form-label" style="width:90px;margin-left:15px;">Resim Seç :</label>
                                                                            <div class="col-sm-4">
                                                                                <input type="file" name="dosya" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                     <div class="form-group row">
                                                                     <div class="col-sm-1">
                                                                       <input type="submit" value="Kaydet" class="btn waves-effect waves-light hor-grd btn-grd-primary">
                                                               		 </div>
                                                                		</div>
                                                                    </form>
                                                              
                                                             
                                                                </div>
                                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

</div>

<?php include 'js.php'; ?>
</body>
</html>

<?php }else{
         
        echo "<script>
        alert('Lutfen Giriş Yapınız');
        window.location = 'index.php';

        </script>";
         } ?>