<?php ob_start(); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center text1">Peringatan!</h2>
		</div>
		<div class="col-lg-12 text-center">
			<b>Yakin ingin menghapus akun Anda?</b><br/>
			<p>Jika akun Anda dihapus, profil Anda akan dihapus selamanya. <br/>
			<form action="../index.php?p=delete" method="POST" style="margin-bottom: 5%;">
				<input type="submit" class="btn btn-warning" name="hapus" value="Hapus Akun"/>
				<a href="../index.php"><button type="button" class="btn btn-link">Tidak</button></a>
			</form>
			<?php
			if(isset($_POST['hapus'])){
				$query = "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
				if(!$res = mysqli_query($conn,$query)){
					exit(mysqli_error());
				}
				
                session_destroy();
                echo "<script>alert('Data Profil Anda Berhasil Dihapus');</script>";
                
				echo "<script>document.location = '../index.php'; </script>";
			}
			?>
		</div>
	</div>
</div>
<?php ob_end_flush(); ?>