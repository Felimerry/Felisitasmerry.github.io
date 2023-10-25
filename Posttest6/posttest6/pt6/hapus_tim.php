<?php
// Koneksi ke database (gunakan koneksi sesuai dengan konfigurasi Anda)
include 'koneksi.php';

// Ambil ID tim dari parameter URL
$id_tim = $_GET['id'];

// Hapus tim dari database
$sql = "DELETE FROM teams WHERE id = $id_tim";
if (mysqli_query($koneksi, $sql)) {
    header('Location: load_tim.php'); // Redirect kembali ke halaman daftar tim
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
