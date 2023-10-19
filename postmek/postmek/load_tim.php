<?php
include("koneksi.php");

$sql = "SELECT * FROM teams";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Data Tim Futsal</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nama Tim</th><th>Jumlah Pemain</th><th>Alamat Tim</th><th>Aksi</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["nama_tim"]."</td><td>".$row["jumlah_pemain"]."</td><td>".$row["alamat_tim"]."</td>";
        echo "<td><a href='hapus_tim.php?id=".$row["id"]."'>Hapus</a> <a href='ubah_tim.php?id=".$row["id"]."'>Ubah</a></td></tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data tim futsal.";
}

$koneksi->close();
?>
