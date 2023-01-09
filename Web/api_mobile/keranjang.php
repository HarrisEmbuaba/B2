<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD']==='GET') {

    $id_UserKeranjang = $_GET['id_UserKeranjang'];

    $perintah = "SELECT keranjang.*, barang.* FROM keranjang JOIN barang ON keranjang.id_BarangKeranjang = barang.id_barang WHERE id_UserKeranjang = '$id_UserKeranjang'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek= mysqli_affected_rows($konek);

if($cek > 0) {
    $response["kode"] = 1;
    $response["message"] = "Data Tersedia";
    $response["data"] = array();

    while($ambil= mysqli_fetch_object($eksekusi)) {
        $F["id_keranjang"] = $ambil->id_keranjang;
        $F["id_BarangKeranjang"] = $ambil->id_barang;
        $F["id_UserKeranjang"] = $ambil->id_UserKeranjang;
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