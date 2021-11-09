<h2 style="text-align:center;"><b style="color:black;">Tambah Produk</b></h2>
<br/>
<br/>
<form action="" method="post" enctype="multipart/form-data" >
	
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<div class="form-group">
		<label>Harga Produk</label>
		<input type="number" class="form-control" name="harga" required>
	</div>
	<div class="form-group">
		<label>Kategori Produk</label>
		<select class="form-control" name="kategori" required>
                            <option value="">&lt;&lt;Silahkan pilih salah satu&gt;&gt;</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Accecories">Accecories</option>
                            
                        </select>
	</div>
	<div class="form-group">
		<label>Brand Produk</label>
		<input type="text" class="form-control" name="brand" required placeholder="isi dengan huruf kapital.contoh(ACER)">
	</div>
	<div class="form-group">
		<label>Spesifikas Produk</label>
		<textarea class="form-control" rows="5" name="spesifikasi" required></textarea>
	</div>
	<div class="form-group">
		<label>Gambar Produk</label>
		<input type="file" class="form-control" name="gambar" required accept="image/*">
    </div>
    
    
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
 
<?php
if (isset($_POST['save'])) 
{
	$namagambar=$_FILES['gambar']['name'];
    $lokasigambar=$_FILES['gambar']['tmp_name'];

    
	move_uploaded_file($lokasigambar, "../gambar_produk/".$namagambar);
	
	$koneksi->query("INSERT  INTO produk(nama_produk,harga_produk,kategori_produk,brand_produk,spesifikasi_produk,bgimg)
		VALUES('$_POST[nama]','$_POST[harga]','$_POST[kategori]','$_POST[brand]','$_POST[spesifikasi]','$namagambar')");


	echo "<script>alert('Data Produk Berhasil Ditambahkan');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
	
}
?>