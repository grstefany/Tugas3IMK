<!--All Products-->
<div class="top-products">
	<div class="container">
    <h2 class="text-center text1">Brand ROG</h2>
		<div class="text-right" style="margin-top: 10px;"><a href="../index.php?p=brands"><i class="fa fa-arrow-left"></i> BACK</a></div>
		<div class="row product" style="margin-top: 10px;">
			<?php
			
			$perpage = 20;
			$page = isset($_GET['page']) ? $_GET['page'] : "";
						
			if(empty($page)){
				$num = 0;
				$page = 1;
			}else{
				$num = ($page - 1) * $perpage;
			}
			$query = "SELECT * FROM produk WHERE brand_produk='ROG' ORDER by id_produk ASC LIMIT $num, $perpage";
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
			$sql = mysqli_query($conn, "SELECT * FROM produk  WHERE brand_produk = 'ROG'  ORDER by id_produk ASC");
			$row = mysqli_fetch_array($sql);
			$total_record = mysqli_num_rows($sql);
			$total_page = ceil($total_record / $perpage);
			?>
			<div class="col-lg-12">
				<nav class="text-center">
					<ul class="pagination">
						<?php
						if($page > 1){
							$prev = "<a href='../index.php?p=productbrand=".$row['brand_produk']."&page=1'><span aria-hidden='true'>First</span></a>";
						}else{
							$prev = "<a href='../index.php?p=productbrand=".$row['brand_produk']."&page=1'><span aria-hidden='true'>First</span></a>";
						}
						$number = '';
						for($i=1; $i<=$total_page; $i++){ 
							if($i == $page){
								$number .= "<a href='../index.php?p=productbrand=".$row['brand_produk']."&page=$i'>$i</a>";
							}else{
								$number .= "<a href='../index.php?p=productbrand=".$row['brand_produk']."&page=$i'>$i</a>";
							}
						}
						if($page < $total_page){
							$link = $page + 1;
							$next = "<a href='../index.php?p=productbrand=".$row['brand_produk']."&page=$total_page'><span aria-hidden='true'>Last</span></a>";
						}else{
							$next = "<a href='../index.php?p=productbrand=".$row['brand_produk']."&page=$total_page'><span aria-hidden='true'>Last</span></a>";
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
<div class="clearfix"></div>