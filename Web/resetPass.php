

<?php
require ('koneksi.php');
session_start();

$email = $_SESSION['email'];

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
    echo "<script>alert('Password berhasil terupdate!');window.location='login.html';</script>";
    session_destroy();
    }
  } else {
    echo "Password gagal diupdate!";
  }
  // mysqli_close($mysqli);
}

if (isset($_GET["kode_verifikasi"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
  $pass = $_GET["pass"];
  $curDate = date("Y-m-d H:i:s");
  $query = mysqli_query($mysqli, "SELECT * FROM pembeli WHERE  email='".$email."'");
  $row = mysqli_num_rows($query);

  if ($row==""){

    $error .= '<h2>Invalid Code</h2>
    <p>Code is invalid/expired. Either you did not insert the code from OTP, or you have already used the code in which case it is deactivated.</p>
    <p><a href="sendLink.php"> Click here</a> to reset password.</p>';

  } else {
    
  $row = mysqli_fetch_assoc($query);
//   $status = $row['status'];
  if ($status >= $curDate) {
  
  } else {
    $error .= "<h2>Code Expired</h2>
    <p>Code is expired. You are trying to use the expired code which as valid only 24 hours (1 days after request).<br /><br /></p>";
  }
}

if($error!=""){

  echo "<div class='error'>".$error."</div><br />";

  }      
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
  $error="";
  $pass1 = mysqli_real_escape_string($mysqli,$_POST["pass1"]);
  $pass2 = mysqli_real_escape_string($mysqli,$_POST["pass2"]);
  $curDate = date("Y-m-d H:i:s");
  
  if ($pass1!=$pass2){
    echo "<script>alert('Password tidak sama!');</script>";


  }else if($error!=""){ 
    echo "<div class='error'>".$error."</div><br />";
  } else {
    mysqli_query($mysqli, "UPDATE pemilik SET pass ='$pass1' WHERE email = '$email'");
    echo "<script>alert('Password Berhasil Diubah!');window.location='login.php';</script>";
    if($error!=""){

      echo "<div class='error'>".$error."</div><br />";
    
      }      
    } // isset email key validate end
    
    
    if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
      $error="";
      $pass1 = mysqli_real_escape_string($koneksi,$_POST["pass1"]);
      $pass2 = mysqli_real_escape_string($koneksi,$_POST["pass2"]);
      $curDate = date("Y-m-d H:i:s");
      
      if ($pass1!=$pass2){
        echo "<script>alert('Password tidak sama!');</script>";
    
    
      }else if($error!=""){ 
        echo "<div class='error'>".$error."</div><br />";
      } else {
        mysqli_query($mysqli, "UPDATE pembeli SET password_pbl ='$pass1' WHERE email = '$email'");
        echo "<script>alert('Password Berhasil Diubah!');window.location='login.php';</script>";
      }    
    }
  }
    
?>

<!DOCTYPE html>
<html lang="id">

    <head>
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Reset Password</title>
        <link rel="stylesheet" href="assets/css/stylelog.css">
    </head>

    <body>
        <main>
          <form method="POST" action="" name="update">
            <div class="heading text-center">
              <h2>Reset Password</h2>
            </div>
            
            <div class="actual-form">
              <input type="hidden" name="action" value="update" />
              <br /><br />
              <div class="input-wrap">
                <label>Enter Your New Password Here</label>
                <input type="Password" name="pass1" minlength="8" maxlength="20" class="input-field" autocomplete="off" required />
              </div>
              
              <div class="input-wrap">
                <label>Confirm Your New Password Here</label>
                <input type="Password" name="pass2" minlength="8" maxlength="20" class="input-field" autocomplete="off" required />
              </div>
              <br /><br />

              <input type="hidden" name="email" value="<?php echo $email;?>" />
              <input type="submit" name="submit" value="Ubah Password" class="sign-btn" />
              <p class="text">
                <a href="#">Get help</a> signing in</p>
            </div>
          </form>
        </main>
        <!-- Javascript file -->
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstraphome.bundle.min.js"></script>
        <script src="assets/vendor/chart.js/chart.min.js"></script>
        <script src="assets/vendor/echarts/echarts.min.js"></script>
        <script src="assets/vendor/quill/quill.min.js"></script>
        <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="assets/vendor/php-email-form/validatehome.js"></script>
    </body>
</html>

