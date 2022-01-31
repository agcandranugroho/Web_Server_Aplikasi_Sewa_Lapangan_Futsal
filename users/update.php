<?php
include '../connection.php';
//FILE INI TIDAK TERPAKAI
if($_POST){
    $id = $_POST['id_user'] ??'';
    $username = $_POST['username'] ??'';
    $nama = $_POST['nama' ]??'';
    $noTelp = $_POST['no_telp']??'';

    $response=[];
    $userQuery = $connection->prepare("SELECT * FROM users WHERE id_user = ?");
    $userQuery->execute(array($id));
    //$userQuery->execute(array($id));
    if($userQuery){
        if($userQuery->rowCount()!=0)
        {
            $insertAccount = "UPDATE users SET username=:username, nama=:nama, no_telp=:no_telp WHERE id_user=:id_user  AND username!=:username";
            $statement = $connection->prepare($insertAccount); 
            
            try {
                //eksekusi statement
                $statement->execute([
                    ':id_user'=>$id,
                    ':username'=>$username,
                    ':nama'=>$nama,
                    ':no_telp'=>$noTelp
                ]);
                //beri response
                $response['status']=TRUE;
                $response['message']="data berhasil di ubah";
                $response['data']=[
                    'id_user'=>$id,
                    'username' => $username,
                    'nama'=>$nama,
                    'no_telp'=>$noTelp
                ];
            }
            catch (Exception $e) {
                $a = "gagal";
                die($e->getMessage($a));
            }
        }
        else{
            $response['status'] = FALSE;
            $response['message'] = "username tidak terdaftar";
        }
    }
    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;
}
?>