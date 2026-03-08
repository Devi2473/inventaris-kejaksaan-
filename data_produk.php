<?php
include 'koneksi.php';
// mengambil semua data produk dan menggabungkan dengan nama kategori
$query = mysqli_query($koneksi, "SELECT produk.*, kategori.nama_kategori 
                                 FROM produk 
                                 JOIN kategori ON produk.id_kategori = kategori.id_kategori");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Semua Data Produk - Kejaksaan Klungkung</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .header { background-color: #006400; color: white; padding: 15px; text-align: center }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2>DAFTAR SEMUA PRODUK INVENTARIS</h2>
    </div>
    
    <br>
    <a href="index.php" style= "text-decoration: none; color: green; font-weight: bold; border: 1px solid green; padding: 5px 10px; border-radius: 5px;"> << Kembali ke Kategori</a> | 
    <a href="tambah_produk.php" style= "text-decoration: none; color: green; font-weight: bold; border: 1px solid green; padding: 5px 10px; border-radius: 5px;">+ Tambah Barang Baru</a>

    <table>
        <tr style="background-color: #f2f2f2;">
            <th>No</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <th>Kategori</th>
        </tr>
        <?php 
        $no = 1;
        while($row = mysqli_fetch_assoc($query)) : 
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['merk']; ?></td>
            <td><?php echo $row['jumlah']; ?></td>
            <td><?php echo $row['kondisi']; ?></td>
            <td><?php echo $row['nama_kategori']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>