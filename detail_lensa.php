<?php include 'header.php'; ?>

<!--content-->
<div class="section">
    <div class="container1">
        <?php
        $lensa = mysqli_query($conn, "SELECT * FROM lensa WHERE id =" . $_GET['id']);
        if (mysqli_num_rows($lensa) == 0) {
            header("location:index.php");
        }
        $p = mysqli_fetch_array($lensa);
        if ($p) {
            echo '<h3 class="text-center line">' . $p['jenis_lensa'] . '</h3>';
            echo '<img src="upload/lensa/' . $p['galeri'] . '" width="100%" class="image" style="margin-top:5px">';
            echo '<h3>HARGA :<br>Rp.' . number_format($p['harga'], 0, ",", ".") . '<br></h3>';
            echo '<h3>STOK :<br>' . $p['stok'] . '<br></h3>';
            echo '<h3>KETERANGAN :<br>' . $p['keterangan'] . '</h3>';
            echo '<h3>Link Wa :<br>';

            $result = $conn->query("SELECT wa FROM setting WHERE id = 0"); // Ganti dengan query yang sesuai
            $row = $result->fetch_assoc();
            $nomor_telepon = $row['wa'];
            // Fungsi untuk membersihkan nomor telepon dari karakter yang tidak diperlukan
            function cleanPhoneNumber($phoneNumber) {
                return preg_replace("/[^0-9]/", "", $phoneNumber);
            }
            $nomor_telepon = cleanPhoneNumber($nomor_telepon);

            echo '<a href="https://wa.me/' . $nomor_telepon . '?text=Halo! Saya tertarik dengan produk Anda.">Pesan Produk</a>';
        } else {
            echo 'Data tidak ditemukan.';
        }
        ?>
    </div>
</div>
<?php include 'footer.php'; ?>
