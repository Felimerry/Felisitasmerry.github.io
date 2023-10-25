<?php
include("koneksi.php");

$sql = "SELECT * FROM teams";
$result = mysqli_query($koneksi, $sql);

echo "<table>
    <tr>
        <th>ID</th>
        <th>Nama Tim</th>
        <th>Jumlah Pemain</th>
        <th>Alamat Tim</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama_tim"] . "</td>";
        echo "<td>" . $row["jumlah_pemain"] . "</td>";
        echo "<td>" . $row["alamat_tim"] . "</td>";
        echo "<td><img src='upload/" . $row["gambar"] . "' width='100'></td>";
        echo "<td>
            <a href='hapus_tim.php?id=" . $row["id"] . "'>Hapus</a> 
            <a href='ubah_tim.php?id=" . $row["id"] . "'>Ubah</a>
        </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data tim futsal.";
}

$koneksi->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tampil</title>

    <style>
        table {
    border-collapse: collapse;
    width: 100%;
}

table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:nth-child(odd) {
    background-color: #ffffff;
}

img {
    max-width: 100px;
    height: auto;
    display: block;
    margin: 0 auto;
}

    </style>
</head>
<body>
    
</body>
</html>