<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD']==='GET') {
$perintah = "SELECT * FROM barang WHERE stok > 0 ";

// $perintah1 = "SELECT * FROM jenis_barang";
// $perintah2 = "SELECT * FROM jenis_ukuran";
// $perintah3 = "SELECT * FROM jenis_warna";
// $perintah4 = "SELECT * FROM barang";

$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();

    while($ambil = mysqli_fetch_object($eksekusi)){
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

else{

    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}

}
echo json_encode($response);
mysqli_close($konek);

?>

