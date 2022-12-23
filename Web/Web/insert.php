<html>
<body>
<?php 
$username = "root"; 
$password = ""; 
$database = "project3"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM transaksi";


echo '<table border="0" cellspacing="2" cellpadding="2">';
      if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["transaksi_id"];
            $field2name = $row["id_barang"];
            $field3name = $row["qty"];
            $field4name = $row["id_alamat"];
            $field5name = $row["pembayaran"];
            $field6name = $row["pengiriman"];
            $field7name = $row["catatan"];
            $field8name = $row["waktu_transaksi"];
            $field9name = $row["waktu_pengambilan"];
            $field10name = $row["total"]; 
            $field11name = $row["status"];
            $field12name = $row["id_user"];
            $field13name = $row["aksi"];
    
            echo '<tr> 
                      <td>'.$field1name.'</td> 
                      <td>'.$field2name.'</td> 
                      <td>'.$field3name.'</td> 
                      <td>'.$field4name.'</td> 
                      <td>'.$field5name.'</td>
                      <td>'.$field6name.'</td> 
                      <td>'.$field7name.'</td> 
                      <td>'.$field8name.'</td> 
                      <td>'.$field9name.'</td> 
                      <td>'.$field10name.'</td>
                      <td>'.$field11name.'</td> 
                      <td>'.$field12name.'</td> 
                      <td>'.$field13name.'</td>
                  </tr>';
        }
        $result->free();
    } 
    ?>
</body>
</html>