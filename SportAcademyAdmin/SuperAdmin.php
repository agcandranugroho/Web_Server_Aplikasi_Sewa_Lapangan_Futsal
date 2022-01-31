<?php
    session_start();
    include_once '../conn.php';
    
    if(!isset($_SESSION["admins"])){
        header("location:https://canlup.000webhostapp.com/index.php");
    }
    //cek login
    $data = mysqli_query($conn,"SELECT * FROM admins WHERE id_admin = ".$_SESSION['admins']['id_admin']." LIMIT 1");
    $user = mysqli_fetch_array($data);

    //hitung jumlah user registration
    $data_jumlah_user_registration = mysqli_query($conn, "SELECT * FROM users");
    $user_registration = mysqli_num_rows($data_jumlah_user_registration);

    //hitung jumlah admin
    $data_jumlah_admins = mysqli_query($conn, "SELECT * FROM admins ");
    $user_admins = mysqli_num_rows($data_jumlah_admins);
    
    //hitung jumlah pemesanan sekarang
    date_default_timezone_set('Asia/Jakarta');
    $sekarang = date('Y-m-d');
    $data_jumlah_pemesanan = mysqli_query($conn,"SELECT * FROM pemesanan WHERE tanggal_main = '$sekarang'");
    $jumlah_data_pemesanan = mysqli_num_rows($data_jumlah_pemesanan); 
    
    //hitung jumlah jadwal main sekarang
    $data_jumlah_jadwal_main = mysqli_query($conn,"SELECT pemesanan.*, pembayaran.* FROM pemesanan JOIN pembayaran ON pemesanan.id_pemesanan = pembayaran.id_pemesanan WHERE tanggal_main = '$sekarang' AND status = 'sudah bayar'");
    $total_jadwal = mysqli_num_rows($data_jumlah_jadwal_main);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
	<link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="admin/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.css">
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
                        
                         <!-- Event -->
                        <li class="nav-item has-treeview menu-close">
    					    <a href="https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_LAPANGAN/readLapangan.php" class="nav-link active">	
    					         <i class="fa fa-life-ring" aria-hidden="true"></i>
    					        <p>Lapangan</p>
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
   
    
    <div class="content-wrapper">
    	<!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    	<section class="content">
    	    <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                	<!-- user admins -->
                	<div class="col-lg-3 col-6">
                        <div class="small-box bg-blue">
                          <div class="inner">
                            <h3><?php echo $user_admins; ?></h3>
                            <p>Admin</p> </br>
                            <p></p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-id-badge"></i>
                          </div>
                          
                        </div>
                    </div>
                    <!-- user admins -->
                    
                    <!-- user registration -->
                	<div class="col-lg-3 col-6">
                        <div class="small-box bg-blue">
                          <div class="inner">
                            <h3><?php echo $user_registration; ?></h3>
                            <p>Pelanggan</p> </br>
                            <p></p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-user"></i>
                          </div>
                          
                        </div>
                    </div>
                    <!-- //user registration -->
                    
                    <!-- jumlah data pemesanan sekarang-->
                	<div class="col-lg-3 col-6">
                        <div class="small-box bg-blue">
                          <div class="inner">
                            <h3><?php echo $jumlah_data_pemesanan; ?></h3>
                            <p><?php echo $sekarang; ?></p>
                            <p>Data Pemesanan Lapangan</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                          </div>
                        
                        </div>
                    </div>
                    <!-- //jumlah data pemesanan sekarang -->
                    
                    <!-- jumlah jadwan main sekarang -->
                	<div class="col-lg-3 col-6">
                        <div class="small-box bg-blue">
                          <div class="inner">
                            <h3><?php echo $total_jadwal; ?></h3>
                            <p><?php echo $sekarang; ?></p>
                            <p>Jadwal Main Sekarang</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                          </div>
                        
                        </div>
                    </div>
                    <!-- //jumlah jadwal main sekarang -->
                </div>
            </div>
        </section>
    </div>
</div>
<!-- Wraper -->	

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin/plugins/moment/moment.min.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="admin/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

</body>
</html>