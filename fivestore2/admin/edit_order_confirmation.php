<h2 style="text-align:center;"><b style="color:black;">Edit Pembelian </b></h2>
<br/>
<br/>

<?php
$ambil =$koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'");
$pisah = $ambil->fetch_assoc();


?>
<form action="" method="post">
	
	<div class="form-group">
		<label>Tanggal Pembelian</label>
		<input type="text" class="form-control" value="<?php echo $pisah['tanggal_pembelian']; ?>"  disabled>
	</div>
	<div class="form-group">
		<label>Kode Pembelian</label>
		<input type="text" class="form-control" value="<?php echo $pisah['id_pembelian']; ?>"  disabled>
	</div>
	<div class="form-group">
		<label>Jumlah Pembayaran</label>
		<input type="text" class="form-control" value="<?php echo 'Rp '.number_format($pisah['total_pembelian'],0,".",".").''; ?>" disabled>
	</div>
	<div class="form-group">
		<label>Status Pembayaran</label>
		<input type="text" class="form-control" value="<?php echo $pisah['status_pembayaran']; ?>" disabled>
	</div>
    <div class="form-group">
		<label>Status pengiriman :</label> 
        <select name="pengiriman" required>
        <option value="">PILIH SALAH SATU</option>
        <option value="PENDING">PENDING</option>
        <option value="SENT">SENT</option>
        
</select>
	</div>
    
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php  
if (isset($_POST['ubah'])) 
{
		$koneksi->query("UPDATE pembelian SET status_pembelian='$_POST[pengiriman]' WHERE id_pembelian='$_GET[id]'");
		
	echo "<script>alert('data pesanan telah diubah');</script>";
	echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>


