<h1 style="text-align:center;">DATA PELANGGAN FIVE STORE</h1>
<br/>
<br/>
<br/>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
            <th>Nama</th>
			<th>jenis kelamin</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Provinsi</th>
            <th>Kode Pos</th>
			<th>No.Hp</th>
            <th>Email</th>
			<th>Edit</th>
			<th>Hapus</th>

		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
		<?php while ($pisah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pisah['nama_pelanggan']; ?></td>
			<td><?php echo $pisah['jenis_kelamin_pelanggan']; ?></td>
			<td><?php echo $pisah['alamat_pelanggan']; ?></td>
            <td><?php echo $pisah['kota_pelanggan']; ?></td>
            <td><?php echo $pisah['provinsi_pelanggan']; ?></td>
            <td><?php echo $pisah['kode_pos_pelanggan']; ?></td>
			<td><?php echo $pisah['no_hp_pelanggan']; ?></td>
            <td><?php echo $pisah['email_pelanggan']; ?></td>
            <td>
				<a href="index.php?halaman=editpelanggan&id=<?php echo $pisah['id_pelanggan']; ?>" class="fa fa-pencil-square-o fa-2x"></a>
				
			</td>
			<td>
			<a href='javascript:hapusData(<?php echo $pisah['id_pelanggan']; ?>)' class= "fa fa-trash-o fa-2x"></a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>

		<script language="JavaScript" type="text/javascript">
      function hapusData(id_pelanggan){
        if (confirm("Apakah anda yakin akan menghapus data ini?")){
          window.location.href = 'hapuspelanggan.php?id=' + id_pelanggan;
        }
      }
    </script>
	</tbody>
</table>
