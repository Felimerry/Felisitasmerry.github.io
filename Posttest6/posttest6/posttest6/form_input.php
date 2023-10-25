<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaTim = $_POST["nama_tim"];
    $jumlahPemain = $_POST["jumlah_pemain"];
    $alamatTim = $_POST["alamat_tim"];

    $upload_dir = 'upload/';
    $file_name = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $new_file_name = date('Y-m-d') . ' ' . $file_name;

    if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
        $gambar = $new_file_name;

        $sql = "INSERT INTO teams (nama_tim, jumlah_pemain, alamat_tim, gambar) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "siss", $namaTim, $jumlahPemain, $alamatTim, $gambar);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: load_tim.php");
                exit;
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}

$koneksi->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Tim Futsal</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Formulir Pendaftaran Tim Futsal</h1>

    <form id="form-tim" method="post" enctype="multipart/form-data">
        <label for="nama_tim">Nama Tim:</label>
        <input type="text" id="nama_tim" name="nama_tim" required><br>

        <label for="jumlah_pemain">Jumlah Pemain:</label>
        <input type="number" id="jumlah_pemain" name="jumlah_pemain" required><br>

        <label for="alamat_tim">Alamat Tim:</label>
        <textarea id="alamat_tim" name="alamat_tim" required></textarea><br>

        <label for="gambar">upload file:</label>
        <input type="file" name="gambar" accept="image/*" required>

        <button type="submit">Daftar</button>
    </form>

    <div id="hasil-pendaftaran"></div>
    <div id="waktu"></div>


    <script>
        function updateWaktu() {
          const waktuSekarang = new Date();
          const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZoneName: 'short', hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' };
          const waktuString = waktuSekarang.toLocaleDateString('en-US', options);
          document.getElementById('waktu').textContent = waktuString;
        }
      
        // Panggil fungsi ini untuk menampilkan waktu saat halaman dimuat
        updateWaktu();
      
        // Perbarui waktu setiap detik (atau sesuai dengan kebutuhan)
        setInterval(updateWaktu, 1000);
    </script>
</body>
</html>
