<?php include 'header.php'?>			
			<!--content-->
			<div class="content">
				<div class="container1">
					<div class="box">
						<div class="box-header">
							TAMBAH FRAME
						</div>
						<div class="box-body">
						
							<form action="" method="POST" enctype="multipart/form-data">
							
								<div class="form-grup">
									<label>Merek</label>
									<input type="text" name="merek" placeholder="Merek" class="input-control" required>
								</div>
								<div class="form-grup">
								<!--elemen yang dapat menyimpan kata dan dapat diperluas jika pengguna memasukkan lebih banyak text sehingga dapat dimasukkan pada elemen text area-->
									<label>Keterangan</label>
									<textarea name="keterangan" placeholder="Keterangan" class="input-control" id="keterangan"></textarea>
								</div>
								<div class="form-grup">
									<label>Harga</label>
									<input type="number" name="harga" placeholder="Harga" class="input-control" required>
								</div>
								<div class="form-grup">
									<label>Galeri</label>
									<input type="file" name="galeri" class="input-control" required>								
								</div>
								
								<button type="button"class="btn" onclick="window.location ='frame.php'">KEMBALI</button>
								<button type="submit" name="submit" class="btn">SIMPAN</button>
							
							</form>
							
							<?php
								
								if(isset($_POST['submit'])){
									//print_r($_FILES['galeri']);
									//variabel untuk nampung nama data 
									$merek 	= htmlspecialchars(addslashes(ucwords($_POST['merek'])));
									$ket 	= htmlspecialchars(addslashes(ucwords($_POST['keterangan'])));
									$harga 	= htmlspecialchars(addslashes(ucwords($_POST['harga'])));
									
									$filename	= $_FILES['galeri']['name'];
									$tmpname	= $_FILES['galeri']['tmp_name'];
									$filesize	= $_FILES['galeri']['size'];
									
									$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
									$rename		='frame'.time().'.'.$formatfile;
									
									//type apa aja yang di pakai
									$allowedtype	= array('png','jpg','jpeg','gif');
									//jika format file itu tidak ada  di dalam variabel allowedtype 
									if(!in_array($formatfile, $allowedtype)){
										echo '<div class ="alert alert-error">Format File Tidak Ditemukan</div>';
									}elseif($filesize > 1000000){
									echo '<div class ="alert alert-error">Ukuran File Tidak Boleh Lebih Dari 1 MB</div>';
									}else{
										move_uploaded_file($tmpname,"../upload/frame/".$rename);
									
										$simpan = mysqli_query($conn, "INSERT INTO frame VALUES(
										null,
										'".$merek."',
										'".$ket."',
										'".$harga."',
										'".$rename."',
										null,
										null
									
									)");
									
										if ($simpan){
											echo '<div class ="alert alert-success">simpan berhasil</div>';
										}else{
											echo 'gagal simpan'.mysqli_error($conn);
										}
									}
								
								}
							
							?>
						
							
						</div>
					</div>
				</div>
			</div>
			
	<?php include 'footer.php' ?>