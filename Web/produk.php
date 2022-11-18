<?php
include ('koneksi.php');
include ('produk.html');

error_reporting(0);
session_start();

if(isset($_SESSION['id_barang'])){
  header("Location: produk.php");
}

$err = "";
$sukses = "";
$kode = "";

if(isset($_POST['Submit'])){
  // $kode = $_POST['id_barang'];
  $nama = $_POST['nama_barang'];
  $image = $_POST['image'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $warna = $_POST['warna'];
  $ukuran = $_POST['ukuran'];
  $kategori = $_POST['barang_jenis'];

  if(!$result->num_rows > 0){
    $sql1 = "INSERT INTO `barang`('id_barang',`nama_barang`,`image`,`deskripsi`)
    VALUES ('','$nama','$image','$deskripsi')";
    $sql2 = "INSERT INTO `jenis_barang`(`id_jenis`,`barang_jenis`)
    VALUES ('','$kategori')";
    $sql3 = "INSERT INTO `jenis_ukuran`(`id_ukuran`,`ukuran`)
    VALUES ('','$ukuran')";
    $sql4 = "INSERT INTO `jenis_warna`(`id_warna`,`warna`)
    VALUES ('','$warna')";
    $sql5 = "INSERT INTO `detail_barang`(`id`,`harga`, `stok`)
    VALUES ('','$harga','$stok')";

    $result = mysqli_query($koneksi,$sql1,$sql2,$sql3,$sql4,$sql5);

    if($result){
      echo "<script>alert('Barang berhasil ditambahkan!')</script>";
      
      $nama = "";
      $image = "";
      $deskripsi = "";
      $harga = "";
      $stok = "";
      $warna = "";
      $ukuran = "";
      $kategori = "";
      $_POST['nama_barang'] = "";
      $_POST['image'] = "";
      $_POST['deskripsi'] = "";
      $_POST['harga'] = "";
      $_POST['stok'] = "";
      $_POST['warna'] = "";
      $_POST['ukuran'] = "";
      $_POST['barang_jenis'] = "";
    } else {
      echo "<script>alert('Barang gagal ditambahkan!')</script>";
    }
  }
}

?>
<<<<<<< HEAD

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
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="ass                                          ets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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
      <a href="index.html" class="logo d-flex align-items-center">
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
        <a class="nav-link collapsed" href="pesan.html">
          <img src="assets/img/pesan.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Pesan Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="kirim.html">
          <img src="assets/img/kirim.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Kirim Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="produk.html">
          <img src="assets/img/produk1.png" width="35px" height="35px"></i>
        </a>
      </li><!-- End Produk Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="bayar.html">
          <img src="assets/img/bayar.png" width="35px" height="35px"></i>
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

    
    <section class="section profile">

        <div class="col-xxl-50 col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tersedia">Tersedia</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#habis">Habis</button>
                </li>

              </ul>          
              <div class="tab-content pt-1">

                <div class="tab-pane fade show active tersedia" id="tersedia">

                  <!-- partial:index.partial.html -->
                  <!-- No Labels Form -->
                  <form  action="produk.php" method="POST" class="row g-2">
                    <label for="kode" class="col-sm-1 col-form-label">Kode Barang</label>
                    <div class="col-md-2">
                      <input type="kode" class="form-control" placeholder="" name="kode" values="<?php echo $kode;?>" required>
                    </div>
                    <div class="col-md-1"></div>
                    <label for="nama" class="col-sm-1 col-form-label">Nama</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" placeholder="" name="nama" values="<?php echo $nama;?>" required>
                    </div>
                    <label for="ukuran" class="col-sm-1 col-form-label">Ukuran</label>
                    <div class="col-md-2">
                      <input type="ukuran" class="form-control" placeholder="" name="ukuran" values="<?php echo $ukuran;?>" required>
                    </div>
                    <label for="jenis" class="col-sm-1 col-form-label">Jenis</label>
                    <div class="col-md-2">
                      <input type="jenis" class="form-control" placeholder="" name="id_jenis" values="<?php echo $id_jenis;?>" required>
                    </div>
                    <div class="col-md-1"></div>
                    <label for="kategori" class="col-sm-1 col-form-label">Kategori</label>
                    <div class="col-md-4">
                      <select id="inputState" class="form-select">
                        <option></option>
                        <option>Buket</option>
                        <option>Hampers</option>
                        <option>Seserahan</option>
                      </select>
                    </div>
                    <div class="col-md-1"></div>
                    <label for="stok" class="col-sm-1 col-form-label">Stok</label>
                    <div class="col-md-1">
                      <input type="text" class="form-control" placeholder="" name="stok" values="<?php echo $stok;?>" required>
                    </div>
                    <label for="deskripsi" class="col-sm-1 col-form-label">Deskripsi</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" placeholder="" name="deskripsi" values="<?php echo $deskripsi;?>" required>
                    </div>
                    <div class="py-1"></div>
                    <div class="row mb-3">
                      <label for="image" class="col-sm-1 col-form-label">File Upload</label>
                      <div class="col-md-10">
                        <input class="form-control" type="file" id="formFile" name="image" values="<?php echo $image;?>" required>
                      </div>
                    </div>
                    <div class="py-4">
                      <div class="col-md-4">
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Cari</button>
                          <button type="reset" class="btn btn-primary">Clear</button>
                          <button type="submit" class="btn btn-primary">Update</button>
                          <button type="reset" class="btn btn-primary">Delete</button>
                          <button type="reset" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>

                  
                  
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
                                      <th>Kode Barang</th>
                                      <th>Gambar</th>
                                      <th>Nama</th>
                                      <th>Kategori</th>
                                      <th>Stok</th>
                                      <th>Harga</th>
                                      <th>Ukuran</th>
                                      <th>Jenis</th>
                                      <th>Deskripsi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>0000001</td>
                                      <td>image-buket.png</td>
                                      <td>Buket isi bunga palsu</td>
                                      <td>Buket</td>
                                      <td>75</td>
                                      <td>Rp75.000</td>
                                      <td>L</td>
                                      <td>Mawar</td>
                                      <td>Buket isi bunga imitasi custom</td>
                                  </tr>
                              </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>

            <div class="tab-content pt-2">

              <div class="tab-pane fade habis" id="habis">

                <!-- partial:index.partial.html -->
                  <!-- No Labels Form -->
                  <form class="row g-2">
                    <label for="kode" class="col-sm-1 col-form-label">Kode Barang</label>
                    <div class="col-md-2">
                      <input type="kode" class="form-control" placeholder="">
                    </div>
                    <div class="col-md-1"></div>
                    <label for="nama" class="col-sm-1 col-form-label">Nama</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" placeholder="">
                    </div>
                    <label for="ukuran" class="col-sm-1 col-form-label">Ukuran</label>
                    <div class="col-md-2">
                      <input type="ukuran" class="form-control" placeholder="">
                    </div>
                    <label for="jenis" class="col-sm-1 col-form-label">Jenis</label>
                    <div class="col-md-2">
                      <input type="jenis" class="form-control" placeholder="">
                    </div>
                    <div class="col-md-1"></div>
                    <label for="kategori" class="col-sm-1 col-form-label">Kategori</label>
                    <div class="col-md-4">
                      <select id="inputState" class="form-select">
                        <option></option>
                        <option>Buket</option>
                        <option>Hampers</option>
                        <option>Seserahan</option>
                      </select>
                    </div>
                    <div class="col-md-1"></div>
                    <label for="stok" class="col-sm-1 col-form-label">Stok</label>
                    <div class="col-md-1">
                      <input type="text" class="form-control" placeholder="">
                    </div>
                    <label for="deskripsi" class="col-sm-1 col-form-label">Deskripsi</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="py-1"></div>
                    <div class="row mb-3">
                      <label for="image" class="col-sm-1 col-form-label">File Upload</label>
                      <div class="col-md-10">
                        <input class="form-control" type="file" id="formFile">
                      </div>
                    </div>
                    <div class="py-4">
                      <div class="col-md-4">
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Cari</button>
                          <button type="reset" class="btn btn-primary">Clear</button>
                          <button type="submit" class="btn btn-primary">Update</button>
                          <button type="reset" class="btn btn-primary">Delete</button>
                          <button type="reset" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>

                  
                  
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
                                      <th>Kode Barang</th>
                                      <th>Gambar</th>
                                      <th>Nama</th>
                                      <th>Kategori</th>
                                      <th>Stok</th>
                                      <th>Harga</th>
                                      <th>Ukuran</th>
                                      <th>Jenis</th>
                                      <th>Deskripsi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>0000001</td>
                                      <td>image-buket.png</td>
                                      <td>Buket isi bunga palsu</td>
                                      <td>Buket</td>
                                      <td>0</td>
                                      <td>Rp75.000</td>
                                      <td>L</td>
                                      <td>Mawar</td>
                                      <td>Buket isi bunga imitasi custom</td>
                                  </tr>
                              </tbody>
                              <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            <tbody>
                              <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
=======
>>>>>>> 5c32b2489769c42282bbb2676f5ff6fe95c673f2
