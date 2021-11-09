<h1 style="text-align:center;"><b>Edit Profil Admin Five store</b></h1>
<br/>
<br/>
<?php
$ambil =$koneksi->query("SELECT * FROM admin");
$pisah = $ambil->fetch_assoc();


?>
<form action="" method="post">
	
	<div class="form-group">
		<label>Nama Admin</label>
		<input type="text" class="form-control" name="nama" required>
    </div>
    
    <div class="form-group">
		<label>Username Admin</label>
		<input type="text" class="form-control" name="username" required>
    </div>
    
    <div class="form-group">
		<label>Password Admin</label>
        <input type="password" class="form-control" name="password" id="mypass" required minlength="8">
        <span id="mybutton" onclick="change()"><i class="glyphicon glyphicon-eye-open"></i></span><span>Click Icon to Hide/Show Password</span>
    </div>
    <br/>
    <br/>
    <div>
	<button type="submit" class="btn btn-info" name="ubah">Update Profil</button>
    </div>
    
    <?php  
    if (isset($_POST['ubah'])) 
{
		$koneksi->query("UPDATE admin SET nama_admin='$_POST[nama]',username_admin='$_POST[username]',password_admin='$_POST[password]'WHERE id_admin='1'");
		
	echo "<script>alert('profil admin berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=profiladmin';</script>";
}
?>

    <script type="text/javascript">
         function change()
         {
            var x = document.getElementById('mypass').type;
 
            if (x == 'password')
            {
               document.getElementById('mypass').type = 'text';
               document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-close"></i>';
            }
            else
            {
               document.getElementById('mypass').type = 'password';
               document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-open"></i>';
            }
         }
      </script>
