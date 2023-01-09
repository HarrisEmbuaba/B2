<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD']==='POST'){

    $id_barang = $_POST['id_BarangFav'];
    $name = $_POST['id_pembeli'];
    
    $queryCheck = "SELECT * FROM favorit where id_BarangFav = '$id_barang'";
    $checkEmail = mysqli_query($konek, $queryCheck);
    $rowsEmail = mysqli_affected_rows($konek);

    if ($rowsEmail > 0) {
        $response['kode'] = 3;

    }else{
    
    $query = "INSERT INTO favorit(id_BarangFav,id_pembeli) VALUES ('$id_barang', '$name')";
    $result = mysqli_query($konek, $query);
    $check = mysqli_affected_rows($konek);

    if ($check>0){
        $response['kode'] = 1;
        
    }else{
        $response['kode'] = 0;
    }

    }
    
    echo json_encode($response);
    mysqli_close($konek);
}
?>