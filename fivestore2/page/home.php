
<!--Banner-->
<div class="banner">
	<div id="example1" class="core-slider core-slider__carousel">
		<div class="core-slider_viewport">
			<div class="core-slider_list">
				<div class="core-slider_item">
					<img src="../assets/img/b1.jpg" alt="">
				</div>
				<div class="core-slider_item">
					<img src="../assets/img/b22.jpg" alt="">
				</div>
				<div class="core-slider_item">
					<img src="../assets/img/b3.jpg" alt="">
				</div>
				<div class="core-slider_item">
					<img src="../assets/img/b44.jpg" alt="">
				</div>
			</div>
		</div>
		<div class="core-slider_nav">
			<div class="core-slider_arrow core-slider_arrow__right"></div>
			<div class="core-slider_arrow core-slider_arrow__left"></div>
		</div>
		<div class="core-slider_control-nav"></div>
	</div>
</div>
<div class="clearfix"></div>

<!-- Services -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center text1">Kenapa Harus Belanja Di Fivestore ?</h2>
		</div>
		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-laptop"></i>
			</div>
			<h4 class="text2"><b>servis laptop gratis</b></h4>
			<p>Jika Anda Membeli laptop di toko kami , kemudian ada kerusakan maka kami akan perbaiki secara gratis. Tidak
			 berlaku jika sudah lebih dari 3 tahun.</p>
		</div>
			
		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-bus"></i>
			</div>
			<h4 class="text2"><b>biaya ongkos kirim gratis</b></h4>
			<p>Toko kami menyediakan layanan antar dengan biaya kirim gratis.</p>
		</div>
			
		<div class="col-lg-4 col-sm-6 text-center">
			<div class="circle">
				<i class="fa fa-tag"></i>
			</div>
			<h4 class="text2"><b>produk dengan brand terbaik</b></h4>
			<p>Toko kami hanya menjual produk-produk dari brand-brand ternama dan berkualitas</p>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<!--All Products-->
<div class="top-products">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="text-center text1">Semua Produk</h2>
			</div>
		</div>
		<div class="row product">
				<?php
				$perpage = 20;
				$page = isset($_GET['page']) ? $_GET['page'] : "";
				
				if(empty($page)){
					$num = 0;
					$page = 1;
				}else{
					$num = ($page - 1) * $perpage;
				}
				
				$query = "SELECT * FROM produk ORDER by id_produk ASC LIMIT $num, $perpage";
				$result = mysqli_query($conn, $query);
				while($row = mysqli_fetch_array($result)){
					
				?>
				<div class="col-md-3 col-xs-6 product-left">
					<div class="p-one">
						
							<img src="../gambar_produk/<?php echo $row['bgimg']; ?>"/>
							<div class="mask">
								<a href="../index.php?p=single&id=<?php echo $row['id_produk']; ?>"><span>Lihat Detail</span></a>
							</div>
						</a>
						<h5><?php echo $row['nama_produk']; ?></h5>
						<span>
						<?php
						echo '
							<div class="item_price">
								<p>
									<span>Rp '.number_format($row['harga_produk'],0,".",".").'</span>
								</p>
							</div>
							';
							?>
						</span>
					</div>
				</div>
					
				<?php
				}
				$sql = mysqli_query($conn, "SELECT * FROM produk");
				$total_record = mysqli_num_rows($sql);
				$total_page = ceil($total_record / $perpage);
				?>
				<div class="col-lg-12 col-xs-12">
					<nav class="text-center">
						<ul class="pagination">
							<?php
							if($page > 1){
								$prev = "<a href='../index.php?p=home&page=1'><span aria-hidden='true'>First</span></a>";
							}else{
								$prev = "<a href='../index.php?p=home&page=1'><span aria-hidden='true'>First</span></a>";
							}
							$number = '';
							for($i=1; $i<=$total_page; $i++){ 
								if($i == $page){
									$number .= "<a href='../index.php?p=home&page=$i'>$i</a>";
								}else{
									$number .= "<a href='../index.php?p=home&page=$i'>$i</a>";
								}
							}
							if($page < $total_page){
								$link = $page + 1;
								$next = "<a href='../index.php?p=home&page=$total_page'><span aria-hidden='true'>Last</span></a>";
							}else{
								$next = "<a href='../index.php?p=home&page=$total_page'><span aria-hidden='true'>Last</span></a>";
							}
							?>
							<li><?php echo $prev; ?></li>
							<li><?php echo $number; ?></li>
							<li><?php echo $next; ?></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<!-- All Brands -->
<div class="container-fluid brands"><!-- <div class="container-fluid hidden-xs"> -->
	<div class="row">
		<div class="col-md-12 text-center"><h2 class="text-center text1">Shop by Brand</h2></div>
		<div class="col-md-10 col-md-offset-1">
			<div class="carousel carousel-show slide" id="myCarousel">
				<div class="carousel-inner">
				<?php
				$query = mysqli_query($conn, "SELECT * FROM brands");
				$i = 1;
				$active = 1;
				while($row = mysqli_fetch_array($query)){
					if($i == 1) {
						if($active == 1) {
							echo '<div class="item active">';
						}else{
							echo '<div class="item">';
						}
						echo '<div class="col-md-2 col-sm-6 col-xs-12"><span><img src="../admin/logo_brands/'.$row['logo_brands'].'" class="img-responsive"></span></div>';
					}
					$i = 0;
					echo '</div>';
					$i++;
					$active++;
				}
				?>	
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>