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
