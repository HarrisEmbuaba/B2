<?
require ('koneksi.php');

session_start();

if(isset($_GET['kata_cari'])) {

	$kata_cari = $_GET['kata_cari'];

	$query = "SELECT * FROM transaksi WHERE transaksi_id like '%".$kata_cari."%' OR nama_barang like '%".$kata_cari."%' OR total like '%".$kata_cari."%' ORDER BY transaksi_id ASC";
} else {
    
	$query = "SELECT * FROM transaksi ORDER BY transaksi_id ASC";
}
?>

<!-- </?php 
// require ('koneksi.php');
// include ('login.html');

// session_start();
// error_reporting(0);
// if (isset($_SESSION['nama'])) {
//    // header("Location: login.php");
// }

// if (isset($_POST['Login'])) {
//     $email = $_POST['email'];
//     $pass = $_POST['pass'];
 
//     $sql = "SELECT * FROM pemilik WHERE email ='$email' AND pass='$pass'";
//     $result = mysqli_query($conn, $sql);
//     $check = mysqli_num_rows($result);
//     if ($check > 0) {
//         $row = mysqli_fetch_assoc($result);
//         $_SESSION['nama'] = $row['nama'];
//         $_SESSION['pass'] = $row['pass'];
//         $_SESSION['email'] = $row['email'];
//         echo "<script>alert('BERHASIL LOGIN. Silahkan coba lagi!')</script>";
//         header("Location: berhasil_login.php");
//     } else {
//         echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
//     }
// }

?> -->