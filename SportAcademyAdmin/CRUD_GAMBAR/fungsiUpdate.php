<?php
include '../conn.php';

if(isset($_POST['simpan']))
{   
    $id = $_POST['id'];
    $ket = $_POST['keterangan'];
    

    $result = mysqli_query($conn, "UPDATE gambar SET keterangan='$ket' WHERE id='$id'");
    
    header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_GAMBAR/formTambahGambarEvent.php");
}
else if(isset($_POST['batal']))
{
    header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_GAMBAR/formTambahGambarEvent.php");
}
?>