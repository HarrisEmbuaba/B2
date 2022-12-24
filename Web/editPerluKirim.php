<?php

include ('kirim3.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project3";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE transaksi SET status='Dikirim' WHERE transaksi_id = $field2name";

if (mysqli_query($conn, $sql)){
  echo "<script>alert('Status berhasil terupdate!');window.location='kirim2.php';</script>";
} else {
  echo "<script>alert('Status gagal terupdate!');window.location='kirim2.php';</script>";
}


mysqli_close($conn);

?>