<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <?php
    include 'connection.php';
    date_default_timezone_set("Asia/Jakarta");
    $identitas = mysqli_query($conn, "SELECT * FROM setting ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);
    ?>
    <link rel="icon" href="upload/identitas/<?= $d->favicon ?>">
    <title>Website <?= $d->nama ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- box menu mobile -->
    <div class="box-menu-mobile" id="mobileMenu">
        <span onClick="hideMobileMenu()">Close</span><br><br>
        <ul class="text-center" id="mobileMenu">
            <li><a href="index.php">BERANDA</a></li>
            <li><a href="tentang_sekolah.php">TENTANG TOKO</a></li>
            <li><a href="frame.php">FRAME</a></li>
            <li><a href="lensa.php">LENSA</a></li>
            <li><a href="informasi.php">INFORMASI</a></li>
            <li><a href="kontak.php">KONTAK</a></li>
        </ul>
    </div>
    <div class="header">
        <!-- container-->
        <div class="container1">
            <div class="header-logo">
                <img src="upload/identitas/<?= $d->logo ?>" width="70">
                <h2><a href="index.php"><?= $d->nama ?></a></h2>
            </div>
            <ul class="header-menu">
                <li><a href="index.php">BERANDA</a></li>
                <li><a href="tentang_optik.php">TENTANG OPTIK</a></li>
                <li><a href="frame.php">FRAME</a></li>
                <li><a href="lensa.php">LENSA</a></li>
                <li><a href="informasi.php">INFORMASI</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
            </ul>
        </div>
        <div class="mobile-menu-btn text-center">
            <a href="#" onClick="showMobileMenu()">MENU</a>
        </div>
    </div>