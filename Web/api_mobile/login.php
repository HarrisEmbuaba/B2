<?php

include 'connection.php';

if($_POST){

    //Data
    $email = $_POST['email'] ?? '';
    $pass = $_POST['pass'] ?? '';

    $response = []; //Data Response

    //Cek username didalam databse
    $userQuery = $connection->prepare("SELECT * FROM pembeli where email = ?");
    $userQuery->execute(array($email));
    $query = $userQuery->fetch();

    if($userQuery->rowCount() == 0){
        $response['status'] = false;
        $response['message'] = "Email Tidak Terdaftar";
    } else {
        // Ambil password di db

        $passwordDB = $query['pass'];

        if(strcmp(md5($pass),$passwordDB) === 0){
            $response['status'] = true;
            $response['message'] = "Login Berhasil";
            $response['data'] = [
                'id' => $query['id'],
                'email' => $query['email'],
                'nama' => $query['nama'],
                'telp' => $query['telp']
            ];
        } else {
            $response['status'] = false;
            $response['message'] = "Password anda salah";
        }
    }

    //Jadikan data JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print
    echo $json;

}