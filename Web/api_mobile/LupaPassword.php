<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $queryCheck = "UPDATE pembeli SET pass = '$hash' where email = '$email'";
    $checkEmail = mysqli_query($konek, $queryCheck);
    $rowsEmail = mysqli_affected_rows($konek);

    if ($rowsEmail > 0) {
        $response['kode'] = 1;
        $response['message'] = "Password Telah Di Rubah";
    } else {
        $response['kode'] = 0;
        $response['message'] = "Gagal Merubah Password";
    }

    echo json_encode($response);
    mysqli_close($konek);
}