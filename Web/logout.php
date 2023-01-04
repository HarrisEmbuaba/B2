<?php

require ('koneksi.php');
include ('logout.html');

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    header("Location: error-connect.php");
    exit();
}

session_start();
session_destroy();
 
header("Location: home.php");
 
?>

