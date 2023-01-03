<?php
    require 'koneksi.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
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

    <!-- Messages Icon -->
    <a class="nav-link nav-icon" href="https://web.whatsapp.com/">
            <img src="assets/img/chat.png"alt="" width="30px" height="30px"></i>
            <span class="badge bg-success badge-number"></span>
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
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="kirim2.php">
          <img src="assets/img/kirim.png" width="35px" height="35px"></i>
        </a><br />
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="produk2.php">
          <img src="assets/img/produk.png" width="35px" height="35px"></i>
        </a><br />
      </li><!-- End Profile Page Nav -->

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

    <section class="section home">
      <div class="row">

        <!-- Left side columns -->
        <div>
          <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h3 class="card-title">Produk Terjual <span>| Bulan ini</span></h3>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <img src="assets/img/check-out.png" width="70px" height="70px"></i>
                    </div>
                    <div class="ps-3">
                    <h5><?php
                      include 'koneksi.php';
                      $tgl    =date("Y-m-d");
                      $sql = mysqli_query($mysqli, "SELECT SUM(jumlah) as qty FROM transaksi_detail JOIN transaksi ON transaksi_detail.id_TransaksiDetail = transaksi.transaksi_id WHERE transaksi.waktu_pembayaran='$tgl'");
                      while($data = mysqli_fetch_array($sql)) {
                      ?>
                    
                          <h3><?php echo number_format($data['qty']) ;?></h3>
                      <?php
                      }
                      ?></h5>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Pendapatan<span> | Bulan ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <img src="assets/img/money.png" width="70px" height="70px"></i>
                    </div>
                    <h5><?php
                      include 'koneksi.php';
                      $tgl    =date("Y-m-d");
                      $sql = mysqli_query($mysqli, "SELECT SUM(grand_total) FROM transaksi WHERE waktu_pembayaran='$tgl'");
                      while($data = mysqli_fetch_array($sql)) {
                      ?>
                      <div class="ps-3">
                          <h3><?php echo "Rp." . number_format($data['SUM(grand_total)']) ;?></h3>
                      <?php
                      }
                      ?></h5>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Produk Terlaris</h5>

                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Gambar</th>
                        <th>Jenis Barang</th>
                        <th>Nama Produk</th>
                        <th>Sold</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include 'koneksi.php';
                      $sql = mysqli_query($mysqli, "SELECT barang.image, barang.barang_jenis, barang.nama_barang,  transaksi_detail.jumlah  FROM barang JOIN transaksi_detail ON barang.id_barang = transaksi_detail.id_BarangDetail ORDER BY transaksi_detail.jumlah DESC LIMIT 3");
                      while ($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                        <td style="text-align: center;"><img src="gambarproduk/<?php echo $data['image']; ?>"></td>
                        <td> <?php echo $data['barang_jenis']; ?> </td>
                        <td> <?php echo $data['nama_barang']; ?> </td>
                        <td> <?php echo $data['jumlah']; ?> </td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

        </div><!-- End Left side columns -->
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