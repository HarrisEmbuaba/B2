<?php

include ('resetPassword.html');
require ("koneksi.php");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$newPass = $_GET['pass'];
$email = $_GET['email'];

$sql = "UPDATE pemilik SET pass=$newPass WHERE email='$email'";

if (mysqli_query($conn, $sql)){
    
    // if(isset($_GET['password'])){
    //     $query = "UPDATE pemilik SET pass=$newPass WHERE email='$email'";
    // } else{
    //     $query = "UPDATE pemilik SET pass=$newPass";
    // }
}

mysqli_close($conn);

?>