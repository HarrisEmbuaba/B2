<?php
include ('koneksi.php');

$id = $_GET["id_barang"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM barang WHERE id_barang='$id' ";
    $result = mysqli_query($koneksi, $query);

    //periksa query, apakah ada kesalahan
    if(!$result) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
    echo "<script>alert('Data berhasil dihapus.');window.location='produk2.php';</script>";
    }

?>
