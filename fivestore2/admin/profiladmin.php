<h1 style="text-align:center;">Profil Admin Five store</h1>
<br/>
<br/>
<?php
$ambil =$koneksi->query("SELECT * FROM admin");
$pisah = $ambil->fetch_assoc();


?>
<form>
	
	<div class="form-group">
		<label>Nama Admin</label>
		<input type="text" class="form-control" value="<?php echo $pisah['nama_admin']; ?>">
    </div>
    
    <div class="form-group">
		<label>Username Admin</label>
		<input type="text" class="form-control" value="<?php echo $pisah['username_admin']; ?>">
    </div>
    
    <div class="form-group">
		<label>Password Admin</label>
        <input type="password" class="form-control" value="<?php echo $pisah['password_admin']; ?>" id="mypass">
        <span id="mybutton" onclick="change()"><i class="glyphicon glyphicon-eye-open"></i></span><span>Click Icon to Hide/Show Password</span>
    </div>
    <br/>
    <br/>
    <div>
    <a href="index.php?halaman=editadmin&id=<?php echo $pisah['id_admin']; ?>" class="btn btn-warning">Ubah Profil</a>
    </div>
    

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
