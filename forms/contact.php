<?php
require("class.phpmailer.php");
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "mail.birgad.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";

$mail->Username = "replay@birgad.com"; // Mail adresi
$mail->Password = '$iwD8;uf}9gn'; // Parola
$mail->SetFrom("replay@birgad.com", "Birgad Medya"); // Mail adresi

$mail->AddAddress("info@gudenotomotiv.com"); // Gönderilecek kişi

if (isset($_POST['subject'])) {
    $contact =  "İletişim Formu"  ."<br>" ."Ad Soyad: " . htmlspecialchars($_POST['name']) . "<br>" . "Telefon Numarası: " . htmlspecialchars($_POST['phone']) 
    . "<br>" . "Email: " . htmlspecialchars($_POST['email']) . "<br>"  . "Konu: " . htmlspecialchars($_POST['subject']).
    "<br>"  . "Mesaj: " . htmlspecialchars($_POST['message']);
} elseif (isset($_POST['phone_contact'])) {
    $contact =  "Bize Ulaşın Formu"  ."<br>" ."Ad Soyad: " . htmlspecialchars($_POST['name']) . "<br>" . "Telefon Numarası: " . htmlspecialchars($_POST['phone_contact']) ;
}



$mail->Subject = "Siteden Gönderildi";
$mail->Body = "$name<br />$email<br />$subject<br />$contact";

if(!$mail->Send()){
                echo "Mailer Error: ".$mail->ErrorInfo;
} else {
    
    if (isset($_POST['subject'])) {
    header("location:../iletisim.html");
} elseif (isset($_POST['phone_contact'])) {
    header("location:../index.html");
}
    
               
}
?>