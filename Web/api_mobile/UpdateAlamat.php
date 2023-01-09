<?php 
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $judul = $_POST['judul_alamat'];
    $prov = $_POST['provinsi'];
    $kab = $_POST['kabupaten'];
    $kec = $_POST['kecamatan'];
    $alamat = $_POST['alamat_lengkap'];
    $kodePos = $_POST['kode_pos'];
    $nama = $_POST['nama_penerima'];
    $no_telpon = $_POST['no_telepon'];
    $id_alamat = $_POST['id_alamat'];

    $query = "UPDATE alamat SET judul_alamat = '$judul' , provinsi = '$prov' , kabupaten = '$kab' , kecamatan = '$kec' , alamat_lengkap = '$alamat', kode_pos = '$kodePos' , nama_penerima = '$nama' , no_telepon = '$no_telpon' WHERE id_alamat = '$id_alamat'";
    $check = mysqli_query($konek, $query);
    $row = mysqli_affected_rows($konek);
        if ($row > 0) {
            $kode = 1;
            $pesan = "Berhasil Edit Alamat";
        } else {
            $kode = 0;
            $pesan = "Gagal Update Data";
        }
        $res['kode'] = $kode;
        $res['pesan'] = $pesan;

        echo json_encode($res);   
}