<?php
include '../conn.php';
    
    if($_POST['key']){
        $KEY = $_POST['key'];
       
        $query = mysqli_query($conn, "SELECT pemesanan.*, lapangan.*,pembayaran.* FROM pemesanan JOIN lapangan ON pemesanan.id_lapangan=lapangan.id_lapangan JOIN pembayaran ON pemesanan.id_pemesanan = pembayaran.id_pemesanan WHERE pemesanan.tanggal_main = '$KEY'");
 
        if(mysqli_num_rows($query)>0){
            $response ['status']= TRUE;
            $response ['message']= "data ada";
            $response ['data']= array();
    
            while($data = mysqli_fetch_assoc($query)){
                $hasil['tanggal_main']=$data["tanggal_main"];
                $hasil['nama_lapangan']=$data["nama"];
                $hasil['jam_mulai']=$data["durasi_start"];
                $hasil['jam_selesai']=$data["durasi_end"];
    
                array_push($response['data'],$hasil);
            }
        }
        else {
            $response['status']=FALSE;
            $response['message']="data tidak ada";
             $response ['data']= array();
    
            while($data = mysqli_fetch_assoc($query)){
                $hasil['tanggal_main']="";
                $hasil['nama_lapangan']="";
                $hasil['jam_mulai']="";
                $hasil['jam_selesai']="";
    
                array_push($response['data'],$hasil);
            }
           
        }
    }else {
      
        $query = mysqli_query($conn, "SELECT pemesanan.*, lapangan.*,pembayaran.* FROM pemesanan JOIN lapangan ON pemesanan.id_lapangan=lapangan.id_lapangan JOIN pembayaran ON pemesanan.id_pemesanan = pembayaran.id_pemesanan ORDER BY tanggal_main ASC");

        if(mysqli_num_rows($query)>0){
            $response ['status']= TRUE;
            $response ['message']= "data ada";
            $response ['data']= array();
    
            while($data = mysqli_fetch_assoc($query)){
                $hasil['tanggal_main']=$data["tanggal_main"];
                $hasil['nama_lapangan']=$data["nama"];
                $hasil['jam_mulai']=$data["durasi_start"];
                $hasil['jam_selesai']=$data["durasi_end"];
    
                array_push($response['data'],$hasil);
            }
        }
        else {
            $response['status']=FALSE;
            $response['message']="data tidak ada";
        }
    }
    
    
    echo json_encode($response,JSON_PRETTY_PRINT);

?>