<?php 
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telpon = $_POST['telp'];

    $query = "UPDATE pembeli SET nama = '$nama' , email = '$email' , telp = '$no_telpon' WHERE id_user = '$id_user'";
    $check = mysqli_query($konek, $query);
    $row = mysqli_affected_rows($konek);
        if ($row > 0) {
            $kode = 1;
            $pesan = "Berhasil Upload Data Saja";
        } else {
            $kode = 0;
            $pesan = "Gagal Update Data";
        }
        $res['kode'] = $kode;
        $res['pesan'] = $pesan;
        
        echo json_encode($res);   
}