<?php
include ('koneksi.php');

// error_reporting(0);
// session_start();

if(isset($_SESSION['nama_barang'])){
  header("Location: produk2.php");


// $err = "";
// $sukses = "";
// $kode = "";

// $sql1 = "SELECT * FROM `barang`";
// $all_categories = mysqli_query($koneksi,$sql1);

// $result = mysqli_query($koneksi,$sql1);

if(isset($_POST['Insert'])){
//   $id = $_POST['id_barang'];
  $nama = $_POST['nama_barang'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  
  $image = $_FILES['image']['name'];
  $source = $_FILES['image']['tmp_name'];
  $folder = 'gambarproduk/';
  
  move_uploaded_file($source, $folder.$image);
  
  $nama = mysqli_real_escape_string($koneksi,$_POST['nama_barang']);

  $id_jenis = mysqli_real_escape_string($koneksi,$_POST['barang_jenis']);
  $id_ukuran = mysqli_real_escape_string($koneksi,$_POST['ukuran']);
  $id_warna = mysqli_real_escape_string($koneksi,$_POST['warna']);
  
  $sql2 = "INSERT INTO `barang`(`nama_barang`,`image`,`deskripsi`,`harga`,`stok`,`id_jenis`,`id_ukuran`,`id_warna`)
  VALUES ('$nama','$image','$deskripsi','$harga','$stok','$id_jenis','$id_ukuran','$id_warna')";
  
  $result = mysqli_query($koneksi,$sql2);

//   echo "<script>
//   eval(Location='produk2.php');
//   alert('Barang berhasil ditambahkan!');
//   </script>";

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
    $_FILES['image'] = "";
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

//   if(!$result->num_rows > 0){
    
    // $result = mysqli_query($koneksi,$sql);

    // if($result){
        
    // } else {
    //   echo "<script>
    //   eval(Location='produk2.php');
    //   alert('Barang gagal ditambahkan!');
    //   </script>";
    // }
}
?>




