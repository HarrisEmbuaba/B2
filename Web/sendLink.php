<?php
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require "koneksi.php";
session_start();

        $kode =  rand(pow(10, 5 - 1), pow(10, 5) - 1); 
        $email = $_SESSION['email'];
        // $query1 = mysqli_query($mysqli, "SELECT `email` FROM `pemilik` WHERE `email` ='$email'");
        // $row = mysqli_fetch_array($query1);
        // $email = $row['email'];
        $query = mysqli_query($mysqli, "INSERT INTO `password_reset_temp`(`kode_verifikasi`, `status`, `email`) VALUES ('$kode','','$email')");

        //sesuaikan name dengan di form nya ya 
        $judul = "Verification Code for Your New Password.";
        $pesan = "Verification Code: $kode";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
  //Server settings
  $mail->SMTPDebug = 2;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'e41212346@student.polije.ac.id';                     //SMTP username
  $mail->Password   = '';                               //SMTP password
  $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
  $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //pengirim
  $mail->setFrom('', '');
  $mail->addAddress($email);     //Add a recipient

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = $judul;
  $mail->Body    = $pesan;
  $mail->AltBody = '';
  //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
  //$mail->addAttachment(''); 

  $mail->send();
  echo 'Message has been sent.';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}

echo "<script>alert('Email sent successfully!');window.location='resetPass2.php';</script>";

?>