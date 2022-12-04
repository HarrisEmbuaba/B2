<?php 
include('koneksi.php');

if (isset($_POST['Edit'])) {
    $conn->autocommit(false);
    try{
        $idTransaksi = $_POST['transaksi_id'];
        $status = $_POST['status'];

        if ($status=="Dikirim"){
            $conn->query("UPDATE transaksi SET status = '$status' WHERE transaksi_id = '$idTransaksi'");
            $conn->commit();
            $response['message'] = "Edit berhasil";
            echo "<script>
            alert('Update status berhasil!'); 
            </script>";
        }else{
            $conn->query("UPDATE transaksi SET status = '$status' WHERE transaksi_id = '$idTransaksi'");
            $conn->commit();
            $response['message'] = "Edit berhasil";
            echo "<script>
            alert('Ubah Barang Sukses!'); 
            </script>";
        }
    }catch(Exception $e){
        $conn->rollback();
        $response['message'] = $e->getMessage();
        echo "<script>
        alert('Ubah Barang Gagal!'); 
        </script>";
    }
}

?>