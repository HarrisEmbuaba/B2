<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD']==='POST') {

    $id_UserDetail = $_POST['id_UserBeli'];
    

    $perintah = "SELECT * FROM transaksi WHERE id_UserBeli = '$id_UserDetail' AND status = 'dikirim'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek= mysqli_affected_rows($konek);

if($cek > 0) {
    $response["kode"] = 1;
    $response["message"] = "Data Tersedia";
    $response["data"] = array();

    while($ambil= mysqli_fetch_object($eksekusi)) {
        $F["transaksi_id"] = $ambil->transaksi_id;
        $F["id_UserBeli"] = $ambil->id_UserBeli;
        $F["status"] = $ambil->status;
        $F["alamat"] = $ambil->alamat;
        $F["waktu_transaksi"] = $ambil->waktu_transaksi;
        $F["grand_total"] = $ambil->grand_total;
        $F["jasa_kurir"] = $ambil->jasa_kurir;
        $F["no_resi"] = $ambil->no_resi;
        $F["waktu_pembayaran"] = $ambil->waktu_pembayaran;
        $F["waktu_pengiriman"] = $ambil->waktu_pengiriman;
        $F["waktu_pesanan_selesai"] = $ambil->waktu_pesanan_selesai;

        array_push($response["data"], $F);
    }
}
else {
    $response["kode"] = 0;
    $response["message"] = "Data Tidak Tersedia";
    $response["data"] = null;

}
}
echo json_encode($response);
mysqli_close($konek);
?>