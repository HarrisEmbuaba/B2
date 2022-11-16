<?php
require ('koneksi.php');

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
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="left">
        <img src="img/gbuket.png" alt="">
        <h1>Selamat Datang</h1>
    </div>
    <div class="container">
        <div class="login">
            <form action="">
                <img src="img/ilog.png" alt="">
                <input type="text"
                placeholder="Email">
                <input type="password"
                placeholder="Password">
                <p>
                    <a href="#">Lupa Kata Sandi?</a>
                </p>
                <button>MASUK</button>
            </form>
        </div>
    </div>
</body>
</html>
