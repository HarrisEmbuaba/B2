<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include ('koneksi.php');

require 'kirim2.php';

// membuat variabel untuk menampung data dari form
//$id       = $_GET['transaksi_id'];
//cek dulu jika merubah gambar produk jalankan coding ini
$sql = "UPDATE transaksi SET status = 'Selesai' WHERE transaksi_id ='$field2name' ";
    $result = mysqli_query($mysqli, $sql);

    //periksa query, apakah ada kesalahan
    if(!$result) {
      die ("Gagal mengubah status. Error code: ".mysqli_errno($mysqli).
       " - ".mysqli_error($mysqli));
    } else {
    echo "<script>alert('Status berhasil terupdate!');window.location='kirim2.php';</script>";
    }
?>

