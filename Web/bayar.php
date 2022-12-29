<?php
require "function.php";


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pesanan</title>
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

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>


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
          <img src="assets/img/produk.png" width="35px" height="35px"></i>
        </a><br />
      </li><!-- End Produk Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="bayar.php">
          <img src="assets/img/bayar1.png" width="35px" height="35px"></i>
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

  <section class="section dashboard">
      <div class="row">

        <!-- Page Heading -->
        <h1 class="h4 mb-2 text-gray-800">Laporan Transaksi</h1>
            <div class="card-body">
              <form method="get" action="">
                <label>Filter Berdasarkan</label>
                <select name="filter" id="filter">
                    <option value="">Pilih</option>
                    <option value="1">Per Tanggal</option>
                    <option value="2">Per Bulan</option>
                    <option value="3">Per Tahun</option>
                </select>
                <br /><br />
                <div id="form-tanggal">
                    <label>Tanggal</label>
                    <input type="text" name="tanggal" class="input-tanggal" />
                    <br /><br />
                </div>
                <div id="form-bulan">
                    <label>Bulan</label>
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
                    <label>Tahun</label>
                    <select name="tahun">
                        <option value="">Pilih</option>
                        <option value="">2021</option>
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
                <div class="cd-grid gap-2 d-md-block">
                  <input name="btnTampil" class="btn btn-success" type="submit" value="Tampilkan" />
                  <input href="bayar.php" name="btnTampil" class="btn btn-success" type="submit"value="Refresh" />
                </div>
                
            </form>
            <hr />

            

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
              

            <?php
            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                    $tgl = date('d-m-y', strtotime($_GET['tanggal']));
                    
                    echo '<b>Data Transaksi Tanggal '.$tgl.'';
                    echo '<a href="print.php?filter=1&tanggal='.$_GET['tanggal'].'"<div class="position-absolute top-0 end-0"><button type="button" class="btn btn-primary">Cetak PDF</button></a><br/>';
                    $query = "SELECT transaksi_detail.id_TransaksiDetail, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi_detail.jumlah, transaksi.grand_total FROM transaksi_detail JOIN transaksi ON transaksi_detail.id_TransaksiDetail = transaksi.transaksi_id JOIN pembeli ON transaksi.id_UserBeli = pembeli.id_user JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang WHERE DATE(transaksi.waktu_transaksi)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
                
                  }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                    $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                    
                    echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'';
                    echo '<a href="print.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'"<div class="position-absolute top-0 end-0"><button type="button" class="btn btn-primary">Cetak PDF</button></a><br/>';
                    $query = "SELECT transaksi_detail.id_TransaksiDetail, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi_detail.jumlah, transaksi.grand_total FROM transaksi_detail JOIN transaksi 
                    ON transaksi_detail.id_TransaksiDetail = transaksi.transaksi_id JOIN pembeli ON transaksi.id_UserBeli = pembeli.id_user JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang WHERE MONTH(transaksi.waktu_transaksi)='".$_GET['bulan']."' AND YEAR(transaksi.waktu_transaksi)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
                
                  }else{ // Jika filter nya 3 (per tahun)
                    
                    echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b>';
                    echo '<a href="print.php?filter=3&tahun='.$_GET['tahun'].'"<div class="position-absolute top-0 end-0"><button type="button" class="btn btn-primary">Cetak PDF</button></a><br/>';
                    $query = "SELECT transaksi_detail.id_TransaksiDetail, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi_detail.jumlah, transaksi.grand_total FROM transaksi_detail JOIN transaksi 
                    ON transaksi_detail.id_TransaksiDetail = transaksi.transaksi_id JOIN pembeli ON transaksi.id_UserBeli = pembeli.id_user JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang WHERE YEAR(transaksi.waktu_transaksi)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
                }
            }else{ // Jika user tidak mengklik tombol tampilkan
                echo '<b>Semua Data Transaksi</b>';
                echo '<a href="print.php"<div class="position-absolute top-0 end-0"><button type="button" class="btn btn-primary">Cetak PDF</button></a><br/>';
                $query = "SELECT transaksi_detail.id_TransaksiDetail, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi_detail.jumlah, transaksi.grand_total FROM transaksi_detail JOIN transaksi 
                ON transaksi_detail.id_TransaksiDetail = transaksi.transaksi_id JOIN pembeli ON transaksi.id_UserBeli = pembeli.id_user JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang ORDER BY transaksi.waktu_transaksi ASC"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
            }
            ?>
            </div>
          

          
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Transaksi ID</th>
                      <th>Waktu Transaksi</th>
                      <th>Nama Pembeli</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Total Harga</th>
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
                    echo "<td>".$data['id_TransaksiDetail']."</td>";
                    echo "<td>".$data['waktu_transaksi']."</td>";
                    echo "<td>".$data['nama']."</td>";
                    echo "<td>".$data['nama_barang']."</td>";
                    echo "<td>".$data['jumlah']."</td>";
                    echo "<td>".$data['grand_total']."</td>";
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

  <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
  

</body>

</html>