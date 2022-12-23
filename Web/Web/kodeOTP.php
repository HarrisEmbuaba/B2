<?php
require ('koneksi.php');
include ('inputCodeOTP.html');

// Ambil alamat email dan kode OTP yang dimasukkan pengguna
$email = $_POST['email'];
$otp = $_POST['kodeotp'];

// Validasi input
if (!empty($email) && !empty($otp)) {
    // Hubungi database
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Cari kode OTP yang terkait dengan alamat email yang dimasukkan pengguna
    $query = "SELECT * FROM users WHERE email='$email' AND otp='$otp'";
    $result = mysqli_query($conn, $query);

    // Jika kode OTP sesuai dengan yang terdaftar di database
    if (mysqli_num_rows($result) > 0) {
        // Pindah ke halaman selanjutnya
        header('location: next.php');
    } else {
    // Tampilkan pesan error jika kode OTP salah
    echo "Kode OTP Salah";
    }
    } else {
    // Tampilkan pesan error jika alamat email atau kode OTP kosong
    echo "Harap masukkan alamat email dan kode OTP dengan benar";
}