<?php

include '../connection.php';

if($_POST)
{
    //input data
    $username = $_POST['username'] ??'';
    $password = $_POST['password'] ??'';

    $response = [];

    $userQuery = $connection->prepare("SELECT * FROM users where username = ?"); 
    $userQuery->execute(array($username));
    $query = $userQuery->fetch();
    
    //$userQuery2 = $connection->prepare("SELECT * FROM users where username = ? AND aktif='1'"); 
    //$userQuery2->execute(array($username));
    //$query2 = $userQuery2->fetch();

    if($userQuery->rowCount()==0)
    {
        $response['status'] = FALSE;
        $response['message'] = "username tidak terdaftar";
    } else if($query['aktif'] == 0){
        $response['status'] = FALSE;
        $response['message'] = "akun belum di verifikasi, silahkan verifikasi akun anda terlebih dahulu";
    } 
    else {
        $passwordDB = $query['password'];

        if(strcmp(md5($password),$passwordDB) === 0)
        {
            $response['status'] = TRUE;
            $response['message'] = "login berhasil";
            $response['data']=[
                'id_user'=> $query['id_user'],
                'username'=> $query['username'],
                'email'=> $query['email']
            ];                                           
        }
        else 
        {
            $response['status'] = FALSE;
            $response['message'] = "password salah";
        }
    }

    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;
}

?>
