<?php
include ('koneksi.php');
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
          <img src="assets/img/kirim.png" width="35px" height="35px"></i>
        </a><br />
      </li><!-- End Kirim Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="produk2.[h[">
          <img src="assets/img/produk1.png" width="35px" height="35px"></i>
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
              <h1>Produk</h1>                
                <u class="nav nav-tabs nav-tabs-bordered"></u>
                <div class="mb-4">
            <div class="py-3">
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
                  <div class="card-body">
                  <form class="row g-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary center-block" data-bs-toggle="modal" data-bs-target="#tambahBarang">
                      + Barang
                    </button>

                  </form>
                  </div>

                  
                  <!-- DataTales Example -->
                <div class="mb-4">
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
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
                                    $query = "SELECT * FROM barang WHERE (nama_barang like '%".$cari."%' OR harga like '%".$cari."%') AND stok > 0 ORDER BY id_barang DESC";
                                } else {
                                //jika tidak ada pencarian, default yang dijalankan query ini
                                    $query = "SELECT * FROM barang WHERE stok > 0 ORDER BY id_barang DESC"; 
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
                                    <td><?php echo $row['nama_barang']; ?></td> 
                                    <td style="text-align: center;"><img src="gambarproduk/<?php echo $row['image']; ?>" style="width: 120px;"></td> 
                                    <td><textarea name="deskripsi" id="" cols="50" rows="7" class="border border-0"><?php echo $row['deskripsi']; ?></textarea></td> 
                                    <td>Rp.<?php echo $row['harga']; ?></td> 
                                    <td><?php echo $row['stok']; ?></td> 
                                    <td>
                                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editBarang
                                      <?php echo $row['id_barang']; ?>">Ubah</button> &nbsp;&nbsp;
                                        <!-- Modal Edit-->
                                        <div class="modal" tabindex="-1" id="editBarang<?php echo $row['id_barang']; ?>">
                                          <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <form action="editProduk.php" method="POST" enctype="multipart/form-data">
                                              <div class="modal-header">
                                                <h5 class="modal-title">Ubah Barang</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">

                                              <?php
                                              $id = $row['id_barang'];
                                              $edit_query = mysqli_query($mysqli, "SELECT * FROM barang WHERE id_barang = $id");
                                              if(mysqli_num_rows($edit_query) > 0){
                                                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
                                              ?>

                                                  <div>
                                                  <input type="hidden" class="form-control" name="id" value="<?php echo $row['id_barang']; ?>" required>

                                                    <label>Nama Barang : </label>
                                                    <input type="text" class="form-control" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
                                                  </div>&nbsp;&nbsp;
                                                  <div>
                                                    <label>Kategori : </label>
                                                    <select class="form-control"  name="barang_jenis" required>
                                                      <option value="<?= @$row['barang_jenis']; ?>"><?= @$row['barang_jenis']; ?></option>
                                                      <option value="Bucket">Bucket</option>
                                                      <option value="Seserahan">Seserahan</option>
                                                      <option value="Hampers">Hampers</option>
                                                    </select>
                                                  </div>&nbsp;&nbsp;
                                                  <div>
                                                    <label>Harga : </label>
                                                    <input type="text" class="form-control" name="harga" value="<?php echo $row['harga']; ?>" required>
                                                  </div>&nbsp;&nbsp;
                                                  <div>
                                                    <label>Stok : </label>
                                                    <input type="text" class="form-control" name="stok" value="<?php echo $row['stok']; ?>" required>
                                                  </div>&nbsp;&nbsp;
                                                  <div>
                                                    <label>Gambar :</label><br>
                                                    <img src="gambarproduk/<?php echo $row['image']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                                                    <input type="file" class="form-control" name="image" value="<?php echo $row['image']; ?>" accept="image/png, image/jpg, image/jpeg">
                                                    <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                                                  </div>&nbsp;&nbsp;
                                                  <div>
                                                    <label>Deskripsi :</label>
                                                    <textarea class="form-control" name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea>
                                                  </div><br>  
                                                  <?php
                                                    // };
                                                };
                                                ?>

                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-warning"><a href="editProduk.php?id=<?php echo $row['id_barang'] ?>">
                                              </a> Simpan Perubahan</button>
                                              </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- End Modal Edit-->

                                        <a href="hapusProduk.php?id=<?php echo $row["id_barang"]; ?>" class="btn btn-danger" 
                                        onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                    </td>
                                  </tr>
                                  <?php
                                    $no++;
                                    }
                                }
                                $result->free();
                                ?>
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>

                <!-- Modal Tambah-->
                <div class="modal" tabindex="-1" id="tambahBarang">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <form action="tambahProduk.php" method="POST" enctype="multipart/form-data">
                      <div class="modal-header">
                        <h5 class="modal-title">Tambah Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                          <div>
                            <label>Nama Barang : </label>
                            <input type="text" class="form-control" name="nama_barang" required>
                          </div>&nbsp;&nbsp;
                          <div>
                            <label>Kategori : </label>
                            <select class="form-control" name="barang_jenis" required>
                              <option value=""></option>
                              <option value="Bucket">Bucket</option>
                              <option value="Seserahan">Seserahan</option>
                              <option value="Hampers">Hampers</option>
                            </select>
                          </div>&nbsp;&nbsp;
                          <div>
                            <label>Harga : </label>
                            <input type="text" class="form-control" name="harga" required>
                          </div>&nbsp;&nbsp;
                          <div>
                            <label>Stok : </label>
                            <input type="text" class="form-control" name="stok" required>
                          </div>&nbsp;&nbsp;
                          <div>
                            <label>Gambar :</label>
                            <input type="file" class="form-control" name="image" accept="image/png, image/jpg, image/jpeg" required>
                          </div>&nbsp;&nbsp;
                          <div>
                            <label>Deskripsi :</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                          </div><br> 
                        <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>  &nbsp; &nbsp;
                        <br> 

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="tambah" class="btn btn-warning">Simpan</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modal Tambah-->



                <div class="tab-content pt-1">
                  <div class="tab-pane fade habis" id="habis" >

                    <!-- partial:index.partial.html -->
                      <!-- No Labels Form -->
                  <div class="card-body">
                  <form class="row g-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary center-block" data-bs-toggle="modal" 
                    data-bs-target="#tambahBarang">+ Barang</button>
                  </form>
                  </div>
                  
                  <!-- DataTales Example -->
                <div class="mb-4">
                  <div class="card-body">
                      <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
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
                                    $query = "SELECT * FROM barang WHERE (nama_barang like '%".$cari."%' OR harga like '%".$cari."%') AND stok = 0 ORDER BY id_barang DESC";
                                } else {
                                //jika tidak ada pencarian, default yang dijalankan query ini
                                    $query = "SELECT * FROM barang WHERE stok = 0 ORDER BY id_barang DESC"; 
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
                                  <td><?php echo $row['nama_barang']; ?></td> 
                                  <td style="text-align: center;"><img src="gambarproduk/<?php echo $row['image']; ?>" style="width: 120px;"></td> 
                                  <td><?php echo $row['deskripsi']; ?></td> 
                                  <td>Rp.<?php echo $row['harga']; ?></td> 
                                  <td><?php echo $row['stok']; ?></td> 
                                  <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editBarang<?php echo $row['id_barang']; ?>">
                                    Ubah</button> &nbsp;&nbsp;
                                        <!-- Modal Edit-->
                                        <div class="modal" tabindex="-1" id="editBarang<?php echo $row['id_barang']; ?>">
                                          <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <form action="editProduk.php" method="POST" enctype="multipart/form-data">
                                              <div class="modal-header">
                                                <h5 class="modal-title">Ubah Barang</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">

                                              <?php
                                              $id = $row['id_barang'];
                                              $edit_query = mysqli_query($mysqli, "SELECT * FROM barang WHERE id_barang = $id");
                                              if(mysqli_num_rows($edit_query) > 0){
                                                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
                                              ?>

                                                  <div>
                                                  <input type="hidden" class="form-control" name="id" value="<?php echo $row['id_barang']; ?>" required>

                                                    <label>Nama Barang : </label>
                                                    <input type="text" class="form-control" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
                                                  </div>&nbsp;&nbsp;
                                                  <div>
                                                    <label>Kategori : </label>
                                                    <select class="form-control"  name="barang_jenis" required>
                                                      <option value="<?= @$row['barang_jenis']; ?>"><?= @$row['barang_jenis']; ?></option>
                                                      <option value="Bucket">Bucket</option>
                                                      <option value="Seserahan">Seserahan</option>
                                                      <option value="Hampers">Hampers</option>
                                                    </select>
                                                  </div>&nbsp;&nbsp;
                                                  <div>
                                                    <label>Harga : </label>
                                                    <input type="text" class="form-control" name="harga" value="<?php echo $row['harga']; ?>" required>
                                                  </div>&nbsp;&nbsp;
                                                  <div>
                                                    <label>Stok : </label>
                                                    <input type="text" class="form-control" name="stok" value="<?php echo $row['stok']; ?>" required>
                                                  </div>&nbsp;&nbsp;
                                                  <div>
                                                    <label>Gambar :</label><br>
                                                    <img src="gambarproduk/<?php echo $row['image']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                                                    <input type="file" class="form-control" name="image" value="<?php echo $row['image']; ?>" accept="image/png, image/jpg, image/jpeg">
                                                    <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                                                  </div>&nbsp;&nbsp;
                                                  <div>
                                                    <label>Deskripsi :</label>
                                                    <textarea class="form-control" name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea>
                                                  </div><br>  
                                                  <?php
                                                    // };
                                                };
                                                ?>

                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-warning"><a href="editProduk.php?id=<?php echo $row['id_barang'] ?>"></a> Simpan Perubahan</button>
                                              </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- End Modal Edit-->

                                        <a href="hapusProduk.php?id=<?php echo $row["id_barang"]; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                    </td>
                                  </tr>
                                    <?php
                                    $no++;
                                    }
                                }
                                $result->free();
                                ?>
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>

                <!-- Modal Tambah-->
                <div class="modal" tabindex="-1" id="tambahBarang">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <form action="tambahProduk.php" method="POST" enctype="multipart/form-data">
                      <div class="modal-header">
                        <h5 class="modal-title">Tambah Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                          <div>
                            <label>Nama Barang : </label>
                            <input type="text" class="form-control" name="nama_barang" required>
                          </div>&nbsp;&nbsp;
                          <div>
                            <label>Kategori : </label>
                            <select class="form-control" name="barang_jenis" required>
                              <option value=""></option>
                              <option value="Bucket">Bucket</option>
                              <option value="Seserahan">Seserahan</option>
                              <option value="Hampers">Hampers</option>
                            </select>
                          </div>&nbsp;&nbsp;
                          <div>
                            <label>Harga : </label>
                            <input type="text" class="form-control" name="harga" required>
                          </div>&nbsp;&nbsp;
                          <div>
                            <label>Stok : </label>
                            <input type="text" class="form-control" name="stok" required>
                          </div>&nbsp;&nbsp;
                          <div>
                            <label>Gambar :</label>
                            <input type="file" class="form-control" name="image" accept="image/png, image/jpg, image/jpeg" required>
                          </div>&nbsp;&nbsp;
                          <div>
                            <label>Deskripsi :</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                          </div><br> 
                        <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>  &nbsp; &nbsp;
                        <br> 

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="tambah" class="btn btn-warning">Simpan</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modal Tambah-->

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
  <script>
        $(document).ready(function () {
            $('#dataTable1').DataTable();
        });
        </script>

<script>
        $(document).ready(function () {
            $('#dataTable2').DataTable();
        });
        </script>

</body>

</html>