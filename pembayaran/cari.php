<?php 
    require_once"../connection.php";
    
    if($_POST){
        $KEY=$_POST['key'];
        $response=[];
        $cariQuery = $connection->prepare("SELECT pemesanan.*, pembayaran.*, users.*,lapangan.nama as nama_lapangan FROM pemesanan JOIN pembayaran ON pemesanan.id_pemesanan=pembayaran.id_pemesanan JOIN lapangan ON pemesanan.id_lapangan=lapangan.id_lapangan JOIN users ON pemesanan.id_pelanggan = users.id_user WHERE pembayaran.id_bayar='$KEY' AND pembayaran.status='belum bayar'");
        $cariQuery->execute(array($KEY));
        $query = $cariQuery->fetch();
        
        if($cariQuery->rowCount()==0) {
            $response['status']=FALSE;
            $response['message']="data tidak ada";
        }
        else {
            $response['status']=TRUE;
            $response['message']="data ada";
            $response['data']=[
                'id_pembayaran' => $query['id_bayar'],
                'id_pemesanan' =>$query['id_pemesanan'],
                'nama' => $query['nama'],
                'tanggal' => $query['tanggal_main'],
                'jam_mulai' => $query['durasi_start'],
                'jam_selesai'=> $query['durasi_end'],
                'nama_lapangan' =>$query['nama_lapangan'],
                'total_bayar' =>$query['total_bayar']
            ];
        }
    }
    echo json_encode($response,JSON_PRETTY_PRINT);
?>