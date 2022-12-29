<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include ('koneksi.php');

// membuat variabel untuk menampung data dari form
$id            = $_POST['id'];
$nama_barang   = $_POST['nama_barang'];
$deskripsi     = $_POST['deskripsi'];
$harga         = $_POST['harga'];
$stok          = $_POST['stok'];
$barang_jenis  = $_POST['barang_jenis'];
$gambar_barang = $_FILES['image']['name'];
//cek dulu jika merubah gambar produk jalankan coding ini


if($gambar_barang != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_barang); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['image']['tmp_name'];  
  $gambar_barang = $_FILES['image']['name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_barang; //menggabungkan angka acak dengan nama file sebenarnya
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                move_uploaded_file($file_tmp, 'gambarproduk/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    
                  // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                  $sql  = "UPDATE `barang` SET `nama_barang` = '$nama_barang', `image` = '$nama_gambar_baru', `deskripsi` = '$deskripsi', `harga` = '$harga', `stok` = '$stok', `barang_jenis` = '$barang_jenis' WHERE `id_barang` = '$id'";
                  $result = mysqli_query($mysqli, $sql);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
                           " - ".mysqli_error($mysqli));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil diubah.');window.location='produk2.php';</script>";
                  }
            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya png, jpg atau jpeg.');window.location='produk2.php';</script>";
            }
  } else {
    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
    $sql  = "UPDATE `barang` SET `nama_barang` = '$nama_barang', `deskripsi` = '$deskripsi', `harga` = '$harga', `stok` = '$stok', `barang_jenis` = '$barang_jenis' WHERE `id_barang` = '$id'";
    $result = mysqli_query($mysqli, $sql);
    // periska query apakah ada error
    if(!$result){
          die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
                           " - ".mysqli_error($mysqli));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='produk2.php';</script>";
    }
  }        

?>