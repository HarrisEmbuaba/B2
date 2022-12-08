<?php
include ('koneksi.php');

if(isset($_SESSION['transaksi_id'])){
  header("Location: pesan3.php");
}

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

        </li><!-- Profile Nav -->
        <li class="nav-item">
          <a class="nav-link nav-icon" href="users-profile.html">
            <img src="assets/img/user.png" width="35px" height="35px"></i>
          </a>
      </li><!-- End Profile Nav -->

        </li><!-- End Messages Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="pesan3.php">
          <img src="assets/img/pesan.png" width="40px" height="40px"></i>
        </a>
      </li><!-- End Pesan Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="kirim3.php">
          <img src="assets/img/kirim1.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Kirim Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="produk2.php">
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
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#belum-bayar">Belum Bayar</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dikemas">Dikemas</button>
                </li>

              </ul>          
              <div class="tab-content pt-1">

                <div class="tab-pane fade show active perlu-dikirim" id="perlu-dikirim">

                  <!-- partial:index.partial.html -->
                  <div class="row mb-3" action="kirim.php" method="post">
                    <label for="cari" class="col-sm-2 col-form-label">Cari Barang</label>
                    <div class="col-sm-10">
                      <input type="cari" name="search" method="get" required>
                      <input type="submit" value="Cari" href="cari.php" class="btn btn-sm btn-info">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control">
                    </div>
                  </div>

                  <!-- DataTales Example -->
                  <div class="mb-4">
                  <div class="py-3">
                      <h6 class="m-0 font-weight-bold text-primary"></h6>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                      <?php 
                        $query = "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and status = 'Belum dikirim' ORDER BY `waktu_transaksi` DESC ";
                        $no = 0; 
                      ?> 
 
                  <!-- Table with stripped rows --> 
                  <table class="table table-striped"> 
                    <thead> 
                      <tr> 
                        <th scope="col">No</th> 
                        <th scope="col">Id Transaksi</th> 
                        <th scope="col">Nama Barang</th> 
                        <th scope="col">Gambar</th> 
                        <th scope="col">Kuantitas</th> 
                        <th scope="col">Nama Pembeli</th> 
                        <th scope="col">Alamat</th> 
                        <th scope="col">Pembayaran</th> 
                        <th scope="col">Total</th> 
                        <th scope="col">Status</th> 
                        <th scope="col">Action</th> 
                      </tr> 
                    </thead> 
                    <tbody> 
                        <?php 
                            if ($result = $mysqli->query($query)) { 
                                while ($row = $result->fetch_assoc()) { 
                                    $no++;
                                    $field2name = $row["transaksi_id"]; 
                                    $field3name = $row["nama_barang"]; 
                                    $field4name = $row["image"]; 
                                    $field5name = $row["qty"];  
                                    $field6name = $row["nama"];  
                                    $field7name = $row["alamat"];  
                                    $field8name = $row["pembayaran"];  
                                    $field9name = $row["total"];  
                                    $field10name = $row["status"];  
    
                                    echo '<tr>   
                                            <th>' .$no.'</th>  
                                            <td>'.$field2name.'</td>  
                                            <td>'.$field3name.'</td>  
                                            <td>'.$field4name.'</td>  
                                            <td>'.$field5name.'</td>  
                                            <td>'.$field6name.'</td> 
                                            <td>'.$field7name.'</td> 
                                            <td>'.$field8name.'</td> 
                                            <td>'.$field9name.'</td> 
                                            <td>'.$field10name.'</td> 
                                            <td>  
                                            <a href="editPerluKirim.php" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal">Edit</a>
                                            <a href="editBatal.php" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal">Batalkan</a> 
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
                </div>
              </div>

              <div class="tab-content pt-2">

                <div class="tab-pane fade dikirim" id="dikirim">

                  <!-- partial:index.partial.html -->
                  <div class="row mb-3" action="kirim.php" method="post">
                    <label for="cari" class="col-sm-2 col-form-label">Cari Barang</label>
                    <div class="col-sm-10">
                      <input type="cari" name="search" method="get" required>
                      <input type="submit" value="Cari" href="cari.php" class="btn btn-sm btn-info">
                    </div>
                  </div>
                    <div class="row mb-3">
                      <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control">
                      </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="mb-4">
                    <div class="py-3">
                        <h6 class="m-0 font-weight-bold text-primary"></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <?php 
                          $query = "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and status = 'Dikirim' ORDER BY `waktu_transaksi` DESC ";
                          $no = 0; 
                        ?> 
  
                    <!-- Table with stripped rows --> 
                    <table class="table table-striped"> 
                      <thead> 
                        <tr> 
                          <th scope="col">No</th> 
                          <th scope="col">Id Transaksi</th> 
                          <th scope="col">Nama Barang</th> 
                          <th scope="col">Gambar</th> 
                          <th scope="col">Kuantitas</th> 
                          <th scope="col">Nama Pembeli</th> 
                          <th scope="col">Alamat</th> 
                          <th scope="col">Pembayaran</th> 
                          <th scope="col">Total</th> 
                          <th scope="col">Status</th> 
                          <th scope="col">Action</th> 
                        </tr> 
                      </thead> 
                      <tbody> 
                          <?php 
                              if ($result = $mysqli->query($query)) { 
                                  while ($row = $result->fetch_assoc()) { 
                                      $no++;
                                      $field2name = $row["transaksi_id"]; 
                                      $field3name = $row["nama_barang"]; 
                                      $field4name = $row["image"]; 
                                      $field5name = $row["qty"];  
                                      $field6name = $row["nama"];  
                                      $field7name = $row["alamat"];  
                                      $field8name = $row["pembayaran"];  
                                      $field9name = $row["total"];  
                                      $field10name = $row["status"];  
      
                                      echo '<tr>   
                                              <th>' .$no.'</th>  
                                              <td>'.$field2name.'</td>  
                                              <td>'.$field3name.'</td>  
                                              <td>'.$field4name.'</td>  
                                              <td>'.$field5name.'</td>  
                                              <td>'.$field6name.'</td> 
                                              <td>'.$field7name.'</td> 
                                              <td>'.$field8name.'</td> 
                                              <td>'.$field9name.'</td> 
                                              <td>'.$field10name.'</td> 
                                              <td> 
                                              <a href="editKirim.php" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal">Edit</a>
                                              <a href="editBatal.php" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal">Batalkan</a> 
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
                      </div>
                    </div>
                  </div>
                </div><!-- End Bordered Tabs -->
              </div>

              <div class="tab-content pt-3">
                <div class="tab-pane fade diterima" id="diterima">
                <div class="row mb-3" action="kirim.php" method="post">
                    <label for="cari" class="col-sm-2 col-form-label">Cari Barang</label>
                    <div class="col-sm-10">
                      <input type="cari" name="search" method="get" required>
                      <input type="submit" value="Cari" href="cari.php" class="btn btn-sm btn-info">
                    </div>
                  </div>
                    <div class="row mb-3">
                      <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control">
                      </div>
                    </div>
                        
                        <!-- DataTales Example -->
                        <div class="mb-4">
                          <div class="py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                          </div>
                          <div class="card-body">
                        <div class="table-responsive">
                        <?php 
                          $query = "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and status = 'Diterima' ORDER BY `waktu_transaksi` DESC ";
                          $no = 0; 
                        ?> 
  
                    <!-- Table with stripped rows --> 
                    <table class="table table-striped"> 
                      <thead> 
                        <tr> 
                          <th scope="col">No</th> 
                          <th scope="col">Id Transaksi</th> 
                          <th scope="col">Nama Barang</th> 
                          <th scope="col">Gambar</th> 
                          <th scope="col">Kuantitas</th> 
                          <th scope="col">Nama Pembeli</th> 
                          <th scope="col">Alamat</th> 
                          <th scope="col">Pembayaran</th> 
                          <th scope="col">Total</th> 
                          <th scope="col">Status</th> 
                          <th scope="col">Action</th> 
                        </tr> 
                      </thead> 
                      <tbody> 
                          <?php 
                              if ($result = $mysqli->query($query)) { 
                                  while ($row = $result->fetch_assoc()) { 
                                      $no++;
                                      $field2name = $row["transaksi_id"]; 
                                      $field3name = $row["nama_barang"]; 
                                      $field4name = $row["image"]; 
                                      $field5name = $row["qty"];  
                                      $field6name = $row["nama"];  
                                      $field7name = $row["alamat"];  
                                      $field8name = $row["pembayaran"];  
                                      $field9name = $row["total"];  
                                      $field10name = $row["status"];  
      
                                      echo '<tr>   
                                              <th>' .$no.'</th>  
                                              <td>'.$field2name.'</td>  
                                              <td>'.$field3name.'</td>  
                                              <td>'.$field4name.'</td>  
                                              <td>'.$field5name.'</td>  
                                              <td>'.$field6name.'</td> 
                                              <td>'.$field7name.'</td> 
                                              <td>'.$field8name.'</td> 
                                              <td>'.$field9name.'</td> 
                                              <td>'.$field10name.'</td> 
                                              <td> 
                                              <a href="editTerima.html" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal">Edit</a>
                                              <a href="editBatal.php" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal">Batalkan</a> 
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
                    </div>

              </div>
              
              <div class="tab-content pt-4">
                <div class="tab-pane fade dibatalkan" id="dibatalkan">
                  <!-- partial:index.partial.html -->
                  <div class="row mb-3" action="kirim.php" method="post">
                    <label for="cari" class="col-sm-2 col-form-label">Cari Barang</label>
                    <div class="col-sm-10">
                      <input type="cari" name="search" method="get" required>
                      <input type="submit" value="Cari" href="cari.php" class="btn btn-sm btn-info">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control">
                    </div>
                  </div>

                  <!-- DataTales Example -->
                  <div class="mb-4">
                    <div class="py-3">
                      <h6 class="m-0 font-weight-bold text-primary"></h6>
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <?php 
                      $query = "select t.transaksi_id, b.nama_barang, b.image, t.qty, p.nama, a.alamat, t.pembayaran, t.total, t.status from transaksi t, barang b, pembeli p, alamat a WHERE t.id_barang=b.id_barang and t.id_alamat=a.id_alamat and t.id_user=p.id_user and status = 'Dibatalkan' ORDER BY `waktu_transaksi` DESC ";
                      $no = 0; 
                    ?> 
                    <!-- Table with stripped rows --> 
                    <table class="table table-striped"> 
                    <thead> 
                      <tr> 
                        <th scope="col">No</th> 
                        <th scope="col">Id Transaksi</th> 
                        <th scope="col">Nama Barang</th> 
                        <th scope="col">Gambar</th> 
                        <th scope="col">Kuantitas</th> 
                        <th scope="col">Nama Pembeli</th> 
                        <th scope="col">Alamat</th> 
                        <th scope="col">Pembayaran</th> 
                        <th scope="col">Total</th> 
                        <th scope="col">Status</th> 
                        <th scope="col">Action</th> 
                      </tr> 
                    </thead> 
                    <tbody> 
                    <?php 
                        if ($result = $mysqli->query($query)) { 
                            while ($row = $result->fetch_assoc()) { 
                                $no++;
                                $field2name = $row["transaksi_id"]; 
                                $field3name = $row["nama_barang"]; 
                                $field4name = $row["image"]; 
                                $field5name = $row["qty"];  
                                $field6name = $row["nama"];  
                                $field7name = $row["alamat"];  
                                $field8name = $row["pembayaran"];  
                                $field9name = $row["total"];  
                                $field10name = $row["status"];  

                                echo '<tr>   
                                        <th>' .$no.'</th>  
                                        <td>'.$field2name.'</td>  
                                        <td>'.$field3name.'</td>  
                                        <td>'.$field4name.'</td>  
                                        <td>'.$field5name.'</td>  
                                        <td>'.$field6name.'</td> 
                                        <td>'.$field7name.'</td> 
                                        <td>'.$field8name.'</td> 
                                        <td>'.$field9name.'</td> 
                                        <td>'.$field10name.'</td> 
                                        <td>  
                                        <a class="text" >Dibatalkan</a> 
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