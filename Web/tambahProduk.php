<?php
//memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $nama_barang   = $_POST['nama_barang'];
  $gambar_barang = $_FILES['image']['name'];
  $deskripsi     = $_POST['deskripsi'];
  $harga_jual    = $_POST['harga'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gambar_barang != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_barang); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['image']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_barang; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambarproduk/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $sql = "INSERT INTO `barang` (`nama_barang`, `image`, `deskripsi`, `harga`) VALUES ('$nama_barang', '$nama_gambar_baru', '$deskripsi', '$harga')";
                  $result = mysqli_query($mysqli, $sql);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
                           " - ".mysqli_error($mysqli));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='produk2.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambahProduk.php';</script>";
            }
} else {
   $sql = "INSERT INTO `barang` (`nama_barang`, `image`, `deskripsi`, `harga`) VALUES ('$nama_barang', '$nama_gambar_baru', '$deskripsi', '$harga')";
                  $result = mysqli_query($mysqli, $sql);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
                           " - ".mysqli_error($mysqli));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='produk2.php';</script>";
                  }
}



// include ('koneksi.php');

// error_reporting(0);
// session_start();

// if(isset($_SESSION['nama_barang'])){
//   header("Location: produk2.php");


// $err = "";
// $sukses = "";
// $kode = "";

// $sql1 = "SELECT * FROM `barang`";
// $all_categories = mysqli_query($koneksi,$sql1);

// $result = mysqli_query($koneksi,$sql1);

// if(isset($_POST['tambah'])){
//   $id = $_POST['txt_id'];
//   $nama_barang = $_POST['txt_nama'];
  
//   $image = $_FILES['gambar']['name'];
//   $source = $_FILES['gambar']['tmp_name'];
//   $folder = 'gambarproduk/';
  
//   $deskripsi = $_POST['txt_deskripsi'];
//   $harga = $_POST['txt_harga'];

//   move_uploaded_file($source, $folder.$image);
//   $sql = "INSERT INTO `barang`(`id_barang`,`nama_barang`,`image`,`deskripsi`,`harga`)
//   VALUES ('$id','$nama_barang','$image','$deskripsi','$harga')";
  
//   $result = mysqli_query($mysqli,$sql);

//   echo "<script>
//   eval(\parent.location='produk2.php');
//   alert('Barang berhasil ditambahkan!');
//   </script>";

// //   if($result){
// //     echo "<script>alert('Barang berhasil ditambahkan!')</script>";
    
// //     $nama = "";
// //     $image = "";
// //     $deskripsi = "";
// //     $harga = "";
// //     $_POST['nama_barang'] = "";
// //     $_FILES['image'] = "";
// //     $_POST['deskripsi'] = "";
// //     $_POST['harga'] = "";
// //   } else {
// //     echo "<script>alert('Barang gagal ditambahkan!')</script>";
// //   }
// // }

// //   if(!$result->num_rows > 0){
    
//     // $result = mysqli_query($koneksi,$sql);

//     // if($result){
        
    // } else {
    //   echo "<script>
    //   eval(Location='produk2.php');
    //   alert('Barang gagal ditambahkan!');
    //   </script>";
    // }
  // }
?>




