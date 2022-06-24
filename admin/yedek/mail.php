<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include '../../baglan.php';

$sql = mysqli_query($con,"select * from yedek");
while ($veri=mysqli_fetch_array($sql)){
if ($veri['gonder']==0) {
  $mail = new PHPMailer(true); 
   $mail->SetLanguage("tr", "phpmailer/language");
    $mail->CharSet  ="utf-8";
    $mail->Encoding="base64";                             // Passing `true` enables exceptions
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'metingkgl35@gmail.com';                 // SMTP username
    $mail->Password = 'anixons2272609';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('metingkgl35@gmail.com', 'Metin');
    $mail->addAddress('metingkgl35@gmail.com', 'Metin');     // Add a recipient
    $mail->addAddress('metingkgl35@gmail.com');               // Name is optional

    //Attachments
    $mail->addAttachment($veri['dosya_yolu']);         // Add attachments
       // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'GUVENLİK-CİM YEDEK';
    $mail->Body    = 'GUVENLİK-CİM YEDEK';

    $mail->send();
    
       
    unlink($veri['dosya_yolu']);
    mysqli_query($con,"delete from yedek where yedek_id=".$veri['yedek_id']);
}


}
?>