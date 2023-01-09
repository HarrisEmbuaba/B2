<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include ('koneksi.php');

// membuat variabel untuk menampung data dari form
// $id       = $_GET['id'];
// $status   = $_POST['status'];
// $kurir     = $_POST['jasa_kurir'];
// $resi         = $_POST['no_resi'];

// //$id            = $_GET['id'];
// $status   = $_GET['status'];
// $kurir     = $_GET['jasa_kurir'];
// $resi         = $_GET['no_resi'];
// //cek dulu jika merubah gambar produk jalankan coding ini
// $sql = "UPDATE transaksi SET status = 'Dikirim', `jasa_kurir` = '$kurir', `no_resi` = '$resi', waktu_pengiriman = CURRENT_TIMESTAMP WHERE transaksi_id ='$id' ";
//     $result = mysqli_query($mysqli, $sql);

//     //periksa query, apakah ada kesalahan
//     if(!$result) {
//       die ("Gagal mengubah status. Error code: ".mysqli_errno($mysqli).
//        " - ".mysqli_error($mysqli));
//     } else {
//     echo "<script>alert('Status berhasil terupdate!');window.location='pesan2.php';</script>";
//     } 
?>



<?php
//memanggil file koneksi.php untuk melakukan koneksi database
//include ('koneksi.php');

// membuat variabel untuk menampung data dari form
// $id            = $_SESSION['transaksi_id'];
// $status   = $_POST['status'];
// $kurir     = $_POST['jasa_kurir'];
// $resi         = $_POST['no_resi'];

// $id            = $_GET['id'];
// $status   = $_GET['status'];
// $kurir     = $_GET['jasa_kurir'];
// $resi         = $_GET['no_resi'];
//cek dulu jika merubah gambar produk jalankan coding ini


// if($id == "transaksi_id") {

//   if(isset())  {
//                   // jalankan query UPDATE berdasarkan ID yang produknya kita edit
//                   $sql  = "UPDATE `transaksi` SET `status` = '$status', `jasa_kurir` = '$kurir', `no_resi` = '$resi', waktu_pengiriman = CURRENT_TIMESTAMP WHERE `transaksi_id` = '$id'";
//                   $result = mysqli_query($mysqli, $sql);
//                   // periska query apakah ada error
//                   if(!$result){
//                       die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
//                            " - ".mysqli_error($mysqli));
//                   } else {
//                     //tampil alert dan akan redirect ke halaman index.php
//                     //silahkan ganti index.php sesuai halaman yang akan dituju
//                     echo "<script>alert('Data berhasil diubah.');window.location='kirim2.php';</script>";
//                   }
//             } else {
//     // jalankan query UPDATE berdasarkan ID yang produknya kita edit
//     $sql  = "UPDATE `transaksi` SET `status` = '$status', `jasa_kurir` = '$kurir', `no_resi` = '$resi', waktu_pengiriman = CURRENT_TIMESTAMP WHERE `transaksi_id` = '$id'";
//     $result = mysqli_query($mysqli, $sql);
//     // periska query apakah ada error
//     if(!$result){
//           die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
//                            " - ".mysqli_error($mysqli));
//     } else {
//       //tampil alert dan akan redirect ke halaman index.php
//       //silahkan ganti index.php sesuai halaman yang akan dituju
//         echo "<script>alert('Data berhasil diubah.');window.location='kirim2.php';</script>";
//     }
//   }        
// }

// if (!empty($status) && !empty($kurir) && !empty($resi)) {

//   // Cari kode OTP yang terkait dengan alamat email yang dimasukkan pengguna
//   $query = "UPDATE `transaksi` SET `status` = '$status', `jasa_kurir` = '$kurir', `no_resi` = '$resi', waktu_pengiriman = CURRENT_TIMESTAMP WHERE `transaksi_id` = '$id'";
//   $result = mysqli_query($mysqli, $query);
//   $check = mysqli_affected_rows($mysqli);
  
//   if($check > 0){
//       while($ambil = mysqli_fetch_object($result)){
//           $kode = $ambil->kode_otp;
//           if ($otp == $kode){
//               echo "<script>alert('Update berhasil!');window.location='pesan2.php';</script>";
//           } else {
//               echo "<script>alert('Update gagal!');window.location='pesan2.php';</script>";
//           }
//       }
//   }
//   else{
//       echo "<script>alert('Data tidak ada yang diupdate!');window.location='pesan2.php';</script>";
//   }

// mysqli_close($mysqli);
//}

?>

<?php 
include('koneksi.php');

if (isset($_POST['edit'])) {
    $mysqli->autocommit(false);
    try{

        $id = $_POST['transaksi_id'];
        $status = $_POST['status'];
        $jasa_kurir = $_POST['jasa_kurir'];
        $resi = $_POST['no_resi'];
  
            $mysqli->query("UPDATE transaksi SET status = '$status', jasa_kurir='$jasa_kurir', no_resi = 
            '$resi', waktu_pengiriman = CURRENT_TIMESTAMP WHERE transaksi_id = '$id'");
            $mysqli->commit();
            $response['message'] = "Bisa";
            echo "<script>
            alert('Update Informasi Sukses!'); 
            </script>";
            
    }catch(Exception $e){
        $mysqli->rollback();
        $response['message'] = $e->getMessage();
        echo "<script>
        alert('Update Informasi Gagal!'); 
        </script>";
    }
}
?>