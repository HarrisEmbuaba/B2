<?php

require 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Notifikasi</title>
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
        <span class="d-none d-lg-block">Milania Craft</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
        </li>

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="notifikasi.php" data-bs-toggle="dropdown">
            <img src="assets/img/notif1.png"alt="" width="30px" height="30px"></i>
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
          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="pesan2.php">
          <img src="assets/img/pesan.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="kirim2.php">
          <img src="assets/img/kirim.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="produk2.php">
          <img src="assets/img/produk.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="bayar.php">
          <img src="assets/img/bayar.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Bayar Page Nav -->
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <img src="assets/img/logout.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Logout Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <section class="section home">
      <div class="row">

        
        <div>
          <div class="row">
          <div class="col-xxl-50 col-xl-12">
            <div class="card">
              <div class="card-body pt-3">
                <h1>Notifikasi</h1>                
                <u class="nav nav-tabs nav-tabs-bordered"></u>
                <div class="mb-4">
                  <div class="py-3">

                <h4>Pesanan Baru</h4>
                <!-- DataTales Example -->
                <div class="mb-4">
                  <div class="py-3">
                        <?php 
                        if(isset($_GET['search'])){
                          $query = "SELECT transaksi.transaksi_id, pembeli.id_user, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN pembeli ON pembeli.id_user = transaksi.id_UserBeli WHERE status = 'Belum Bayar' AND `transaksi`.`transaksi_id` = '" . $_GET['search'] ."' ORDER BY transaksi_id DESC";
                          
                        } else{
                          $query = "SELECT transaksi.transaksi_id, pembeli.id_user, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN pembeli ON pembeli.id_user = transaksi.id_UserBeli WHERE status = 'Belum Bayar' ORDER BY transaksi_id DESC";
                          
                        }
                        $no = 0; 
                      ?>
  
                    <!-- Table with stripped rows --> 
                    <table class="table table-borderless"> 
                      <thead> 
                        <tr>  
                          <th scope="col">Notifikasi</th> 
                        </tr> 
                      </thead> 
                      <tbody> 
                          <?php 
                          $id       = $_GET['transaksi_id'];
                          //cek dulu jika merubah gambar produk jalankan coding ini
                          $sql = "SELECT transaksi_id FROM transaksi WHERE transaksi_id ='$id' ";
                              $result = mysqli_query($mysqli, $sql);
                          
                              //periksa query, apakah ada kesalahan
                              if(!$result) {
                                die ("Gagal memuat notifikasi! Error code: ".mysqli_errno($mysqli).
                                 " - ".mysqli_error($mysqli));
                              } else {
                              //echo "<script>alert('Status berhasil terupdate!');window.location='pesan3.php';</script>";
                              echo "Pesanan dengan ID ".$id." telah diterima. Segera kemas!";
                              }     
                          ?> 
                        </tbody> 
                    </table>
                  </div>
                </div>
                <u class="nav nav-tabs nav-tabs-bordered"></u>
              </div>

              <div class="card-body pt-3">      

                <h4>Pesanan Diterima</h4>
                <!-- DataTales Example -->
                <div class="mb-4">
                  <div class="py-3">
                        <?php 
                        if(isset($_GET['search'])){
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, transaksi.grand_total, alamat.alamat_lengkap, transaksi.status, transaksi_detail.id_TransaksiDetail, barang.nama_barang, barang.image, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang JOIN pembeli ON pembeli.id_user = transaksi.id_UserBeli JOIN alamat ON transaksi.alamat = alamat.id_alamat WHERE status = 'diterima' AND `transaksi`.`transaksi_id` = '" . $_GET['search'] ."' ORDER BY transaksi_id DESC";
                          
                        } else{
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, transaksi.grand_total, alamat.alamat_lengkap, transaksi.status, transaksi_detail.id_TransaksiDetail, barang.nama_barang, barang.image, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang JOIN pembeli ON pembeli.id_user = transaksi.id_UserBeli JOIN alamat ON transaksi.alamat = alamat.id_alamat WHERE status = 'diterima' ORDER BY transaksi_id DESC";
                          
                        }
                        $no = 0; 
                      ?>
  
                    <!-- Table with stripped rows --> 
                    <table class="table table-borderless"> 
                      <thead> 
                        <tr> 
                          <th scope="col">Notifikasi</th> 
                        </tr> 
                      </thead> 
                      <tbody> 
                          <?php 
                              if ($result = $mysqli->query($query)) { 
                                  while ($row = $result->fetch_assoc()) { 
                                      $field1name = "Pesanan dengan ID  telah diterima! Cek informasi lengkapnya.";
      
                                      echo '<tr>     
                                              <td>'.$field1name.'</td>  
                                              <td>  
                                              <a href="detailNotif.php" data-toggle="modal" data-target="#modal">Lihat Pesan</a>
                                              <a> | </a>
                                              <a href="hapusNotif.php" data-toggle="modal" data-target="#modal">Hapus</a> 
                                              </td>
                                          </tr>'; 
                                  } 
                                  $result->free(); 
                              }  
                          ?> 
                        </tbody> 
                    </table>
                  </div>
                </div> 
                <u class="nav nav-tabs nav-tabs-bordered"></u>
              </div>

              <div class="card-body pt-3">      

                <h4>Pesanan Dibatalkan</h4>
                <!-- DataTales Example -->
                <div class="mb-4">
                  <div class="py-3">
                        <?php 
                        if(isset($_GET['search'])){
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, transaksi.grand_total, alamat.alamat_lengkap, transaksi.status, transaksi_detail.id_TransaksiDetail, barang.nama_barang, barang.image, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang JOIN pembeli ON pembeli.id_user = transaksi.id_UserBeli JOIN alamat ON transaksi.alamat = alamat.id_alamat WHERE status = 'dibatalkan' AND `transaksi`.`transaksi_id` = '" . $_GET['search'] ."' ORDER BY transaksi_id DESC";
                          
                        } else{
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, transaksi.grand_total, alamat.alamat_lengkap, transaksi.status, transaksi_detail.id_TransaksiDetail, barang.nama_barang, barang.image, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang JOIN pembeli ON pembeli.id_user = transaksi.id_UserBeli JOIN alamat ON transaksi.alamat = alamat.id_alamat WHERE status = 'dibatalkan' ORDER BY transaksi_id DESC";
                          
                        }
                        $no = 0; 
                      ?>
  
                    <!-- Table with stripped rows --> 
                    <table class="table table-borderless"> 
                      <thead> 
                        <tr> 
                          <th scope="col">Notifikasi</th> 
                        </tr> 
                      </thead> 
                      <tbody> 
                          <?php 
                              if ($result = $mysqli->query($query)) { 
                                  while ($row = $result->fetch_assoc()) { 
                                      $field1name = "Pesanan dengan ID  telah dibatalkan! Cek informasi lengkapnya.";
      
                                      echo '<tr>    
                                              <td>'.$field1name.'</td>  
                                              <td>  
                                              <a href="notifikasi3.php" data-toggle="modal" data-target="#modal">Lihat Pesan</a>
                                              <a> | </a>
                                              <a href="hapusNotif.php" data-toggle="modal" data-target="#modal">Hapus</a> 
                                              </td>
                                          </tr>'; 
                                  } 
                                  $result->free(); 
                              }  
                          ?> 
                        </tbody> 
                    </table>
                  </div>
                </div> 
                <u class="nav nav-tabs nav-tabs-bordered"></u>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

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