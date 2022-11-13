<?php
//koneksi ke DB dan pilih DB
$conn = mysqli_connect('localhost', 'root', '', 'tubes_19040164');

//Query isi tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

//ubah data dalam array
// $row = mysqli_fetch_row($result); //array numerik
// $row = mysqli_fetch_assoc($result); //array assosiatif
// $row = mysqli_fetch_array($result);// keduanya

$rows = []; //tampung ke array kosong
while ($row = mysqli_fetch_assoc($result)) { // arti while selama masih ada data lakukan looping
  $rows[] = $row;
}

//tampung ke variabel mahasiswa
$mahasiswa = $rows;



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1;
    foreach ($mahasiswa as $m) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $m['gambar']; ?>" width="200"></td>
        <td><?= $m['nim']; ?></td>
        <td><?= $m['nama']; ?></td>
        <td><?= $m['email']; ?></td>
        <td><?= $m['jurusan']; ?></td>
        <td>
          <a href="">Ubah</a> | <a href="">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>

</body>

</html>