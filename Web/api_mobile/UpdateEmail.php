<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];

    $queryUpdate = "UPDATE validasi SET status = 'verifikasi' WHERE id_user = '$id_user'";
    $result = mysqli_query($konek, $queryUpdate);

    $check = mysqli_affected_rows($konek);
    if ($check > 0) {
        $response['kode'] = 1;
    } else {
        $response['kode'] = 0;
    }
    echo json_encode($response);
    mysqli_close($konek);
}