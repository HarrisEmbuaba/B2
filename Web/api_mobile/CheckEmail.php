<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];

    $queryCheck = "SELECT * FROM pembeli where email = '$email'";
    $checkEmail = mysqli_query($konek, $queryCheck);
    $rowsEmail = mysqli_affected_rows($konek);


    if ($rowsEmail > 0) {
        $response['kode'] = 1;
        $response['message'] = "Email Tersedia";
    } else {
        $response['kode'] = 0;
        $response['message'] = "Email Tidak Tersedia";
    }

    echo json_encode($response);
    mysqli_close($konek);
}