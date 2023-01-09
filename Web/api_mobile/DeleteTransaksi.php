<?php 

require('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $id_transaksi = $_POST['transaksi_id'];
    $username = $_POST['id_UserBeli'];

    $query2 = "DELETE FROM transaksi WHERE transaksi_id = '$id_transaksi' AND id_UserBeli = '$username'";
    $result2 = mysqli_query($konek, $query2);
    $check = mysqli_affected_rows($konek);
    //}
    
if ($check>0){
    $response['kode'] = 1;
}else{
    $response['kode'] = 0;
}
echo json_encode($response);
mysqli_close($konek);
    
}
?>