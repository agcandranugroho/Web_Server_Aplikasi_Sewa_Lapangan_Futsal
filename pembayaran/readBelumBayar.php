<?php
include '../conn.php';
if($_POST){

    $id_pelanggan = $_POST['id_pelanggan'];
    $query = mysqli_query($conn,"SELECT pemesanan.*, pembayaran.*,lapangan.* FROM pemesanan 
    INNER JOIN pembayaran ON pemesanan.id_pemesanan=pembayaran.id_pemesanan 
    INNER JOIN lapangan ON pemesanan.id_lapangan=lapangan.id_lapangan
    WHERE pemesanan.id_pelanggan = '$id_pelanggan' AND pembayaran.status='belum bayar'");

    if(mysqli_num_rows($query)>0){
        $response ['status']= TRUE;
        $response ['message']= "data ada";
        $response ['data']= array();

        while($data = mysqli_fetch_assoc($query)){
            $hasil['id_pelanggan']=$data["id_pelanggan"];
            $hasil['id_pembayaran'] = $data["id_bayar"];
            $hasil['id_pemesanan'] = $data["id_pemesanan"];
            $hasil['nama_lapangan'] = $data["nama"];
            $hasil['tanggal']=$data["tanggal_main"];
            $hasil['jam_mulai']=$data["durasi_start"];
            $hasil['jam_selesai']=$data["durasi_end"];
            $hasil['total_bayar'] = $data["total_bayar"];
            $hasil['status']=$data["status"];

            array_push($response['data'],$hasil);
        }
    }
    else {
        $response['status']=FALSE;
        $response['message']="data tidak ada";
    }
    echo json_encode($response,JSON_PRETTY_PRINT);
}

?>