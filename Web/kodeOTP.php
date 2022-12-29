<?php
require ('koneksi.php');
include ('inputCodeOTP.html');

session_start();

$email = $_SESSION['email'];
$otp = $_POST['kodeotp'];

// Validasi input
if (!empty($email) && !empty($otp)) {

    // Cari kode OTP yang terkait dengan alamat email yang dimasukkan pengguna
    $query = "SELECT kode_otp FROM pemilik WHERE email = '$email'";
    $result = mysqli_query($mysqli, $query);
    $check = mysqli_affected_rows($mysqli);
    
    if($check > 0){
        while($ambil = mysqli_fetch_object($result)){
            $kode = $ambil->kode_otp;
            if ($otp == $kode){
                echo "<script>alert('Email sent successfully to $email!');window.location='resetPass.php';</script>";
            } else {
                echo "<script>alert('Gagal Verifikasi! Kode OTP Salah')</script>";
            }
        }
    }
    else{
        echo "<script>alert('Masukkan Kode OTP')</script>";
    }

mysqli_close($mysqli);
}
?>