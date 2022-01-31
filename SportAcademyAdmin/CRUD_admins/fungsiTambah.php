<?php
    require_once '../conn.php';

    if(isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $no_telp = $_POST['no_hp'];
        $jabatan = $_POST['jabatan'];
        $gaji = $_POST['gaji'];
        
        //cek username admin
        $queryCek1 = "SELECT * FROM admins WHERE username = '$username'";
        $cek1 = mysqli_query($conn,$queryCek1);
        
        //cek email admin
        $queryCek2 = "SELECT * FROM admins WHERE email = '$email'";
        $cek2 = mysqli_query($conn,$queryCek2);
        
        if(mysqli_num_rows($cek1) > 0){
             echo "<script>alert('Username sudah ada'); history.go(-1);</script>";
        }
        else if(mysqli_num_rows($cek2) >0){
             echo "<script>alert('Email sudah ada'); history.go(-1);</script>";
        }else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($email))){
            echo "<script>alert('Email tidak valid'); history.go(-1);</script>";
        }else {
            // Insert data into table
            $input = mysqli_query($conn, "INSERT INTO admins (username,nama,email,password,no_hp,level,gaji) VALUES ('$username','$nama','$email','$pass','$no_telp','$jabatan','$gaji')");
            if($input){
                header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_admins/readAdmin.php");
            }
        }
        
       
    }else if(isset($_POST['batal'])){
        header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_admins/readAdmin.php");
    }
?>