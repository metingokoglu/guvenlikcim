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
                                                <h5>Mesaj Görüntüleme Sayfasi</h5>
                                               
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
                                                                <th>Sıra</th>
                                                                <th>Ad ve Soyad</th>
                                                                <th>Email</th>
                                                                <th>Konu</th>
                                                                <th>Mesaj</th>
                                                                <th>Tarih</th>
                                                                <th>Saat</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                              <?php 
											                      $sql =mysqli_query($con,"select * from mesajlar");

											                      while ($veri=mysqli_fetch_assoc($sql)) {
											                    ?>
																			<tr>
																			  <th scope="row"><?php echo $veri['mesaj_id']; ?></th>
																			  <td><?php echo $veri['mesaj_isim']; ?></td>
																			  <td><?php echo $veri['mesaj_email']; ?></td>
																			  <td><?php echo $veri['mesaj_konu']; ?></td>
																			  <td><?php echo $veri['mesaj_mesaj']; ?></td>
																			  <td><?php echo $veri['mesaj_tarih']; ?></td>
																			  <td><?php echo $veri['mesaj_saat']; ?></td>
																			  <td><a href="mesajsil.php?id=<?php echo $veri['mesaj_id']; ?>"> Mesaj Sil</a></td>
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