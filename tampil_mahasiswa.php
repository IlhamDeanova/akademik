<?php
include 'koneksi.php';

$query = "SELECT * FROM mahasiswa";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "NIM: " . $row["nim"]. " - Nama: " . $row["nama"]. "<br>";
  }
} else {
  echo "Tidak ada data mahasiswa.";