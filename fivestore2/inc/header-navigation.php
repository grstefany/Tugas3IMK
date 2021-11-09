<!-- header one-->
<header class="page-header-one">
	<div class="container-fluid">
		<div class="top-right text-center">
			<ul>
				<?php 
				if(empty($_SESSION['email_pelanggan'])){
				?>			
				<li><a href="../index.php?p=login">Masuk</a></li>
				<li><a href="../index.php?p=register">Daftar</a></li>
				<?php
				} 
				else{ 
					if(isset($_SESSION['email_pelanggan'])){
						$id_pelanggan = $_SESSION['id_pelanggan'];
						$querynama = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '".$id_pelanggan."'");
						$nama = mysqli_fetch_array($querynama);
						echo '<li>'.$nama['nama_pelanggan'].'</li>';
					}
				
				?>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">Pengaturan<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="../index.php?p=profil">Profil Saya</a></li>
						<li><a href="../index.php?&p=logout">Keluar</a></li>
					</ul>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</header>
	
<!-- header two-->
<header class="page-header-two">
	<div class="container-fluid text-center">
		<div class="col-md-4 top-header-left">
			<div class="search-bar" hidden>
				<input type="text" id="search" name="key" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
			</div>
		</div>
		<div class="col-md-4 top-header-middle">
			<img  src="../logo/fivestore.png" style="width:200px" style="margin-bottom:20px" style="margin-right:50px" />
		</div>
		<div class="col-md-4 top-header-right">
        <a href="../index.php?p=cart">
            <span class="fa fa-shopping-cart"></span>
			<h4 class="items">
			 <?php 
				if(isset($_SESSION['cart'])) { 
					echo count($_SESSION['cart']) ; 
				}else{
					echo '0'; 
				} 
			?> 
			</h4>
			</a>
		</div>
	</div>
</header>
<!-- navigation -->
<nav class="top-nav navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
			
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav top-nav-info" style="margin-left:0px">
				<li><a href="../index.php">Beranda</a></li>
				<li class="dropdown mega-dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori <span class="caret"></span></a>
					<ul class="dropdown-menu mega-dropdown-menu" style="width:20%" >
						<li class="col-sm-4">
							<ul>
								<li class="dropdown-header">KATEGORI PRODUK</li>
								<li><a href="../index.php?p=laptop">Laptop</a></li>
								<li><a href="../index.php?p=accecories">Accecories</a></li>
								
							</ul>
						</li>
					</ul>
				<li><a href="../index.php?p=brands">Brand</a></li>
			</ul>
		</div>
	</div>
</nav>
