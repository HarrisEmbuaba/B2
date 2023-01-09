<?php

include 'koneksi.php';

if ($_POST) {

    //Data
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $response = []; //Data Response

    //Cek username didalam databse
    $userQuery = "SELECT * FROM pembeli JOIN validasi ON pembeli.id_user = validasi.id_user WHERE email = '$email' ;";
    $result = mysqli_query($konek, $userQuery);
    $row = mysqli_fetch_array($result);

    if ($row == 0) {
        $response['status'] = false;
        $response['message'] = "Email Tidak Terdaftar";
    } else {
        // Ambil password di db
        $passwordDB = $row['pass'];
        $verify = password_verify($pass, $passwordDB);
        if ($verify) {
            $response['status'] = true;
            $response['message'] = "Login Berhasil";
            $response['data'] = [
                'id_user' => $row['id_user'],
                'email' => $row['email'],
                'pass' => $row['pass'],
                'status' => $row['status'],
                'nama' => $row['nama'],
                'telp' => $row['telp'],
                'image_user' => $row['image_user'],
                
            ];
        } else {
            $response['status'] = false;
            $response['message'] = "Password anda salah";
        }
    }

    //Jadikan data JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print
    echo ($json);
}