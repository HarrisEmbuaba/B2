<?php 
require('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $id_transaksi = $_POST['transaksi_id'];
    $Status = 'dibatalkan';
    $parsingTanggal = date("Ymd");



    $query1 = "UPDATE transaksi SET status = '$Status', waktu_dibatalkan = '$parsingTanggal' WHERE transaksi_id = '$id_transaksi'";
    // $query2s = "INSERT INTO detail_transaksi VALUES ('$id_transaksi', '$id_produk', '$username', '$jumlah', '$totalhargaitem', '$subtotal', '$pengiriman', '$metode' )";
    $result1 = mysqli_query($konek, $query1);
    $check = mysqli_affected_rows($konek);
    //}
    
if ($check>0){
    $response['kode'] = 1;
}else{
    $response['kode'] = 0;
}
echo json_encode($response);
mysqli_close($konek);
    
}
?>