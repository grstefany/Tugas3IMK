<h1 style="text-align:center;">DATA PRODUK FIVE STORE</h1>
<br/>
<br/>
<a href="index.php?halaman=updateproduk" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a>
<br/>
<br/>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
            <th>Nama Produk</th>
			<th>Kategori Produk</th>
            <th>Brand Produk</th>
            <th>Gambar</th>
            
            <th>Spesifikasi</th>
			<th>Harga</th>
			<th>Edit</th>
			<th>Hapus</th>

		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
		<?php while ($pisah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pisah['nama_produk']; ?></td>
			<td><?php echo $pisah['kategori_produk']; ?></td>
			<td><?php echo $pisah['brand_produk']; ?></td>
            <td><img src="../gambar_produk/<?php echo $pisah['bgimg']; ?>" width="100"></td>
            <td><?php echo $pisah['spesifikasi_produk']; ?></td>
			<td><?php echo 'Rp'.number_format($pisah['harga_produk'],0,".",".").'';?></td>
            
            <td>
				<a href="index.php?halaman=editproduk&id=<?php echo $pisah['id_produk']; ?>" class="fa fa-pencil-square-o fa-2x"></a>
				
			</td>
			<td>
			<a href='javascript:hapusData(<?php echo $pisah['id_produk']; ?>)' class= "fa fa-trash-o fa-2x"></a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>

		<script language="JavaScript" type="text/javascript">
      function hapusData(id_produk){
        if (confirm("Apakah anda yakin akan menghapus data ini?")){
          window.location.href = 'hapusproduk.php?id=' + id_produk;
        }
      }
    </script>
	</tbody>
</table>
