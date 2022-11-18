
<!-- require ('koneksi.php');
include ("login.html");

session_start();

if (isset($_POST['submit']) ){
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    /* 
    $emailCheck = mysqli_real_escape_string($koneksi, $email);
    $ */
    
    if(!empty(trim($email)) && !empty(trim($pass))) {
        //select data berdasarkan username dari database
        $query = "SELECT * FROM pemilik WHERE email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)) {
            $userVal = $row['email'];
            $passVal = $row['pass'];
            $username = $row['nama'];
            $level = $row['telp'];
        }
        if($num != 0) {
            if ($userVal==$email && $passVal==$pass) {
                header('Location: home.php?user_fullname=' . urldecode($username));
            } else {
                $error = 'user atau password salah!!';
                header('Location: login.php');
            }
        }else {
            $error= 'user tidak boleh kosong';
            header('Location: login.php');
        }
    }else {
        $error = 'Data tidak boleh kosong!!';
        echo $error;
    }
} -->

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
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['pass'] = $row['pass'];
        $_SESSION['email'] = $row['email'];
        echo "<script>alert('BERHASIL LOGIN. Silahkan coba lagi!')</script>";
        header("Location: berhasil_login.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>