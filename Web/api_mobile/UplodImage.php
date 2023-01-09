<?php
include 'koneksi.php';
$part = "./Profil/";
$part2 = "./Sampul/";
$filename = "img" . rand(9, 9999) . ".jpg";
$filename2 = "img" . rand(9, 9999) . ".jpg";

$res = array();
$kode = "";
$pesan = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    
    if ($_FILES['imageupload']) {
        $destinationFile = $part . $filename;
        if (move_uploaded_file($_FILES['imageupload']['tmp_name'], $destinationFile)) {
            $getData = "SELECT image_user From pembeli WHERE id_user = '$id_user'";
                    $hasilData = mysqli_query($konek, $getData);
                    $get = mysqli_fetch_array($hasilData);
                    $idImage = $get['image_user'];
                    //hapus imgae
                    if (!$idImage == 0) {
                        if (file_exists("Profil/" . $idImage)) {
                            unlink("Profil/" . $idImage);
                        } else {
                            // echo "Data gambar Gada cui";
                        }
                    }
            
            if ($_FILES['imageupload2']) {
                $destinationFile = $part2 . $filename2;
                if (move_uploaded_file($_FILES['imageupload2']['tmp_name'], $destinationFile)) {
                    echo ("Berhasil upload 2 gambar");
                    $getData2 = "SELECT image_sampul From pembeli WHERE id_user = '$id_user'";
                    $hasilData2 = mysqli_query($konek, $getData2);
                    $get2 = mysqli_fetch_array($hasilData2);
                    $idImage2 = $get2['image_sampul'];
                    //hapus imgae
                    if (!$idImage2 == 0) {
                        if (file_exists("Sampul/" . $idImage2)) {
                            unlink("Sampul/" . $idImage2);
                        } else {
                            // echo "Data gambar Gada cui";
                        }
                    }
                   
                    // insert eh disini
            $query = "UPDATE pembeli SET nama = '$nama' , telp = '$telp' , image_user = '$filename', image_sampul = '$filename2' WHERE id_user = '$id_user'";
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
                    $kode = 0;
                    $pesan = "gagal upload gambar 2";
                }
            } else {
                $kode = 0;
                $pesan = "Request salah";
            }
        } else {
            $kode = 0;
            $pesan = "gagal Upload Image2";
        }
    } else {
        $kode = 0;
        $pesan = "File salah";
    }
} else {
    $kode = 0;
    $pesan = "request Tidak Valid";
}
$res['kode'] = $kode;
$res['pesan'] = $pesan;

echo json_encode($res);