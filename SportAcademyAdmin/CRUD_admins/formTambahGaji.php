<?php
    session_start();
    include_once '../conn.php';
    
    if(!isset($_SESSION["admins"])){
        header("location:https://canlup.000webhostapp.com/index.php");
    }
    //cek login
    $data = mysqli_query($conn,"SELECT * FROM admins WHERE id_admin = ".$_SESSION['admins']['id_admin']." LIMIT 1");
    $user = mysqli_fetch_array($data);
    
    $result = mysqli_query($conn,"SELECT * FROM admins where level!='Super Admin'");
    $result2 = mysqli_query($conn,"SELECT * FROM penggajian ORDER BY tanggal_gajian");
    
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
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                    <div class="col-md-12">
                        <!-- FORM 1 -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Karyawan yang Akan Digaji</h3>
                            </div>
                            <!-- /.card-header -->  
                            <!-- form start -->
                            <form action="fungsiTambahGaji.php" method="POST">
                              <div class="card-body">
                                  Tanggal Penggajian <input type="date" name="tanggal" value="" required>
                                  <table  class="table table-striped table-bordered table-hover" border='1'>
                                    <thead>
                                        <th>No</th>
                                        <th>ID Karyawan</th>
                                        <th>Nama</th>
                                        <th>Gaji</th>
                                        <th>Jabatan</th>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                            $no=1;
                                            while($tambah=mysqli_fetch_array($result)){
                                            
                                        ?>
                                        <tr>
                                             <td>
                                               <?php echo $no++; ?>
                                            </td>
                                             <td>
                                               <input type="text"  name="idKaryawan[]" value="<?php echo $tambah['id_admin']; ?>" readonly>
                                            </td>
                                            <td>
                                               <input type="text"  name="nama[]" value="<?php echo $tambah['nama']; ?>" readonly>
                                            </td>
                                            <td>
                                               <input type="hidden"  name="gajiKaryawan[]" value="<?php echo $tambah['gaji']; ?>" readonly>
                                               <input type="text"  name="" value="<?php echo 'Rp'. number_format($tambah['gaji'],0,',','.') ?>" readonly>
                                            </td>
                                            <td>
                                               <input type="text"  name="" value="<?php echo $tambah['level']; ?>" readonly>
                                            </td>
                                        </tr>
                                         <?php } ?>
                                    </tbody>
                                  </table>
                                </div>
                               <!--//FORM 1 -->
                               
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit" name="simpan" value="Tambah">Tambah</button>
                                    <button type="submit" class="btn btn-danger" name="batal">Batal</button>
                                </div>
                            </form>
                        </div>
                        
                        <!--FORM 2 -->
                        <div class="card card-success">
                          <div class="card-header">
                            <h3 class="card-title">Daftar Karyawan yang Sudah Digaji</h3>
                          </div>
                          <div class="card-body">
                            <table id="example" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Karyawan</th> 
                                        <th>Nama</th>
                                        <th>Gaji</th>
                                        <th>Tanggal Gajian</th>
                                        <th></th>
                                    </tr>  
                                </thead> 
        
                                <tbody>
                                    <?php
                                        $no=1;
                                        while($hasil = mysqli_fetch_array($result2)) 
                                        {   
                                            $gaji = $hasil['gajian'];
                                            $totalGaji = number_format($gaji,0,",",".");
                                            
                                            echo "<tr>";
                                            echo "<td>".$no++."</td>";
                                            echo "<td>".$hasil['id_admin']."</td>";
                                            echo "<td>".$hasil['nama']."</td>";
                                            echo "<td>".'Rp'.$totalGaji."</td>";
                                            echo "<td>".$hasil['tanggal_gajian']."</td>";
                                               
                                            //button delete dan update
                                          echo "<td>
                                                    <a class='btn btn-danger btn-sm' href='https://canlup.000webhostapp.com/SportAcademyAdmin/CRUD_admins/fungsiDeleteGaji.php?id=".$hasil['id_admin']."'>
                                                        <i class='fas fa-trash-alt'></i> Delete
                                                    </a>
                                                </td>";     
                                        }
                                    ?>
                                </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!--//FORM 2 -->
                        
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

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript ">
    $(document).ready(function() {
    $('#example').DataTable();
    } );
</script>

</body>
</html>

