<?php
include ('koneksi.php');

$id = $_GET["id"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $sql = "DELETE FROM barang WHERE id_barang='$id' ";
    $result = mysqli_query($mysqli, $sql);

    //periksa query, apakah ada kesalahan
    if(!$result) {
      die ("Gagal menghapus data: ".mysqli_errno($mysqli).
       " - ".mysqli_error($mysqli));
    } else {
    echo "<script>alert('Data berhasil dihapus.');window.location='produk2.php';</script>";
    }

?>
