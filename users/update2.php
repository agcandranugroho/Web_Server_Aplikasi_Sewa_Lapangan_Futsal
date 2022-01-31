<?php
include '../conn.php';

if($_POST){
    $id = $_POST['id_user'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $noTelp = $_POST['no_telp'];

    $response=[];
    $query = mysqli_query($conn,"UPDATE users SET username='$username', nama='$nama', no_telp='$noTelp' WHERE id_user='$id'");
    if($query){
        $response['status'] = TRUE;
        $response['message'] = "berhasil";
    }   
    else{
        $response['status'] = FALSE;
        $response['message'] = "username sudah ada";
    }
    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;
}
?>