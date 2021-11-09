<h2 style="text-align:center;"><b style="color:black;">Tambah Brand</b></h2>
<br/>
<br/>
<form action="" method="post"  enctype="multipart/form-data">
	
	<div class="form-group">
		<label>Nama Brand</label>
		<input type="text" class="form-control" name="nama" required placeholder="isi dengan huruf kapital.contoh(ACER)">
	</div>
	
    <div class="form-group">
		<label>Pilih Logo Brand</label>
		<input type="file" class="form-control" name="foto" accept=".png">
		
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php  
if (isset($_POST['save'])) 
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	$jenis_gambar=$_FILES['foto']['type'];

	//jika foto diubah
	if (!empty($lokasifoto) && ($jenis_gambar=="image/png"))
	{
	move_uploaded_file($lokasifoto, "logo_brands/".$namafoto);	 
	$koneksi->query("INSERT INTO brands (nama_brands,logo_brands) VALUES ('$_POST[nama]','$namafoto')");
	echo "<script>alert('brand berhasil ditambahkan');</script>";
	echo "<script>location='index.php?halaman=brands';</script>";
	}
    
  	if(!empty($lokasifoto) && ($jenis_gambar!="image/png"))
  	{
		
		echo "<script>alert('Jenis gambar yang anda kirim salah. Harus  .png');</script>";
		
		
  	}
	else
	{
        
        
		echo "<script>alert('tambahkan logo brand');</script>";
		echo "<script>location='index.php?halaman=updatebrands';</script>";
	}
	
	
}
?>