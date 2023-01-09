<?php

include 'koneksi.php';

if ($_POST) {
    //
    $id_user = $_POST['id_user'];

    $response = [];

    $queryTampil = "SELECT * FROM validasi WHERE id_user = '$id_user';";
    $result = mysqli_query($konek, $queryTampil);
    $row = mysqli_fetch_array($result);

    if ($row == 0) {
        $response['status'] = false;
        $response['messgae'] = "Data Kosong";
    } else {
        $response['status'] = true;
        $response['message'] = "Data Ada";
        $response['data'] = [
            'kode_verifikasi' => $row['kode_verifikasi'],
            'id_user' => $row['id_user'],
            'status' => $row['status']
        ];
    }
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print
    echo ($json);
}