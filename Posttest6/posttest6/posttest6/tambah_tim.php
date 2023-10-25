<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaTim = $_POST["nama_tim"];
    $jumlahPemain = $_POST["jumlah_pemain"];
    $alamatTim = $_POST["alamat_tim"];

    $sql = "INSERT INTO teams (nama_tim, jumlah_pemain, alamat_tim) VALUES ('$namaTim', '$jumlahPemain', '$alamatTim')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Tim berhasil didaftarkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>
