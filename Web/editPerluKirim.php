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

$sql = "UPDATE transaksi SET status='Dikirim' WHERE transaksi_id = $transaksi_id";

if (mysqli_query($conn, $sql)){
  echo "<script>
  alert 'Data berhasil diupdate!'
  </script>";
} else {
  echo "<script>
  alert 'Tidak ada data!'
  </script>";
}


mysqli_close($conn);

?>