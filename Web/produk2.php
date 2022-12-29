<?php
//memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

if(isset($_POST['tambah'])){
    // membuat variabel untuk menampung data dari form
    $nama_barang   = addslashes($_POST['nama_barang']);
    $deskripsi     = addslashes($_POST['deskripsi']);
    $harga         = addslashes($_POST['harga']);
    $gambar_barang = addslashes($_FILES['image']['name']);

    if ($_GET['hal'] == "edit") {
         

        //data akan diedit
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
                            $sql  = "UPDATE `barang` SET `nama_barang` = '$nama_barang', `image` = '$nama_gambar_baru', `deskripsi` = '$deskripsi', `harga` = '$harga'";
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
              $sql  = "UPDATE `barang` SET `nama_barang` = '$nama_barang', `deskripsi` = '$deskripsi', `harga` = '$harga'";
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
    
    }else {
        //cek dulu jika ada gambar produk jalankan coding ini
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
            $sql = "INSERT INTO `barang` (`nama_barang`, `image`, `deskripsi`, `harga`) VALUES ('$nama_barang', null, '$deskripsi', '$harga')";
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


//Pengujian jika tombol Edit / Hapus di klik
if(isset($_GET['hal'])) {
    //Pengujian jika edit Data
    if($_GET['hal'] == "edit") {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $id = $_GET["id"];

        // menampilkan data dari database yang mempunyai id=$id
        $sql = "SELECT * FROM `barang` WHERE `id_barang`='$id'";
        $result = mysqli_query($mysqli, $sql);
        // jika data gagal diambil maka akan tampil error berikut
            if(!$result){
            die ("Query Error: ".mysqli_errno($mysqli).
                " - ".mysqli_error($mysqli));
            }
            // mengambil data dari database
            $row = mysqli_fetch_assoc($result);
            // apabila data tidak ada pada database maka akan dijalankan perintah ini
            if (!count($row)) {
                echo "<script>alert('Data tidak ditemukan pada database');window.location='produk2.php';</script>";
            }
        } else {
            // apabila tidak ada data GET id pada akan di redirect ke index.php
            echo "<script>alert('Masukkan data id.');window.location='produk2.php';</script>";
        }   
        
    } else if ($_GET['hal'] == "hapus") {
        //mengambil id yang ingin dihapus
        $id = $_GET["id"];

        //jalankan query DELETE untuk menghapus data
        $sql = "DELETE FROM `barang` WHERE `id_barang`='$id' ";
        $result = mysqli_query($mysqli, $sql);

        //periksa query, apakah ada kesalahan
        if(!$result) {
        die ("Gagal menghapus data: ".mysqli_errno($mysqli).
        " - ".mysqli_error($mysqli));
        } else {
        echo "<script>alert('Data berhasil dihapus.');window.location='produk2.php';</script>";
        }    
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Produk</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo milanicraft.png" rel="icon">
  <link href="assets/img/logo milanicraft.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstraphome.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstraphome-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxiconshome.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/stylehome.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center">
      <a href="home.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" width="45px" height="45px">
        <span class="h2 position-absolute top-2 end-50">Milania Craft</span>
      </a>
    </div><!-- End Logo -->

    <!-- Notification Dropdown Items -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
        </li>
        <a class="nav-link nav-icon" href="notifikasi.php" data-bs-toggle="dropdown">
            <img src="assets/img/notif.png"alt="" width="30px" height="30px"></i>
            <span class="badge bg-primary badge-number">
              <?php 
              $query = "SELECT COUNT(*) FROM transaksi WHERE status = 'Belum bayar' OR status = 'Diterima' OR status = 'Dibatalkan'";
              $result = mysqli_query($mysqli, $query);
              $count = mysqli_fetch_row($result)[0];

              echo $count;
              ?>
            </span>
        </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Anda punya <?php echo $count;?> notifikasi belum dibaca!
              <a href="notifikasi.php"><span class="badge rounded-pill bg-primary p-2 ms-2">Lihat senua</span></a>
          </li>
        </ul>
    <!-- End Notification Dropdown Items -->

    <!-- Messages Icon -->
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <img src="assets/img/chat.png"alt="" width="30px" height="30px"></i>
          <span class="badge bg-success badge-number">99+</span>
        </a>
    <!-- End Messages Icon -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    <br />

      <li class="nav-item">
        <a class="nav-link collapsed" href="pesan2.php">
          <img src="assets/img/pesan.png" width="40px" height="40px"></i>
        </a><br />
      </li><!-- End Pesan Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="kirim2.php">
          <img src="assets/img/kirim.png" width="35px" height="35px"></i>
        </a><br />
      </li><!-- End Kirim Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="produk2.php">
          <img src="assets/img/produk1.png" width="35px" height="35px"></i>
        </a><br />
      </li><!-- End Produk Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="bayar.php">
          <img src="assets/img/bayar.png" width="35px" height="35px"></i>
          </a><br/><br /><br /><br /><br /><br /><br /><br />
      </li><!-- End Bayar Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <img src="assets/img/logout.png" width="35px" height="35px"></i>
        </a>

      </ul>
      </aside><!-- End Sidebar-->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Apakah Anda Yakin Ingin Logout?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">Pilih "Keluar" jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="logout.php" method="POST">
                  <button type="submit" name="logout_btn" class="btn btn-primary" herf="login.html">Keluar</button>
                </form>
            </div>
          </div>
        </div>
      </div>

      <!-- EndLogout Modal -->

  <main id="main" class="main">

    
    <section class="section profile">

        <div class="col-xxl-50 col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <h1>Produk</h1>                
                <u class="nav nav-tabs nav-tabs-bordered"></u>
                <div class="mb-4">
                  <div class="py-3">
              <!-- Bordered Tabs -->
              
                       
              <div class="tab-content pt-1">

                  <!-- partial:index.partial.html -->
                  <!-- No Labels Form -->

                  <div class="py-3">
                      <h6 class="m-0 font-weight-bold text-primary"></h6>
                  </div>
                  <div class="card-body">
                  <form class="row g-2" method="post" action="tambaheditProduk.php" enctype="multipart/form-data">
                    <!-- <label for="kode" class="col-sm-1 col-form-label">Kode Barang</label>
                    <div class="col-md-2">
                        <select name="id_barang" class="form-control">
                        </select>
                    </div> -->

                    
                          <tr>
                            <td>
                            <div class="col-md-3"></div>
                            <label for="nama" class="col-sm-1 col-form-label">Nama</label>
                            <div class="col-md-4">
                              <input type="text" name="nama_barang" value="<?=@$row['nama_barang']?>" class="datepicker-trigger form-control hasDatepicker" required>
                            </div>
                            </td>
                          <tr>
                          <td>
                          <div class="py-1"></div>
                          <div class="col-md-3"></div>
                            <label for="stok" class="col-sm-1 col-form-label">Harga</label>
                              <div class="col-md-4">
                                <input type="text" name="harga" value="<?=@$row['harga']?>" class="form-control" required>
                              </div>
                              
                            </td>
                          </tr>
                            
                          <tr>
                          <td>
                          <div class="py-1"></div>
                          <div class="col-md-3"></div>
                                <label for="image" class="col-sm-1 col-form-label">File Upload</label>
                                <div class="col-md-4">
                                  <input type="file" name="image" value="<?=@$row['image']?>" class="form-control" required>
                              </div>
                            </td>
                          </tr>

                            <th>
                            <div class="py-1"></div>
                            <div class="col-md-3"></div>
                            <label for="deskripsi" class="col-sm-1 col-form-label">Deskripsi</label>
                            <div class="col-md-4">
                              <textarea type="text" name="deskripsi" value="<?=@$row['deskripsi']?>" class="form-control" required cols="30" rows="10"></textarea>
                            </div>
                            

                            </th>
                          </tr>
                    
                    
                    <div class="py-4">
                      
                        <div class="text-center">
                          <button type="reset" class="btn btn-danger" name="breset">Clear</button>  &nbsp; &nbsp;
                          <button type="submit" name="tambah" class="btn btn-primary">Save</button>
                        </div>
                      
                    </div>
                  </form>
                </div>

                  <div class="card-body">
                  <form method="POST">
                    <div class="input-group mb-3">
                      <input type="text" name="tcari" class="form-control" value="<?php echo $_POST['tcari']; ?>">
                      <button type="reset" class="btn btn-light" name="breset">X</button>
                      <button type="submit" name="bcari" class="btn btn-warning pl-4 pr-4">Cari</button>
                    </div>
                  </form>
                  </div>
                  
                  <!-- DataTales Example -->
                <div class="mb-4">
                  <div class="py-3">
                      <h6 class="m-0 font-weight-bold text-primary"></h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          //untuk meinclude kan koneksi
                          include('koneksi.php');
                          
                          $no = 1;

                          if(isset($_POST['bcari'])) {
                          //menampung variabel kata_cari dari form pencarian
                          $cari = $_POST['tcari'];

                          //jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
                          //jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
                            $query = "SELECT * FROM barang WHERE nama_barang like '%".$cari."%' OR harga like '%".$cari."%' ORDER BY id_barang ASC";
                          } else {
                          //jika tidak ada pencarian, default yang dijalankan query ini
                            $query = "SELECT * FROM barang ORDER BY id_barang DESC";
                          } 

                          
                          $result = mysqli_query($mysqli, $query);

                          if(!$result) {
                            die("Query Error : ".mysqli_errno($mysqli)." - ".mysqli_error($mysqli));
                          }
                          //kalau ini melakukan foreach atau perulangan
                          while ($row = mysqli_fetch_assoc($result)) {
                          ?> 
                                <tr>  
                                  <th><?php echo $no; ?></th> 
                                  <td><?php echo $row['nama_barang']; ?></td> 
                                  <td style="text-align: center;"><img src="gambarproduk/<?php echo $row['image']; ?>" style="width: 120px;"></td> 
                                  <td><?php echo $row['deskripsi']; ?></td> 
                                  <td>Rp.<?php echo $row['harga']; ?></td> 
                                  <td>
                                    <a href="produk2.php?hal=edit&id=<?php $row["id_barang"];?>" class="btn btn-warning">Edit</a> &nbsp; &nbsp;
                                    <a href="hapusProduk.php?id=<?php echo $row["id_barang"]; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                  </td>
                                </tr>
                                <?php
                                $no++;
                              }
                              $result->free();
                            ?>
                        </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Milania Craft</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstraphome.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validatehome.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/mainhome.js"></script>

</body>

</html>