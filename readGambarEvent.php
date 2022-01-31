<?php 
    include 'conn.php';
    
 
    $queryRead = mysqli_query($conn,"SELECT * FROM gambar");
    
    if(mysqli_num_rows($queryRead) > 0){
        $response['status']=TRUE;
        $response['message']="berhasil tampil data";
        $response['data']=array();
        while($hasil=mysqli_fetch_assoc($queryRead)){
                $result['id']=$hasil["id"];
                $result['gambar']=$hasil["img"];
                $result['keterangan']=$hasil["keterangan"];
                
                array_push($response['data'],$result);
        }
       
    }else{
        $response['status']=FALSE;
        $response['message']="tidak ada data";
    }
    echo json_encode($response,JSON_PRETTY_PRINT);
?>