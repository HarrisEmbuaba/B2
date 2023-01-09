<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD']==='GET') {

    $id_userPembeli = $_GET['id_userPembeli'];

    $perintah = "SELECT * FROM alamat JOIN pembeli ON alamat.id_userPembeli = pembeli.id_user WHERE id_userPembeli = '$id_userPembeli' ";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek= mysqli_affected_rows($konek);

if($cek > 0) {
    $response["kode"] = 1;
    $response["message"] = "Data Tersedia";
    $response["data"] = array();

    while($ambil= mysqli_fetch_object($eksekusi)) {
        $F["id_alamat"] = $ambil->id_alamat;
        $F["judul_alamat"] = $ambil->judul_alamat;
        $F["provinsi"] = $ambil->provinsi;
        $F["kabupaten"] = $ambil->kabupaten;
        $F["kecamatan"] = $ambil->kecamatan;
        $F["alamat_lengkap"] = $ambil->alamat_lengkap;
        $F["kode_pos"] = $ambil->kode_pos;
        $F["nama_penerima"] = $ambil->nama_penerima;
        $F["no_telepon"] = $ambil->no_telepon;
        $F["id_userPembeli"] = $ambil->id_userPembeli;

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