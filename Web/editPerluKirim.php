<?php 

// require ('koneksi.php');
// include ('editPerluKirim.html');


// if (isset($_POST['Edit Status'])) {
//     $conn->autocommit(false);
//     try{
//         $id = $_POST['transaksi_id'];
//         $status = $_POST['status'];

//         if ($status=="Dikirim"){
//             $conn->query("UPDATE transaksi SET status = '$status' WHERE transaksi_id = '$idTransaksi'");
//             $conn->commit();
//             $response['message'] = "Edit berhasil";
//             echo "<script>
//             alert('Update status berhasil!');
//             </script>";
//         }else{
//             $conn->query("UPDATE transaksi SET status = '$status' WHERE transaksi_id = '$idTransaksi'");
//             $conn->commit();
//             $response['message'] = "Edit berhasil";
//             echo "<script>
//             alert('Ubah Barang Sukses!'); 
//             </script>";
//         }
//     } catch(Exception $e) {
//         $conn->rollback();
//         $response['message'] = $e->getMessage();
//         echo "<script>
//         "
//     }
    
// }

// // include('koneksi.php');

// // if (isset($_POST['Edit'])) {
// //     $conn->autocommit(false);
// //     try{
// //         $idTransaksi = $_POST['transaksi_id'];
//         $status = $_POST['status'];

//         if ($status=="Dikirim"){
//             $conn->query("UPDATE transaksi SET status = '$status' WHERE transaksi_id = '$idTransaksi'");
//             $conn->commit();
//             $response['message'] = "Edit berhasil";
//             echo "<script>
//             alert('Update status berhasil!'); 
//             </script>";
//         }else{
//             $conn->query("UPDATE transaksi SET status = '$status' WHERE transaksi_id = '$idTransaksi'");
//             $conn->commit();
//             $response['message'] = "Edit berhasil";
//             echo "<script>
//             alert('Ubah Barang Sukses!'); 
//             </script>";
//         }
//     }catch(Exception $e){
//         $conn->rollback();
//         $response['message'] = $e->getMessage();
//         echo "<script>
//         alert('Ubah Barang Gagal!'); 
//         </script>";
//     }
// }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project3";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['Edit'])) {
    $conn->autocommit(false);
    try{
        $idTransaksi = $_POST['transaksi_id'];
        $status = $_POST['status'];
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE transaksi SET status='Dikirim' WHERE status='$status'";

        if (mysqli_query($conn, $sql)) {
            echo "<script> Record updated successfully </script>";
        } else {
            echo "<script> Error updating record: </script>" . mysqli_error($conn);
        }
    } catch (Exception $e){
        $conn->rollback();
        $response['message'] = $e->getMessage();
        echo "<script>
        alert('Ubah Barang Gagal!'); 
        </script>";
    }
}

mysqli_close($conn);

?>