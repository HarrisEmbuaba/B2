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

$sql = "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and nama_barang = '$cari' ORDER BY `waktu_transaksi` DESC";
$cari = $_GET['nama_barang'];

if (mysqli_query($conn, $sql)){
}
 
if(isset($_GET['cari'])){
	$cari = $_GET['nama_barang'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}

	// if(isset($_GET['cari'])){
	// 	$cari = $_GET['cari'];
	// 	$data = mysqli_query($conn,"select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and `nama_barang` = 'seserahan' ORDER BY `waktu_transaksi` DESC");				
	// }else{
	// 	$data = mysqli_query($conn, "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and `nama_barang` = 'seserahan' ORDER BY `waktu_transaksi` DESC");		
	// }

	// while($d = mysqli_fetch_array($data)){

  // } 

mysqli_close($conn);

?>