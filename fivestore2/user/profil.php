<?php ob_start(); ?>
<div class="container">
	<h1 class="well"><center>Profil Akun Saya</center></h1>
	<div class="col-lg-12 well">
		<div class="row">
			<?php
            $query = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '".$id_pelanggan."'");
            $data = mysqli_fetch_array($query);
			
			
			if(!$query){
				printf("Error: %s\n", mysqli_error($conn));
				exit();
			}
			
			$error = false;
			$nama = $jenis_kelamin = $alamat = $kota = $provinsi = $kode_pos = $no_hp = $email = "";
			$namakosong = $jeniskelamin_kosong = $alamat_kosong = $kota_kosong = $provinsi_kosong = $kodepos_kosong = $nohp_kosong = $email_kosong = $password_kosong = "";
			
				
			if(isset($_POST['saveprofil'])){
								
				if($_SERVER['REQUEST_METHOD'] == "POST"){
					if(empty($_POST['nama'])){
						$error = true;
						$namakosong = "Masukan nama Anda";
					}else{
						$nama = $_POST['nama'];
						
					}
						
					if(trim($_POST['gender'])=="blank"){
						$error = true;
						$jeniskelamin_kosong = "Pilih salah satu jenis kelamin Anda";
					}else{
						$jenis_kelamin = $_POST['gender'];
					}
					
					if(empty($_POST['alamat'])){
						$error = true;
						$alamat_kosong = "Masukan isi alamat Anda";
					}else{
						$alamat = $_POST['alamat'];
					}
						
					if(empty($_POST['kota'])){
						$error = true;
						$kota_kosong = "Masukan isi nama kota atau kabupaten";
					}else{
						$kota = $_POST['kota'];
					}
						
					if(empty($_POST['provinsi'])){
						$error = true;
						$provinsi_kosong = "Masukan isi provinsi";
					}else{
							$provinsi = $_POST['provinsi'];
						
					}
						
					if(empty($_POST['kode_pos'])){
						$error = true;
						$kodepos_kosong = "Masukan isi kode pos";
					}else{
						$kode_pos = $_POST['kode_pos'];
						
					}
						
					if(empty($_POST['no_hp'])){
						$error = true;
						$nohp_kosong = "Masukan isi nomor telepon";
					}else{
						$no_hp = $_POST['no_hp'];
						
                    }
                    if(empty($_POST['email'])){
                        $error = true;
                        $email_kosong = "Masukan isi email";
                    }else{
                        $email = $_POST['email'];
                    }
                    
                    
                   
                    
                }
            
								
				if(!$error){
							
                    mysqli_query($conn,"UPDATE pelanggan SET nama_pelanggan = '".$nama."', jenis_kelamin_pelanggan = '".$jenis_kelamin."', alamat_pelanggan = '".$alamat."', kota_pelanggan = '".$kota."', provinsi_pelanggan = '".$provinsi."', kode_pos_pelanggan = '".$kode_pos."', no_hp_pelanggan = '".$no_hp."', email_pelanggan = '".$email."' WHERE id_pelanggan = '".$id_pelanggan."'");
                    echo "<script>alert('Data Profil Anda Berhasil Diubah');</script>";
                    	
					echo "<script>document.location = '../index.php?p=profil'; </script>";
				}
			}
			
			?>
			<form action="../index.php?p=profil" method="POST">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-12 form-group">
							<label>Nama :</label>
							<input type="text" class="form-control" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : $data['nama_pelanggan'];?>">
							<span class="text-danger msg-error"><?php echo $namakosong; ?></span>
						</div>
								
					</div>
						
					<div class="row">
						<div class="col-sm-12 form-group">
							<label>Jenis Kelamin :</label>
							<select name="gender" class="form-control">
								<option value="blank">--- Pilih jenis kelamin Anda ---</option>
								<?php
								if($data['jenis_kelamin_pelanggan'] == "Pria"){
									echo "<option value='Pria' selected>Pria</option>";
									echo "<option value='Wanita'>Wanita</option>";
								}elseif($data['jenis_kelamin_pelanggan'] == "Wanita"){
									echo "<option value='Pria'>Pria</option>";
									echo "<option value='Wanita' selected>Wanita</option>";
								}else{
									echo "<option value='Pria'>Pria</option>";
									echo "<option value='Wanita'>Wanita</option>";
								}
								?>
							</select>
							<span class="text-danger msg-error"><?php echo $jeniskelamin_kosong; ?></span>
						</div>
					</div>
						
					<div class="row">
						<div class="col-sm-12 form-group">
							<label>Alamat :</label>
							<input type="text" class="form-control" name="alamat" value="<?php echo isset($_POST['alamat']) ? $_POST['alamat'] : $data['alamat_pelanggan'];?>">
							<span class="text-danger msg-error"><?php echo $alamat_kosong; ?></span>
						</div>
					</div>
						
					<div class="row">
						<div class="col-sm-6 form-group">
							<label>Kota / Kabupaten :</label>
							<input type="text" class="form-control" name="kota" value="<?php echo isset($_POST['kota']) ? $_POST['kota'] : $data['kota_pelanggan'];?>">
							<span class="text-danger msg-error"><?php echo $kota_kosong; ?></span>
						</div>
							
						<div class="col-sm-6 form-group">
							<label>Provinsi :</label>
							<input type="text" class="form-control" name="provinsi" value="<?php echo isset($_POST['provinsi']) ? $_POST['provinsi'] : $data['provinsi_pelanggan'];?>">
							<span class="text-danger msg-error"><?php echo $provinsi_kosong; ?></span>
						</div>
					</div>
						
					<div class="row">
						<div class="col-sm-6 form-group">
							<label>Kode Pos :</label>
							<input type="number" class="form-control" name="kode_pos" value="<?php echo isset($_POST['kode_pos']) ? $_POST['kode_pos'] : $data['kode_pos_pelanggan'];?>">
							<span class="text-danger msg-error"><?php echo $kodepos_kosong; ?></span>
						</div>
							
						<div class="col-sm-6 form-group">
							<label>Nomor Telepon :</label>
							<input type="number" class="form-control" name="no_hp" value="<?php echo isset($_POST['no_hp']) ? $_POST['no_hp'] : $data['no_hp_pelanggan'];?>">
							<span class="text-danger msg-error"><?php echo $nohp_kosong; ?></span>
						</div>
					</div>

                    <div class="row">
						<div class="col-sm-12 form-group">
							<label>E-mail :</label>
							<input type="email" class="form-control" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $data['email_pelanggan'];?>">
							<span class="text-danger msg-error"><?php echo $email_kosong; ?></span>
						</div>
							
					</div>

					<!-- Button -->
					<center>
						<div class="form-group">
							<button type="submit" class="btn btn-warning" name="saveprofil">Ubah Profil</button>
							<a href="../index.php"><button type="button" class="btn btn-link">Batal</button></a>
						</div>
					</center>
						
				</div>
			</form>
		</div>
	</div>
	<div class="well"><p class="text-center new-account">Apakah Anda yakin menghapus akun ini? <a href="../index.php?p=delete">Hapus Akun Anda</a></p></div>
</div>
<?php ob_end_flush(); ?>