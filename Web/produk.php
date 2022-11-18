<?php
include ('koneksi.php');
include ('produk.html');

error_reporting(0);
session_start();

if(isset($_SESSION['id_barang'])){
  header("Location: produk.php");
}

$err = "";
$sukses = "";
$kode = "";

if(isset($_POST['Submit'])){
  // $kode = $_POST['id_barang'];
  $nama = $_POST['nama_barang'];
  $image = $_POST['image'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $warna = $_POST['warna'];
  $ukuran = $_POST['ukuran'];
  $kategori = $_POST['barang_jenis'];

  if(!$result->num_rows > 0){
    $sql1 = "INSERT INTO `barang`('id_barang',`nama_barang`,`image`,`deskripsi`)
    VALUES ('','$nama','$image','$deskripsi')";
    $sql2 = "INSERT INTO `jenis_barang`(`id_jenis`,`barang_jenis`)
    VALUES ('','$kategori')";
    $sql3 = "INSERT INTO `jenis_ukuran`(`id_ukuran`,`ukuran`)
    VALUES ('','$ukuran')";
    $sql4 = "INSERT INTO `jenis_warna`(`id_warna`,`warna`)
    VALUES ('','$warna')";
    $sql5 = "INSERT INTO `detail_barang`(`id`,`harga`, `stok`)
    VALUES ('','$harga','$stok')";

    $result = mysqli_query($koneksi,$sql1,$sql2,$sql3,$sql4,$sql5);

    if($result){
      echo "<script>alert('Barang berhasil ditambahkan!')</script>";
      
      $nama = "";
      $image = "";
      $deskripsi = "";
      $harga = "";
      $stok = "";
      $warna = "";
      $ukuran = "";
      $kategori = "";
      $_POST['nama_barang'] = "";
      $_POST['image'] = "";
      $_POST['deskripsi'] = "";
      $_POST['harga'] = "";
      $_POST['stok'] = "";
      $_POST['warna'] = "";
      $_POST['ukuran'] = "";
      $_POST['barang_jenis'] = "";
    } else {
      echo "<script>alert('Barang gagal ditambahkan!')</script>";
    }
  }
}

?>
