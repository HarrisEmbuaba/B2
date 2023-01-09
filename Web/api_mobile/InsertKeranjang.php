<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD']==='POST'){

    $id_barang = $_POST['id_BarangKeranjang'];
    $name = $_POST['id_UserKeranjang'];
    $price = $_POST['jumlah'];
    $quantity = $_POST['sub_total'];
    

    $query = "INSERT INTO keranjang(id_BarangKeranjang,id_UserKeranjang,jumlah,sub_total) VALUES ('$id_barang', '$name', '$price', '$quantity')";
    $result = mysqli_query($konek, $query);
    $check = mysqli_affected_rows($konek);

    if ($check>0){
        $response['kode'] = 1;
        
    }else{
        $response['kode'] = 0;
    }
    echo json_encode($response);
    mysqli_close($konek);
}
?>