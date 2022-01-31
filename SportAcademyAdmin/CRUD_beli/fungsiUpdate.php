<?php
include '../conn.php';

if(isset($_POST['simpan']))
{   
    $id = $_POST['id'];
    $nama = $_POST['nama_item'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $merek = $_POST['merek'];
    $tanggal = $_POST['tanggal'];
    $total_harga = $harga*$jumlah;

    $result = mysqli_query($conn, "UPDATE pembelian SET nama_item='$nama', jumlah='$jumlah', harga_beli='$harga', merek='$merek', tanggal_beli='$tanggal', total_harga='$total_harga' WHERE id_pembelian='$id'");
    
    header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_beli/readBeli.php");
}
else if(isset($_POST['batal']))
{
    header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_beli/readBeli.php");
}
?>