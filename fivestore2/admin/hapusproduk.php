<?php
  // defenisikan koneksi
  require('koneksi.php');
  // cek apakah ada parameter ID dikirim
  if (isset($_GET['id'])) {
    // jika ada, ambil nilai id
    $id     = $_GET['id'];
    // query SQL menghapus data berdasarkan id yg dipilih
    $sql    = "DELETE from produk WHERE id_produk='".$id."'";
    // hapus data pada database
    $query  = mysqli_query($conn,$sql);
    // cek apakah proses hapus data berhasil
    if(mysqli_affected_rows($conn)) {
      // jika berhasil, redirect kehalaman brands.php
      echo "<script>alert('Produk terhapus');</script>";
      echo "<script>location='index.php?halaman=produk';</script>";
   } else {
      // jika tidak redirect juga kehalaman brands.php
      header("Location:index.php?halaman=produk");
    }
  }
 ?>
