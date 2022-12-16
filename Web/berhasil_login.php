<?php 
 
session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Berhasil Login</title>
</head>
<body>
    <div class="container-logout">
        <form action="" method="POST" class="login-email">
        <div class="py-1">
            <?php echo "<h1>Selamat Datang, " . $_SESSION['nama'] ."!". "</h1>"; ?>
             
            <div class="input-group">
            <a href="home.html" class="btn">Lanjutkan</a>
            </div>
        </div>    
        </form>
    </div>
</body>
</html>