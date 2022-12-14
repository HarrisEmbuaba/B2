<?php

include ('pesan2.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project3";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE transaksi SET status='Belum dikirim' WHERE transaksi_id = $field2name";

if (mysqli_query($conn, $sql)){
} else {
  echo "<script>Tidak ada data!</script>";
  echo "<script>alert('Data berhasil ditambah.');window.location='pesan2.php';</script>";
}


mysqli_close($conn);

?>