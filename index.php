<?php
session_start();
if($_SESSION['status'] != "login"){
    header("location:login.php?pesan=belum_login");
}
/**
 * Program: Sistem Informasi Inventaris Kantor Kejaksaan Klungkung
 * Deskripsi: Aplikasi manajemen kategori dan produk 
 * Fitur: CRUD, Array, Function, Database Integration
 */
include 'koneksi.php';

// Fungsi untuk mengambil data 
function ambilKategori($koneksi) {
    $query = mysqli_query($koneksi, "SELECT * FROM kategori");
    $hasil = []; // Menggunakan Array 
    while ($row = mysqli_fetch_assoc($query)) {
        $hasil[] = $row;
    }
    return $hasil;
}

$daftar_kategori = ambilKategori($koneksi);
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Inventaris Kejaksaan Klungkung</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #999; padding: 10px; text-align: center; }
        th { background-color: #f2f2f2; }
        .header { background-color: #006400; color: white; text-align: center ;padding: 10px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>SISTEM INFORMASI INVENTARIS</h1>
        <h3>Kantor Kejaksaan Negeri Klungkung</h3>
    </div>
    <div>

    <h2 style="text-align: center; margin-top: 30px; color: #333;">
        DAFTAR KATEGORI INVENTARIS
    </h2>
    </div>

   <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
    <a href="tambah_kategori.php" style="text-decoration: none; color: green; font-weight: bold; border: 1px solid green; padding: 5px 10px; border-radius: 5px;">+ Tambah Kategori Baru</a>

    <a href="data_produk.php" style="text-decoration: none; color: green; font-weight: bold; border: 1px solid green; padding: 5px 10px; border-radius: 5px;">
        Lihat Semua Data Produk
    </a>
    </div>
    <div>
    <a href="logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?')" style="background-color: #dc3545; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">Keluar (Logout)</a>
    </div>

    <br><br>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
        </tr>
        <?php 
        $no = 1;
        // Perulangan (Memenuhi poin 'd' soal)
        foreach ($daftar_kategori as $data) : 
        ?>
        <tr>
            <td><?php echo $no++; ?></td>

             <td>
                <a href="detail_kategori.php?id=<?php echo $data['id_kategori']; ?>" style="text-decoration: none; color: black;">
                    <?php echo $data['nama_kategori']; ?>
                </a>
             </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>