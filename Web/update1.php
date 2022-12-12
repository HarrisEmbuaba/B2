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

// $sql = "UPDATE transaksi SET status='Dibatalkan' WHERE transaksi_id = $field2name";

if(isset($_GET['date'])){
	$query = "SELECT `alamat`.`alamat`,`transaksi`.`transaksi_id`, `barang`.`nama_barang`,`barang`.`image` , `transaksi`.`qty`, `pembeli`.`nama` , `transaksi`.`pembayaran`, `transaksi`.`total`,`transaksi`.`status` FROM `transaksi` JOIN `barang` on `transaksi`.`id_barang` = `barang`.`id_barang` JOIN `pembeli` ON `transaksi`.`id_user` = `pembeli`.`id_user` JOIN `alamat` ON `transaksi`.`id_alamat`  = `alamat`.`id_alamat` WHERE `transaksi`.`transaksi_id` = '" . $_GET['search'] . "' AND status = 'Dikemas' ORDER BY `waktu_transaksi` DESC";
  } else{
	$query = "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and status = 'Dikemas' ORDER BY `waktu_transaksi` DESC ";
  
  }

?>