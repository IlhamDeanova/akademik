<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
  $id_mahasiswa = $_POST['id_mahasiswa'];
  $id_mata_kuliah = $_POST['id_mata_kuliah'];
  $nilai = $_POST['nilai'];

  $query = "INSERT INTO nilai (id_mahasiswa, id_mata_kuliah, nilai) VALUES ('$id_mahasiswa', '$id_mata_kuliah', '$nilai')";
  $result = $conn->query($query);

  if ($result) {
    echo "Data nilai berhasil disimpan!";
  } else {
    echo "Error: " . $conn->error;
  }
}

$query_mahasiswa = "SELECT * FROM mahasiswa";
$result_mahasiswa = $conn->query($query_mahasiswa);

$query_mata_kuliah = "SELECT * FROM mata_kuliah";
$result_mata_kuliah = $conn->query($query_mata_kuliah);

?>

<form action="" method="post">
  <label>Mahasiswa:</label>
  <select name="id_mahasiswa">
    <?php while($row_mahasiswa = $result_mahasiswa->fetch_assoc()) { ?>
      <option value="<?php echo $row_mahasiswa['id_mahasiswa']; ?>"><?php echo $row_mahasiswa['nama']; ?></option>
    <?php } ?>
  </select><br><br>
  <label>Mata Kuliah:</label>
  <select name="id_mata_kuliah">
    <?php while($row_mata_kuliah = $result_mata_kuliah->fetch_assoc()) { ?>
      <option value="<?php echo $row_mata_kuliah['id_mata_kuliah']; ?>"><?php echo $row_mata_kuliah['nama_mata_kuliah']; ?></option>
    <?php } ?>
  </select><br><br>
  <label>Nilai:</label>
  <input type="text" name="nilai"><br><br>
  <input type="submit" name="submit" value="Simpan">
</form>