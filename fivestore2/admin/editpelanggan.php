<h2 style="text-align:center;"><b style="color:black;">Edit Pelanggan</b></h2>
<br/>
<br/>

<?php
$ambil =$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pisah = $ambil->fetch_assoc();


?>
<form action="" method="post">
	
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" value="<?php echo $pisah['nama_pelanggan']; ?>" name="nama" required>
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label>
		<input type="text" class="form-control" value="<?php echo $pisah['jenis_kelamin_pelanggan']; ?>" name="jenis_kelamin" required>
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control"  rows="10" name="alamat" required><?php echo $pisah['alamat_pelanggan']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Kota</label>
		<input type="text" class="form-control" value="<?php echo $pisah['kota_pelanggan']; ?>" name="kota" required>
	</div>
	<div class="form-group">
		<label>Provinsi</label>
		<input type="text" class="form-control" value="<?php echo $pisah['provinsi_pelanggan']; ?>" name="provinsi" required>
	</div>
    <div class="form-group">
		<label>Kode Pos</label>
		<input type="number" class="form-control" value="<?php echo $pisah['kode_pos_pelanggan']; ?>" name="kode_pos" required>
	</div>
    <div class="form-group">
		<label>No.Hp</label>
		<input type="number" class="form-control" value="<?php echo $pisah['no_hp_pelanggan']; ?>" name="no_hp" required>
	</div>
    <div class="form-group">
		<label>E-mail</label>
		<input type="email" class="form-control" value="<?php echo $pisah['email_pelanggan']; ?>" name="email" required>
	</div>
    <div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" value="<?php echo $pisah['password_pelanggan']; ?>" name="password" required minlength="8">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php  
if (isset($_POST['ubah'])) 
{
		$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',jenis_kelamin_pelanggan='$_POST[jenis_kelamin]',alamat_pelanggan='$_POST[alamat]',kota_pelanggan='$_POST[kota]',provinsi_pelanggan='$_POST[provinsi]',kode_pos_pelanggan='$_POST[kode_pos]',no_hp_pelanggan='$_POST[no_hp]',email_pelanggan='$_POST[email]',password_pelanggan='$_POST[password]' WHERE id_pelanggan='$_GET[id]'");
		
	echo "<script>alert('data pelanggan telah diubah');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";
}
?>