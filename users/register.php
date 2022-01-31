<?php
include '../connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

if($_POST){
    //input data
    $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $nama = filter_input(INPUT_POST,'nama',FILTER_SANITIZE_STRING);
    $no_telp = filter_input(INPUT_POST,'no_telp',FILTER_SANITIZE_NUMBER_INT);

    $response = [];

    //cek username di dalam database
    $userQuery = $connection->prepare("SELECT * FROM users WHERE username = ?");
    $userQuery->execute(array($username));

    //cek username apakah ada atau tidak
    if($userQuery->rowCount()!=0) {
        //beri response
        $response['status'] = FALSE;
        $response['message'] = "username sudah digunakan";
    //jika tidak ada register data
    }else {
        $insertAccount = "INSERT INTO users (username,nama,email,no_telp,password) values (:username, :nama, :email, :no_telp, :password)";
            $statement = $connection->prepare($insertAccount); 
            try {
                //eksekusi statement
                $statement->execute([
                    ':username'=>$username,
                    ':nama'=>$nama,
                    ':email'=>$email,
                     ':no_telp'=>$no_telp,
                    ':password'=>md5($password)
                ]);
                //beri response
                $response['status']=TRUE;
                $response['message']="akun berhasil terdaftar";
                $response['data']=[
                    'username' => $username,
                    'email'=> $email,
                    'nama'=>$nama,
                    'nomor_telepon'=>$no_telp
                ];
                
                //kirim email
                    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                    try {
                        //Server settings
                        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                        //$mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'NarutoUzumaki20200512@gmail.com';                 // SMTP username
                        $mail->Password = 'Naruto_Uzumaki202005';                           // SMTP password
                        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 465;                                    // TCP port to connect to
                    
                        //Recipients
                        $mail->setFrom('NarutoUzumaki20200512@gmail.com', 'candra');
                        $mail->addAddress($email, $nama);     // Add a recipient
                        //$mail->addAddress('ellen@example.com');               // Name is optional
                        //$mail->addReplyTo('info@example.com', 'Information');
                        //$mail->addCC('cc@example.com');
                        //$mail->addBCC('bcc@example.com');
                    
                        //Attachments
                        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    
                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Here is the subject';
                        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    
                        $mail->send();
                        echo 'Message has been sent';
                        
                        
                    } catch (Exception $e) {
                        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                    }
                
                }
                catch (Exception $e) {
                    die($e->getMessage());
                }
    }
     $json = json_encode($response,JSON_PRETTY_PRINT);
        //PRINT JSON
        echo $json;
}

?>