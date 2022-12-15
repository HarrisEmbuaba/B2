<?php

include ('resetPassword.html');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project3";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE pemilik SET pass=$newPass";

if (mysqli_query($conn, $sql)){
    if(isset($_GET['password'])){
        $query = "UPDATE pemilik SET pass=$newPass";
    } else{
        $query = "UPDATE pemilik SET pass=$newPass";
    }
}

mysqli_close($conn);

?>