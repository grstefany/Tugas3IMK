<div class="container">
	<h1 class="well"><center>Pendaftaran akun Five Store</center></h1>
	<div class="col-lg-12 well">
		<div class="row">
			<?php
				
			$error = false;
			$nama = $jenis_kelamin = $alamat = $kota = $provinsi = $kode_pos = $no_hp = $email = $password = "";
			$namakosong = $jeniskelamin_kosong = $alamat_kosong = $kota_kosong = $provinsi_kosong = $kodepos_kosong = $nohp_kosong = $email_kosong = $password_kosong = $konfirmasi_kosong = $setuju_kosong = "";
				
			if(isset($_POST['daftar'])){
				$query = mysqli_query($conn,"SELECT * FROM pelanggan WHERE email_pelanggan='".$_POST['email']."'");
								
				if($_SERVER['REQUEST_METHOD'] == "POST"){
					if(empty($_POST['nama'])){
						$error = true;
						$namakosong = "Masukan isi nama  Anda";
					}else{
                        $nama=$_POST['nama'];
                    }
                    
                    if(trim($_POST['gender'])=="blank"){
						$error = true;
						$jeniskelamin_kosong = "Pilih salah satu jenis kelamin Anda";
					}else{
						$jenis_kelamin = $_POST['gender'];
						if($jenis_kelamin == "Pria"){
							$A = "selected";
						}elseif($jenis_kelamin == "Wanita"){
							$B = "selected";
						}
						
					}
						
					if(empty($_POST['alamat'])){
						$error = true;
						$alamat_kosong = "Masukan isi alamat Anda";
					}else{
						$alamat = $_POST['alamat'];
					}
						
					if(empty($_POST['kota'])){
						$error = true;
						$kota = "Masukan isi nama kota atau kabupaten";
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
						$email_kosong = "Masukan isi alamat email Anda";
					}else{
						$email = $_POST['email'];
						
					}
									
					if(empty($_POST['password'])){
						$error = true;
						$password_kosong = "Masukan isi kata sandi";
					}else{
						$password = md5($_POST['password']);
						if(strlen($_POST['password']) < 8){
							$error = true;
							$password_kosong = "Kata sandi harus minimal 8 karakter";
						}
					}
									
					if(empty($_POST['konfirmasi'])){
						$error = true;
						$konfirmasi_kosong = "Masukan isi konfirmasi kata sandi";
					}else{
						if($_POST['password'] != $_POST['konfirmasi']){
							$error = true;
							$konfirmasi_kosong = "Kata sandi dan konfirmasi kata sandi tidak cocok";
						}
					}
						
					if(!isset($_POST['setuju']) == '1'){
						$error = true;
						$setuju_kosong = "Silakan di centang apabila Anda menyetujuinya";
					}
				}
								
				if(!$error){
					if(mysqli_num_rows($query) > 0){
						echo "<div class='alert alert-danger'>Email $email sudah masih ada, mohon di buat yang lain!</div>";
					}else{
						
						$email = mysqli_real_escape_string($conn, $email);
						$password = mysqli_real_escape_string($conn, $password);
						
							
						mysqli_query($conn,"INSERT INTO pelanggan (nama_pelanggan,jenis_kelamin_pelanggan,alamat_pelanggan,kota_pelanggan,provinsi_pelanggan,kode_pos_pelanggan,no_hp_pelanggan,email_pelanggan,password_pelanggan) VALUES ('$nama','$jenis_kelamin','$alamat','$kota','$provinsi','$kode_pos','$no_hp','$email','$password')");
							
						echo "<meta http-equiv='refresh' content='0; url=../index.php?p=sukses'>";
					}
				}
			}
			?>
			<form action="../index.php?p=register" method="POST">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-12 form-group">
							<label>Nama :</label>
							<input type="text" class="form-control" name="nama" placeholder="Masukan isi nama Anda" value="<?php echo isset($nama) ? $nama : ' ';?>">
							<span class="text-danger msg-error"><?php echo $namakosong; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 form-group">
							<label>Jenis Kelamin :</label>
							<select name="gender" class="form-control">
								<option value="blank">--- Pilih jenis kelamin Anda ---</option>
								<option value="Pria" >Pria</option>
								<option value="Wanita">Wanita</option>
							</select>
							<span class="text-danger msg-error"><?php echo $jeniskelamin_kosong; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 form-group">
							<label>Alamat :</label>
							<input type="text" class="form-control" name="alamat" placeholder="Masukan alamat" value="<?php echo isset($alamat) ? $alamat : ' ';?>">
							<span class="text-danger msg-error"><?php echo $alamat_kosong; ?></span>
						</div>
					</div>
						
					<div class="row">
						<div class="col-sm-6 form-group">
							<label>Kota / Kabupaten :</label>
							<input type="text" class="form-control" name="kota" placeholder="Masukan nama kota atau kabupaten" value="<?php echo isset($kota) ? $kota : ' ';?>">
							<span class="text-danger msg-error"><?php echo $kota_kosong ?></span>
						</div>
							
						<div class="col-sm-6 form-group">
							<label>Provinsi :</label>
							<input type="text" class="form-control" name="provinsi" placeholder="Masukan provinsi" value="<?php echo isset($provinsi) ? $provinsi : ' ';?>">
							<span class="text-danger msg-error"><?php echo $provinsi_kosong; ?></span>
						</div>
					</div>
						
					<div class="row">
						<div class="col-sm-6 form-group">
							<label>Kode Pos :</label>
							<input type="number" class="form-control" name="kode_pos" placeholder="Masukan kode pos" value="<?php echo isset($kodepos) ? $kodepos : ' ';?>">
							<span class="text-danger msg-error"><?php echo $kodepos_kosong; ?></span>
						</div>
							
						<div class="col-sm-6 form-group">
							<label>No. Handphone :</label>
							<input type="number" class="form-control" name="no_hp" maxlength="14" placeholder="Masukan isi nomor telepon Anda" value="<?php echo isset($no_hp) ? $no_hp : ' ';?>">
							<span class="text-danger msg-error"><?php echo $nohp_kosong; ?></span>
						</div>
					</div>
						
					<div class="row">
						<div class="col-sm-4 form-group">
							<label>Alamat Email :</label>
							<input type="email" class="form-control" name="email" placeholder="Masukan alamat email" value="<?php echo isset($email) ? $email : ' ';?>"> 
							<span>Contoh: yourname@mail.com</span><br/>
							<span class="text-danger msg-error"><?php echo $email_kosong; ?></span>
						</div>
						<div class="col-sm-4 form-group">
							<label>Kata Sandi :</label>
							<input type="password" class="form-control" name="password" placeholder="Masukan kata sandi sini">
							<span class="text-danger msg-error"><?php echo $password_kosong; ?></span>
						</div>
						<div class="col-sm-4 form-group">
							<label>Konfirmasi Kata Sandi :</label>
							<input type="password" class="form-control" name="konfirmasi" placeholder="Masukan kata sandi lagi">
							<span class="text-danger msg-error"><?php echo $konfirmasi_kosong; ?></span>
						</div>
					</div>
						
					<center>
						<div class="form-group">
							<div class="checkboxcss"><input type="checkbox" name="setuju" value="1"> Saya setuju akan siap mengikut aturan ini</div>
							<span class="text-danger msg-error"><?php echo $setuju_kosong; ?></span>
						</div>
					</center>
						
					<!-- Button -->
					<center>
						<div class="form-group">
							<button type="submit" class="btn btn-warning" name="daftar">Daftar</button>
							<a href="../index.php"><button type="button" class="btn btn-link">Batal</button></a>
						</div>
					</center>
						
				</div>
			</form>
		</div>
	</div>
	<div class="well"><p class="text-center new-account">Pernah jadi anggota? <a href="../index.php?p=login">Masuk</a></p></div>
</div>