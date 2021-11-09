<?php
session_start();

include "koneksi.php";
include "library.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<base href="fivestore2/">
	<!-- meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Five Store</title>
	
	<!-- mobile specific -->
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1" />
	
	
	<!-- Offline -->
	<link rel="stylesheet" type="text/css" href="../assets/css/custom.css" media="screen, print" />
	<link rel="stylesheet" type="text/css" href="../assets/css/coreSlider.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/flexslider.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css" />
    
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	</head>
<body>

	<?php
	
	include "inc/header-navigation.php";
	include "inc/main.php";
	include "inc/footer.php";
	
	ob_end_flush();
	?>
	
	<!-- JS Offline -->
	<script src="../assets/js/jquery-1.11.1.min.js"></script>
	<script src="../assets/js/coreSlider.js"></script>
	<script defer src="../assets/js/jquery.flexslider.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/custom.js"></script>
	
</body>
</html>