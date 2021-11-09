<?php ob_start(); ?>

<div class="product-detail">
	<div class="container">
		<div class="col-lg-12">
			<?php
				$id = $_GET['id'];
		
				$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '".$id."'");
				$data = mysqli_fetch_array($query);
				
			?>
			
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">
					
						<img src="../gambar_produk/<?php echo $data['bgimg']; ?>">
						
					
					</ul>
				</div>
			</div>
			<div class="col-md-8 single-right">
			<form action="../index.php?p=single&id=<?php echo $_GET['id']; ?>" method="POST">
				<label><h1><?php echo $data['nama_produk']; ?></h1></label>
				
				<div class="price_single">
					<?php 
						echo '<h2>Harga </h2>';
						echo '<span class="actual">Rp '.number_format($data['harga_produk'],0,".",".").'</span>';
					?>
                   
				</div>
				<div class="detail">
					<h2>Detail Produk</h2>
				<p style="font-size:20px;"><?php echo $data['spesifikasi_produk']; ?></p>
				</div>

				<div class="qty">
					<h4>Jumlah</h4>
					<div class="number"><input type="number" name="qty" min="0"></div>
				</div>

				<input type="hidden" name="hidden_id" value="<?php echo $_GET['id']; ?>">
				<input type="hidden" name="hidden_img" value="<?php echo $data['bgimg']; ?>"/>
				<input type="hidden" name="hidden_name" value="<?php echo $data['nama_produk']; ?>"/>
				<input type="hidden" name="hidden_harga" value="<?php echo $data['harga_produk']; ?>"/>
				<input type="submit" name="cart" value="Beli sekarang" class="btn-checkout-2"/>
			</form>
				<?php
				if(isset($_POST['cart'])){
					$error = false;
					foreach($_POST as $val){
						if(trim($val) == "" & empty($val)){
							$error = true;
						}
					}
					if($error){
						echo '<div class="modal fade" id="fields" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title">Info</h4>
											</div>
											<div class="modal-body">
												<h3>Isikan Jumlah yang ingin anda beli</h3>
											</div>
											<div class="modal-footer">
												<a href="../index.php?p=single&id='.$_GET['id'].'" class="btn btn-info">OK</a>
											</div>
										</div>
									</div>
								</div>';
					}else{
						if(isset($_SESSION['cart'])){
							$count = count($_SESSION['cart']);
							$is_available = 0;
							foreach ($_SESSION["cart"] as $keys => $values){
								if($_SESSION['cart'][$keys]['product_id'] == $_GET['id']) {
									$is_available++;
									$_SESSION['cart'][$keys]['qty'] = $_SESSION['cart'][$keys]['qty'] + $_POST['qty'];
								}
							}
							if($is_available < 1){
								$item_array = array(
								'product_id' => $_GET['id'], 
								'item_img' => $_POST['hidden_img'], 
								'item_name' => $_POST['hidden_name'], 
								'qty' => $_POST['qty'],
								'harga' => $_POST['hidden_harga']
								);
								
								$_SESSION['cart'][$count] = $item_array;
							}	
						}else{
							$item_array = array(
								'product_id' => $_GET['id'], 
								'item_img' => $_POST['hidden_img'], 
								'item_name' => $_POST['hidden_name'], 
								'qty' => $_POST['qty'],
								'harga' => $_POST['hidden_harga']
								);
								$_SESSION['cart'][0] = $item_array;
						}
						echo '<div class="modal fade" id="fields" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title">Info</h4>
											</div>
											<div class="modal-body">
												<h3>Produk Berhasil Dimasukkan Ke dalam Keranjang</h3>
											</div>
											<div class="modal-footer">
												<a href="../index.php?p=cart" class="btn btn-info">OK</a>
											</div>
										</div>
									</div>
								</div>';

						
					}
				}
				?>
				
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php ob_end_flush(); ?>