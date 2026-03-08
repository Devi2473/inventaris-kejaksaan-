<?php
// Konfigurasi koneksi ke database
$host = "localhost";
$user = "root";      // Username default XAMPP
$pass = "";          // Password default XAMPP kosong
$db   = "db_inventaris"; 

// Menjalankan fungsi koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek apakah koneksi berhasil atau tidak
if (!$koneksi) {
    // Jika gagal, akan muncul pesan error
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Jika berhasil, tidak akan muncul pesan apa pun (halaman kosong)
?>

