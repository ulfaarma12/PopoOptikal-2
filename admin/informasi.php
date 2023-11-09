<?php include 'header.php'?>			
			<!--content-->
			<div class="content">
				<div class="container1">
					<div class="box">
						<div class="box-header">
							INFORMASI
						</div>
						<div class="box-body">
						<a href="tambah_informasi.php"><i class="fa fa-plus">Tambah</i></a>
						<?php
						if(isset($_GET['success']))
							echo '<div class ="alert alert-success">Edit Data Berhasil</div>';
						?>
						<form action="">
							<div class="input-grup">
								<input type="text" name="key" placeholder="Pencarian">
								<button type="submit"><i class="fa fa-magnifying-glass"></i></button>
							</div>
						</form>
							<table class="table">
								<!--untuk membungkus konten bagian judul atau kepala tabel-->
								<thead>
									<!--(tabel row)-->
									<tr>
										<th>No</th>
										<th>Judul</th>
										<th>Keterangan</th>
										<th>Galeri</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$no =1;
								
									$where = "WHERE 1=1 ";
									if(isset($_GET['key'])){
										//dan dari nama yang di cari
										$where.="AND judul LIKE '%".addslashes($_GET['key'])."%' ";
									}
									//cari dari tabel informasi variabel where
									$informasi = mysqli_query($conn, "SELECT * FROM informasi $where ORDER BY id DESC");
									if(mysqli_num_rows($informasi)>0){	
									// looping data 
									while ($p = mysqli_fetch_array($informasi)){	
									
								?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $p['judul']?></td>
									<td><?= $p['keterangan']?></td>
									<td><img src="../upload/informasi/<?= $p['galeri']?>" width="100px"></td>
									<td>
										<a href="edit_informasi.php?id=<?= $p['id'] ?>" title="Edit Data"><i class="fa fa-edit"></i></a>
										<a href="hapus.php?idinformasi=<?= $p['id'] ?>" title="Hapus Data" onclick="return confirm('yakin ingin dihapus?')"><i class="fa fa-times"></i></a>
									</td>
								</tr>
									<?php }}else{ ?>
									<td colspan="5">Data Tidak Ada</td>	
							<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
<?php include 'footer.php'?>

