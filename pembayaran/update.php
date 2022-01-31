<?php 
    require_once'../conn.php';
    
    if($_POST){
        $id=$_POST['id'];
        $response = [];
        
        $query = mysqli_query($conn,"UPDATE pembayaran SET status='sudah bayar' WHERE id_bayar='$id'");
        $queryCek = mysqli_query($conn,"SELECT * FROM pembayaran WHERE id_bayar='$id' AND status='sudah bayar'");
        $cek=mysqli_num_rows($queryCek);
        if($cek>0){
            $response['status']=TRUE;
            $response['message'] = "berhasil ";
        }else{
            $response['status']=FALSE;
            $response['message']="gagal";
        }
    }
    echo json_encode($response,JSON_PRETTY_PRINT);
?>