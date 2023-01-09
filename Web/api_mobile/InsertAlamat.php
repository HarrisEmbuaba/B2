<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD']==='POST'){


    $judul = $_POST['judul_alamat'];
    $prov = $_POST['provinsi'];
    $kab = $_POST['kabupaten'];
    $kec = $_POST['kecamatan'];
    $alamat = $_POST['alamat_lengkap'];
    $kode = $_POST['kode_pos'];
    $nama = $_POST['nama_penerima'];
    $nomor = $_POST['no_telepon'];
    $user = $_POST['id_userPembeli'];
    
    $query = "INSERT INTO alamat(judul_alamat,provinsi,kabupaten,kecamatan,alamat_lengkap,kode_pos,nama_penerima,no_telepon,id_userPembeli) VALUES ('$judul', '$prov', '$kab', '$kec', '$alamat', '$kode', '$nama', '$nomor', '$user')";
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