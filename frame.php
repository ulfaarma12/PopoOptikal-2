<?php include 'header.php'?> 
<!--content-->
	<div class="section">
		<div class="container1 text-center">
				<h3 class="line">FRAME</h3>
					<?php
					$frame = mysqli_query($conn, "SELECT * FROM frame ORDER BY id DESC");
					if(mysqli_num_rows($frame)>0){
					// looping data 
					while ($f = mysqli_fetch_array($frame)){	
					?>
						<div class="col-4">
							<a href="detail_frame.php?id=<?= $f['id']?>" class="thumbnaill-link">
								<div class="thumbnaill-box">
									<div class="thumbnaill-img" style="	background-image:url('upload/frame/<?= $f['galeri']?>');" >
									</div>
									<div class="thumbnaill-text">
									<?= $f['merek'] ?>
									</div>
								</div>
							</a>
							<p style="font-size:18px">Harga: <?php echo number_format($f['harga'], 2, ',', '.') ?></p>
						</div>
				<?php }}else{ ?>
				
				Tidak Ada Data
				
				<?php } ?>
		</div>
	</div>
<?php include 'footer.php'?>