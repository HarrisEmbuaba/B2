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
            <img src="assets/img/notif.png"alt="" width="30px" height="30px"></i>
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
                <div class="card-body">
                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("chart1");
var myLineChart = new Chart(ctx, {
  type: 'line',

  <?php
  
  $data1 = $jan =date('Y-m-d', strtotime("-1 month", strtotime(date("Y-m-d"))));
  $data2 = $feb =date('Y-m-d', strtotime("-2 month", strtotime(date("Y-m-d"))));
  $data3 = $mar =date('Y-m-d', strtotime("-3 month", strtotime(date("Y-m-d"))));
  $data4 = $apr =date('Y-m-d', strtotime("-4 month", strtotime(date("Y-m-d"))));
  $data5 = $may =date('Y-m-d', strtotime("-5 month", strtotime(date("Y-m-d"))));
  $data6 = $jun =date('Y-m-d', strtotime("-6 month", strtotime(date("Y-m-d"))));
  $data7 = $jul =date('Y-m-d', strtotime("-7 month", strtotime(date("Y-m-d"))));
  $data8 = $aug =date('Y-m-d', strtotime("-8 month", strtotime(date("Y-m-d"))));
  $data9 = $sep =date('Y-m-d', strtotime("-9 month", strtotime(date("Y-m-d"))));
  $data10 = $oct =date('Y-m-d', strtotime("-10 month", strtotime(date("Y-m-d"))));
  $data11 = $nov =date('Y-m-d', strtotime("-11 month", strtotime(date("Y-m-d"))));
  $data12 = $des =date('Y-m-d', strtotime("-12 month", strtotime(date("Y-m-d"))));

  ?>
  data: {
    labels: ["<?php echo $data12; ?>", "<?php echo $data11; ?>", "<?php echo $data10; ?>", "<?php echo $data9; ?>", "<?php echo $data8; ?>", "<?php echo $data7; ?>", <?php echo $data6; ?>", "<?php echo $data5; ?>", "<?php echo $data4; ?>", "<?php echo $data3; ?>", "<?php echo $data2; ?>", "<?php echo $data1; ?>""],
    datasets: [{
      label: "Penghasilan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data6 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 6 day");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data12']; ?>
      <?php 
      }
      ?>, <?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data5 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 5 day");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data11']; ?>
      <?php 
      }
      ?>, <?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data4 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 4 day");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data10']; ?>
      <?php 
      }
      ?>, <?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data3 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 3 day;");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data9']; ?>
      <?php 
      }
      ?>, <?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data2 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 2 day");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data8']; ?>
      <?php 
      }
      ?> , <?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data1 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 1 day");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data7']; ?>
      <?php 
      }
      ?>,<?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data6 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 6 day");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data6']; ?>
      <?php 
      }
      ?>, <?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data5 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 5 day");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data5']; ?>
      <?php 
      }
      ?>, <?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data4 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 4 day");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data4']; ?>
      <?php 
      }
      ?>, <?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data3 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 3 day;");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data3']; ?>
      <?php 
      }
      ?>, <?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data2 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 2 day");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data2']; ?>
      <?php 
      }
      ?> , <?php
      $totaltransaksi  = mysqli_query($koneksi, "select COALESCE(SUM(subtotal),0) as data1 from transaksi where tanggal_transaksi = CURRENT_DATE() - interval 1 day");
      while ($row = mysqli_fetch_array($totaltransaksi)) {?>
      <?php echo $row['data1']; ?>
      <?php 
      }
      ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp.' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
</script>
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