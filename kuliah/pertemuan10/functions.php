<?php

function koneksi()
{
  //koneksi ke DB dan pilih DB
  return mysqli_connect('localhost', 'root', '', 'tubes_19040164');
}

function query($query)
{
  $conn = koneksi();

  //Query isi tabel mahasiswa
  $result = mysqli_query($conn, $query);

  //jika hasilny hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = []; //tampung ke array kosong
  while ($row = mysqli_fetch_assoc($result)) { // arti while selama masih ada data lakukan looping
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nim = htmlspecialchars($data['nim']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO 
              mahasiswa
              VALUES (null,'$nama','$nim', '$email', '$jurusan', '$gambar' )";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
