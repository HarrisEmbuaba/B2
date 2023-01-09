<?php
require("koneksi.php");
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $idKeranjang = $_GET['id_alamat'];
    $query = "DELETE FROM alamat WHERE id_alamat = '$idKeranjang'";
    $execute = mysqli_query($konek, $query);
    $check = mysqli_affected_rows($konek);

    if ($check > 0) {
        $response['kode'] = 1;
    } else {
        $response['kode'] = 0;
    }
    echo json_encode($response);
    mysqli_close($konek);
}
?>