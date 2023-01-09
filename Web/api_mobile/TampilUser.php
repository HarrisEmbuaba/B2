<?php
require('koneksi.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_user = $_POST['id_user'];

    $querySelect = "SELECT * FROM `pembeli` WHERE id_user = '$id_user';";
    $result = mysqli_query($konek, $querySelect);
    $row = mysqli_fetch_array($result);

    if ($row > 0) {
        $response['kode'] = 1;
        $response['message'] = "Data Tersedia";
        $response['data'] = [
            'id_user' => $row['id_user'],
            'nama' => $row['nama'],
            'telp' => $row['telp'],
            'email' => $row['email'],
            'image_user' => $row['image_user']
        ];
    } else {
        $response['kode'] = 0;
        $response['message'] = "Data Kosong";
    }

    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print
    echo ($json);
}