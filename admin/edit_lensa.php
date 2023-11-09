<?php include 'header.php'?>	
<?php
	$lensa 	= mysqli_query($conn, "SELECT * FROM lensa WHERE id =".$_GET['id']);
	if(mysqli_num_rows($lensa) == 0){	
	header("location:lensa.php");	
	}
	$p			= mysqli_fetch_array($lensa);	
?>
			<!--content-->
			<div class="content">
				<div class="container1">
					<div class="box">
						<div class="box-header">
							EDIT LENSA
						</div>
						<div class="box-body">
						<form action="" method="post" enctype="multipart/form-data">
								<div class="form-grup">
									<label>Jenis Lensa</label>
									<input type="text" name="jenis_lensa" placeholder="Jenis Lensa<" class="input-control" value="<?= $p['jenis_lensa']?>" required>
								</div>
								<div class="form-grup">
								<label>Keterangan</label>
								<textarea type="text" name="keterangan" placeholder="Keterangan" class="input-control" id="keterangan"
									required><?= $p['keterangan'] ?></textarea>
								</div>
								<div class="form-grup">
									<label>Harga</label>
									<input type="number" name="harga" placeholder="Harga<" class="input-control" value="<?= $p['harga']?>" required>
								</div>
								<div class="form-grup">
									<label>Stok</label>
									<input type="number" name="stok" placeholder="Stok<" class="input-control" value="<?= $p['stok']?>" required>
								</div>
								<div class="form-grup">
									<label>Galeri</label>
									<img src ="../upload/lensa/<?= $p['galeri']?>" width="200px" class="image">
									<input type="hidden" name="galeri2" value="<?= $p['galeri']?>" class="input-control"required></br>
									<input type="file" name="galeri" class="input-control">								
								</div>
								
								<button type="button"class="btn" onclick="window.location ='lensa.php'">KEMBALI</button>
								<button type="submit" name="submit" class="btn">SIMPAN</button>
							</form>
							
							<?php
							//ketika tombol submit di klik apa yang akan terjadi 
							if(isset($_POST['submit'])){
								$jenis_lensa = addslashes(ucwords($_POST['jenis_lensa']));
								$ket = addslashes($_POST['keterangan']);
								$harga = addslashes($_POST['harga']);
								$stok = addslashes($_POST['stok']);
								$currdate = date('Y-m-d H:i:s');
								//jika didalam  name galeri ada name yang ada di galeri jika tidak sama dengan 0 maka ada 
								if($_FILES['galeri']['name'] !=''){
									//echo 'User Ganti galeri';
									$filename	= $_FILES['galeri']['name'];
									$tmpname	= $_FILES['galeri']['tmp_name'];
									$filesize	= $_FILES['galeri']['size'];
									
									$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
									$rename		='lensa'.time().'.'.$formatfile;
									
									//type apa aja yang di pakai
									$allowedtype	= array('png','jpg','jpeg','gif');
									//jika format didak sesuai
									if(!in_array($formatfile, $allowedtype)){
											echo '<div class ="alert alert-error">Format File Tidak Ditemukan</div>';
											return false;
									}elseif($filesize > 1000000){
										echo '<div class ="alert alert-error">Ukuran File Tidak Boleh Lebih Dari 1 MB</div>';
										return false;
									}else{
									
										if(file_exists("../upload/lensa/".$_POST['galeri2'])){
											unlink("../upload/lensa/".$_POST['galeri2']);
										}
										move_uploaded_file($tmpname,"../upload/lensa/".$rename);
									}
								}else {
									//echo 'User Tidak Ganti galeri';
									$rename = $_POST['galeri2'];
								}
								$update = mysqli_query($conn, "UPDATE lensa SET 
                        		jenis_lensa ='" . $jenis_lensa . "',
								keterangan ='" . $ket . "',
								harga ='" . $harga . "',
								stok ='" . $stok . "',
								galeri ='" . $rename . "',
								updated_at ='" . $currdate . "'
								WHERE id =" . $_GET['id'] . "
								");	
								if($update){
									echo "<script>window.location='lensa.php?success=Edit Data Berhasil'</script>";
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