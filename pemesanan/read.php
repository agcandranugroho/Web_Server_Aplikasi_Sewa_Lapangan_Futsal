<?php
include '../conn.php';
//select * from pemesanan order by id_pemesanan DESC LIMIT 1
//berdasarkan data terakhir yang baru saja di inputkan

$query = mysqli_query($conn, 'SELECT pemesanan.*, pembayaran.*,lapangan.* FROM pemesanan INNER JOIN pembayaran ON pemesanan.id_pemesanan = pembayaran.id_pemesanan INNER JOIN lapangan ON pemesanan.id_lapangan=lapangan.id_lapangan WHERE pemesanan.id_pemesanan order by pemesanan.id_pemesanan DESC LIMIT 1');
 
if (mysqli_num_rows($query) > 0) {
 # buat array
 $responsistem = [];
 //$responsistem["data"] = array();
 while ($row = mysqli_fetch_assoc($query)) {
 # kerangka format penampilan data json
 $responsistem['status']=TRUE;
 $responsistem['message']="data ada";
 $responsistem['data']=[
     'tanggal_main' => $row["tanggal_main"],
     'id_pemesanan'=> $row["id_pemesanan"],
     'harga'=> $row["harga"],
     'status'=> $row["status"],
     'nama_lapangan'=> $row["nama"]
     ];
 //array_push($responsistem["data"], $data);
 }
} else {
 # menmapilkan pesan jika tidak ada data dalam tabel
 $responsistem["message"]="tidak ada data";
 echo json_encode($responsistem);
}
$json = json_encode($responsistem,JSON_PRETTY_PRINT);
echo $json;
?>