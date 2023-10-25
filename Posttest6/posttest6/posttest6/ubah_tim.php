<?php
include("koneksi.php");

// Ambil ID tim dari parameter URL (pastikan untuk mengamankan input ini)
$id_tim = (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 0;

// Lakukan query ke database untuk mendapatkan data tim berdasarkan ID (gunakan prepared statement untuk menghindari SQL Injection)
$stmt = $koneksi->prepare("SELECT * FROM teams WHERE id = ?");
$stmt->bind_param("i", $id_tim);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Proses formulir pengubahan data tim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tim = $_POST['nama_tim'];
    $jumlah_pemain = $_POST['jumlah_pemain'];
    $alamat_tim = $_POST['alamat'];

    // Lakukan query update ke database (gunakan prepared statement)
    $update_query = "UPDATE teams SET nama_tim=?, jumlah_pemain=?, alamat_tim=? WHERE id=?";
    $stmt = $koneksi->prepare($update_query);
    $stmt->bind_param("siss", $nama_tim, $jumlah_pemain, $alamat_tim, $id_tim);

    if ($stmt->execute()) {
        header('Location: load_tim.php?success=1'); // Redirect kembali ke halaman daftar tim dengan pesan sukses
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

$koneksi->close();
?>

<!-- Formulir untuk mengubah data tim -->
<form method="POST" action="">
    <label for="nama_tim">Nama Tim:</label>
    <input type="text" id="nama_tim" name="nama_tim" value="<?php echo $row['nama_tim']; ?>" required><br>

    <label for="jumlah_pemain">Jumlah Pemain:</label>
    <input type="number" id="jumlah_pemain" name="jumlah_pemain" value="<?php echo $row['jumlah_pemain']; ?>" required><br>

    <label for="alamat">Alamat:</label>
    <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat_tim']; ?>" required><br>

    <button type="submit">Ubah Data</button>
</form>
