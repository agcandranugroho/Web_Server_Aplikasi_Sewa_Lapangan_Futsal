<?php
    session_start();
    include_once '../conn.php';
    
    if(!isset($_SESSION["admins"])){
        header("location:https://canlup.000webhostapp.com/index.php");
    }
    //cek login
    $data = mysqli_query($conn,"SELECT * FROM admins WHERE id_admin = ".$_SESSION['admins']['id_admin']." LIMIT 1");
    $user = mysqli_fetch_array($data);
    
    $result = mysqli_query($conn,"SELECT * FROM admins");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
	<link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="../admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="../admin/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="../admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="../admin/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="../admin/plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!-- Wraper-->	
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
              </li>
              <!-- Home -->
              <li class="nav-item d-none d-sm-inline-block">
                <a href="https://canlup.000webhostapp.com/SportAcademyAdmin/SuperAdmin.php" class="nav-link">Home</a>
              </li>
              <!-- //Home -->
            </ul>
            <!-- //Left navbar links -->	
            
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
              <!-- logout -->
              <li class="nav-item dropdown">
                <a href="https://canlup.000webhostapp.com/SportAcademyAdmin/logout.php"> <button type="button" class="btn btn-block btn-danger">Logout</button></a>
              </li>
              <!-- //logout -->
            </ul>
        </nav>
	    
	    
	    <aside class="main-sidebar sidebar-dark-primary elevation-4">
			<a class="brand-link text-white">
				Sport Academy
			</a>
			
			<!-- Sidebar -->
			<div class="sidebar">
			    <!-- Sidebar user panel (optional) -->
			    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
				    <div class="image">
					    <img src="img/admin.png" class="img-circle elevation-2" alt="">
				    </div>
				
				    <div class="info">
					    <a href="" class="d-block">
					        (Super Admin) </br>
						    <?= $user['username']?>
					    </a>
				    </div>
			    </div>
			
			    <!-- Sidebar Menu -->
		        <nav class="mt-2">
			        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			            
                        <!-- Admin -->
                        <li class="nav-item has-treeview menu-close">
    					    <a href="https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_admins/readAdmin.php" class="nav-link active">	
    					        <i class="fas fa-id-badge"></i>
    					        <p>Karyawan</p>
    					    </a>
    				    </li>
                        <!-- //Admin -->
                        
                        <!-- Pelanggan -->
                        <li class="nav-item has-treeview menu-close">
    					    <a href="https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_users/readUser.php" class="nav-link active">	
    					         <i class="fas fa-user"></i>
    					        <p>Pelanggan</p>
    					    </a>
    				    </li>
                        <!-- //Pelanggan -->
                        
                        <!-- Jadwal -->
                        <li class="nav-item has-treeview menu-close">
    					    <a href="https://canlup.000webhostapp.com/SportAcademyAdmin/readJadwal.php" class="nav-link active">	
    					         <i class="far fa-calendar-alt"></i>
    					        <p>Jadwal Main</p>
    					    </a>
    				    </li>
                        <!-- //Jadwal -->
                        
                        <!-- Event -->
                        <li class="nav-item has-treeview menu-close">
    					    <a href="https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_GAMBAR/formTambahGambarEvent.php" class="nav-link active">	
    					         <i class="fa fa-calendar" aria-hidden="true"></i>
    					        <p>Event</p>
    					    </a>
    				    </li>
                        <!-- //Event -->
                        
                         <!-- Pemesanan Lapangan -->
                        <li class="nav-item has-treeview menu-close">
    					    <a href="https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_transaksi/read.php" class="nav-link active">	
    					         <i class="fa fa-inbox" aria-hidden="true"></i>
    					        <p>Pemesanan Lapangan</p>
    					    </a>
    				    </li>
                        <!-- //Pemesanan Lapangan -->

                        <!-- Pembelian -->
                        <li class="nav-item has-treeview menu-close">
    					    <a href="https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_beli/readBeli.php" class="nav-link active">	
    					         <i class="fas fa-cart-arrow-down"></i>
    					        <p>Pembelian</p>
    					    </a>
    				    </li>
                        <!-- //Pembelian-->
                        
                        <!-- Konfirmasi Pelanggan Datang -->
                        <li class="nav-item has-treeview menu-close">
    					    <a href="https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_users/konfirmasiDatang.php" class="nav-link active">	
    					        <i class="far fa-smile-beam"></i>
    					        <p>Konfirmasi Pelanggan</p>
    					    </a>
    				    </li>
                        <!-- //Konfirmasi Pelanggan Datang -->
    
    				    <!--MENU Laporan-->
    				    <li class="nav-item has-treeview menu-close">
        					<a href="#" class="nav-link active">	
        					    <i class="far fa-file-alt"></i>
        					    <p>Laporan Keuangan <i class="right fas fa-angle-left"></i> </p>
        					</a>
        					
        					<!-- Laporan Pendapatan--> 
        					<ul class="nav nav-treeview">
        						<li class="nav-item">
        							<a href="https://canlup.000webhostapp.com/SportAcademyAdmin/laporanKeuanganBulanan.php" class="nav-link">
            							<i class="far fa-circle nav-icon"></i>
            							<p>Laporan Keuangan/Bulan</p>
        							</a>
        						</li>
        					</ul>
        					<!-- //Laporan Pendapatan--> 
        					
        					<!-- Laporan Pengeluaran--> 
        					<ul class="nav nav-treeview">
        						<li class="nav-item">
        							<a href="https://canlup.000webhostapp.com/SportAcademyAdmin/laporanKeuanganTahunan.php" class="nav-link">
            							<i class="far fa-circle nav-icon"></i>
            							<p>Laporan Keuangan/Tahun</p>
        							</a>
        						</li>
        					</ul>
        					<!-- //Laporan Pengeluaran--> 
        				</li>
        				<!-- //MENU Laporan-->
        				
			        </ul>
		        </nav>
	       </div>
	       <!-- Sidebar -->
        </aside>
        <!-- Left navbar links -->
   
   
        <!-- CONTENT -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="container-fluid">
                <div class="row">
                <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Input Data Karyawan Baru</h3>
                            </div>
                            <!-- /.card-header -->  
                            <!-- form start -->
                            <form action="fungsiTambah.php" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" value ="" required>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="pass" value="" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>No Telpon</label>
                                        <input type="number" class="form-control" name="no_hp" value="" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select name="jabatan" class="form-group" required>
                                            <option value="Super Admin">Super Admin</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Office Boy">Office Boy</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Gaji/Bulan</label>
                                        <input type="number" class="form-control" name="gaji" value="" required >
                                    </div>
                            
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit" name="tambah" value="Tambah">Simpan</button>
                                    <button type="submit" class="btn btn-danger" name="batal">Batal</button>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!--//CONTENT-->
    </div>
    <!-- //Wraper -->	

<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../admin/plugins/moment/moment.min.js"></script>
<script src="../admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../admin/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admin/dist/js/demo.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

</body>
</html>

