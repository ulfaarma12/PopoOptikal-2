<?php include 'header.php'?> 
<!--content-->
		<!--bagian banner-->
		<div class="banner" style="	background-image:url('upload/identitas/<?= $d->foto?>">
			<div class="text">
					<h2>Selamat Datang Di <?= $d->nama?></h2>
					<p>Optik kacamata paling keren dan terpercaya</p>
			</div>
		</div>

		<div class="section" >
			<div class="container1 text-center">
				<h3 class="line">FRAME</h3>
					<?php
					$frame = $conn->query("SELECT * FROM frame ORDER BY id DESC LIMIT 3"); 
					?>
					<h3>Produk Terbaru</h3>
			
					<?php 	
						while ($f = $frame->fetch_assoc()) {
					?>
						<div class="col-4">
							<a href="<?php echo $url; ?>menu.php?id=<?php echo $f['id'] ?>" class="thumbnaill-link">
								<div class="thumbnaill-img" style="	background-image:url('upload/frame/<?= $f['galeri']?>');" >
								</div>
									<div class="thumbnaill-text">
										<h4><?php echo $f['merek'] ?></h4>
									</div>
							</a>
							<p style="font-size:18px">Harga: <?php echo number_format($f['harga'], 2, ',', '.') ?></p>
						</div>	
				<?php } ?>
			</div>
		</div>
		<!--bagian frame-->
		<div class="section" id="frame">
			<div class="container1 text-center">
				<h3 class="line">FRAME</h3>
					<?php
					$frame = mysqli_query($conn, "SELECT * FROM frame ORDER BY id DESC LIMIT 4");
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
			<a class="footer-banyak" href="frame.php">Lihat Lebih Banyak--></a>
		</div>
		<div class="section" >
			<div class="container1 text-center">
				<h3 class="line">LENSA</h3>
					<?php
					$lensa = $conn->query("SELECT * FROM lensa ORDER BY id DESC LIMIT 3"); 
					?>
					<h3>Produk Terbaru</h3>
			
					<?php 	
						while ($l = $lensa->fetch_assoc()) {
					?>
						<div class="col-4">
							<a href="<?php echo $url; ?>menu.php?id=<?php echo $l['id'] ?>" class="thumbnaill-link">
								<div class="thumbnaill-img" style="	background-image:url('upload/lensa/<?= $l['galeri']?>');" >
								</div>
									<div class="thumbnaill-text">
										<h4><?php echo $l['jenis_lensa'] ?></h4>
									</div>
							</a>
							<p style="font-size:18px">Harga: <?php echo number_format($l['harga'], 2, ',', '.') ?></p>
						</div>	
				<?php } ?>
			</div>
		</div>
			<!--bagian Lensa-->
			<div class="section" id="lensa">
			<div class="container1 text-center">
				<h3 class="line">Lensa</h3>
					<?php
					$lensa = mysqli_query($conn, "SELECT * FROM lensa ORDER BY id DESC LIMIT 4");
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
			<a class="footer-banyak" href="lensa.php">Lihat Lebih Banyak--></a>
		</div>
		<!--informasi-->
		<div class="section">
			<div class="container1 text-center">
				<h3 class="line">Informasi terbaru</h3>
				<?php
					$informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC LIMIT 8");
					if(mysqli_num_rows($informasi)>0){	
					//looping data 			 
					while ($p = mysqli_fetch_array($informasi)){	
					?>
						<div class="col-4">
							<a href="detail_informasi.php?id=<?= $p['id']?>" class="thumbnaill-link">
								<div class="thumbnaill-box">
									<div class="thumbnaill-img" style="	background-image:url('upload/informasi/<?= $p['galeri']?>');" >
									</div>
									<div class="thumbnaill-text">
									<?= substr($p['judul'],0,50) ?>
									</div>
								</div>
								</a>
						</div>
				<?php }}else{ ?>
				
				Tidak Ada Data
				
				<?php } ?>
			</div>
			<a class="footer-banyak" href="informasi.php">Lihat Lebih Banyak--></a>
		</div>
<?php include 'footer.php'?>