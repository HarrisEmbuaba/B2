<?php
// Library untuk menggunakan PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//ini sesuaikan foldernya ke file 2 ini
require 'vendor/autoload.php';
require "koneksi.php";

        // Fungsi untuk membuat kode verifikasi, menyimpan kode verifikasi ke database dan mengirimkan kode verifikasi ke Email tujuan.
        $kode =  rand(pow(10, 5 - 1), pow(10, 5) - 1); 
        $email = $_POST['email'];
        $query = mysqli_query($mysqli, "INSERT INTO `password_reset_temp`(`kode_verifikasi`, `status`, `email`) VALUES ('$kode','','$email')");

        $judul = "Verification Code for Your New Password.";
        $pesan = "Verification Code: $kode";

$mail = new PHPMailer(true);
try {
  //Server settings
  $mail->isSMTP();                                              // Kirim email menggunakan metode SMTP
  $mail->Host       = 'smtp.gmail.com';                         // Host dari server SMTP
  $mail->SMTPAuth   = true;                                     // Aktifkan autekntifikasi SMTP 
  $mail->Username   = "variousra@gmail.com";                    // SMTP username (diaktifkan di pengaturan Gmail > keamanan > Login ke Google)
  $mail->Password   = 'rokcxezbgkjicjxh';                       // SMTP kode autentikasi (diaktifkan di pengaturan Gmail > keamanan > Login ke Google)
  $mail->SMTPSecure = 'ssl';                                    // Aktifkan enkripsi SSL implisit
  $mail->Port       = 465;                                      // TCP port untuk mengkoneksikan ke SMTP Server

  //pengirim
  $mail->setFrom('variousra@gmail.com', 'Various RA');
  $mail->addAddress($email);     //email penerima

  //Content
  $mail->isHTML(true);                                          // Kirim format Email ke HTML
  $mail->Subject = $judul;
  $mail->Body    = $pesan;
  $mail->AltBody = '';
  //$mail->AddEmbeddedImage('gambar/logo.png', 'logo');         //abaikan jika tidak ada logo
  //$mail->addAttachment(''); 

  if (!$mail->send()){
    echo "<script>alert('Message could not be sent to $email')</script>";
  } else {
    echo "<script>alert('Email sent successfully to $email!');window.location='inputCodeOTP.html';</script>";
  }
  
} catch (Exception $e) {
  echo "Mailer Configuration error. Can't send to $email. Cause: {$mail->ErrorInfo}";

  // Aktifkan error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
}
?>