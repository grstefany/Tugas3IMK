<h2 style="text-align:center;"><b style="color:black;">Edit Brands</b></h2>
<br/>
<br/>

<?php
$ambil =$koneksi->query("SELECT * FROM brands WHERE id_brands='$_GET[id]'");
$pisah = $ambil->fetch_assoc();


?>
<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>Nama Brand</label>
		<input type="text" class="form-control" value="<?php echo $pisah['nama_brands']; ?>" name="nama" required placeholder="isi dengan huruf kapital.contoh(ACER)">
	</div>
	<div class="form-group">
		<label>Pilih Logo Brand</label>
		<input type="file" class="form-control" name="foto" accept=".png" required>
		
		
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php  
if (isset($_POST['ubah'])) 
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	$jenis_gambar=$_FILES['foto']['type'];

	//jika foto diubah
	if (!empty($lokasifoto) && ($jenis_gambar=="image/png"))
	{
	move_uploaded_file($lokasifoto, "logo_brands/".$namafoto);	 
	$koneksi->query("UPDATE brands SET nama_brands='$_POST[nama]',logo_brands='$namafoto' WHERE id_brands='$_GET[id]'");
	echo "<script>alert('data brands telah diubah');</script>";
	echo "<script>location='index.php?halaman=brands';</script>";
	}
    
  	if(!empty($lokasifoto) && ($jenis_gambar!="image/png"))
  	{
		
		echo "<script>alert('Jenis gambar yang anda kirim salah. Harus  .png');</script>";
		
		
  	}
	else
	{
		$koneksi->query("UPDATE brands SET nama_brands='$_POST[nama]' WHERE id_brands='$_GET[id]'");
		echo "<script>alert('data brands telah diubah');</script>";
		echo "<script>location='index.php?halaman=brands';</script>";
	}
	
	
}
?>