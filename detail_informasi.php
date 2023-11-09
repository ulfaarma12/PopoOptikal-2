<?php include 'header.php'?> 
<!--content-->
	<div class="section">
		<div class="container1">
		<?php
		 	 $informasi = mysqli_query($conn, "SELECT * FROM informasi WHERE id =" . $_GET['id']);
			if(mysqli_num_rows($informasi) == 0){	
			header("location:index.php");	
			}
			$p			= mysqli_fetch_array($informasi);
		?>
		<h3 class="text-center line"><?= $p['judul']?></h3>
		<img src="upload/informasi/<?= $p['galeri']?>" width="100%" class="image" style="margin-top:5px">
		<h3><?= $p['keterangan']?></h3>
		</div>
	</div>
<?php include 'footer.php'?>