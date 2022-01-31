<?php

include '../connection.php';

if($_POST)
{
    //read data
    $id_user = $_POST['id_user'] ??'';

    $response = [];

    $userQuery = $connection->prepare("SELECT * FROM users where id_user = ?"); 
    $userQuery->execute(array($id_user));
    $query = $userQuery->fetch();

        if($userQuery->rowCount()==0)
        {
            $response['status'] = FALSE;
            $response['message'] = "data tidak ada";
        }
        else{
            $response['status'] = TRUE;
            $response['message'] = "data ada";
            $response['data']=[
                'id'=>$query['id_user'],
                'username'=> $query['username'],
                'nama'=> $query['nama'],
                'email'=> $query['email'],
                'no_telp'=>$query['no_telp'],
                'password'=>$query['password']
            ];                                           
        }
    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;
}

?>
