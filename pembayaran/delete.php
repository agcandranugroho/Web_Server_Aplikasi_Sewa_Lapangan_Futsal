<?php
include '../conn.php';

if($_POST) {
    $id = $_POST["id_pemesanan"];
    $response = [];

    $query = mysqli_query($conn, "DELETE pemesanan.*,pembayaran.* FROM pemesanan, pembayaran 
    WHERE pemesanan.id_pemesanan = '$id' AND pembayaran.id_pemesanan ='$id' ");

    $cek = mysqli_affected_rows($conn);
    if($cek > 0){
        $response['status']=TRUE;
        $response['message']="Data berhasi di hapus";
    }
    else {
        $response['status']=FALSE;
        $response['message']="data gagal di hapus";
    }
    $json = json_encode($response,JSON_PRETTY_PRINT);
    echo $json;
}
?>