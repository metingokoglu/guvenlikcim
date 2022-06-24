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
                                                        <h5>Kayıt Ekleme Formu</h5>
                                                       
                                                    </div>
                                                    <div class="card-block">
                                                        <h4 class="sub-title">Kayıt Ekle</h4>
                                                        <form action="yenikayitekle.php" method="post" enctype="multipart/form-data">
                                                          
                                                            <div class="form-group row">
                                                                <label class="col-form-label" style="width:98px;margin-left:15px;">Müşteri Adı :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="musteri_adi" class="form-control"
                                                                    placeholder="Müşteri Adını Giriniz">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-form-label" style="width:98px;margin-left:15px;">Telefon :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="telefon" class="form-control"
                                                                    placeholder="Telefon Numarasını Giriniz">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                            <label class="col-form-label" style="width:98px;margin-left:15px;">Adres :</label>
                                                                            <div class="col-sm-4">
                                                                                <textarea rows="5" cols="5" style="resize: none;" name="adres" class="form-control"
                                                                                placeholder="Adres Giriniz"></textarea>
                                                                            </div>
                                                             </div>
                                                             <div class="form-group row">
                                                                    <label class="col-form-label" style="width:98px;margin-left:15px;">Sistem :</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="sistem" class="form-control">
                                                                            <option>Kamera</option>
                                                                            <option>Alarm Sistemi</option>
                                                                            <option>Diafon Sistemi</option>
                                                                            <option>Network</option>
                                                                            <option>Fiber Optik</option>
                                                                            <option>Ürün Güvenlik</option>
                                                                            <option>Yangın Alarm</option>
                                                                            <option>Diğer</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                           
                                                             <div class="form-group row">
                                                                <label class="col-form-label" style="width:98px;margin-left:15px;">Sistem Tipi :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="sistem_tipi" class="form-control"
                                                                    placeholder="Sistem Tipini Yazınız">
                                                                </div>
                                                            </div>
                                                                      
                                                                <div class="form-group row">
                                                                            <label class="col-form-label" style="width:98px;margin-left:15px;">Servis Nedeni :</label>
                                                                            <div class="col-sm-4">
                                                                                <textarea rows="5" cols="5" style="resize: none;" name="servis_nedeni" class="form-control"
                                                                                placeholder="Servis Nedenini Yazınız"></textarea>
                                                                            </div>
                                                                </div>

                                                                 <div class="form-group row">
                                                                <label class="col-form-label" style="width:98px;margin-left:15px;">Talep Tarihi :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="date" name="talep_tarihi" class="form-control">
                                                                </div>
                                                            </div>  

                                                             <div class="form-group row">
                                                                <label class="col-form-label" style="width:98px;margin-left:15px;">Yapılış Tarihi :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="date" name="yapilis_tarihi" class="form-control">
                                                                </div>
                                                            </div>  

                                                             <div class="form-group row">
                                                                <label class="col-form-label" style="width:98px;margin-left:15px;">Alınacak Ucret :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="alinacak_ucret" class="form-control"
                                                                    placeholder="Alınacak Ucreti Giriniz">
                                                                </div>
                                                            </div>  
                                                             <div class="form-group row">
                                                                <label class="col-form-label" style="width:98px;margin-left:15px;">Alınan Ucret :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="alinan_ucret" class="form-control"
                                                                    placeholder="Alınan Ucreti Giriniz">
                                                                </div>
                                                            </div> 
                                                               <div class="form-group row">
                                                                            <label class="col-form-label" style="width:98px;margin-left:15px;">Dosya Seç:</label>
                                                                            <div class="col-sm-4">
                                                                                <input type="file" name="dosya" class="form-control">
                                                                            </div>
                                                                        </div>

                                                            <div class="form-group row">
                                                                    <label class="col-form-label" style="width:98px;margin-left:15px;">Durum :</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="durum" class="form-control">
                                                                            <option>Bekliyor</option>
                                                                            <option>Yapıldı</option>
                                                                        </select>
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