<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center text1">Konfirmasi Pembayaran</h2>
		</div>
		<?php
		 $query = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '".$id_pelanggan."'");
		$data = mysqli_fetch_array($query);
		
		
		$error = false;
		$nama = $email = $alamat = $kota = $provinsi = $kodepos = $nohp = $namarekening = $bank = $norek = $bayar = "";
		$namakosong = $emailkosong = $alamatkosong = $kotakosong = $provinsikosong = $kodeposkosong = $nohpkosong = $narekkosong = $bankkosong = $norekkosong = $bayarkosong = "";
		
		if(isset($_POST['checkout'])){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				if(empty($_POST['nama'])){
					$error = true;
					$namakosong = "Masukkan isi nama Anda";
				}else{
					$nama = $_POST['nama'];
					
				}
				
				if(empty($_POST['email'])){
					$error = true;
					$emailkosong = "Masukkan isi alamat email Anda";
				}else{
					$email = $_POST['email'];
				}
				
				if(empty($_POST['alamat'])){
					$error = true;
					$alamatkosong = "Masukkan isi alamat Anda";
				}else{
					$alamat = $_POST['alamat'];
				}
				
				if(empty($_POST['kota'])){
					$error = true;
					$kotakosong = "Masukkan isi nama kota atau kabupaten";
				}else{
					$kota = $_POST['kota'];
					
				}
				
				if(empty($_POST['provinsi'])){
					$error = true;
					$provinsikosong = "Masukkan isi provinsi";
				}else{
					$provinsi = $_POST['provinsi'];
					
				}
				
				if(empty($_POST['kodepos'])){
					$error = true;
					$kodeposkosong = "Masukkan isi kode pos";
				}else{
					$kodepos = $_POST['kodepos'];
					
				}
						
				if(empty($_POST['nohp'])){
					$error = true;
					$nohpkosong = "Masukkan isi nomor telepon Anda";
				}else{
					$nohp = $_POST['nohp'];
				}
				
				if(empty($_POST['namarekening'])){
					$error = true;
					$narekkosong = "Masukkan isi nama pemilik Anda";
				}else{
					$namarekening = $_POST['namarekening'];
					
				}
				
				if(trim($_POST['bank'])=="blank"){
					$error = true;
					$bankkosong = "Pilih salah satu nama bank";
				}else{
					$bank = $_POST['bank'];
					if($bank == "Bank BCA"){
						$A = "selected";
					}elseif($bank == "Bank Mandiri"){
						$B = "selected";
					}elseif($bank == "Bank BNI"){
						$C = "selected";
					}elseif($bank == "Bank BRI"){
						$D = "selected";
					}else{
						echo '
						<option value="Bank BCA">Bank BCA</option>
						<option value="Bank Mandiri">Bank Mandiri</option>
						<option value="Bank BNI">Bank BNI</option>
						<option value="Bank BRI">Bank BRI</option>';
					}
				}
				
				if(empty($_POST['norek'])){
					$error = true;
					$norekkosong = "Masukkan isi nomor rekening Anda";
				}else{
					$norek = $_POST['norek'];
					
				}
				
				if(empty($_POST['bayar'])){
					$error = true;
					$bayarkosong = "Masukkan isi total pembayaran";
				}else{
					$bayar = $_POST['bayar'];
					
				}
				
				if($_POST['bayar'] != $_POST['hidden_total']){
					echo '<div class="modal fade" id="totals" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title">Pemberitahuan</h4>
											</div>
											<div class="modal-body">
												<h3>Isi total tersebut tidak boleh di kurangi. Mohon bayar sesuai total transaksi.</h3>
											</div>
											<div class="modal-footer">
												<a href="../index.php?p=checkout" class="btn btn-info">Ya</a>
											</div>
										</div>
									</div>
								</div>';
				}
				
				if(!$error){
					
					$id = autoNumber('id_pembelian','pembelian');
					$regdate = date('Y-m-d');
					
					
					$result = mysqli_query($conn,"INSERT INTO pembelian VALUES('".$id."','".$id_pelanggan."','".$namarekening."','".$regdate."','".$bayar."','".$bank."','".$norek."','PAID','PENDING')");
					if(!$result){
						die('Invalid query:'.mysqli_error($conn));
					}
					$id_pembelian = $id;
					$pembelian_produk = '';
					$_SESSION["id_pembelian"] = $id_pembelian;
					foreach ($_SESSION["cart"] as $keys => $values) {
						$pembelian_produk = "INSERT INTO pembelian_produk VALUES (NULL,'".$id_pembelian."','".$values['item_img']."','".$values['product_id']."','".$values['item_name']."','".$values['qty']."','".$values['harga']."')";
						if(mysqli_query($conn, $pembelian_produk)){
							unset($_SESSION['cart']);
							echo "<script>document.location = '../index.php?p=order'; </script>";
						}
						
					}
					mysqli_query($conn, "UPDATE pelanggan SET nama_pelanggan = '".$nama."', alamat_pelanggan = '".$alamat."', kota_pelanggan = '".$kota."', provinsi_pelanggan = '".$provinsi."', kode_pos_pelanggan = '".$kodepos."', no_hp_pelanggan = '".$nohp."', email_pelanggan = '".$email."' WHERE id_pelanggan = '".$id_pelanggan."'");
				}
			}
		}
		?>
		<div class="col-md-8 center-block">
		<form action="../index.php?p=checkout" class="form-horizontal" method="POST">
			<legend>Data Diri</legend>
			<div class="form-group">
				<label class="col-md-2 control-label">Nama Lengkap</label>
				<div class="col-md-9">
					<input type="text" name="nama" class="form-control" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : $data['nama_pelanggan'];?>">
					<span class="text-danger msg-error"><?php echo $namakosong; ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Alamat Email</label>
				<div class="col-md-9">
					<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $data['email_pelanggan'];?>">
					<span>Example: namaanda@mail.com</span>
					<span class="text-danger msg-error"><?php echo $emailkosong; ?></span>
				</div>
			</div>
			<legend>Detail Alamat</legend>
			<div class="form-group">
				<label class="col-md-2 control-label">Alamat</label>
				<div class="col-md-9">
					<input type="text" name="alamat" class="form-control" value="<?php echo isset($_POST['alamat']) ? $_POST['alamat'] : $data['alamat_pelanggan'];?>">
					<span class="text-danger msg-error"><?php echo $alamatkosong; ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Kota / Kabupaten</label>
				<div class="col-md-9">
					<input type="text" name="kota" class="form-control" value="<?php echo isset($_POST['kota']) ? $_POST['kota'] : $data['kota_pelanggan'];?>">
					<span class="text-danger msg-error"><?php echo $kotakosong; ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Provinsi</label>
				<div class="col-md-9">
					<input type="text" name="provinsi" class="form-control" value="<?php echo isset($_POST['provinsi']) ? $_POST['provinsi'] : $data['provinsi_pelanggan'];?>">
					<span class="text-danger msg-error"><?php echo $provinsikosong; ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Kode Pos</label>
				<div class="col-md-9">
					<input type="text" name="kodepos" class="form-control" value="<?php echo isset($_POST['kodepos']) ? $_POST['kodepos'] : $data['kode_pos_pelanggan'];?>">
					<span class="text-danger msg-error"><?php echo $kodeposkosong; ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Nomor Telepon</label>
				<div class="col-md-9">
					<input type="text" name="nohp" class="form-control" maxlength="14" value="<?php echo isset($_POST['nohp']) ? $_POST['nohp'] : $data['no_hp_pelanggan'];?>">
					<span class="text-danger msg-error"><?php echo $nohpkosong; ?></span>
				</div>
			</div>
			<legend>Metode Pembayaran</legend>
			<div class="form-group">
				<label class="col-md-2 control-label">Nama Pemilik Rekening</label>
				<div class="col-md-9">
					<input type="text" name="namarekening" class="form-control" placeholder="Masukkan nama pemilik rekening bank" value="<?php echo isset($namarekening) ? $namarekening : ' ';?>">
					<span class="text-danger msg-error"><?php echo $narekkosong; ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Bank Tujuan</label>
				<div class="col-md-3">
					<select name="bank" id="card_bank" class="form-control">
						<option value="blank">-- Pilih Bank --</option>
						<option value="Bank BCA" <?php echo $A; ?>>Bank BCA</option>
						<option value="Bank Mandiri" <?php echo $B; ?>>Bank Mandiri</option>
						<option value="Bank BNI" <?php echo $C; ?>>Bank BNI</option>
						<option value="Bank BRI" <?php echo $D; ?>>Bank BRI</option>
					</select>
					<span class="text-danger msg-error"><?php echo $bankkosong; ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Nomor Rekening</label>
				<div class="col-md-9">
					<input type="text" name="norek" id="card_number" class="form-control"  value="<?php echo isset($norek) ? $norek : ' ';?>">
					<span class="text-danger msg-error"><?php echo $norekkosong; ?></span>
				</div>
			</div>
			<legend>Ringkasan Pembayaran</legend>
			<div class="form-group">
				<label class="col-md-2 control-label">Total transaksi</label>
				<div class="col-md-3">
					<label class="control-label" style="padding-left: 0;">
						<?php 
						if(!empty($_SESSION["cart"])){
							$total = 0;
							foreach ($_SESSION["cart"] as $keys => $values) {
								$harga = $values['harga'];
								$total = $total + ($values['qty'] * $harga);
							}
						}
						echo 'Rp '.number_format($total,0,".",".");
						?>
					</label>
					<input type="hidden" name="hidden_total" value="<?php echo ($total); ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Jumlah Bayar Sekarang</label>
				<div class="col-md-2">
					<input type="text" name="bayar" class="form-control" value="<?php echo $total; ?>">
					<span class="text-danger msg-error"><?php echo $bayarkosong; ?></span>
				</div>
			</div>
			<center>
				<div class="form-group">
					<button type="submit" class="btn btn-warning" name="checkout">Bayar Sekarang</button>
					<a href="../index.php"><button type="button" class="btn btn-link">Batal</button></a>
				</div>
			</center>
		</form>
		</div>
	</div>
</div>