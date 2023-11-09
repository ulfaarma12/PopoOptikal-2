<?php include 'header.php'?> 
<!--content-->
	<div class="section">
		<div class="container1 text-center">
				<h3 class="line">Lensa</h3>
					<?php
					$lensa = mysqli_query($conn, "SELECT * FROM lensa ORDER BY id DESC");
					if(mysqli_num_rows($lensa)>0){
					// looping data 
					while ($l = mysqli_fetch_array($lensa)){	
					?>
						<div class="col-4">
							<a href="detail_lensa.php?id=<?= $l['id']?>" class="thumbnaill-link">
								<div class="thumbnaill-box">
									<div class="thumbnaill-img" style="	background-image:url('upload/lensa/<?= $l['galeri']?>');" >
									</div>
									<div class="thumbnaill-text">
									<?= $l['jenis_lensa'] ?>
									</div>
								</div>
								</a>
								<p style="font-size:18px">Harga: <?php echo number_format($l['harga'], 2, ',', '.') ?></p>
						</div>
				<?php }}else{ ?>
				
				Tidak Ada Data
				
				<?php } ?>
			</div> 
<?php include 'footer.php'?>