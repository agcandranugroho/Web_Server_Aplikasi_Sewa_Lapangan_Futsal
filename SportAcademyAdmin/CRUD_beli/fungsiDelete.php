<?php
    include '../conn.php';
    
    // Get id from URL to delete that user
    $id = $_GET['id'];
    
    // Delete user row from table based on given id
    $result = mysqli_query($conn,"DELETE FROM pembelian WHERE id_pembelian='$id'");
    
    header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_beli/readBeli.php");
?>