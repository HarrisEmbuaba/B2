<?php
require "function.php";

$transaksi = tampil("SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi.pembayaran, transaksi.total  FROM transaksi JOIN pembeli ON transaksi.id_user = pembeli.id_user JOIN barang ON transaksi.id_barang = barang.id_barang ORDER BY transaksi_id ASC");


if(isset($_POST["Cari"])){
    $transaksi = Cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Penghasilan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link href="assets/css/stylebayar.css" rel="stylesheet">
  <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="js/jquery.min.js"></script> <!-- Load file jquery -->


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

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
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

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/chat.png"alt="" width="30px" height="30px"></i>
            <span class="badge bg-success badge-number">99+</span>
          </a><!-- End Messages Icon -->

        </li><!-- End Messages Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="pesan2.php">
          <img src="assets/img/pesan.png" width="40px" height="40px"></i>
        </a>
        
      </li><!-- End Pesan Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="kirim.php">
          <img src="assets/img/kirim.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Kirim Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="produk.php">
          <img src="assets/img/produk.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Produk Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="bayar.php">
          <img src="assets/img/bayar1.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Bayar Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.html">
          <img src="assets/img/logout.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Logout Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

  <section class="section dashboard">
      <div class="row">

          <div class="card2">
            <div class="card-body">
              <h5 class="card-title">LAPORAN TRANSAKSI</h5>
              <div class="card-body">
              <form method="get" action="">
                <label>Filter Berdasarkan</label><br>
                <select name="filter" id="filter">
                    <option value="">Pilih</option>
                    <option value="1">Per Tanggal</option>
                    <option value="2">Per Bulan</option>
                    <option value="3">Per Tahun</option>
                </select>
                <br /><br />
                <div id="form-tanggal">
                    <label>Tanggal</label><br>
                    <input type="text" name="tanggal" class="input-tanggal" />
                    <br /><br />
                </div>
                <div id="form-bulan">
                    <label>Bulan</label><br>
                    <select name="bulan">
                        <option value="">Pilih</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <br /><br />
                </div>
                <div id="form-tahun">
                    <label>Tahun</label><br>
                    <select name="tahun">
                        <option value="">Pilih</option>
                        <?php
                        $query = "SELECT YEAR(waktu_transaksi) AS tahun FROM transaksi GROUP BY YEAR(waktu_transaksi)"; // Tampilkan tahun sesuai di tabel transaksi
                        $sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
                        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                            echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                        }
                        ?>
                    </select>
                    <br /><br />
                </div>
                <div class="col-lg-3">
                  <input name="btnTampil" class="btn btn-success" type="submit" value="Tampilkan" />
                  <input href="bayar.php" name="btnTampil" class="btn btn-success" type="submit"value="Riset Filter" />
                </div>
                
            </form>
            <hr />

            <?php
            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                    $tgl = date('d-m-y', strtotime($_GET['tanggal']));
                    
                    echo '<b>Data Transaksi Tanggal '.$tgl.'</b><br /><br />';
                    echo '<a href="print.php?filter=1&tanggal='.$_GET['tanggal'].'">Cetak PDF</a><br /><br />';
                    $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi.pembayaran, transaksi.total  FROM transaksi JOIN pembeli ON transaksi.id_user = pembeli.id_user JOIN barang ON transaksi.id_barang = barang.id_barang WHERE DATE(transaksi.waktu_transaksi)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
                
                  }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                    $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                    
                    echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
                    echo '<a href="print.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';
                    $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi.pembayaran, transaksi.total  FROM transaksi JOIN pembeli ON transaksi.id_user = pembeli.id_user JOIN barang ON transaksi.id_barang = barang.id_barang WHERE MONTH(transaksi.waktu_transaksi)='".$_GET['bulan']."' AND YEAR(transaksi.waktu_transaksi)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
                
                  }else{ // Jika filter nya 3 (per tahun)
                    
                    echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b><br /><br />';
                    echo '<a href="print.php?filter=3&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';
                    $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi.pembayaran, transaksi.total  FROM transaksi JOIN pembeli ON transaksi.id_user = pembeli.id_user JOIN barang ON transaksi.id_barang = barang.id_barang WHERE YEAR(transaksi.waktu_transaksi)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
                }
            }else{ // Jika user tidak mengklik tombol tampilkan
                echo '<b>Semua Data Transaksi</b><br /><br />';
                echo '<a href="print.php">Cetak PDF</a><br /><br />';
                $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi.pembayaran, transaksi.total  FROM transaksi JOIN pembeli ON transaksi.id_user = pembeli.id_user JOIN barang ON transaksi.id_barang = barang.id_barang ORDER BY transaksi.waktu_transaksi ASC"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
            }
            ?>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Transaksi ID</th>
                <th>Waktu Transaksi</th>
                <th>Nama Pembeli</th>
                <th>Nama Barang</th>
                <th>Pembayaran</th>
                <th>Total</th>
              </tr>
            </thead>
            <?php
            $no = 1;
            $sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
            if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    $tgl = date('d-m-Y', strtotime($data['waktu_transaksi'])); // Ubah format tanggal jadi dd-mm-yyyy
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$data['transaksi_id']."</td>";
                    echo "<td>".$data['waktu_transaksi']."</td>";
                    echo "<td>".$data['nama']."</td>";
                    echo "<td>".$data['nama_barang']."</td>";
                    echo "<td>".$data['pembayaran']."</td>";
                    echo "<td>".$data['total']."</td>";
                    echo "</tr>";
                }
            }else{ // Jika data tidak ada
                echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
            }
            ?>
            </table>
            <script>
            $(document).ready(function(){ // Ketika halaman selesai di load
                $('.input-tanggal').datepicker({
                    dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
                });
                $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
                $('#filter').change(function(){ // Ketika user memilih filter
                    if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                        $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                        $('#form-tanggal').show(); // Tampilkan form tanggal
                    }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                        $('#form-tanggal').hide(); // Sembunyikan form tanggal
                        $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
                    }else{ // Jika filternya 3 (per tahun)
                        $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                        $('#form-tahun').show(); // Tampilkan form tahun
                    }
                    $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
                })
            })
            </script>
              <script src="plugin/jquery-ui/jquery-ui.min.js"></script> <!-- Load file plugin js jquery-ui -->
    
          
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