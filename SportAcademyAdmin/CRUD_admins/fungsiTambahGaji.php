<?php 
    require_once '../conn.php';
    
    if(isset($_POST['simpan'])){
        $nama=$_POST['nama'];
        $idKaryawan=$_POST['idKaryawan'];
        $gajiKaryawan=$_POST['gajiKaryawan'];
        $tanggal=$_POST['tanggal'];
        $count = count($nama);
        $format = date('Y-m-d', strtotime($tanggal));
        
        $query = "INSERT INTO penggajian (id_admin,nama,gajian,tanggal_gajian) VALUES";
        
        for($i=0; $i<$count; $i++){
            $query .="('{$idKaryawan[$i]}','{$nama[$i]}','{$gajiKaryawan[$i]}','{$format}')";
            $query .=",";
        }
        
        $query = rtrim($query,",");
        
        $insert = $conn->query($query);
        if( !$insert )
        {
            echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
            //echo $format;
        }else {
           echo "<script>alert('Data Penggajian berhasil di tambahkan ke database');history.go(-1);</script>";
        }
    }else{
        header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_admins/readAdmin.php");
    }
   
    
?>