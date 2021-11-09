<h1 style="text-align:center;">PESANAN</h1>
<br/>
<br/>
<br/>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
            <th>Tanggal Pembelian</th>
			<th>Kode Pembelian</th>
            <th>Jumlah Pembayaran</th>
            <th>Status Pembayaran</th>
            <th>Status Pengiriman</th>
			<th>Edit</th>
			<th>Print</th>

		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian"); ?>
		<?php while ($pisah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pisah['tanggal_pembelian']; ?></td>
			<td><?php echo $pisah['id_pembelian']; ?></td>
			<td><?php echo 'Rp '.number_format($pisah['total_pembelian'],0,".",".").''; ?></td>
            <td><?php echo $pisah['status_pembayaran']; ?></td>
            <td><?php echo $pisah['status_pembelian']; ?></td>
			
            
            <td>
				<a href="index.php?halaman=editpembelian&id=<?php echo $pisah['id_pembelian']; ?>" class="fa fa-pencil-square-o fa-2x"></a>
				
			</td>
			<td>
			<a href="index.php?halaman=printpembelian&id=<?php echo $pisah['id_pembelian']; ?>"  class= "fa fa-print fa-2x"></a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>