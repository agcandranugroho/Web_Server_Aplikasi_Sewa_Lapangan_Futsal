<?php
include '../conn.php';

if($_POST)
{
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_lapangan = $_POST['id_lapangan'];
    $tanggal_main = $_POST['tanggal_main'];
    $durasi_start = $_POST['durasi_start'];
    $durasi_end = $_POST['durasi_end'];
    $harga = $_POST['harga']; 
    $durasi_start2 = $durasi_start + 0.5;
    $durasi_end2 = $durasi_end - 0.5;

    $response = [];

    $queryCountPesanan = mysqli_query($conn,"SELECT * FROM pemesanan 
    JOIN pembayaran ON pemesanan.id_pemesanan = pembayaran.id_pemesanan where pemesanan.id_pelanggan = '$id_pelanggan' AND pembayaran.status = 'belum bayar'");
    $cekCount = mysqli_num_rows($queryCountPesanan);

    $queryCekAll = "SELECT * FROM pemesanan WHERE id_lapangan = '$id_lapangan' AND tanggal_main = '$tanggal_main' AND (('$durasi_start2' BETWEEN durasi_start AND durasi_end OR '$durasi_end2' BETWEEN durasi_start AND durasi_end) OR (durasi_start BETWEEN '$durasi_start2' AND '$durasi_end2' OR durasi_end BETWEEN '$durasi_start2' AND '$durasi_end2'))";
    $cekQuery = mysqli_query($conn,$queryCekAll);
    
   
    //$sekarang = date('Y-m-d');
    //$queryCekTanggalMain = "SELECT * FROM pemesanan where $sekarang >= '$tanggal_main'";
    //$cekQueryTanggalMain = mysqli_query($conn,$queryCekTanggalMain);
    
    /*
    $queryCekJam= "SELECT * FROM pemesanan WHERE
    ('$durasi_start' BETWEEN durasi_start AND durasi_end) OR
    ('$durasi_end' BETWEEN durasi_start AND durasi_end)";
    $cekJam = mysqli_query($conn,$queryCekJam);
    
    $queryCekJam2 = "SELECT * FROM pemesanan WHERE (durasi_start BETWEEN '$durasi_start' AND '$durasi_end') OR (durasi_end BETWEEN '$durasi_start' AND '$durasi_end')";
    $cekJam2=mysqli_query($conn,$queryCekJam2);*/
    
    if(mysqli_num_rows($cekQuery) > 0){
        $response['status'] = FALSE;
        $response['message'] = "gagal memasukan data, silahkan cek jadwal yang sudah di pesan oleh orang lain";
    }else { 
        if($cekCount < 3){
          
                $query = "INSERT INTO pemesanan(id_pelanggan,id_lapangan,tanggal_pesan,tanggal_main,durasi_start,durasi_end          ,harga) VALUES ('$id_pelanggan','$id_lapangan',CURRENT_TIMESTAMP(),'$tanggal_main','$durasi_start','$durasi_end','$harga')";
                $cek = mysqli_query($conn,$query);
                
                $id_pemesanan = $conn->insert_id;
                $query2 = "INSERT INTO pembayaran(id_pemesanan,total_bayar, maxTime_Bayar, status) VALUE ('$id_pemesanan','$harga','$durasi_start','belum bayar')";
                $cek2 = mysqli_query($conn,$query2);
                
                if(!$cek && !$cek2)
                {
                    $response['status'] = FALSE;
                    $response['message'] = "gagal insert data";
                } else 
                {
                        $response['status']=TRUE;
                        $response['message']="Berhasil";
                        $response['data']=[
                            'id_pemesanan'=> $id_pemesanan,
                            'id_pelanggan' => $id_pelanggan,
                            'id_lapangan' => $id_lapangan,
                            'tanggal_main' => $tanggal_main,
                            'durasi_start' =>$durasi_start,
                            'durasi_end' =>$durasi_end,
                            'harga' =>$harga
                        ];
                }
        }else {
            $response['status'] = FALSE;
            $response['message'] = "Pemesanan Lapangan Anda yang Belum Dibayar tidak Boleh Lebih Dari 3";
        }
    }
    
    $json= json_encode($response,JSON_PRETTY_PRINT);
    echo $json;
}
?>