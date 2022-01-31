<?php 
    session_start();
    include_once 'conn.php';
    
    if(isset($_SESSION["admins"])){
        header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/SuperAdmin.php");
    }else if(isset($_SESSION["karyawan"])){
       header("location:https://canlup.000webhostapp.com/SportAcademyAdmin/Admin.php");
    }else{
         $sekarang = date('Y-m-d'); 
?>
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
          <p class="login-box-msg" id="id2">SELAMAT DATANG DI SPORTACADEMY </p>
          <!--form-->
          <form action="SportAcademyAdmin/login.php" method="post">
            <!--username-->
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="username" placeholder="Username" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            
            <!--password-->
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            
            <!--remember me-->
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    <p>Remember Me</p>
                  </label>
                </div>
              </div>
              
              <!--submit form -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </div>
            </div>
          </form>
        <!-- card-body login-card-body -->
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
     
    
    
    <script>
        /*const hitungMundur = setInterval(function(){
            const teks = document.getElementById('id');
        teks.innerHTML = 'BERUBAH';    
        },3000)
        
        const hitungMundur3 = setInterval(function(){
            const teks = document.getElementById('id');
        teks.innerHTML = 'BERUBAH343';    
        },3000)*/
        
        /*setInterval(delete(),4000);
        
        function delete(){
                console.log('ok');
                <?php 
                include 'conn.php';
                date_default_timezone_set('Asia/Jakarta');
                     $JAM = date('H:i:s',time());
                //$result = mysqli_query($conn,"DELETE FROM lapangan WHERE nama like ='a'");
                $result = mysqli_query($conn,"INSERT INTO lapangan (nama,harga,jam) VALUES ('a',2,'$JAM')");
            ?>
            }*/
    </script>
</body>
</html>
<?php }?>