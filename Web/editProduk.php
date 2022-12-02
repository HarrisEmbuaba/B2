<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include ('koneksi.php');

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id_barang'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $sql = "SELECT * FROM `barang` WHERE `id_barang`='$id'";
    $result = mysqli_query($mysqli, $sql);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($mysqli).
         " - ".mysqli_error($mysqli));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         


	// membuat variabel untuk menampung data dari form
  $id = $_POST['id_barang'];
  $nama_produk   = $_POST['nama_barang'];
  $deskripsi     = $_POST['deskripsi'];
  $harga         = $_POST['harga'];
  $gambar_produk = $_FILES['image']['name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['image']['tmp_name'];  
    $gambar_barang = $_FILES['image']['name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'gambarproduk/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                    $sql  = "UPDATE `barang` SET `nama_barang` = '$nama_produk', `image` = '$nama_gambar_baru', `deskripsi` = '$deskripsi', `harga` = '$harga'";
                    $sql .= "WHERE `id` = '$id'";
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
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='produk2.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $sql  = "UPDATE `barang` SET `nama_barang` = '$nama_produk', `deskripsi` = '$deskripsi', `harga` = '$harga'";
      $sql .= "WHERE `id_barang` = '$id'";
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

 
