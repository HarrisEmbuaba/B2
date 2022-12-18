<?php
include ('koneksi.php');

if(isset($_SESSION['transaksi_id'])){
  header("Location: kirim.php");
}

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
          <img src="assets/img/pesan1.png" width="40px" height="40px"></i>
        </a>
      </li><!-- End Pesan Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="kirim3.php">
          <img src="assets/img/kirim.png" width="35px" height="35px"></i>
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
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sudah-dibayar">Sudah Dibayar</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dikemas">Dikemas</button>
                </li>
              </ul> 

              <div class="tab-content pt-1">

                <div class="tab-pane fade show active belum-bayar" id="belum-bayar">

                  <!-- partial:index.partial.html -->
                  <form action="" method="GET">
                    <div class="input-group mb-3">
                      <label for="search" class="col-sm-2 col-form-label">Cari Pesanan</label>
                      <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; }?>" class="">
                      <button type="submit" class="btn btn-sm-info" href="update.php?">Search</button>
                    </div>
                  </form>

                  <!-- DataTales Example -->
                  <div class="mb-4">
                  <div class="py-3">
                      <h6 class="m-0 font-weight-bold text-primary"></h6>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                      <?php 
                        if(isset($_GET['search'])){
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, transaksi.grand_total, alamat.alamat_lengkap, transaksi.status, transaksi_detail.id_TransaksiDetail, barang.nama_barang, barang.image, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang JOIN pembeli ON pembeli.id_userPembeli = transaksi_detail.id_UserDetail JOIN alamat ON transaksi_detail.id_AlamatDetail = alamat.id_alamat WHERE status = 'Belum bayar' AND `transaksi`.`transaksi_id` = '" . $_GET['search'] ."' ORDER BY transaksi_id DESC";
                          
                        } else{
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, transaksi.grand_total, alamat.alamat_lengkap, transaksi.status, transaksi_detail.id_TransaksiDetail, barang.nama_barang, barang.image, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang JOIN pembeli ON pembeli.id_userPembeli = transaksi_detail.id_UserDetail JOIN alamat ON transaksi_detail.id_AlamatDetail = alamat.id_alamat WHERE status = 'Belum bayar' ORDER BY transaksi_id DESC";
                          
                        }
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
                                    $field5name = $row["jumlah"];  
                                    $field6name = $row["nama"];  
                                    $field7name = $row["alamat_lengkap"];  
                                    $field8name = $row["grand_total"];  
                                    $field9name = $row["status"];  
    
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
                                            <td>  
                                            <a href="editBayar.php" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal">Edit</a>
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

                <div class="tab-pane fade sudah-bayar" id="sudah-dibayar">

                  <!-- partial:index.partial.html -->
                  <form action="" method="GET">
                    <div class="input-group mb-3">
                      <label for="search" class="col-sm-2 col-form-label">Cari Pesanan</label>
                      <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; }?>" class="">
                      <button type="submit" class="btn btn-sm-info" href="update.php?">Search</button>
                    </div>
                  </form>

                    <!-- DataTales Example -->
                    <div class="mb-4">
                    <div class="py-3">
                        <h6 class="m-0 font-weight-bold text-primary"></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <?php 
                        if(isset($_GET['search'])){
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, transaksi.grand_total, alamat.alamat_lengkap, transaksi.status, transaksi_detail.id_TransaksiDetail, barang.nama_barang, barang.image, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang JOIN pembeli ON pembeli.id_userPembeli = transaksi_detail.id_UserDetail JOIN alamat ON transaksi_detail.id_AlamatDetail = alamat.id_alamat WHERE status = 'Sudah bayar' AND `transaksi`.`transaksi_id` = '" . $_GET['search'] ."' ORDER BY transaksi_id DESC";
                          
                        } else{
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, transaksi.grand_total, alamat.alamat_lengkap, transaksi.status, transaksi_detail.id_TransaksiDetail, barang.nama_barang, barang.image, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang JOIN pembeli ON pembeli.id_userPembeli = transaksi_detail.id_UserDetail JOIN alamat ON transaksi_detail.id_AlamatDetail = alamat.id_alamat WHERE status = 'Sudah bayar' ORDER BY transaksi_id DESC";
                          
                        }
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
                                      $field5name = $row["jumlah"];  
                                      $field6name = $row["nama"];  
                                      $field7name = $row["alamat_lengkap"];  
                                      $field8name = $row["grand_total"];  
                                      $field9name = $row["status"];  
      
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
                                              <td> 
                                              <a href="editKemas.php" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal">Edit</a>
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
                <div class="tab-pane fade dikemas" id="dikemas">
                <form action="" method="GET">
                    <div class="input-group mb-3">
                      <label for="search" class="col-sm-2 col-form-label">Cari Pesanan</label>
                      <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; }?>" class="">
                      <button type="submit" class="btn btn-sm-info" href="update.php?">Search</button>
                    </div>
                  </form>
                        
                        <!-- DataTales Example -->
                        <div class="mb-4">
                          <div class="py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                          </div>
                          <div class="card-body">
                        <div class="table-responsive">
                        <?php 
                        if(isset($_GET['search'])){
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, transaksi.grand_total, alamat.alamat_lengkap, transaksi.status, transaksi_detail.id_TransaksiDetail, barang.nama_barang, barang.image, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang JOIN pembeli ON pembeli.id_userPembeli = transaksi_detail.id_UserDetail JOIN alamat ON transaksi_detail.id_AlamatDetail = alamat.id_alamat WHERE status = 'Dikemas' AND `transaksi`.`transaksi_id` = '" . $_GET['search'] ."' ORDER BY transaksi_id DESC";
                          
                        } else{
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, transaksi.grand_total, alamat.alamat_lengkap, transaksi.status, transaksi_detail.id_TransaksiDetail, barang.nama_barang, barang.image, transaksi_detail.jumlah FROM transaksi JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang JOIN pembeli ON pembeli.id_userPembeli = transaksi_detail.id_UserDetail JOIN alamat ON transaksi_detail.id_AlamatDetail = alamat.id_alamat WHERE status = 'Dikemas' ORDER BY transaksi_id DESC";
                          
                        }
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
                                      $field5name = $row["jumlah"];  
                                      $field6name = $row["nama"];  
                                      $field7name = $row["alamat_lengkap"]; 
                                      $field8name = $row["grand_total"];  
                                      $field9name = $row["status"];  
      
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