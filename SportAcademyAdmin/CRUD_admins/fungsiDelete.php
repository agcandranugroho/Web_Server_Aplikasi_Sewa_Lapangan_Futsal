<?php
    include '../conn.php';
    
    // Get id from URL to delete that user
    $id = $_GET['id'];
    
    // Delete user row from table based on given id
    $result = mysqli_query($conn,"DELETE FROM admins WHERE id_admin='$id' AND level!='Super Admin'");
    $cek = mysqli_query($conn,"SELECT * FROM admins WHERE id_admin='$id'");
    $cekQuery = mysqli_num_rows($cek);
    if($cekQuery > 0){
       echo "<script>alert('Super Admin Tidak Bisa Dihapus');history.go(-1);</script>";	
    }else{
        header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_admins/readAdmin.php");
    }
?>