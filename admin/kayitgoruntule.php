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
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Kayit Silme Sayfası</h5>
                                               
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Dosya</th>
                                                                <th>Müşteri Adı</th>
                                                                <th>Telefon</th>
                                                                <th>Kalan Tutar</th>
                                                                <th>Durum</th>
                                                                <th>Güncelle</th>
                                                                <th>Sil</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php 
                                                         include '../baglan.php';
                                                              $sql=mysqli_query($con,"select * from yenikayit");

                                                              while ($veri=mysqli_fetch_assoc($sql)) {
                                                            ?>
                                                                        <tr>
                                                                          <td> <?php
                                                                            if ($veri['kayit_url']=="kayit/") {
                                                                                ?>
                                                                                <div class='btn-group dropdown-split-danger'>
                    <button type='button' class='btn btn-danger'><i class='icofont icofont-eye-alt'></i>Dosya Yok</button>
                   
                   
                </div>
                <?
                                                                            }else{
                                                                                ?>

                                                                            <a href='<?php echo $veri['kayit_url']; ?>' download><div class='btn-group dropdown-split-danger'>
                    <button type='button' class='btn btn-primary'><i class='icofont icofont-eye-alt'></i>Dosya İndir</button>
                   
                   
                </div></a>
                <?php
                                                                        }

                                                                           ?>


                                                                           </td>
                                                                          <td><?php echo $veri['musteri_adi']; ?></td>
                                                                          <td><?php echo $veri['telefon']; ?></td>
                                                                          <td><?php echo $veri['kalan_tutar']; ?></td>
                                                                          <td><?php echo $veri['durum']; ?></td>
                                                                          <td style="min-width: 100px"><a href="kayitguncelle.php?id=<?php echo $veri['id']; ?>"><div class="btn-group dropdown-split-danger">
                    <button type="button" class="btn btn-primary"><i class="icofont icofont-eye-alt"></i>Güncelle</button></div></a></td>
                                                                          <td style="min-width: 100px"><a href="kayitsil.php?id=<?php echo $veri['id']; ?>"><div class="btn-group dropdown-split-danger">
                    <button type="button" class="btn btn-danger"><i class="icofont icofont-eye-alt"></i>Bilgiyi Sil</button></div></a></td>
                                                                        </tr>
                                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
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