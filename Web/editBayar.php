<?php

require ('pesan2.php');

require ('koneksi.php');

if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
} else if (isset($_GET['transaksi_id'])) {

  $sql = "UPDATE `transaksi` SET `status`='Sudah bayar' WHERE transaksi_id = '$field2name'";
  if (mysqli_query($mysqli, $sql)) {
      
      echo "<script>alert('Status berhasil terupdate!')</script>";
      header("Location: pesan2.php");
  } else {
      echo "<script>alert('Status gagal terupdate!')</script>";
  }
}

mysqli_close($mysqli);

?>