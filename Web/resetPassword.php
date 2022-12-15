<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylelog.css">
</head>
<body>
    
    <div class="container">
        <div class="reset">
            <div class="center">
                <img src="assets/img/reset.png" width="100" height="100" alt="">
            </div>
            <form action="resetPassword.php" method="post">
                <h4 style="text-align: center;">Masukkan Email Anda untuk Verifikasi</h4>
                <input type="text" name="email" placeholder="Email">
                <button name="reset">Kirim</button>
            </form>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("inputEmail");
            if (x.type === "email") {
                x.type = "text";
            } else {
                x.type = "email";
            }
        }
    </script>
</body>
</html>