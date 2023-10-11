<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
</head>
<body>
    <h1>Hasil Pendaftaran Tim Futsal</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_tim = $_POST["nama_tim"];
        $jumlah_pemain = $_POST["jumlah_pemain"];
        $alamat_tim = $_POST["alamat_tim"];

        echo "<p>Nama Tim: $nama_tim</p>";
        echo "<p>Jumlah Pemain: $jumlah_pemain</p>";
        echo "<p>Alamat Tim: $alamat_tim</p>";
    } else {
        echo "<p>Maaf, ada kesalahan dalam pengiriman data.</p>";
    }
    ?>

    <a href="daftar.html" class="btn">Kembali ke Daftar Tim</a>
</body>
</html>
