<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD']==='POST') {
    
    $alamat = $_POST['alamat'];
    $idTrans = $_POST['transaksi_id'];
    $idBarang = $_POST['id_BarangDetail'];
    $Beli_idPembeli = $_POST['id_UserKeranjang'];
    $sub = $_POST['sub_total'];
    $jumlah = $_POST['jumlah'];
    $konek->autocommit(false);
    try {


        $konek->query("UPDATE transaksi SET alamat = '$alamat' WHERE transaksi_id = '$idTrans'");
        $konek->query("INSERT INTO transaksi_detail (sub_total,jumlah,id_BarangDetail,id_TransaksiDetail) VALUES('$sub', '$jumlah', '$idBarang', '$idTrans')");
        $konek->query("DELETE FROM keranjang WHERE id_BarangKeranjang = '$idBarang' AND id_UserKeranjang='$Beli_idPembeli'");
        $response['pesan'] = "Data Telah Masuk";
        $response['kode'] = 1;
        $response['jumlah'] = null;
        $konek->commit();
}catch (Exception $e) {
    $response['pesan'] = $e->getMessage();
    $response['kode'] = 0;
    $response['jumlah'] = null;
    $konek->rollback();
}
echo json_encode($response);
mysqli_close($konek);
}
?>