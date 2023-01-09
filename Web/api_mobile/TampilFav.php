<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD']==='GET') {

    $id_userPembeli = $_GET['id_pembeli'];

    $perintah = "SELECT * FROM favorit JOIN pembeli ON favorit.id_pembeli = pembeli.id_user JOIN barang ON favorit.id_BarangFav = barang.id_barang WHERE favorit.id_pembeli = '$id_userPembeli' ";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek= mysqli_affected_rows($konek);

if($cek > 0) {
    $response["kode"] = 1;
    $response["message"] = "Data Tersedia";
    $response["data"] = array();

    while($ambil= mysqli_fetch_object($eksekusi)) {
        $F["id_fav"] = $ambil->id_fav;
        $F["id_BarangFav"] = $ambil->id_BarangFav;
        $F["id_pembeli"] = $ambil->id_pembeli;
        $F["harga"] = $ambil->harga;
        $F["stok"] = $ambil->stok;
        $F["id_barang"] = $ambil->id_barang;
        $F["barang_jenis"] = $ambil->barang_jenis;
        $F["nama_barang"] = $ambil->nama_barang;
        $F["image"] = $ambil->image;
        $F["deskripsi"] = $ambil->deskripsi;

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