<?php 
require ('koneksi.php');
include ('login.html');

session_start();
error_reporting(0);
if (isset($_SESSION['nama'])) {
   // header("Location: login.php");
}

if (isset($_POST['Login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
 
    $sql = "SELECT * FROM pemilik WHERE email ='$email' AND pass='$pass'";
    $result = mysqli_query($mysqli, $sql);
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['pass'] = $row['pass'];
        $_SESSION['email'] = $row['email'];
        echo "<script>alert('BERHASIL LOGIN. Silahkan coba lagi!')</script>";
        header("Location: home.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>