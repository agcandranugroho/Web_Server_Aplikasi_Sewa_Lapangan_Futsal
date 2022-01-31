<?php
include '../conn.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

if($_POST){
    //input data
    $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    $passwordmd5 = md5($password);
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $nama = filter_input(INPUT_POST,'nama',FILTER_SANITIZE_STRING);
    $no_telp = filter_input(INPUT_POST,'no_telp',FILTER_SANITIZE_NUMBER_INT);
    $token = hash('sha256', md5(date('Y-m-d')));

    $response = [];

    //cek username di dalam database
    $queryCekUsername = "SELECT * FROM users WHERE username = '$username'";
    $queryCek1 = mysqli_query($conn,$queryCekUsername);
    
    //cek email di dalam database
    $queryCekEmail = "SELECT * FROM users WHERE email = '$email'";
    $queryCek2 = mysqli_query($conn,$queryCekEmail);
    
    //cek username apakah ada atau tidak
    if(mysqli_num_rows($queryCek1) > 0) {
        //beri response
        $response['status'] = FALSE;
        $response['message'] = "username sudah digunakan";
    //jika tidak ada register data
    }else if(mysqli_num_rows($queryCek2) > 0) {
        $response['status'] = FALSE;
        $response['message'] = "email ini sudah pernah di gunakan";
    //jika email tidak valid
    }else if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($email))) {
        $response['status'] = FALSE;
        $response['message'] = "email tidak valid";
    }else {
        $insertData = "INSERT INTO users (username,nama,email,no_telp,password,token,aktif) values ('$username','$nama','$email', '$no_telp', '$passwordmd5','$token','0')";
        $queryCekInsertData = mysqli_query($conn,$insertData);
        if(!$queryCekInsertData){
            $response['status']=FALSE;
            $response['message']="gagal registrasi";
        }else {
            $response['status'] = TRUE;
            $response['message']= "berhasil register, silahkan cek email anda untuk verifikasi email";
            $response['data'] = [
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
                $mail->isSMTP();                                      // Set mailer to use SMTP
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
                $mail->Subject = 'Aktifasi Pendaftaran Akun';
                $mail->Body    = 'Selamat anda sudah berhasil membuat akun, untuk mengaktifkan akun anda silahkan klik link di bawah ini atau kalau link tidak bisa di klik copy linknya paste ke browser yang anda punya</br> <b><a href="https://canlup.000webhostapp.com/aktifasi.php?t='.$token.'"> https://canlup.000webhostapp.com/aktifasi.php?t='.$token.' </a></b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                //echo 'Message has been sent';
                
                
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }

       
    
    /*
     //kirim email
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
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
                //echo 'Message has been sent';
                
                
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }*/
    }
    $json = json_encode($response,JSON_PRETTY_PRINT);
    echo $json;
}

?>