<?php
session_start();
//koneksi ke database
$koneksi= new mysqli("localhost","root","","fivestore");

if (!isset($_SESSION['admin'])) 
{
   echo "<script>alert('Anda harus login');</script>";
   echo "<script>location='login.php';</script>";
   exit();
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Fivestore</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet">
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="background-color:#008080;" href="index.html">Admin Fivestore</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">&nbsp; <a href="index.php?halaman=logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation" style="background-color: white;">
            <div class="sidebar-collapse" >
                <ul class="nav" id="main-menu" style="background-color: white;">
				<li class="text-center">
                    <img src="img/logo.png" style="width:260px">
					</li>
                    <li><a style="background-color:#008080;"  href="index.php "><i class="fa fa-dashboard fa-3x"></i> Home</a></li>
                    <li><a style="background-color:#008080;"  href="index.php?halaman=brands"><i class="fa fa-tag fa-3x"></i>Produk Brand</a></li>
                    <li><a style="background-color:#008080;"href="index.php?halaman=produk"><i class="fa fa-book fa-3x"></i>Data Produk</a></li>
                    <li><a style="background-color:#008080;"  href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart fa-3x"></i> Pembelian</a></li>
                    <li><a style="background-color:#008080;"  href="index.php?halaman=pelanggan"><i class="fa fa-group fa-3x"></i> Pelanggan</a></li>
                    <li><a style="background-color:#008080;"  href="index.php?halaman=profiladmin"><i class="fa fa-user fa-3x"></i>Profil Admin</a></li>
                    <li><a style="background-color:#008080;"  href="index.php?halaman=logout"><i class="fa fa-minus-circle fa-3x"></i> Logout</a></li>

                </li>  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="produk")
                    {
                        include 'produk.php';
                    }
                    elseif ($_GET['halaman']=="updateproduk")
                    {
                        include 'updateproduk.php';
                    }
                    elseif ($_GET['halaman']=="editproduk")
                    {
                        include 'editproduk.php';
                    }
                    elseif ($_GET['halaman']=="pembelian")
                    {
                        include 'order-confirmation.php';
                    }
                    elseif ($_GET['halaman']=="editpembelian")
                    {
                        include 'edit_order_confirmation.php';
                    }
                    elseif ($_GET['halaman']=="printpembelian")
                    {
                        include 'print_order_confirmation.php';
                    }
                    elseif ($_GET['halaman']=="pelanggan")
                    {
                        include 'pelanggan.php';
                    }
                    
                    elseif ($_GET['halaman']=="editpelanggan")
                    {
                        include 'editpelanggan.php';
                    }    
                    elseif ($_GET['halaman']=="logout")
                    {
                        include 'logout.php';
                    }
                    elseif ($_GET['halaman']=="pembayaran") 
                    {
                        include 'pembayaran.php';
                    }
                    elseif ($_GET['halaman']=="profiladmin") 
                    {
                        include 'profiladmin.php';
                    }
                    elseif ($_GET['halaman']=="editadmin") 
                    {
                        include 'editadmin.php';
                    }
                    elseif ($_GET['halaman']=="brands") 
                    {
                        include 'brands.php';
                    }
                    elseif ($_GET['halaman']=="editbrands") 
                    {
                        include 'editbrands.php';
                    }
                    elseif ($_GET['halaman']=="updatebrands") 
                    {
                        include 'updatebrands.php';
                    }
                }
                else
                {
                    include 'sapaadmin.php';
                }
                ?>
            </div>
        </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
