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
                                                        <h5>Müşteri Ekleme Formu</h5>
                                                       
                                                    </div>
                                                    <div class="card-block">
                                                        <h4 class="sub-title">Müşteri Ekle</h4>
                                                        <form action="musteriekle.php" method="post" enctype="multipart/form-data">

                                                           <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;" enctype="multipart/form-data":15px;">Müşteri Kodu :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="musteri_kodu" class="form-control"
                                                                    placeholder="Müşteri Kodunu Giriniz">
                                                                </div>
                                                            </div>
                                                             <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Tarih :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="date" name="tarih" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Müşteri Adı :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="musteri_adi" class="form-control"
                                                                    placeholder="Müşteri Adını Giriniz">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Telefon :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="telefon" class="form-control"
                                                                    placeholder="Telefon Numarasını Giriniz">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                            <label class="col-form-label" style="width:90px;margin-left:15px;">Adres :</label>
                                                                            <div class="col-sm-4">
                                                                                <textarea rows="5" cols="5" style="resize: none;" name="adres" class="form-control"
                                                                                placeholder="Adres Giriniz"></textarea>
                                                                            </div>
                                                             </div>
                                                             <div class="form-group row">
                                                                    <label class="col-form-label" style="width:90px;margin-left:15px;">Sistem :</label>
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
                                                                    <label class="col-form-label" style="width:90px;margin-left:15px;">Marka :</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="marka" class="form-control">
                                                                            <option>Neutron</option>
                                                                            <option>Haikon</option>
                                                                            <option>Retro</option>
                                                                            <option>Beylerbeyi</option>
                                                                            <option>Avenir</option>
                                                                            <option>Dsc</option>
                                                                            <option>Paradox</option>
                                                                            <option>Crow</option>
                                                                            <option>Multitech</option>
                                                                            <option>Audio</option>
                                                                            <option>Diğer</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-form-label" style="width:90px;margin-left:15px;">Model :</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="model" class="form-control">
                                                                            <option>4</option>
                                                                            <option>8</option>
                                                                            <option>16</option>
                                                                            <option>32</option>
                                                                            <option>64</option>
                                                                            <option>Diğer</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                             <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Ürün Bilgisi :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="urun_bilgisi" class="form-control"
                                                                    placeholder="Ürün Bilgisini Giriniz">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                    <label class="col-form-label" style="width:90px;margin-left:15px;">Hdd :</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="hdd" class="form-control">
                                                                            <option>320 GB</option>
                                                                            <option>500 GB</option>
                                                                            <option>1 TB</option>
                                                                            <option>2 TB</option>
                                                                            <option>3 TB</option>
                                                                            <option>4 TB</option>
                                                                            <option>6 TB</option>
                                                                            <option>Diğer</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                      
                                                             


                                                             <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">S/N Bilgisi :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="sn_bilgisi" class="form-control"
                                                                    placeholder="Seri Numarasını Giriniz">
                                                                </div>
                                                            </div>  
                                                             <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">IP Bilgisi :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="ip_bilgisi" class="form-control"
                                                                    placeholder="IP Bilgisini Giriniz">
                                                                </div>
                                                            </div> 
                                                            <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Port Bilgisi :</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="port_bilgisi" class="form-control"
                                                                    placeholder="Port Bilgisini Giriniz">
                                                                </div>
                                                            </div> 
                                                              <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Kullanıcı Adı :</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="kadi_user1" class="form-control"
                                                                    placeholder="Kullanıcı Adı">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="sifre_user1" class="form-control"
                                                                    placeholder="Şifre">
                                                                </div>
                                                            </div> 
                                                            <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Kullanıcı Adı :</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="kadi_user2" class="form-control"
                                                                    placeholder="Kullanıcı Adı">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="sifre_user2" class="form-control"
                                                                    placeholder="Şifre">
                                                                </div>
                                                            </div> 
                                                            <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Kullanıcı Adı :</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="kadi_user3" class="form-control"
                                                                    placeholder="Kullanıcı Adı">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="sifre_user3" class="form-control"
                                                                    placeholder="Şifre">
                                                                </div>
                                                            </div> 
                                                            <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Kullanıcı Adı :</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="kadi_user4" class="form-control"
                                                                    placeholder="Kullanıcı Adı">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="sifre_user4" class="form-control"
                                                                    placeholder="Şifre">
                                                                </div>
                                                            </div> 
                                                              <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Kullanıcı Adı :</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="kadi_user5" class="form-control"
                                                                    placeholder="Kullanıcı Adı">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="sifre_user5" class="form-control"
                                                                    placeholder="Şifre">
                                                                </div>
                                                            </div> 
                                                            <div class="form-group row">
                                                                <label class="col-form-label" style="width:90px;margin-left:15px;">Kullanıcı Adı :</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="kadi_user6" class="form-control"
                                                                    placeholder="Kullanıcı Adı">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="sifre_user6" class="form-control"
                                                                    placeholder="Şifre">
                                                                </div>
                                                            </div> 
                                                            <div class="form-group row">
                                                                            <label class="col-form-label" style="width:90px;margin-left:15px;">Açıklama :</label>
                                                                            <div class="col-sm-4">
                                                                                <textarea rows="5" cols="5" style="resize: none;" name="aciklama" class="form-control"
                                                                                placeholder="Açıklama Giriniz"></textarea>
                                                                            </div>
                                                             </div>
                                                            <div class="form-group row">
                                                                            <label class="col-form-label" style="width:90px;margin-left:15px;">Dosya Seç:</label>
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