<?php
include ('koneksi.php');

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  header("Location: error-connect.php");
  exit();
}

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
<i class="bi bi-list toggle-sidebar-btn"></i>
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
      </li><!-- End Pesan Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="kirim2.php">
          <img src="assets/img/kirim1.png" width="35px" height="35px"></i>
        </a><br />
      </li><!-- End Kirim Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="produk2.php">
          <img src="assets/img/produk.png" width="35px" height="35px"></i>
        </a><br />
      </li><!-- End Produk Page Nav -->

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

    
    <section class="section profile">

        <div class="col-xxl-50 col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
            <h3>Pengiriman</h3>                
                <u class="nav nav-tabs nav-tabs-bordered"></u>
                <div class="mb-4">
                  <div class="py-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#dikirim">Dikirim</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#diterima">Diterima</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dibatalkan">Dibatalkan</button>
                </li>
              </ul> 

              <div class="tab-content pt-1">

                <div class="tab-pane fade show active dikirim" id="dikirim">
                  <!-- DataTales Example -->
                  <div class="mb-4">
                  <div class="py-3">
                      <h6 class="m-0 font-weight-bold text-primary"></h6>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                      <?php 
                        if(isset($_GET['search'])){
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_pembayaran, transaksi.waktu_pengiriman, transaksi.waktu_transaksi, 
                          transaksi.grand_total, transaksi.status, transaksi.id_UserBeli, transaksi_detail.jumlah, pembeli.nama, transaksi.alamat 
                          FROM transaksi LEFT JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail LEFT JOIN pembeli 
                          ON pembeli.id_user = transaksi.id_UserBeli LEFT JOIN alamat ON alamat.id_alamat = transaksi.alamat WHERE status = 'Dikirim' 
                          AND `transaksi`.`transaksi_id` = '" . $_GET['search'] ."' ORDER BY transaksi_id DESC";
                          
                        } else{
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_pembayaran, transaksi.waktu_pengiriman, transaksi.waktu_transaksi, 
                          transaksi.grand_total, transaksi.status, transaksi.id_UserBeli, transaksi_detail.jumlah, pembeli.nama, transaksi.alamat 
                          FROM transaksi LEFT JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail LEFT JOIN pembeli 
                          ON pembeli.id_user = transaksi.id_UserBeli LEFT JOIN alamat ON alamat.id_alamat = transaksi.alamat WHERE status = 'Dikirim' 
                          ORDER BY transaksi_id DESC";
                          
                        }
                        $no = 0; 
                      ?> 
 
                  <!-- Table with stripped rows --> 
                  <table class="table table-bordered" id="example1" width="100%" cellspacing="0"> 
                    <thead> 
                      <tr> 
                          <th scope="col">No</th> 
                          <th scope="col">ID Transaksi</th>
                          <th scope="col">Waktu Transaksi</th> 
                          <th scope="col">Waktu Pembayaran</th> 
                          <th scope="col">Waktu Pengiriman</th> 
                          <th scope="col">ID Pembeli</th> 
                          <th scope="col">Nama Pembeli</th> 
                          <th scope="col">Kuantitas</th> 
                          <th scope="col">Total</th> 
                          <th scope="col">Alamat</th> 
                          <th scope="col">Status</th>
                          <th scope="col">Action</th> 
                      </tr> 
                    </thead> 
                    <tbody> 
                    <?php 
                                //untuk meinclude kan koneksi
                                include('koneksi.php');
                                
                                $no = 1;

                                if(isset($_POST['bcari'])) {
                                //menampung variabel kata_cari dari form pencarian
                                $cari = $_POST['tcari'];

                                //jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
                                //jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
                                    $query = "SELECT transaksi.transaksi_id, transaksi.waktu_pembayaran, transaksi.waktu_pengiriman, transaksi.waktu_transaksi, 
                                    transaksi.grand_total, transaksi.status, transaksi.id_UserBeli, transaksi_detail.jumlah, pembeli.nama, transaksi.alamat 
                                    FROM transaksi LEFT JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail LEFT JOIN pembeli 
                                    ON pembeli.id_user = transaksi.id_UserBeli LEFT JOIN alamat ON alamat.id_alamat = transaksi.alamat WHERE 
                                    (nama_barang like '%".$cari."%' OR transaksi_id like '%".$cari."%') AND status = 'Dikirim' 
                                    ORDER BY transaksi_id DESC";
                                } else {
                                //jika tidak ada pencarian, default yang dijalankan query ini
                                    $query = "SELECT transaksi.transaksi_id, transaksi.waktu_pembayaran, transaksi.waktu_pengiriman, transaksi.waktu_transaksi, 
                                    transaksi.grand_total, transaksi.status, transaksi.id_UserBeli, transaksi_detail.jumlah, pembeli.nama, transaksi.alamat 
                                    FROM transaksi LEFT JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail LEFT JOIN pembeli 
                                    ON pembeli.id_user = transaksi.id_UserBeli LEFT JOIN alamat ON alamat.id_alamat = transaksi.alamat WHERE status = 'Dikirim' 
                                    ORDER BY transaksi_id DESC"; 
                                } 

                                
                                $result = mysqli_query($mysqli, $query);

                                if(!$result) {
                                    die("Query Error : ".mysqli_errno($mysqli)." - ".mysqli_error($mysqli));
                                }
                                //kalau ini melakukan foreach atau perulangan
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?> 
                                
                                  <tr>
                                    <th><?php echo $no; ?></th> 
                                    <td><?php echo $row['transaksi_id']; ?></td> 
                                    <td><?php echo $row['waktu_transaksi']; ?></td> 
                                    <td><?php echo $row['waktu_pembayaran']; ?></td> 
                                    <td><?php echo $row['waktu_pembayaran']; ?></td> 
                                    <td><?php echo $row['id_UserBeli']; ?></td> 
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['jumlah']; ?></td> 
                                    <td>Rp.<?php echo $row['grand_total']; ?></td> 
                                    <td><?php echo $row['alamat']; ?></td> 
                                    <td><?php echo $row['status']; ?></td> 
                                    <td>
                                        <a href="editTerima.php?id=<?php echo $row["transaksi_id"]; ?>" class="btn btn-info">Diterima</a>
                                    
                                        <a href="editBatalPesan.php?id=<?php echo $row["transaksi_id"]; ?>" class="btn btn-danger" 
                                        onclick="return confirm('Apakah Anda ingin membatalkan transaksi ini?')">Batalkan</a>
                                    </td>
                                  </tr>
                                  <?php }?>
                      </tbody> 
                  </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-content pt-2">

                <div class="tab-pane fade diterima" id="diterima">

                  <!-- partial:index.partial.html -->


                    <!-- DataTales Example -->
                    <div class="mb-4">
                    <div class="py-3">
                        <h6 class="m-0 font-weight-bold text-primary"></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <?php 
                        if(isset($_GET['search'])){
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_pembayaran, transaksi.waktu_pengiriman, transaksi.waktu_pesanan_selesai, 
                          transaksi.waktu_transaksi, transaksi.grand_total, transaksi.status, transaksi.id_UserBeli, transaksi_detail.jumlah, pembeli.nama, 
                          transaksi.alamat FROM transaksi LEFT JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail 
                          LEFT JOIN pembeli ON pembeli.id_user = transaksi.id_UserBeli LEFT JOIN alamat ON alamat.id_alamat = transaksi.alamat 
                          WHERE status = 'Selesai' AND `transaksi`.`transaksi_id` = '" . $_GET['search'] ."' ORDER BY transaksi_id DESC";
                          
                        } else{
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_pembayaran, transaksi.waktu_pengiriman, transaksi.waktu_pesanan_selesai, 
                          transaksi.waktu_transaksi, transaksi.grand_total, transaksi.status, transaksi.id_UserBeli, transaksi_detail.jumlah, pembeli.nama, 
                          transaksi.alamat FROM transaksi LEFT JOIN transaksi_detail ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail 
                          LEFT JOIN pembeli ON pembeli.id_user = transaksi.id_UserBeli LEFT JOIN alamat ON alamat.id_alamat = transaksi.alamat 
                          WHERE status = 'Selesai' ORDER BY transaksi_id DESC";
                          
                        }
                        $no = 0; 
                        ?> 
  
                    <!-- Table with stripped rows --> 
                    <table class="table table-bordered" id="example2" width="100%" cellspacing="0"> 
                      <thead> 
                        <tr> 
                          <th scope="col">No</th> 
                          <th scope="col">ID Transaksi</th>
                          <th scope="col">Waktu Transaksi</th> 
                          <th scope="col">Waktu Pembayaran</th> 
                          <th scope="col">Waktu Pengiriman</th> 
                          <th scope="col">Waktu Pesanan Selesai</th>  
                          <th scope="col">ID Pembeli</th> 
                          <th scope="col">Nama Pembeli</th> 
                          <th scope="col">Kuantitas</th> 
                          <th scope="col">Total</th> 
                          <th scope="col">Alamat</th> 
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
                                      $field3name = $row["waktu_transaksi"];
                                      $field4name = $row["waktu_pembayaran"]; 
                                      $field5name = $row["waktu_pengiriman"];   
                                      $field6name = $row["waktu_pesanan_selesai"]; 
                                      $field7name = $row["id_UserBeli"]; 
                                      $field8name = $row["nama"]; 
                                      $field9name = $row["jumlah"];  
                                      $field10name = $row["grand_total"];  
                                      $field11name = $row["alamat"]; 
                                      $field12name = $row["status"];  
      
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
                                              <td>'.$field11name.'</td> 
                                              <td>'.$field12name.'</td> 
                                              <td> 
                                              <a>Pesanan diterima</a>
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
                <div class="tab-pane fade dibatalkan" id="dibatalkan">
                        
                        <!-- DataTales Example -->
                        <div class="mb-4">
                          <div class="py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                          </div>
                          <div class="card-body">
                        <div class="table-responsive">
                        <?php 
                        if(isset($_GET['search'])){
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, transaksi.waktu_dibatalkan, transaksi.grand_total, transaksi.status, 
                          transaksi.id_UserBeli, transaksi_detail.jumlah, pembeli.nama, transaksi.alamat FROM transaksi LEFT JOIN transaksi_detail 
                          ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail LEFT JOIN pembeli ON pembeli.id_user = transaksi.id_UserBeli 
                          LEFT JOIN alamat ON alamat.id_alamat = transaksi.alamat WHERE status = 'Dibatalkan' AND `transaksi`.`transaksi_id` = '" . 
                          $_GET['search'] ."' ORDER BY transaksi_id DESC";
                          
                        } else{
                          $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, transaksi.waktu_dibatalkan, transaksi.grand_total, transaksi.status, 
                          transaksi.id_UserBeli, transaksi_detail.jumlah, pembeli.nama, transaksi.alamat FROM transaksi LEFT JOIN transaksi_detail 
                          ON transaksi.transaksi_id = transaksi_detail.id_TransaksiDetail LEFT JOIN pembeli ON pembeli.id_user = transaksi.id_UserBeli 
                          LEFT JOIN alamat ON alamat.id_alamat = transaksi.alamat WHERE status = 'Dibatalkan' ORDER BY transaksi_id DESC";
                          
                        }
                        $no = 0; 
                      ?>
  
                    <!-- Table with stripped rows --> 
                    <table class="table table-bordered" id="example3" width="100%" cellspacing="0"> 
                      <thead> 
                        <tr> 
                          <th scope="col">No</th> 
                          <th scope="col">ID Transaksi</th> 
                          <th scope="col">Waktu Transaksi</th> 
                          <th scope="col">Waktu Pembatalan</th> 
                          <th scope="col">ID Pembeli</th> 
                          <th scope="col">Nama Pembeli</th> 
                          <th scope="col">Kuantitas</th> 
                          <th scope="col">Total</th> 
                          <th scope="col">Alamat</th> 
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
                                      $field3name = $row["waktu_transaksi"];  
                                      $field4name = $row["waktu_dibatalkan"]; 
                                      $field5name = $row["id_UserBeli"]; 
                                      $field6name = $row["nama"]; 
                                      $field7name = $row["jumlah"];  
                                      $field8name = $row["grand_total"];  
                                      $field9name = $row["alamat"]; 
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
                                              <a>Dibatalkan</a>
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
  <script>
        $(document).ready(function () {
            $('#example1').DataTable();
        });
    </script>
  <script>
        $(document).ready(function () {
            $('#example2').DataTable();
        });
    </script>
  <script>
        $(document).ready(function () {
            $('#example3').DataTable();
        });
    </script>


</body>

</html>