<?php
include ('koneksi.php');

$id = $_GET["id"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $sql = "UPDATE transaksi SET status = 'Dibatalkan' WHERE transaksi_id ='$id' ";
    $result = mysqli_query($mysqli, $sql);

    //periksa query, apakah ada kesalahan
    if(!$result) {
      die ("Gagal mengubah status. Error code: ".mysqli_errno($mysqli).
       " - ".mysqli_error($mysqli));
    } else {
    echo "<script>alert('Status berhasil terupdate!');window.location='pesan2.php';</script>";
    }
?>

