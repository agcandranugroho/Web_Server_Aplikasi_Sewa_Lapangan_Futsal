<?php
    include '../conn.php';
    
    // Get id from URL to delete that user
    $id = $_GET['id'];
    
    // Delete user row from table based on given id
    $result = mysqli_query($conn,"DELETE FROM gambar WHERE id='$id'");
    
    header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_GAMBAR/formTambahGambarEvent.php");
?>