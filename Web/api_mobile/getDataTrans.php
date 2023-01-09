<?php
require('koneksi.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $querySelect = "SELECT transaksi_id, waktu_transaksi, grand_total FROM transaksi ORDER BY transaksi_id DESC, transaksi_id DESC LIMIT 1;";
    $result = mysqli_query($konek, $querySelect);
    $row = mysqli_fetch_array($result);

    if ($row > 0) {
        $response['kode'] = 1;
        $response['message'] = "Data Tersedia";
        $response['data'] = [
            'transaksi_id' => $row['transaksi_id'],
            'waktu_transaksi' => $row['waktu_transaksi'],
            'grand_total' => $row['grand_total']
            
        ];
    } else {
        $response['kode'] = 0;
        $response['message'] = "Data Kosong";
    }

    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print
    echo ($json);
}