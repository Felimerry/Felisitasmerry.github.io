<?php
include("koneksi.php");

// Ambil ID tim dari parameter URL
$id_tim = $_GET['id'];

// Lakukan query ke database untuk mendapatkan data tim berdasarkan ID
$sql = "SELECT * FROM teams WHERE id = $id_tim";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();

// Proses formulir pengubahan data tim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tim = $_POST['nama_tim'];
    $jumlah_pemain = $_POST['jumlah_pemain'];
    $alamat = $_POST['alamat'];

    // Lakukan query update ke database
    $update_query = "UPDATE teams SET nama_tim='$nama_tim', jumlah_pemain='$jumlah_pemain', alamat_tim='$alamat' WHERE id=$id_tim";

    if ($koneksi->query($update_query) === TRUE) {
        header('Location: load_tim.php'); // Redirect kembali ke halaman daftar tim
        exit();
    } else {
        echo "Error updating record: " . $koneksi->error;
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
