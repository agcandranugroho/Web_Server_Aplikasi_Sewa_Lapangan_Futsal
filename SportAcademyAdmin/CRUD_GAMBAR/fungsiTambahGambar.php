<?php
    include '../conn.php';
    
    if(isset($_POST['tambah'])){
        $temp = $_FILES['gambar']['tmp_name'];
        $name = 'https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_GAMBAR/images/'.$_FILES['gambar']['name'];
        $name1 = $_FILES['gambar']['name'];
        $keterangan = $_POST['keterangan'];
        $folder = "images/";
    
        
        move_uploaded_file($temp,$folder.$name1);
        $input_gambar= mysqli_query($conn,"INSERT INTO gambar(keterangan,img) VALUES ('$keterangan','$name')");
        header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_GAMBAR/formTambahGambarEvent.php");
    }
?>