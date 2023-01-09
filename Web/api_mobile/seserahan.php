<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $queryCheck = "SELECT * FROM barang WHERE barang_jenis = 'Seserahan' AND stok > 0 ";
    $eksekusi = mysqli_query($konek, $queryCheck);
    $rowsEmail = mysqli_affected_rows($konek);

    if ($rowsEmail > 0) {
        $response['kode'] = 1;
        $response['message'] = "Data Tersedia";
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
    } else {
        $response['kode'] = 0;
        $response['message'] = "Data Tidak Tersedia";
    }
}

    echo json_encode($response);
    mysqli_close($konek);
?>