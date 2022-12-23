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

        <!-- Left side columns -->
        <div>
          <div class="row">

            <!-- Pendapatan Penjualan Card -->
            <div class="col-xxl-25 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Pendapatan Penjualan | Bulan: 
                    <!-- <?php 
                    //$bulan = "SELECT waktu_transaksi FROM transaksi WHERE month(waktu_transaksi) = MONTH(CURRENT_DATE());";
                    ?> -->
                    <span></h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h5><?php
                      include 'koneksi.php';
                      $sql = mysqli_query($mysqli, "SELECT SUM(grand_total) FROM transaksi ORDER BY month(waktu_transaksi)");
                      while($data = mysqli_fetch_array($sql)) {
                      ?>
                      <div class="ps-3">
                          <h6><?php echo "Rp." . number_format($data['SUM(grand_total)']) ;?></h6>
                      <?php
                      }
                      ?></h5>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Pendapatan Penjualan Card -->

            <!-- Produk Terjual Card -->
            <div class="col-xxl-25 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Produk Terjual <span></h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h5><?php
                      include 'koneksi.php';
                      $sql = mysqli_query($mysqli, "SELECT SUM(jumlah) as qty FROM transaksi_detail");
                      while($data = mysqli_fetch_array($sql)) {
                      ?>
                      <div class="ps-3">
                          <h6><?php echo number_format($data['qty']) ;?></h6>
                      <?php
                      }
                      ?></h5>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <?php

                  require 'koneksi.php';
                  
                  $jan = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '01'";
                  $feb = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '02'";
                  $mar = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '03'";
                  $apr = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '04'";
                  $may = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '05'";
                  $jun = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '06'";
                  $jul = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '07'";
                  $aug = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '08'";
                  $sep = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '09'";
                  $oct = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '10'";
                  $nov = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '11'";
                  $des = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima' AND MONTH(waktu_transaksi) = '12'";
                  $all = "SELECT SUM(grand_total) FROM transaksi WHERE status = 'Diterima'";

                  $result1 = mysqli_query($mysqli, $jan);
                  $result2 = mysqli_query($mysqli, $feb);
                  $result3 = mysqli_query($mysqli, $mar);
                  $result4 = mysqli_query($mysqli, $apr);
                  $result5 = mysqli_query($mysqli, $may);
                  $result6 = mysqli_query($mysqli, $jun);
                  $result7 = mysqli_query($mysqli, $jul);
                  $result8 = mysqli_query($mysqli, $aug);
                  $result9 = mysqli_query($mysqli, $sep);
                  $result10 = mysqli_query($mysqli, $oct);
                  $result11 = mysqli_query($mysqli, $nov);
                  $result12 = mysqli_query($mysqli, $des);
                  $data = mysqli_query($mysqli, $all);

                  $mean = ($data/12);

                  ?>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [<?php echo $result1;?>, <?php echo $result1;?>, <?php echo $result1;?>, <?php echo $result1;?>,
                          <?php echo $result1;?>, <?php echo $result1;?>, <?php echo $result1;?>, <?php echo $result1;?>,
                          <?php echo $result1;?>, <?php echo $result1;?>, <?php echo $result1;?>, <?php echo $result1;?>
                        ],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41, 140000]
                        }, ],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

          </div>
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