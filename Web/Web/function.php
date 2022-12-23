<?php
$database = "project3";
$host = "localhost";
$user = "root"; // ganti dengan username database km
$password = ""; // ganti dengan password database km

$mysqli = new mysqli($host,$user,$password,$database);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// $servername = "localhost";
// $username = "root";
// $password = "";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password);

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

function tampil($query) {
    global $mysqli;
    $result = mysqli_query($mysqli, $query);
    $rows = [];

    while($data = mysqli_fetch_assoc($result)) {
        $rows[] = $data;
    }

    return $rows;

}

function Cari($keyword){
    global $mysqli;
    $sql = mysqli_query ($mysqli, "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi.pembayaran, transaksi.total  FROM transaksi JOIN pembeli ON transaksi.id_user = pembeli.id_user JOIN barang ON transaksi.id_barang = barang.id_barang WHERE transaksi.transaksi_id like '%$keyword%' OR pembeli.nama like '%$keyword%' OR barang.nama_barang like '%$keyword%' OR transaksi.pembayaran like '%$keyword%'");
    
    return $sql;
}

?>