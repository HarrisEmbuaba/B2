<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

if(isset($_POST['tambah'])){
  // membuat variabel untuk menampung data dari form
  $nama_barang   = $_POST['nama_barang'];
  $deskripsi     = $_POST['deskripsi'];
  $harga         = $_POST['harga'];
  $stok          = $_POST['stok'];
  $barang_jenis  = $_POST['barang_jenis'];
  $gambar_barang = $_FILES['image']['name'];


  // $select_nama = $mysqli->prepare("SELECT * FROM barang WHERE nama_barang = ?");
  // $select_nama->execute([$nama_barang]);
  // $row = $select_barang->fetch(PDO::FETCH_ASSOC);

  // if($select_barang->rowCount() > 0){
  //    echo "<script>alert('Nama Barang Sudah Terdaftar. Gunakan Nama Barang yang Lain!')</script>";
  
     

  // }

//cek dulu jika ada gambar produk jalankan coding ini
if($gambar_barang != "") {
          $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
          $x = explode('.', $gambar_barang); //memisahkan nama file dengan ekstensi yang diupload
          $ekstensi = strtolower(end($x));
          $file_tmp = $_FILES['image']['tmp_name']; 
          $gambar_barang = $_FILES['image']['name'];  
          $angka_acak     = rand(1,999);
          $nama_gambar_baru = $angka_acak.'-'.$gambar_barang; //menggabungkan angka acak dengan nama file sebenarnya
              if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                      move_uploaded_file($file_tmp, 'gambarproduk/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                          // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                          $sql = "INSERT INTO `barang` (`nama_barang`, `image`, `deskripsi`, `harga`, `stok`, `barang_jenis`) VALUES ('$nama_barang', '$nama_gambar_baru', '$deskripsi', '$harga', '$stok', '$barang_jenis')";
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
                      echo "<script>alert('Ekstensi gambar yang boleh hanya  png, jpg atau jpeg.');window.location='tambahProduk.php';</script>";
                  }
  } else {
    $sql = "INSERT INTO `barang` (`nama_barang`, `image`, `deskripsi`, `harga`, `stok`, `barang_jenis`) VALUES ('$nama_barang', null, '$deskripsi', '$harga', '$stok', '$barang_jenis')";
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
}

?>




