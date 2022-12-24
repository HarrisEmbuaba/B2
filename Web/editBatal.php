<?php

include ('kirim2.php');

require 'koneksi.php';

// if ($mysqli -> connect_errno) {
//   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
//   header("Location: error-connect.php");
//   exit();
// }

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  header("Location: error-connect.php");
}

$sql = "UPDATE transaksi SET status='Dibatalkan' WHERE transaksi_id = $fielad2name";

if (mysqli_query($conn, $sql)){
  echo "<script>alert('Status berhasil terupdate!');window.location='kirim3.php';</script>";
} else {
  echo "<script>alert('Status gagal terupdate!');window.location='kirim3.php';</script>";
}

mysqli_close($conn);

?>