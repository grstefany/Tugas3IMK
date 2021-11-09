<h1 style="text-align:center;">DATA BRANDS FIVE STORE</h1>
<br/>
<br/>
<a href="index.php?halaman=updatebrands" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Brand</a>
<br/>
<br/>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
            <th>Nama Brand</th>
            <th>Logo Brand</th>
			<th>Edit</th>
			<th>Hapus</th>

		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM brands"); ?>
		<?php while ($pisah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pisah['nama_brands']; ?></td>
			<td align="center">
               <img src="logo_brands/<?php echo $pisah['logo_brands']; ?>" width="100">
            
            </td>
		
            <td align="center">
				<a href="index.php?halaman=editbrands&id=<?php echo $pisah['id_brands']; ?>" class="fa fa-pencil-square-o fa-2x"></a>
				
			</td>
			<td align="center"> 
			<a href='javascript:hapusData(<?php echo $pisah['id_brands']; ?>)' class= "fa fa-trash-o fa-2x"></a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>

		<script language="JavaScript" type="text/javascript">
      function hapusData(id_brands){
        if (confirm("Apakah anda yakin akan menghapus data ini?")){
          window.location.href = 'hapusbrands.php?id=' + id_brands;
        }
      }
    </script>
	</tbody>
</table>
