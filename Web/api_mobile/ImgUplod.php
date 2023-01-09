<?php
include 'koneksi.php';
$part = "./image_profile/";
$filename = "img" . rand(9, 9999) . ".jpg";

$res = array();
$kode = "";
$pesan = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telpon = $_POST['telp'];

    if ($_FILES['imageupload']) {
        $destinationFile = $part . $filename;
        if (move_uploaded_file($_FILES['imageupload']['tmp_name'], $destinationFile)) {
            //get Image
            $getData = "SELECT image_user From pembeli WHERE id_user = '$id_user'";
            $hasilData = mysqli_query($konek, $getData);
            $get = mysqli_fetch_array($hasilData);
            $idImage = $get['image_user'];
            //hapus imgae
            if (!$idImage == 0) {
                if (file_exists("image_profile/" . $idImage)) {
                    unlink("image_profile/" . $idImage);
                } else {
                    // echo "Data gambar Gada cui";
                }
            } else {
                // echo "Kosong";
            }
            //Update gambar
            $query = "UPDATE pembeli SET image_user = '$filename', nama = '$nama' , email = '$email' , telp = '$no_telpon' WHERE id_user = '$id_user'";
            $check = mysqli_query($konek, $query);
            $row = mysqli_affected_rows($konek);
            if ($row > 0) {
                $kode = 1;
                $pesan = "Berhasil Upload";
            } else {
                $kode = 0;
                $pesan = "Gagal Update Data";
            }
        } else {
            $query = "UPDATE pembeli SET nama = '$nama' , email = '$email' , telp = '$no_telpon' WHERE id_user = '$id_user'";
            $check = mysqli_query($konek, $query);
            $row = mysqli_affected_rows($konek);
            if ($row > 0) {
                $kode = 2;
                $pesan = "Berhasil Upload Data Saja";
            } else {
                $kode = 0;
                $pesan = "Gagal Update Data";
            }
        }
    } else {
        $kode = 0;
        $pesan = "request error";
    }
} else {
    $kode = 0;
    $pesan = "request Tidak Valid";
}
$res['kode'] = $kode;
$res['pesan'] = $pesan;

echo json_encode($res);