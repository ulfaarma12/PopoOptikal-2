<?php 
	include"../connection.php";
		if(isset($_GET['idpengguna'])){
		//mysqli_query("DELETE FROM pengguna WHERE id =".$_GET['idpengguna']);
		$delete = mysqli_query($conn,"DELETE FROM pengguna WHERE id =".$_GET['idpengguna']);
		header("location:pengguna.php?pesan=hapus");					
	}
	
	if(isset($_GET['idframe'])){
		$frame = mysqli_query($conn,"SELECT galeri FROM frame WHERE id = ".$_GET['idframe']);
		// jika ada variabel frame 
		if(mysqli_num_rows($frame) > 0){
			$p = mysqli_fetch_object($frame);
			if(file_exists("../upload/frame/".$p->galeri)){
				unlink("../upload/frame/".$p->galeri);
			}
		}
		//mysqli_query("DELETE FROM frame WHERE id =".$_GET['idframe']);
		$delete = mysqli_query($conn,"DELETE FROM frame WHERE id =".$_GET['idframe']);
		header("location:frame.php?pesan=hapus");					
	}
	if(isset($_GET['idlensa'])){
		$lensa = mysqli_query($conn,"SELECT galeri FROM lensa WHERE id = ".$_GET['idlensa']);
		// jika ada variabel lensa 
		if(mysqli_num_rows($lensa) > 0){
			$p = mysqli_fetch_object($lensa);
			if(file_exists("../upload/lensa/".$p->galeri)){
				unlink("../upload/lensa/".$p->galeri);
			}
		}
		//mysqli_query("DELETE FROM lensa WHERE id =".$_GET['idlensa']);
		$delete = mysqli_query($conn,"DELETE FROM lensa WHERE id =".$_GET['idlensa']);
		header("location:lensa.php?pesan=hapus");					
	}
	if(isset($_GET['idinformasi'])){
		$informasi = mysqli_query($conn,"SELECT galeri FROM informasi WHERE id = ".$_GET['idinformasi']);
		// jika ada variabel lensa 
		if(mysqli_num_rows($informasi) > 0){
			$p = mysqli_fetch_object($informasi);
			if(file_exists("../upload/informasi/".$p->galeri)){
				unlink("../upload/informasi/".$p->galeri);
			}
		}
		//mysqli_query("DELETE FROM informasi WHERE id =".$_GET['idinformasi']);
		$delete = mysqli_query($conn,"DELETE FROM informasi WHERE id =".$_GET['idinformasi']);
		header("location:informasi.php?pesan=hapus");					
	}
?>

