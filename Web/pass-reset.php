<?php 

include 'koneksi.php';
 
error_reporting(0);
 
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function kirim_email($email_penerima,$nama_penerima,$judul_email,$isi_email ){
    
    $email_pengirim = "maulitamila9@gmail.com";
    $nama_pengirim = "Maulita Mila";
    
    //Load Composer's autoloader
    require getcwd().'/vendor/autoload.php';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $email_pengirim;                     //SMTP username
        $mail->Password   = 'secret';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($email_pengirim, $nama_pengirim);
        $mail->addAddress($email_penerima, $nama_penerima);     //Add a recipient
        
    
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $judul_email;
        $mail->Body    = $isi_email;
       
    
        $mail->send();
        return "sukses" ;
    } catch (Exception $e) {
        return "Gagal: {$mail->ErrorInfo}";
    }
}
if (isset($_SESSION['email']) != '') {
    //header("Location: login.php");
}
$err    = "";
$sukses = "";
$email  = "";
 
if (isset($_POST['submit'])) {
    
    $email = $_POST['email'];
    if ($email == ''){
        $err = "silahkan masukkan email";
    }else{
        $sql1   = "select * from pemilik where email = '$email'";
        $q1     = mysqli_query($conn,$sql1);
        $n1     = mysqli_num_rows($q1);

        if($n1<1){
            $err = "Email : <b>$email</b> tidak ditemukan";
        }
    }

    if(empty($err)){
        $sukses = "Klik <a href='reset_password.php'>disini<a/> untuk mereset pasword";

    }

 
    
    
}

?>


<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 <link rel="stylesheet" type="text/css" href="lupa_password.css">

 <title>Lupa password</title>
</head>
<body>
 <div class="container">
  <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Lupa Password</p>
            <?php if($err){echo "<div class='error'>$err</div>";}?>
    <?php if($sukses){echo "<div class='sukses'>$sukses</div>";}?>
   <div class="input-group">
    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
   </div>
   
   <div class="input-group">
    <button name="submit" class="btn">Kirim</button>
   </div>

   <p class="login-register-text"><a href="login.php">Login </a></p>
  </form>
 </div>
</body>
</html>