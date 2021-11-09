<h2 style="text-align:center;"><b style="color:black;">Edit Produk</b></h2>
<br/>
<br/>

<?php
$ambil =$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pisah = $ambil->fetch_assoc();


?>
<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" class="form-control" value="<?php echo $pisah['nama_produk']; ?>" name="nama" required>
	</div>
	<div class="form-group">
		<label>Harga Produk</label>
		<input type="number" class="form-control" value="<?php echo $pisah['harga_produk']; ?>" name="harga" required>
	</div>
    <div class="form-group">
		<label>Kategori Produk</label>
		<input type="text" class="form-control" value="<?php echo $pisah['kategori_produk']; ?>" name="kategori" required>
	</div>
    <div class="form-group">
		<label>Brand Produk</label>
		<input type="text" class="form-control" value="<?php echo $pisah['brand_produk']; ?>" name="brand" required placeholder="isi dengan huruf kapital.contoh(ACER)">
	</div>
	<div class="form-group">
		<label>Spesifikasi Produk</label>
		<textarea class="form-control"  rows="10" name="spesifikasi" required><?php echo $pisah['spesifikasi_produk']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Gambar Produk</label>
		<input type="file" class="form-control" name="gambar"  accept="image/*" required>
	</div>
	
    
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php  
if (isset($_POST['ubah'])) 
{
    $namagambar=$_FILES['gambar']['name'];
    $lokasigambar=$_FILES['gambar']['tmp_name'];

    move_uploaded_file($lokasigambar, "../gambar_produk/".$namagambar);


    
    
    $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',kategori_produk='$_POST[kategori]',brand_produk='$_POST[brand]',spesifikasi_produk='$_POST[spesifikasi]',bgimg='$namagambar' WHERE id_produk='$_GET[id]'");
		
	echo "<script>alert('data produk telah diubah');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
    
}
?>