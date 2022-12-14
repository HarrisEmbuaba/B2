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
            <span class="badge bg-primary badge-number">99+</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Anda punya 99+ Notifikasi belum dibaca!
              <a href="notifikasi.php"><span class="badge rounded-pill bg-primary p-2 ms-2">Lihat senua</span></a>
            </li>
          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="chat.php" data-bs-toggle="dropdown">
            <img src="assets/img/chat.png"alt="" width="30px" height="30px"></i>
            <span class="badge bg-success badge-number">99+</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              Anda punya 99+ pesan baru belum dibaca!
              <a href="chat.php"><span class="badge rounded-pill bg-primary p-2 ms-2">Lihat</span></a>
            </li>
          </ul><!-- End Messages Dropdown Items -->
        </li><!-- End Profile Nav -->

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
        <a class="nav-link collapsed" href="kirim3.php">
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
                <ul class="d-flex align-items-center">
                <div class="filter">
                  <a class="icon ms-auto" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Perhari</a></li>
                    <li><a class="dropdown-item" href="#">Perbulan</a></li>
                    <li><a class="dropdown-item" href="#">Pertahun</a></li>
                  </ul>
                </div>
                </ul>
                
                <u class="nav nav-tabs nav-tabs-bordered"></u>
                <div class="py-3">
                <div class="">
                  <h5><?php 
                  if(isset($_POST)){
                    echo "Pesanan baru telah diterima!";
                  } 
                  ?>
                  <h6>Kamu mendapatkan pesanan baru dari
                    <?php 
                    if(isset($POST['transaksi_id'])){
                      $name = $_GET['transaksi_id'];
                      //$query = "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and status = 'Dikirim' ORDER BY `waktu_transaksi` DESC ";
                      $query = "SELECT `transaksi`.`transaksi_id`, `pembeli`.`nama` FROM `transaksi` WHERE `transaksi`.`transaksi_id` = `pembeli`.`id_user`'" . $_GET['transaksi_id'] . "';";
                      //$no = 0;
                      $query_run = mysqli_query($conn, $query);
                    }
                  ?></h6>
                  </h5>
                <u class="nav nav-tabs nav-tabs-bordered"></u>
                </div>

                <div class="py-3">
                  <h5><?php 
                  if(isset($_POST)){
                    echo "Pesanan telah diterima!";
                  } 
                  ?>
                  <h6>Barang telah diterima oleh pembeli 
                    <?php 
                    if(isset($POST['transaksi_id'])){
                      $name = $_GET['transaksi_id'];
                      //$query = "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and status = 'Dikirim' ORDER BY `waktu_transaksi` DESC ";
                      $query = "SELECT `transaksi`.`transaksi_id`, `pembeli`.`nama` FROM `transaksi` WHERE `transaksi`.`transaksi_id` = '" . $_GET['transaksi_id'] . "';";
                      //$no = 0;
                      $query_run = mysqli_query($conn, $query);
                    }
                  ?></h6>
                  </h5>
                <u class="nav nav-tabs nav-tabs-bordered"></u>
                </div>

                
                  <h5><?php 
                  if(isset($_POST)){
                    echo "Pesanan telah dibatalkan!";
                  } 
                  ?>
                  <h6>Pesanan telah dibatalkan! 
                    <?php 
                    if(isset($POST['transaksi_id'])){
                      $name = $_GET['transaksi_id'];
                      //$query = "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and status = 'Dikirim' ORDER BY `waktu_transaksi` DESC ";
                      $query = "SELECT `transaksi`.`transaksi_id`, `pembeli`.`nama` FROM `transaksi` WHERE `transaksi`.`transaksi_id` = '" . $_GET['transaksi_id'] . "';";
                      //$no = 0;
                      $query_run = mysqli_query($conn, $query);
                    }
                  ?></h6>
                  </h5>
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