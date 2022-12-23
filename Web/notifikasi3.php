

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylelog.css">
</head>
<body>
    <div class="row">
    <div class="container">
        <div class="notifikasi">
            <form action="notifikasi.php" method="post">
            <?php

            require 'koneksi.php';

            // Cek apakah ada pesanan baru
            $query = "SELECT COUNT(*) FROM transaksi WHERE status = 'Belum bayar'";
            $result = mysqli_query($mysqli, $query);
            $count = mysqli_fetch_row($result)[0];

            if ($count > 0) {
                if(isset($_POST['status'])){
                    $baru = "SELECT COUNT(*) FROM transaksi WHERE status = 'Belum bayar'";
                    $result = mysqli_query($mysqli, $baru);
                    $count = mysqli_fetch_row($result)[0];

                    echo '<div class="notification">';
                    echo '<p>Ada ' . $count . ' pesanan baru!</p>';
                    echo '<a href="/notifikasi.php">Lihat semua pesanan</a>';
                    echo '</div>';
                }
            }
            ?>
            </form>
        </div>
    </div>
    </div>
    <!-- <script>
        function myFunction() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script> -->
</body>
</html>
