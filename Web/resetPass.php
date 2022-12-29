<html>
<link href="assets/css/stylelog.css" rel="stylesheet">
  <body>
  <form method="POST" action="">
    <input type="hidden" name="action" value="update" />
    <br /><br />
    <label><strong>Enter New Password:</strong></label><br />
    <input type="password" id="passup" name="pass1" maxlength="15" required />
    <br /><br />
    <label><strong>Re-Enter New Password:</strong></label><br />
    <input type="password" id="passdown" name="pass2" maxlength="15" required/>
    <br /><br />
    <input type="submit" value="Reset Password" />
  </form>
  </body>
</html>

<?php
require ('koneksi.php');
session_start();

$email = $_SESSION['email'];
// Validasi input
if (empty($email)) {
  echo "<script>alert('Email kosong!')</script>";

} else {

  if (isset($_POST["passup"]) && isset($_POST["passdown"])){
    $pass = $_POST['passup'];
    $pass2 = $_POST['passdown'];

    if ($pass != $pass2){
      echo "<script>alert('Password tidak sama!');window.location='resetPass.php';</script>";
    } else {
    // Cari kode OTP yang terkait dengan alamat email yang dimasukkan pengguna
    $query = "UPDATE pemilik SET pass = '$pass' WHERE email = '$email'";
    $result = mysqli_query($mysqli, $query);
    $check = mysqli_affected_rows($mysqli);
    echo "<script>alert('Password berhasil diganti!');window.location='login.html';</script>";
    session_destroy();
    }
  } else {
    echo "Password Error";
  }
  mysqli_close($mysqli);
}
?>