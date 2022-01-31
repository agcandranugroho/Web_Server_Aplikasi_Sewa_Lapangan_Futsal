<?php
include '../conn.php';

if(isset($_POST['simpan']))
{   
    $id = $_POST['id_admin'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_hp'];
    $gaji = $_POST['gaji'];
    
    //cek username admin
    $queryCek1 = mysqli_query($conn,"SELECT * FROM admins WHERE username = '$username'");
    $cek1 = mysqli_num_rows($queryCek1);
        
    //cek email admin
    $queryCek2 = mysqli_query($conn,"SELECT * FROM admins WHERE email = '$email'");
    $cek2 = mysqli_num_rows($queryCek2);
    
    if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($email))){
        echo "<script>alert('Email tidak valid'); history.go(-1);</script>";
    }else {
        $result = mysqli_query($conn, "UPDATE admins SET username='$username', nama='$nama', email='$email', no_hp='$no_telp',gaji='$gaji' WHERE id_admin='$id'");
        if(!$result && $cek1 > 0){
             echo "<script>alert('Username sudah ada'); history.go(-1);</script>";
        }else if(!$result && $cek2 > 0){
             echo "<script>alert('Email sudah ada'); history.go(-1);</script>";
        }else{
            header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_admins/readAdmin.php");
        }
        
    }
}   
else if(isset($_POST['batal']))
{
    header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_admins/readAdmin.php");
}
?>