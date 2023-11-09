<?php
	session_start();
	include 'connection.php';
	$identitas =mysqli_query($conn, "SELECT * FROM setting ORDER BY id DESC LIMIT 1");
	$d = mysqli_fetch_object($identitas );
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Apotek POPO</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">  
		<meta charset ="utf-8">  
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body class="body">
	<!-- page login-->
		<div class="login">
			<!-- box-->
			<div class="box box-login">
				<!-- box header-->
				<div class="box-header text-center" ><h1>
					Login</h1>
				</div>
				<!-- box body-->
				<div class="box-body">
					<?php 
					//jika ada variabel msg maka tammpilkan parameter msg
						if(isset($_GET['msg'])){
							echo "<div class='alert alert-error'>".$_GET['msg']."</div>";
						}
					?>
					<form action="" method="POST">
						<div class="form-grup">
							<label>Username</label>
							<input type="text" name="id" placeholder="username" class="input-control">
						</div>
						<div class="form-grup">
							<label>Password</label>
							<input type="password" name="pass" placeholder="password" class="input-control">
						</div>
						<button type="submit" name="submit" class="btn">LOGIN</button>
					</form>
					<?php
					//ketika tombol submit di klik apa yang akan terjadi 
					if(isset($_POST['submit'])){
						//variabel id dan password
						$id = mysqli_real_escape_string($conn, $_POST['id']);
						$pass = mysqli_real_escape_string($conn,$_POST['pass']);
						
						$cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = '".$id."' ");
						if(mysqli_num_rows($cek)> 0){
							$d = mysqli_fetch_object($cek);	
							if(md5($pass) == $d->password){
								$_SESSION['status_login']= true;
								//user id dan name, lavel yang ada di database dalam tabel pengguna
								$_SESSION['uid']		 = $d->id;
								$_SESSION['unama']		 = $d->nama;
								$_SESSION['ulevel']		 = $d->level;

								// Cek tingkat akses pengguna
								if ($_SESSION['ulevel'] == 'admin') {
									// Jika pengguna adalah admin, arahkan ke halaman admin
									header("Location: admin/index.php");
									exit();
								} elseif ($_SESSION['ulevel'] == 'pemilik'){
									// Jika pengguna adalah pemilik, arahkan ke halaman admin
									header("Location: admin/index.php");
									exit();
								}else{
									// Jika pengguna adalah pelanggan atau tingkat akses lain, arahkan ke halaman utama
									header("Location: pendaftaran.php");
									exit();
								}

							}else{
								echo '<div class="alert alert-error">Password Salah</div>';
							}
						}else{
							echo '<div class="alert alert-error">username tidak di temukan</div>';
						}
					}
					?>
				</div>
	
				<!-- box footer-->
				<div class="box-footer text-center">
					<a href="index.php">Halaman Utama</a>
				</div>
			</div>
		</div>
	</body>
</html>

