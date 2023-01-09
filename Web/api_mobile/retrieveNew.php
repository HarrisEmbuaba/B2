<?php
require("koneksi.php");

$perintah = "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 4 ";
$eksekusi = mysqli_query($konek, $perintah);
$cek= mysqli_affected_rows($konek);

if($cek > 0) {
    $response["kode"] = 1;
    $response["message"] = "Data Tersedia";
    $response["data"] = array();

    while($ambil= mysqli_fetch_object($eksekusi)) {
        $F["id_barang"] = $ambil->id_barang;
        $F["harga"] = $ambil->harga;
        $F["barang_jenis"] = $ambil->barang_jenis;
        $F["stok"] = $ambil->stok;
        $F["image"] = $ambil->image;
        $F["ukuran"] = $ambil->ukuran;
        $F["nama_barang"] = $ambil->nama_barang;
        $F["deskripsi"] = $ambil->deskripsi;
        
        // $F["password"] = $ambil->password;
        // $F["Username"] = $ambil->Username;
        // $F["Password"] = $ambil->Password;
        
        array_push($response["data"], $F);

    }

}

else {

    $response["kode"] = 0;
    $response["message"] = "Data Tidak Tersedia";
    $response["data"] = null;

}

echo json_encode($response);
mysqli_close($konek);
?>