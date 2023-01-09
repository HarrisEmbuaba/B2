<?php

include 'connection.php';

if($_POST){

    //POST DATA
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $telp = filter_input(INPUT_POST, 'telp', FILTER_SANITIZE_STRING);

    $response = [];

    //Cek username didalam databse
    $userQuery = $connection->prepare("SELECT * FROM pembeli where email = ?");
    $userQuery->execute(array($email));

    // Cek username apakah ada tau tidak
    if($userQuery->rowCount() != 0){
        // Beri Response
        $response['status']= false;
        $response['message']='Akun sudah digunakan';
    } else {
        $insertAccount = 'INSERT INTO pembeli (email,pass, nama, telp) values (:email, :pass, :nama, :telp)';
        $statement = $connection->prepare($insertAccount);

        $last_id = $connection->insert_id;

        $digits = 5;
        $verifnumber = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $insertAccount1 = "INSERT INTO validasi VALUES ('$verifnumber', 'Belum Verifikasi', '$last_id')";

        try{
            //Eksekusi statement db
            $statement->execute([
                ':email' => $email,
                ':pass' => md5($pass),
                ':nama' => $nama,
                ':telp' => $telp
            ]);

            //Beri response
            $response['status']= true;
            $response['message']='Akun berhasil didaftar';
            $response['data'] = [
                'email' => $email,
                'nama' => $nama
            ];
        } catch (Exception $e){
            die($e->getMessage());
        }

    }
    
    //Jadikan data JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print JSON
    echo $json;
}