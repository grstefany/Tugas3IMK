<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="text-center text1">Brands</h1><br/>
		</div>
	</div>
	<div class="row" style="margin-bottom:20px;">
		<div class="col-md-4 col-xs-6">
		<?php
			
			$query = mysqli_query($conn, "SELECT * FROM brands ORDER BY nama_brands ASC");
			while($row = mysqli_fetch_assoc($query)){
				echo '<ul>';
				echo '<li style="font-size:17px;"><a href="../index.php?p=productbrand='.$row['nama_brands'].'">'.$row['nama_brands'].'</a></li>';
				echo '</ul>';
				
			}
		?>
		</div>
	</div>
</div>
