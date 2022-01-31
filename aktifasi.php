<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="SportAcademyAdmin/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="SportAcademyAdmin/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="SportAcademyAdmin/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
      <div class="card">
        <div class="card-body login-card-body">
            <h1>
                <?php 
                    include 'conn.php';
                    $token=$_GET['t'];
                    $queryCekToken = mysqli_query($conn,"SELECT * FROM users WHERE token = '$token' AND aktif = '0'");
                    if(mysqli_num_rows($queryCekToken) > 0){
                        $queryUpdate = mysqli_query($conn,"UPDATE users SET aktif='1' WHERE token='$token'");
                        echo "SELAMAT AKUN ANDA SUDAH AKTIF, ANDA SUDAH BISA LOGIN DI APLIKASI SPORTACADEMY";
                    }else{
                        echo "INVALID TOKEN";
                    }
                ?>
            </h1>
        </div>
      <!-- card-->
      </div>
    <!-- /.login-box -->
    </div>
    
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>