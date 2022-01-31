<?php
$connection = null;

try{
    $host="localhost";
    $username="id14886190_root";
    $password="uVydOq2*%\jSY#G(";
    $database="id14886190_db_sportacademy";

    $db="mysql:dbname=$database;host=$host";
    $connection= new PDO($db,$username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if($connection){
    //     echo "berhasil";
    // }
    // else{
    //     echo "gagal";
    // }
} 
catch (PDOException $e) {
    echo "Error".$e->getMessage();
    die;
}
?>