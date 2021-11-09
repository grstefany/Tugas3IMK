<div id="divToPrint">
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<img class="logo-img" src="../logo/fivestore.png" style="width:200px"/>
			</div>
			<div class="col-xs-6 text-right"  style="margin-top: 20px;">
				<address>
				Jl. Universitas No. 9 Pintu 1 USU<br/>
				Telepon : 021 23456789<br/>
				Email : bagindaharahap355@gmail.com
				</address>
			</div>
				<?php 
				if(isset($_SESSION['id_pembelian'])){
					$tanggal_detail = '';
					$pelanggan_detail = '';
					$bayar_detail = '';
					$total = 0;
					$query = "SELECT * FROM pembelian INNER JOIN pelanggan ON pelanggan.id_pelanggan = pembelian.id_pelanggan WHERE pembelian.id_pembelian = '".$_SESSION['id_pembelian']."'";
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($result)){
						
						$tanggal = ''.$row['tanggal_pembelian'].'';
						$tanggal_detail = date('Y-m-d', strtotime($tanggal));
						
						
						
						$pelanggan_detail = '
						'.$row['nama_pelanggan'].'<br/>
						'.$row['alamat_pelanggan'].'<br/>
						'.$row['kota_pelanggan'].'<br/>
						'.$row['provinsi_pelanggan'].'<br/>
						'.$row['kode_pos_pelanggan'].'<br/>
						No.HP '.$row['no_hp_pelanggan'].'
						';
						$bayar_detail = '
						'.$row['nama_pelanggan'].'<br/>
						'.$row['cardbank_type'].'<br/>
						'.$row['cardbank_number'].'<br/>
						';
					}
				}
				?>
			<div class="col-xs-12 text-center">
				<h3>Bukti Konfirmasi Pembayaran</h3>
				<center><h5>Nomor Pemesanan : <?php echo $_SESSION['id_pembelian']; ?></h5></center>
			</div>
			<hr>
		</div>
		<div class="row" style="margin-bottom: 10px;">
			<div class="col-xs-6">
				<strong>Alamat Pemesanan</strong>
				<address>
				<?php echo $pelanggan_detail; ?>
				</address>
			</div>
			<div class="col-xs-6 text-right">
				<strong>Tanggal Pemesanan</strong><br/>
				<?php echo $tanggal_detail; ?>
				
			</div>
			<div class="col-xs-6 text-right">
				<strong>Detail Pembayaran</strong><br/>
				<?php echo $bayar_detail; ?>
			</div>
		</div>
		<div class="col-lg-12">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Jumlah</th>
						<th>Harga</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<?php
				$query = mysqli_query($conn, "SELECT * FROM pembelian_produk WHERE id_pembelian = '".$_SESSION['id_pembelian']."'");
				$no = 1;
				while($row = mysqli_fetch_array($query)){
					$harga = $row['harga'];
					$subtotal = $row['jumlah'] * $harga;
					$total = $total + $subtotal;
				?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td>
						<div class="table-column-left">
							<img src="../gambar_produk/<?php echo $row['bgimg']; ?>" class="img-small">
						</div>
						<div class="table-column-right">
							Kode : <?php echo $row['id_produk']; ?><br/>
							Nama : <?php echo $row['nama']; ?><br/>
							
						</div>
					</td>
					<td align="center"><?php echo $row['jumlah']; ?></td>
					<td align="center"><?php echo 'Rp '.number_format($row['harga'],0,".","."); ?></td>
					<td align="center"><?php echo 'Rp '.number_format($subtotal,0,".","."); ?></td>
				</tr>
				<?php
				$no++;
				}
				?>
				<tr>
					<td colspan="4" align="right">Total</td>
					<td align="center"><?php echo 'Rp '.number_format($total,0,".","."); ?></td>
				</tr>
			</table>
			<div class="">
		<div class="col-lg-12">
			
				<p style="font-size:20px;">
					Silahkan Melakukan Pembayaran sebesar <?php echo 'Rp '.number_format($total,0,".","."); ?>- ke
					<br>
					<strong>
						BANK BNI SYARIAH 073-5957-215 A/N Five Store
					</strong>
				</p>
			
		</div>
</div>
		</div>
	</div>
</div>

<div class="container" style="margin-bottom:20px;">
	<div class="shopping-right-basket">
		<form action="../index.php?p=order" method="POST">
		<input type="button" value="Print" class="btn-continue" onclick="PrintDiv('divToPrint')">
		<input type="submit" name="finish" value="Selesai" class="btn-continue">
		</form>
	</div>
	<?php
	if(isset($_POST['finish'])){
		unset($_SESSION['order_id']);
		echo "<script>document.location = '../index.php'; </script>";
	}
	?>
</div>
