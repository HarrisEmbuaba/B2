<?php
include ('koneksi.php');

error_reporting(0);
session_start();

if(isset($_SESSION['id_barang'])){
  header("Location: kirim.php");
}

$err = "";
$sukses = "";
$kode = "";

$id = mysqli_query($koneksi,"SELECT transaksi_id FROM `transaksi`");
$kode = mysqli_query($koneksi,"SELECT id_barang FROM `transaksi`");
$nama = mysqli_query($koneksi,"SELECT nama FROM `pembeli`");
$produk = mysqli_query($koneksi,"SELECT nama_barang FROM `barang`");
$variasi1 = mysqli_query($koneksi,"SELECT ukuran FROM `jenis_ukuran`");
$variasi2 = mysqli_query($koneksi,"SELECT warna FROM `transaksi`");
$qty = mysqli_query($koneksi,"SELECT qty FROM `transaksi`");
$total = mysqli_query($koneksi,"SELECT total FROM `transaksi`");
$alamat = mysqli_query($koneksi,"SELECT alamat FROM `transaksi`");
$bayar = mysqli_query($koneksi,"SELECT pembayaran FROM `transaksi`");
$kirim = mysqli_query($koneksi,"SELECT pengiriman FROM `transaksi`");
$catatan = mysqli_query($koneksi,"SELECT catatan FROM `transaksi`");
$status = mysqli_query($koneksi,"SELECT `status` FROM `transaksi`");

mysqli_close($koneksi);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pengiriman</title>
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
      <a href="home.html" class="logo d-flex align-items-center">
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
        <a class="nav-link collapsed" href="pesan.php">
          <img src="assets/img/pesan.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Pesan Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="kirim.php">
          <img src="assets/img/kirim1.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Kirim Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="produk.php">
          <img src="assets/img/produk.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Produk Page Nav -->

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

    
    <section class="section profile">

        <div class="col-xxl-50 col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#perlu-dikirim">Perlu Dikirim</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dikirim">Dikirim</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#diterima">Diterima</button>
                </li>

              </ul>          
              <div class="tab-content pt-1">

                <div class="tab-pane fade show active perlu-dikirim" id="perlu-dikirim">

                  <!-- partial:index.partial.html -->
                  <div class="row mb-3">
                    <label for="search" class="col-sm-2 col-form-label">Cari Barang</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="search" id="formSearch" name="search" values="" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control">
                    </div>
                  </div>

                  <div class="urutkan_container">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><img src="assets/img/urut.png" width="20px" length="20px"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <select type="option" name="waktu_pengambilan" id="inputState" class="form-select">
                      <option value=""></option>
                      <?php
                      $waktu = mysqli_query($koneksi, "SELECT waktu_pengambilan FROM transaksi ORDER BY waktu_pengambilan DESC");
                      while($r = mysqli_fetch_array($waktu)){
                        ?>
                        <option value="<?php echo $r['waktu_pengembalian'] ?>"><?php echo $r['waktu_pengembalian'] ?></option>
                      <?php } ?>
                      </select>
                    </ul>
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
                                      <th>Nomor Pesanan</th>
                                      <th>Kode Barang</th>
                                      <th>Nama</th>
                                      <th>Produk</th>
                                      <th>Variasi</th>
                                      <th>Jumlah</th>
                                      <th>Total Bayar</th>
                                      <th>Alamat</th>
                                      <th>Pembayaran</th>
                                      <th>Pengiriman</th>
                                      <th>Catatan</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php
                              $query="SELECT * FROM transaksi";
                                if ($result->num_rows>0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $field1name = $row["transaksi_id"];
                                        $field2name = $row["id_barang"];
                                        $field3name = $row["image"];
                                        $field4name = $row["id_user"];
                                        $field5name = $row["nama_barang"];
                                        $field6name = $row["qty"];
                                        $field7name = $row["total"]; 
                                        $field8name = $row["pembayaran"]; 
                                        $field9name = $row["pengiriman"]; 
                                        $field7name = $row["catatan"]; 
                                        $field8name = $row["status"]; 
                                        $field9name = $row[TIDY_TAG_BUTTON]; 

                                        echo '<tr>  
                                                <th>'.$field1name.'</th> 
                                                <td>'.$field2name.'</td> 
                                                <td>'.$field3name.'</td> 
                                                <td>'.$field4name.'</td> 
                                                <td>'.$field5name.'</td> 
                                                <td>'.$field6name.'</td>
                                                <td>'.$field7name.'</td>
                                                <td>'.$field8name.'</td>
                                                <td>'.$field9name.'</td>
                                                <td>'.$field10name.'</td>
                                                <td>'.$field11name.'</td>
                                                <td>'.$field12name.'</td>
                                            </tr>';
                                    }
                                    $result->free();
                                } 
                              ?>  
                              </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>

            <div class="tab-content pt-2">

              <div class="tab-pane fade dikirim" id="dikirim">

                <!-- partial:index.partial.html -->
                <div class="row mb-3">
                  <label for="search" class="col-sm-2 col-form-label">Cari Barang</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="search" id="formSearch" name="search" values="" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control">
                  </div>
                </div>

                <div class="urutkan_container">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><img src="assets/img/urut.png" width="20px" length="20px"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <select type="option" name="waktu_pengambilan" id="inputState" class="form-select">
                      <option value=""></option>
                      <?php
                      $waktu = mysqli_query($koneksi, "SELECT waktu_pengambilan FROM transaksi ORDER BY waktu_pengambilan DESC");
                      while($r = mysqli_fetch_array($waktu)){
                        ?>
                        <option value="<?php echo $r['waktu_pengembalian'] ?>"><?php echo $r['waktu_pengembalian'] ?></option>
                      <?php } ?>
                      </select>
                  </ul>
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
                                    <th>Nomor Pesanan</th>
                                    <th>Kode Barang</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Produk</th>
                                    <th>Variasi</th>
                                    <th>Jumlah</th>
                                    <th>Total Bayar</th>
                                    <th>Alamat</th>
                                    <th>Pembayaran</th>
                                    <th>Pengiriman</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $kode;?></td>
                                    <td><?php echo $nama;?></td>
                                    <td><?php echo $produk;?></td>
                                    <td><?php echo $variasi1, $variasi2;?></td>
                                    <td><?php echo $qty;?></td>
                                    <td><?php echo $total;?></td>
                                    <td><?php echo $alamat;?></td>
                                    <td><?php echo $bayar;?></td>
                                    <td><?php echo $kirim;?></td>
                                    <td><?php echo $catatan;?></td>
                                    <td>
                                      <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Selesai</button>
                                      </div>
                                    </td>
                                  </tr>
                              </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-content pt-3">
                    <div class="tab-pane fade diterima" id="diterima">

                      <div class="row mb-3">
                        <label for="search" class="col-sm-2 col-form-label">Cari Barang</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="search" id="formSearch" name="search" values="" required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>

                      <div class="urutkan_container">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><img src="assets/img/urut.png" width="20px" length="20px"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                          <select type="option" name="waktu_pengambilan" id="inputState" class="form-select">
                            <option value=""></option>
                            <?php
                            $waktu = mysqli_query($koneksi, "SELECT waktu_pengambilan FROM transaksi ORDER BY waktu_pengambilan DESC");
                            while($r = mysqli_fetch_array($waktu)){
                              ?>
                              <option value="<?php echo $r['waktu_pengembalian'] ?>"><?php echo $r['waktu_pengembalian'] ?></option>
                              <?php } ?>
                          </select>
                        </ul>
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
                                    <th>Nomor Pesanan</th>
                                    <th>Kode Barang</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Produk</th>
                                    <th>Variasi</th>
                                    <th>Jumlah</th>
                                    <th>Total Bayar</th>
                                    <th>Alamat</th>
                                    <th>Pembayaran</th>
                                    <th>Pengiriman</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $kode;?></td>
                                    <td><?php echo $nama;?></td>
                                    <td><?php echo $produk;?></td>
                                    <td><?php echo $variasi1.$variasi2;?></td>
                                    <td><?php echo $qty;?></td>
                                    <td><?php echo $total;?></td>
                                    <td><?php echo $alamat;?></td>
                                    <td><?php echo $bayar;?></td>
                                    <td><?php echo $kirim;?></td>
                                    <td><?php echo $catatan;?></td>
                                    <td>-</td>
                                  </tr>
                              </tbody>
                          </table>
                    </div>
                  </div>
                </div>
              </div><!-- End Bordered Tabs -->
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