<?php
require("koneksi.php");
require("inputCodeOTP.html");

if ($_POST){

    $email = $_POST['email'];
    $kodeotp = $_POST['kodeotp'];

    $query1 = "SELECT kode_otp FROM pemilik WHERE email = '$email'";
       
    $eksekusi = mysqli_query($koneksi, $query1);
    $cek = mysqli_affected_rows($koneksi);

    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"]= "Data Tersedia";
        $response["data"] = array();
    
        while($ambil = mysqli_fetch_object($eksekusi)){
            $kode = $ambil->kodeotp;
            array_push($response["data"], $kode);
        }
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Data Tidak Tersedia";
    }

    if ($kodeotp == $kode){
        echo "<script>alert('Berhasil Verifikasi');window.location='login.html';</script>";
      } else {
        echo "<script>alert('Gagal verifiikasi, kode verifikasi salah')</script>";
      }
}
echo json_encode($response);
mysqli_close($koneksi);
?>