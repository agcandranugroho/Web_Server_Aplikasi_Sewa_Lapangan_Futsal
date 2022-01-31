<?php 
    session_start();
    require_once '../conn.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginAdmin = mysqli_query ($conn, "select * from  admins where username='$username' and password='$password'");
    $cekLogin = mysqli_num_rows($loginAdmin);

    if($cekLogin > 0) {
        $user = mysqli_fetch_array($loginAdmin);
        if($user['level'] == "Super Admin") {
            $_SESSION['admins'] = $user;
            header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/SuperAdmin.php");
        }
        else if($user['level'] == "Admin") {
            $_SESSION['karyawan'] = $user;
            header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/Admin.php");	
        }
    }else {
        echo "<script>alert('Password atau Username Salah'); history.go(-1);</script>";	
    } 
?>