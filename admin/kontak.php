<?php include 'header.php'?>		
			<!--content-->
			<div class="content">
				<div class="container1">
					<div class="box">
						<div class="box-header">
							KONTAK
						</div>
						<div class="box-body">
						<?php
						if(isset($_GET['success']))
							echo '<div class ="alert alert-success">Edit Data Berhasil</div>';
						?>
						<form action="" method="post" enctype="multipart/form-data">
                                <div class="form-grup">
									<label>Alamat</label>
									<textarea type="text" name="alamat" placeholder="Alamat" class="input-control" required><?= $d->alamat?></textarea>
								</div>
								<div class="form-grup">
									<label>Telepon</label>
									<input type="number" name="telpone" placeholder="Telepon" class="input-control" value="<?= $d->telpone?>" required>
								</div>
								<div class="form-grup">
									<label>Whatsapp</label>
									<input type="number" name="wa" placeholder="whatsapp" class="input-control" value="<?= $d->wa?>" required>
								</div>
								<div class="form-grup">
									<label>Google Map</label>
									<textarea type="text" name="google_map" placeholder="Google Map" class="input-control" required><?= $d->google_map?></textarea>
								</div>
								<button type="submit" name="submit" class="btn">SIMPAN PERUBAHAN</button>
							</form>
							<?php
							//ketika tombol submit di klik apa yang akan terjadi 
							if(isset($_POST['submit'])){
								$alamat 	= htmlspecialchars(addslashes(ucwords($_POST['alamat'])));
								$telpone 	= htmlspecialchars(addslashes(ucwords($_POST['telpone'])));
                                $wa 		= htmlspecialchars(addslashes(ucwords($_POST['wa'])));
								$google_map = htmlspecialchars(addslashes(ucwords($_POST['google_map'])));
								$currdate 	= date('Y-m-d H:i:s');
								//jika didalam  name gambar ada name yang ada di gambar jika tidak sama dengan 0 maka ada 
			
                                
								$update	= mysqli_query($conn,"UPDATE setting SET 
									alamat ='".$alamat."',
									telpone ='".$telpone."',
									wa ='".$wa."',
									google_map ='".$google_map."',
									updated_at ='".$currdate."'
									WHERE id =".$d->id."
									");		
								if($update){
									echo "<script>window.location='kontak.php?success=Edit Data Berhasil'</script>";
								}else{
									echo'Gagal Update'.mysqli_error($conn);
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
<?php include 'footer.php'?>