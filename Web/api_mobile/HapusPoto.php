<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];

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
    }
    //UPDATE DB
    $queryUpdate = "UPDATE pembeli SET image_user = NULL WHERE id_user = '$id_user';";
    $result = mysqli_query($konek, $queryUpdate);

    $check = mysqli_affected_rows($konek);
    if ($check > 0) {
        $response['kode'] = 1;
        $response['message'] = "Photo Berhasil Di Hapus";
    } else {
        $response['kode'] = 0;
        $response['message'] = "Gagal Dihapus";
    }
    echo json_encode($response);
    mysqli_close($konek);
}