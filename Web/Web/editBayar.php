<?php

include ('pesan2.php');

require ('koneksi.php');

if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  $sql = "UPDATE transaksi SET status='Sudah bayar' WHERE transaksi_id = $field2name";
  if (!mysqli_query($mysqli, $sql)){
    echo "<script>alert('Status berhasil terupdate!');window.location='pesan2.php';</script>";
  }
  
}

mysqli_close($mysqli);

?>