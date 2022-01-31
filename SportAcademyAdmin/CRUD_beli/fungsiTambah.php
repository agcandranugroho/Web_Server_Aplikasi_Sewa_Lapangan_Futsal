<?php
    require_once '../conn.php';

    if(isset($_POST['tambah'])) {
        $nama = $_POST['nama_item'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $merek = $_POST['merek'];
        $tanggal = $_POST['tanggal'];
       $total=$jumlah*$harga;
        // Insert data into table
        $input = mysqli_query($conn, "INSERT INTO pembelian (nama_item,jumlah,harga_beli,merek,tanggal_beli,total_harga) VALUES ('$nama','$jumlah','$harga','$merek','$tanggal','$total')");
        if($input){
            header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_beli/readBeli.php");
        }else{
            echo  'gagal';
        }
    }else if(isset($_POST['batal'])){
        header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_beli/readBeli.php");
    }
?>