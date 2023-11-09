<?php
	session_start();
	include '../connection.php';
	
	if(!isset($_SESSION['status_login'])){
		header("location:../login.php?msg=Harap Login Terlebih Dahulu!");
	}
	date_default_timezone_set("Asia/Jakarta");
	$identitas =mysqli_query($conn, "SELECT * FROM setting ORDER BY id DESC LIMIT 1");
	$d = mysqli_fetch_object($identitas );
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="icon href=" href="../upload/identitas/<?= $d->favicon?>">
		<title>panel Admin - <?= $d->nama?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">  
		<meta charset ="utf-8">  
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<!--menampilkan tanda panah di class dropdown nama class="fa fa-caret-down"-->
		<!--href pengaturan icon-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
		integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
		crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!--pengaturan tint editor untuk keterangan-->
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>
			tinymce.init({
				selector: '#keterangan'
			});
		</script>
	</head>
		<body class="bg-light">
			<!-- navbar-->
			<div class="navbar">
				<!-- container-->
				<div class="container">
					<!-- navbar brand-->
					<nav>
						<h2 class="nav-brand float-left"><a href="index.php"><?= $d->nama?></a></h2>
							<!--navbar menu-->
							<ul class="nav-menu float-left">
								<li><a href="index.php">DASHBOARD</a></li>
								<?php if($_SESSION['ulevel'] == 'pemilik'){?>
								<li><a href="pengguna.php">PENGGUNA</a></li>
								<?php }elseif($_SESSION['ulevel'] == 'admin'){?>
									<li><a href="frame.php">FRAME</a></li>
									<li><a href="lensa.php">LENSA</a></li>
									<li><a href="informasi.php">INFORMASI</a></li>
									<li>
									<a href="#">PENGATURAN<i class="fa fa-caret-down"></i></a>
									<!--sub menu-->
									<ul class="dropdown">
										<li><a href="identitas.php">IDENTITAS OPTIK</a></li>
										<li><a href="kontak.php">KONTAK</a></li>
									</ul>
								</li>
								<?php }?>
								<li>
									<a href="#"><?= $_SESSION['unama']?>(<?= $_SESSION['ulevel']?>)<i class="fa fa-caret-down"></i></a>
									<!--sub menu-->
									<ul class="dropdown">
										<li><a href="ubah_password.php">UBAH PASSWORD</a></li>
										<li><a href="logout.php">KELUAR</a></li>
									</ul>
									
								</li>	
							</ul>
						</nav>
				</div>
			</div>	
		</body>