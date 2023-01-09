<?php
include('koneksi.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['nama'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $telp = $_POST['telp'];

    $queryCheck = "SELECT * FROM pembeli where email = '$email'";
    $checkEmail = mysqli_query($konek, $queryCheck);
    $rowsEmail = mysqli_affected_rows($konek);

    if ($rowsEmail > 0) {
        $response['kode'] = 3;
    } else {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO pembeli(nama,email,pass,telp) VALUES ('$name','$email','$hash', '$telp')";
        $result = mysqli_query($konek, $query);

        $last_id = $konek->insert_id;

        //random number
        $digits = 5;
        $verifNumber =  rand(pow(10, $digits - 1), pow(10, $digits) - 1);

        //insert table register
        $query2 = "INSERT INTO validasi VALUES ('$verifNumber','Belum Verifikasi','$last_id')";
        $result2 = mysqli_query($konek, $query2);
        $check = mysqli_affected_rows($konek);

        if ($check > 0) {
            $response['kode'] = 1;
            $response['data'] = [
                'id_user' => $last_id
            ];
        } else {
            $response['kode'] = 0;
        }
    }

    echo json_encode($response);
    mysqli_close($konek);
}