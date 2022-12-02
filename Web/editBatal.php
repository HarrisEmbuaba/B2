<?php 

require ('koneksi.php');
include ('editBatal.html');


if (isset($_POST['Edit Status'])) {
    $id = $_GET['transaksi_id'];
    $status = $_POST['status'];
 
    $sql = "UPDATE transaksi set status='$status'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['transaksi_id'];
        $_SESSION['status'] = $row['status'];
        echo "<script>alert('Status berhasil diupdate!')</script>";
        header("Location: pesan2.php");
    } else {
        echo "<script>alert('Status gagal diupdate!')</script>";
    }
}

?>