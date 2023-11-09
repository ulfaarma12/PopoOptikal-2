<?php include 'header.php'?>		
			<!--content-->
			<div class="content">
				<div class="container1">
					<div class="box">
						<div class="box-header">
							UBAH PASSWORD
						</div>
						<div class="box-body">
						<form action="" method="post">
								<div class="form-grup">
									<label>Password</label>
									<input type="password" name="pass1" placeholder="Password" class="input-control">
								</div>
								<div class="form-grup">
									<label>Ulangi Passwaord</label>
									<input type="password" name="pass2" placeholder="Ulangi Password" class="input-control">
								</div>
								
								
								<button type="submit" name="submit" class="btn">UBAH PASSWORD</button>
							</form>
							
							<?php
							//ketika tombol submit di klik apa yang akan terjadi 
							if(isset($_POST['submit'])){
								$pass1  	= htmlspecialchars(addslashes($_POST["pass1"]));
								$pass2  	= htmlspecialchars(addslashes($_POST["pass2"]));
								
								//variabel waktu saat ini
								$currdate = date('Y-m-d H:i:s');
								
								//jika pass2 tidak sama dengan pass1 maka
								if($pass2 != $pass1){
									echo '<div class ="alert alert-error">Ulangi Password, Tidak Sesuai</div>';
								}else{
									//masih salah dibagian update_atnya
									$update	= mysqli_query($conn,"UPDATE pengguna SET 
									Password ='".MD5($pass1)."',
									updated_at ='".$currdate."'
									WHERE id =".$_SESSION['uid']."
									");		
									if($update){
										echo '<div class ="alert alert-success">Ubah Password berhasil</div>';
									}else{
										echo'Gagal Update'.mysqli_error($conn);
									}
								}		
							}
							?>
						</div>
					</div>
				</div>
			</div>
<?php include 'footer.php'?>