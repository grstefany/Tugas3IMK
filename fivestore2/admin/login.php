<?php
session_start();
//koneksi ke database
$koneksi= new mysqli("localhost","root","","fivestore");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Fivestore</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>





  <div class="container">
    <div class="row text-center ">
      <div class="col-md-12">
        <br /><br />
        <img src="img/160817821112319976.png" style="width: 300px;">

        <h5><b>( Admin Fivestore )</b></h5>
        <br />
      </div>
    </div>
    <div class="row ">

      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong>   Akun Admin  </strong>  
          </div>
          <div class="panel-body">
            <form role="form" method="post">
             <br />
             <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
              <input type="text" class="form-control" name="user" placeholder="Username Admin" required/>
             </div>
             
            <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
            <input type="password" class="form-control" id="mypass"  name="pass" placeholder="Password Admin" required>
            
            </div>
            <span id="mybutton" onclick="change()"><i class="glyphicon glyphicon-eye-open"></i></span><span>Click Icon to Hide/Show Password</span>
          <br/>
          <br/>


         <button class="btn btn-primary" name="login">Login</button>
         
       </form>
       <?php  
       if (isset($_POST['login'])) 
       {
         $ambil = $koneksi->query("SELECT * FROM admin WHERE username_admin='$_POST[user]' AND password_admin ='$_POST[pass]'");
         $yangcocok = $ambil->num_rows;
         if ($yangcocok==1) 
         {
           $_SESSION['admin']=$ambil->fetch_assoc();
           echo "<div class='alert alert-info'>Login Sukses</div>";
           echo "<meta http-equiv='refresh' content='1;url=index.php'>";
         }
         else
         {
          echo "<div class='alert alert-danger'>Username dan kata Sandi Salah</div>";
          echo "<meta http-equiv='refresh' content='1;url=login.php'>";
         }
       }

       ?>

   </div>
 </div>


</div>
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

<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>

</body>
</html>
