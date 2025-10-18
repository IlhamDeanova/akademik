<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
  $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
  $nama_mata_kuliah = $_POST['nama_mata_kuliah'];
  $sks = $_POST['sks'];

  $query = "INSERT INTO mata_kuliah (kode_mata_kuliah, nama_mata_kuliah, sks) VALUES ('$kode_mata_kuliah', '$nama_mata_kuliah', '$sks')";
  $result = $conn->query($query);

  if ($result) {
    echo "Data mata kuliah berhasil disimpan!";
  } else {
    echo "Error: " . $conn->error;
  }
}

?>

<form action="" method="post">
  <label>Kode Mata Kuliah:</label>
  <input type="text" name="kode_mata_kuliah"><br><br>
  <label>Nama Mata Kuliah:</label>
  <input type="text" name="nama_mata_kuliah"><br><br>
  <label>SKS:</label>
  <input type="text" name="sks"><br><br>
  <input type="submit" name="submit" value="Simpan">
</form>