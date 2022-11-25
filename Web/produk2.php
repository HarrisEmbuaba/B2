<?php
include ('koneksi.php');

error_reporting(0);
session_start();

if(isset($_SESSION['id_barang'])){
  header("Location: produk2.php");
}

$err = "";
$sukses = "";
$kode = "";

if(isset($_POST['Submit'])){
  $kode = $_POST['id_barang'];
  $nama = $_POST['nama_barang'];
  $image = $_FILES['image'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $kategori = $_POST['barang_jenis'];
  $ukuran = $_POST['ukuran'];
  $warna = $_POST['warna'];
  $id_jenis = $_POST['id_jenis'];
  $id_ukuran = $_POST['id_ukuran'];
  $id_warna = $_POST['id_warna'];
  
  if(!$result->num_rows > 0){
    $sql = "INSERT INTO `barang`(`nama_barang`,`image`,`deskripsi`,`harga`,`stok`,`id_jenis`,`id_ukuran`,`id_warna`)
    VALUES ('$nama','$image','$deskripsi','$harga','$stok','$id_jenis','$id_ukuran','$id_warna')";

    $result = mysqli_query($koneksi,$sql);

    if($result){
      echo "<script>alert('Barang berhasil ditambahkan!')</script>";
      
      $nama = "";
      $image = "";
      $deskripsi = "";
      $harga = "";
      $stok = "";
      $kategori = "";
      $ukuran = "";
      $warna = "";
      $_POST['nama_barang'] = "";
      $_POST['image'] = "";
      $_POST['deskripsi'] = "";
      $_POST['harga'] = "";
      $_POST['stok'] = "";
      $_POST['barang_jenis'] = "";
      $_POST['ukuran'] = "";
      $_POST['warna'] = "";
    } else {
      echo "<script>alert('Barang gagal ditambahkan!')</script>";
    }

    
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Produk</title>
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
        <a class="nav-link collapsed" href="produk2.php">
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
                  <form class="row g-2" action="produk2.php" method="post">
                    <label for="kode" class="col-sm-1 col-form-label">Kode Barang</label>
                    <div class="col-md-2">
                        <select name="id_barang" class="form-control">
                        <?php
                                $sql = "SELECT id_barang FROM barang";
                                $all_categories = mysqli_query($mysqli, $sql);
                                echo $row["id_barang"];
                            ?>
                        </select>
                    </div>
                    <div class="col-md-1"></div>
                    <label for="nama" class="col-sm-1 col-form-label">Nama</label>
                    <div class="col-md-4">
                      <input type="text" name="nama_barang" class="form-control" placeholder="">
                    </div>
                    <label for="ukuran" class="col-sm-1 col-form-label">Ukuran</label>
                    <div class="col-md-4">
                      <select name="ukuran" class="form-select">
                      <?php
                            $sql = "SELECT * FROM jenis_ukuran";
                            $all_categories = mysqli_query($mysqli, $sql);
                        ?>
                        <?php
                            while ($category = mysqli_fetch_array($all_categories)){
                        ?>
                            <option value="<?php echo $category["id_ukuran"];?>">
                                <?php echo $category["ukuran"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <label for="jenis" class="col-sm-1 col-form-label">Warna</label>
                    <div class="col-md-2">
                        <select name="warna" class="form-select">
                        <?php
                                $sql = "SELECT * FROM jenis_warna";
                                $all_categories = mysqli_query($mysqli, $sql);
                            ?>
                            <?php
                                while ($category = mysqli_fetch_array($all_categories)){
                            ?>
                                <option value="<?php echo $category["id_warna"];?>">
                                    <?php echo $category["warna"]; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-1"></div>
                    <label for="kategori" class="col-sm-1 col-form-label">Kategori</label>
                    <div class="col-md-4">
                      <select type="option" name="jenis_barang" class="form-select">
                      <?php
                            $sql = "SELECT * FROM jenis_barang";
                            $all_categories = mysqli_query($mysqli, $sql);
                        ?>
                        <?php
                            while ($category = mysqli_fetch_array($all_categories)){
                        ?>
                            <option value="<?php echo $category["id_jenis"];?>">
                                <?php echo $category["barang_jenis"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-1"></div>
                    <label for="stok" class="col-sm-1 col-form-label">Stok</label>
                    <div class="col-md-1">
                      <input type="text" name="stok" class="form-control" placeholder="">
                    </div>
                    <label for="deskripsi" class="col-sm-1 col-form-label">Deskripsi</label>
                    <div class="col-md-3">
                      <input type="text" name="deskripsi" class="form-control" placeholder="">
                    </div>
                    <div class="py-1"></div>
                    <div class="row mb-3">
                      <label for="image" class="col-sm-1 col-form-label">File Upload</label>
                      <div class="col-md-10">
                        <input type="file" name="image" class="form-control" type="file" id="formFile">
                      </div>
                    </div>
                    <div class="py-4">
                      <div class="col-md-4">
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Cari</button>
                          <button type="reset" class="btn btn-primary">Clear</button>
                          <button type="submit" class="btn btn-primary">Update</button>
                          <button type="reset" class="btn btn-primary">Delete</button>
                          <button type="submit" name="Submit" class="btn btn-primary">Input</button>
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
                                      <th>Nama</th>
                                      <th>Gambar</th>
                                      <th>Deskripsi</th>
                                      <th>Harga</th>
                                      <th>Stok</th>
                                      <th>Kategori</th>
                                      <th>Ukuran</th>
                                      <th>Warna</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                            <?php
                            $query="SELECT barang.id_barang, barang.nama_barang, barang.image, barang.deskripsi, 
                            barang.harga, barang.stok, jenis_barang.barang_jenis, jenis_ukuran.ukuran, jenis_warna.warna 
                            FROM barang 
                            RIGHT JOIN jenis_barang ON barang.id_jenis=jenis_barang.id_jenis 
                            RIGHT JOIN jenis_ukuran ON barang.id_ukuran=jenis_ukuran.id_ukuran 
                            RIGHT JOIN jenis_warna ON barang.id_warna=jenis_warna.id_warna 
                            WHERE stok > 0;";
                                if ($result = $mysqli->query($query)) {
                                    while ($row = $result->fetch_assoc()) {
                                        $field1name = $row["id_barang"];
                                        $field2name = $row["nama_barang"];
                                        $field3name = $row["image"];
                                        $field4name = $row["deskripsi"];
                                        $field5name = $row["harga"];
                                        $field6name = $row["stok"];
                                        $field7name = $row["barang_jenis"]; 
                                        $field8name = $row["ukuran"]; 
                                        $field9name = $row["warna"]; 
                                        $field10name = $row["action"];
                                        ?>
                                        <tr>  
                                            <th><?php echo $field1name ?></th> 
                                            <td><?php echo $field2name ?></td> 
                                            <td style="text-align: center;"><img src="gambar/<?php echo $field3name ?>" style="width: 120px;"></td> 
                                            <td><?php echo $field4name ?></td> 
                                            <td><?php echo $field5name ?></td> 
                                            <td><?php echo $field6name ?></td>
                                            <td><?php echo $field7name ?></td>
                                            <td><?php echo $field8name ?></td>
                                            <td><?php echo $field9name ?></td> 
                                            <td>
                                                <a href="edit_produk.php?id=<?php echo $field1name ?>">Edit</a><br><br><br><br>
                                                <a href="proses_hapus.php?id=<?php echo $field1name ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
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

              <div class="tab-pane fade habis" id="habis">

                <!-- partial:index.partial.html -->
                  <!-- No Labels Form -->
                  <form class="row g-2">
                    <label for="kode" class="col-sm-1 col-form-label">Kode Barang</label>
                    <div class="col-md-2">
                      <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="col-md-1"></div>
                    <label for="nama" class="col-sm-1 col-form-label">Nama</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" placeholder="">
                    </div>
                    <label for="nama" class="col-sm-1 col-form-label">Harga</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" placeholder="">
                    </div>
                    <label for="ukuran" class="col-sm-1 col-form-label">Ukuran</label>
                    <div class="col-md-4">
                      <select type="option" name="barang_jenis" id="inputState" class="form-select">
                        
                        <option>s</option>
                        <option>m</option>
                        <option>l</option>
                      </select>
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
                          <button type="submit" class="btn btn-primary">Input</button>
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
                                      <th>Nama</th>
                                      <th>Gambar</th>
                                      <th>Deskripsi</th>
                                      <th>Harga</th>
                                      <th>Stok</th>
                                      <th>Kategori</th>
                                      <th>Ukuran</th>
                                      <th>Warna</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                            <?php
                            $query="SELECT barang.id_barang, barang.nama_barang, barang.image, barang.deskripsi, 
                            barang.harga, barang.stok, jenis_barang.barang_jenis, jenis_ukuran.ukuran, jenis_warna.warna 
                            FROM barang 
                            RIGHT JOIN jenis_barang ON barang.id_jenis=jenis_barang.id_jenis 
                            RIGHT JOIN jenis_ukuran ON barang.id_ukuran=jenis_ukuran.id_ukuran 
                            RIGHT JOIN jenis_warna ON barang.id_warna=jenis_warna.id_warna 
                            WHERE stok = 0;";
                                if ($result = $mysqli->query($query)) {
                                    while ($row = $result->fetch_assoc()) {
                                        $field1name = $row["id_barang"];
                                        $field2name = $row["nama_barang"];
                                        $field3name = $row["image"];
                                        $field4name = $row["deskripsi"];
                                        $field5name = $row["harga"];
                                        $field6name = $row["stok"];
                                        $field7name = $row["barang_jenis"]; 
                                        $field8name = $row["ukuran"]; 
                                        $field9name = $row["warna"]; 
                                        $field10name = $row["action"];
                                        ?>
                                        <tr>  
                                            <th><?php echo $field1name ?></th> 
                                            <td><?php echo $field2name ?></td> 
                                            <td style="text-align: center;"><img src="gambar/<?php echo $field3name ?>" style="width: 120px;"></td> 
                                            <td><?php echo $field4name ?></td> 
                                            <td><?php echo $field5name ?></td> 
                                            <td><?php echo $field6name ?></td>
                                            <td><?php echo $field7name ?></td>
                                            <td><?php echo $field8name ?></td>
                                            <td><?php echo $field9name ?></td> 
                                            <td>
                                                <a href="edit_produk.php?id=<?php echo $field1name ?>">Edit</a><br><br><br><br>
                                                <a href="proses_hapus.php?id=<?php echo $field1name ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
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