<?php include 'header.php'?>		
			<!--content-->
			<div class="content">
				<div class="container1">
					<div class="box">
						<div class="box-header">
							IDENTITAS
						</div>
						<div class="box-body">
						<?php
						if(isset($_GET['success']))
							echo '<div class ="alert alert-success">Edit Data Berhasil</div>';
						?>
						<form action="" method="post" enctype="multipart/form-data">
								<div class="form-grup">
									<label>Nama</label>
									<input type="text" name="nama" placeholder="Nama" class="input-control" value="<?= $d->nama?>" required>
								</div>
								<div class="form-grup">
									<label>Tekline</label>
									<textarea type="text" name="tekline" placeholder="Tekline" class="input-control" required><?= $d->tekline?></textarea>
								</div>
								<div class="form-grup">
									<label>logo</label>
									<img src ="../upload/identitas/<?= $d->logo?>" width="200px" class="image">
									<input type="hidden" name="logo_lama" value="<?= $d->logo?>" class="input-control"required></br>
									<input type="file" name="logo_baru" class="input-control">								
								</div>
								<div class="form-grup">
									<label>Favicon</label>
									<img src ="../upload/identitas/<?= $d->favicon?>" width="32"class="image">
									<input type="hidden" name="favicon_lama" value="<?= $d->favicon?>" class="input-control"required></br>
									<input type="file" name="favicon_baru" class="input-control">								
								</div>
								<div class="form-grup">
									<label>Foto</label>
									<img src ="../upload/identitas/<?= $d->foto?>" width="200px" class="image">
									<input type="hidden" name="foto_lama" value="<?= $d->foto?>" class="input-control"required></br>
									<input type="file" name="foto_baru" class="input-control">								
								</div>
								<button type="submit" name="submit" class="btn">SIMPAN PERUBAHAN</button>
							</form>
							
							<?php
							//ketika tombol submit di klik apa yang akan terjadi 
							if(isset($_POST['submit'])){
								$nama 	= htmlspecialchars(addslashes(ucwords($_POST['nama'])));
								$tekline 	= htmlspecialchars(addslashes(ucwords($_POST['tekline'])));
								$currdate = date('Y-m-d H:i:s');
								//jika didalam  name gambar ada name yang ada di gambar jika tidak sama dengan 0 maka ada 
								//menampung dan validasi data logo
								if($_FILES['logo_baru']['name'] !=''){
									//echo 'User Ganti Gambar';
									$filename_logo	= $_FILES['logo_baru']['name'];
									$tmpname_logo	= $_FILES['logo_baru']['tmp_name'];
									$filesize_logo	= $_FILES['logo_baru']['size'];
									
									$formatfile_logo = pathinfo($filename_logo, PATHINFO_EXTENSION);
									$rename_logo		='logo'.time().'.'.$formatfile_logo;
									
									//type apa aja yang di pakai
									$allowedtype_logo	= array('png','jpg','jpeg','gif');
									//jika format didak sesuai
									if(!in_array($formatfile_logo, $allowedtype_logo)){
											echo '<div class ="alert alert-error">Format File Logo Sekolah Tidak Ditemukan</div>';
											return false;
									}elseif($filesize_logo > 1000000){
										echo '<div class ="alert alert-error">Ukuran File Logo Sekolah Tidak Boleh Lebih Dari 1 MB</div>';
										return false;
									}else{
									
										if(file_exists("../upload/identitas/".$_POST['logo_lama'])){
											unlink("../upload/identitas/".$_POST['logo_lama']);
										}
										move_uploaded_file($tmpname_logo,"../upload/identitas/".$rename_logo);
									}
								}else {
									$rename_logo = $_POST['logo_lama'];
								}
								
								//menampung dan validasi data favicon
								if($_FILES['favicon_baru']['name'] !=''){
									//echo 'User Ganti Gambar';
									$filename_favicon	= $_FILES['favicon_baru']['name'];
									$tmpname_favicon	= $_FILES['favicon_baru']['tmp_name'];
									$filesize_favicon	= $_FILES['favicon_baru']['size'];
									
									$formatfile_favicon = pathinfo($filename_favicon, PATHINFO_EXTENSION);
									$rename_favicon		='favicon'.time().'.'.$formatfile_favicon;
									
									//type apa aja yang di pakai
									$allowedtype_favicon	= array('png','jpg','jpeg','gif');
									//jika format didak sesuai
									if(!in_array($formatfile_favicon, $allowedtype_favicon)){
											echo '<div class ="alert alert-error">Format File favicon Sekolah Tidak Ditemukan</div>';
											return false;
									}elseif($filesize_favicon > 1000000){
										echo '<div class ="alert alert-error">Ukuran File favicon Sekolah Tidak Boleh Lebih Dari 1 MB</div>';
										return false;
									}else{
									
										if(file_exists("../upload/identitas/".$_POST['favicon_lama'])){
											unlink("../upload/identitas/".$_POST['favicon_lama']);
										}
										move_uploaded_file($tmpname_favicon,"../upload/identitas/".$rename_favicon);
									}
								}else {
									$rename_favicon = $_POST['favicon_lama'];
								}

								//menampung dan validasi data foto
								if($_FILES['foto_baru']['name'] !=''){
									//echo 'User Ganti Gambar';
									$filename_foto	= $_FILES['foto_baru']['name'];
									$tmpname_foto	= $_FILES['foto_baru']['tmp_name'];
									$filesize_foto	= $_FILES['foto_baru']['size'];
									
									$formatfile_foto = pathinfo($filename_foto, PATHINFO_EXTENSION);
									$rename_foto	 ='foto'.time().'.'.$formatfile_foto;
									
									//type apa aja yang di pakai
									$allowedtype_foto	= array('png','jpg','jpeg','gif');
									//jika format didak sesuai
									if(!in_array($formatfile_foto, $allowedtype_foto)){
											echo '<div class ="alert alert-error">Format File foto Sekolah Tidak Ditemukan</div>';
											return false;
									}elseif($filesize_foto > 1000000){
										echo '<div class ="alert alert-error">Ukuran File foto Sekolah Tidak Boleh Lebih Dari 1 MB</div>';
										return false;
									}else{
									
										if(file_exists("../upload/identitas/".$_POST['foto_lama'])){
											unlink("../upload/identitas/".$_POST['foto_lama']);
										}
										move_uploaded_file($tmpname_foto,"../upload/identitas/".$rename_foto);
									}
								}else {
									$rename_foto = $_POST['foto_lama'];
								}
								$update	= mysqli_query($conn,"UPDATE setting SET 
									nama ='".$nama."',
									tekline ='".$tekline."',
									logo ='".$rename_logo."',
									favicon ='".$rename_favicon."',
									foto ='".$rename_foto."',
									updated_at ='".$currdate."'
									WHERE id =".$d->id."
									");		
								if($update){
									echo "<script>window.location='identitas.php?success=Edit Data Berhasil'</script>";
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