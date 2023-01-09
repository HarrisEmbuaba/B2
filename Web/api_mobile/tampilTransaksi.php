<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD']==='GET') {

    $id_UserDetail = $_GET['id_UserDetail'];

    $perintah = "SELECT * FROM transaksi_detail JOIN transaksi 
    ON transaksi_detail.id_TransaksiDetail = transaksi.transaksi_id 
    JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang 
    JOIN pembeli ON transaksi_detail.id_UserDetail = pembeli.id_user 
    WHERE transaksi_detail.id_UserDetail = '$id_UserDetail' ";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek= mysqli_affected_rows($konek);

if($cek > 0) {
    $response["kode"] = 1;
    $response["message"] = "Data Tersedia";
    $response["data"] = array();

    while($ambil= mysqli_fetch_object($eksekusi)) {
        $F["transaksi_id"] = $ambil->transaksi_id;
        $F["id_BarangDetail"] = $ambil->id_BarangDetail;
        $F["id_UserDetail"] = $ambil->id_UserDetail;
        $F["jumlah"] = $ambil->jumlah;
        $F["sub_total"] = $ambil->sub_total;
        $F["nama_barang"] = $ambil->nama_barang;
        $F["barang_jenis"] = $ambil->barang_jenis;
        $F["image"] = $ambil->image;
        $F["harga"] = $ambil->harga;

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