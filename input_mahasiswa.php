<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $jurusan = $_POST['jurusan'];
  $semester = $_POST['semester'];

  $query = "INSERT INTO mahasiswa (nim, nama, jurusan, semester) VALUES ('$nim', '$nama', '$jurusan', '$semester')";
  $result = $conn->query($query);

  if ($result) {
    if (isset($_SESSION['hasil'])) {
      $_SESSION['hasil'][] = array("NIM" => $nim, "Nama" => $nama, "Jurusan" => $jurusan, "Semester" => $semester);
    } else {
      $_SESSION['hasil'] = array(array("NIM" => $nim, "Nama" => $nama, "Jurusan" => $jurusan, "Semester" => $semester));
    }
  } else {
    echo "Error: " . $conn->error;
  }
}
?>

<form action="" method="post">
  <label>NIM:</label>
  <input type="text" name="nim"><br><br>
  <label>Nama:</label>
  <input type="text" name="nama"><br><br>
  <label>Jurusan:</label>
  <input type="text" name="jurusan"><br><br>
  <label>Semester:</label>
  <input type="text" name="semester"><br><br>
  <input type="submit" name="submit" value="Simpan">
</form>

<?php if (isset($_SESSION['hasil'])) { ?>
  <br><br>
  <h3>Hasil Input:</h3>
  <table border="1">
    <tr>
      <th>NIM</th>
      <th>Nama</th>
      <th>Jurusan</th>
      <th>Semester</th>
    </tr>
    <?php foreach ($_SESSION['hasil'] as $row) { ?>
      <tr>
        <td><?php echo $row['NIM']; ?></td>
        <td><?php echo $row['Nama']; ?></td>
        <td><?php echo $row['Jurusan']; ?></td>
        <td><?php echo $row['Semester']; ?></td>
      </tr>
    <?php } ?>
  </table>
<?php } ?>