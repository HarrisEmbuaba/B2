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

// $sql = "UPDATE transaksi SET status='Dibatalkan' WHERE transaksi_id = $field2name";

if(isset($_GET['date'])){
	$name = $_GET['waktu_transaksi'];
	$name = $_POST['waktu_transaksi'];
	if(isset($_POST['date'])){
		$result = mysqli_query($conn, "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE waktu_transaksi '%$name%' ORDER BY transaksi_id ASC");
		
		
		if (mysqli_query($conn, $result)){
	
		}
	
	}
// } else {
// 	$name = $_GET['nama_barang'];
// 	$name = $_POST['nama_barang'];
// 	if(isset($_POST['Update'])){
// 		$result = mysqli_query($conn, "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE nama_barang '%$name%' ORDER BY transaksi_id ASC");
// 		$name = $_POST['nama_barang'];
		
// 		if (mysqli_query($conn, $result)){
	
// 		}
	
// 	}
}

mysqli_close($conn);

?>