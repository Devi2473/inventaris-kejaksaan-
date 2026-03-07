<?php
// proses_kategori.php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_kategori = $_POST['nama_kategori'];

    // Query untuk menyimpan data ke tabel kategori
    $sql = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        // Jika berhasil, kembali ke halaman utama
        header("Location: index.php");
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal menyimpan kategori: " . mysqli_error($koneksi);
    }
}
?>