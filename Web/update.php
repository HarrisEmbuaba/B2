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

if(isset($_GET['update'])){
	$name = $_GET['transaksi_id'];
	//$query = "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and status = 'Dikirim' ORDER BY `waktu_transaksi` DESC ";
	$query = "SELECT `alamat`.`alamat`,`transaksi`.`transaksi_id`, `barang`.`nama_barang`,`barang`.`image` , `transaksi`.`qty`, `pembeli`.`nama` , `transaksi`.`pembayaran`, `transaksi`.`total`,`transaksi`.`status` FROM `transaksi` JOIN `barang` on `transaksi`.`id_barang` = `barang`.`id_barang` JOIN `pembeli` ON `transaksi`.`id_user` = `pembeli`.`id_user` JOIN `alamat` ON `transaksi`.`id_alamat`  = `alamat`.`id_alamat` WHERE `transaksi`.`transaksi_id` = '" . $_GET['search'] . "';";
	//$no = 0;
	$query_run = mysqli_query($conn, $query);
	if(mysqli_num_rows($query_run) > 0){
		foreach($query_run as $items){
			?>
			<tr>
				<td><?= $items['transaksi_id']?></td>
				<td><?= $items['transaksi_id']?></td>
				<td><?= $items['transaksi_id']?></td>
				<td><?= $items['transaksi_id']?></td>
			</tr>
			<?php 
		}
	} else {
		?>
		<tr>
			<td  colspan="4">No Record Found</td>
		</tr>
		<?php
	}
} 

?>

<html>
	<head>
		<body>
			<div class="searchbox" id="search">
				<form action="localhost/" id="search">
					<label class="hidden" for="search-1" style="display: none;">Search course</label>
					<div class="search-box grey-box bg-white clear-fix" id="search">
						<input placeholder="Search Course" class="search_tour bg-white no-border left search-box__input ui-autocomplete-input" type="text" name="search" id="search-1" autocomplete="off">
						<button title="Search Courses" type="submit" class="no-border bg-white pas search-box__button">...</button>
					</div>
				</form>
			</div>
		</body>
	</head>
</html>