<?php

$connection = null;

try{
    //Config
    $host = "localhost";
    $email = "root";
    $pass = "";
    $dbname = "bucket";

    //Connect
    $database = "mysql:dbname=$dbname;host=$host";
    $connection = new PDO($database, $email, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if($connection){
    //     echo "Koneksi Berhasil";
    // } else {
    //     echo "Gagal gan";
    // }


} catch (PDOException $e){
    echo "Error ! " . $e->getMessage();
    die;
}

?>