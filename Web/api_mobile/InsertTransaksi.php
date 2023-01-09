<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $waktu = $_POST['waktu_transaksi'];
    $total = $_POST['grand_total'];
    $status = $_POST['status'];
    $status = 'Belum Bayar';

    $query1 = "INSERT INTO transaksi (waktu_transaksi, grand_total, status) VALUES ('$waktu','$total','$status') ";
    $eksekusi1 = mysqli_query($konek, $query1);
    $cek = mysqli_affected_rows($konek);

    if($cek > 0){
        $response["kode"] = 1;

    }else{

            $response['kode'] = 0;
        }
 echo json_encode($response);
    mysqli_close($konek);
    }
?>