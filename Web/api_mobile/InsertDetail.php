<?php 
require('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $id_transaksi = $_POST['transaksi_id'];
    $id_produk = $_POST['id_BarangDetail'];
    $jumlah = $_POST['jumlah'];
    $totalhargaitem = $_POST['sub_total'];
    $alamat = $_POST['alamat'];
   

    $query1 = "UPDATE transaksi SET alamat = '$alamat' WHERE transaksi_id = '$id_transaksi'";
    $result1 = mysqli_query($konek, $query1);
    $check = mysqli_affected_rows($konek);
    //}
    
if ($check>0){
    $response['kode'] = 1;
}else{
    $query2 = "INSERT INTO transaksi_detail (sub_total, jumlah, id_BarangDetail) VALUES ('$totalhargaitem', '$jumlah', '$id_produk', '$id_transaksi')";
    $result2 = mysqli_query($konek, $query2);
    $check2 = mysqli_affected_rows($konek);

    if($check2>0){
        $response['kode'] = 2;
    }else{
        $response['kode'] = 0;
    }
    
}
echo json_encode($response);
mysqli_close($konek);
    
}
?>