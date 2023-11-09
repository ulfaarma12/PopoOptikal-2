<?php include 'header.php'?> 
<!--content-->
	<div class="section">
		<div class="container1">
		<?php
			$frame	= mysqli_query($conn, "SELECT * FROM frame WHERE id =".$_GET['id']);
			if(mysqli_num_rows($frame) == 0){	
			header("location:index.php");	
			}
			$p			= mysqli_fetch_array($frame);
		?>
		<h3 class="text-center line"><?= $p['merek']?></h3>
		<img src="upload/frame/<?= $p['galeri']?>" width="100%" class="image" style="margin-top:5px">
		<h3>HARGA 	   :<br>Rp.<?= number_format($p['harga'], 0, ",", ".")?><br></h3>
		<h3>KETERANGAN :<br><?= $p['keterangan']?></h3>
		<h3>Link Wa :<br>
		<?php
			$result = $conn->query("SELECT wa FROM setting WHERE id = 0"); // Ganti dengan query yang sesuai
			$row = $result->fetch_assoc();
			$nomor_telepon = $row['wa'];
			// Fungsi untuk membersihkan nomor telepon dari karakter yang tidak diperlukan
			function cleanPhoneNumber($phoneNumber) {
			return preg_replace("/[^0-9]/", "", $phoneNumber);
			}
			$nomor_telepon = cleanPhoneNumber($nomor_telepon);
		?>
			<a href="whatsapp://send?phone=<?php echo $nomor_telepon; ?>&text=Halo! Saya tertarik dengan produk Anda.">Pesan Produk</a>
		</h3>
		</div>
	</div>
<?php include 'footer.php'?>