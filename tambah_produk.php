<?php
// tambah_produk.php 
include 'koneksi.php';

// Query untuk mengambil data kategori secara dinamis
$query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang Baru - Kejaksaan Klungkung</title>
    <style>
        /* Pengaturan Dasar Modern */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            padding: 0; 
            background-color: #f0f2f5; /* Abu-abu sangat muda */
            color: #333;
        }

        /* Header Khas Kejaksaan (Sesuai Halaman Utama) */
        .main-header { 
            background-color: #006400; /* Hijau Tua Kejaksaan */
            color: white; 
            padding: 20px 40px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .main-header h1 { margin: 0; font-size: 24px; }
        .main-header p { margin: 5px 0 0; opacity: 0.8; font-size: 14px; }

        /* Container Utama */
        .container { padding: 30px 40px; }

        /* Navigasi Baris Atas (Pojok Kanan) */
        .nav-bar {
            display: flex;
            justify-content: flex-end; /* Memojokkan tombol ke kanan */
            margin-bottom: 25px;
        }
        .btn-lihat {
            text-decoration: none; 
            color: #006400; 
            font-weight: bold; 
            border: 2px solid #006400; 
            padding: 8px 18px; 
            border-radius: 5px;
            transition: all 0.3s ease;
            background-color: white;
        }
        .btn-lihat:hover {
            background-color: #006400;
            color: white;
        }

        /* Card Form */
        .card-form {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06); /* Shadow halus */
            max-width: 650px;
            margin: 0 auto; /* Tengah secara horizontal */
        }
        .card-form h2 { 
            margin-top: 0; 
            color: #006400; 
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 25px;
            font-size: 22px;
        }

        /* Styling Form Group */
        .form-group { margin-bottom: 20px; }
        label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: 600; 
            color: #555; 
            font-size: 15px;
        }
        
        /* Input, Select */
        input[type="text"],
        input[type="number"],
        select {
            width: 100%; 
            padding: 12px 15px; 
            border: 1px solid #ddd; 
            border-radius: 8px;
            box-sizing: border-box; /*agar padding tidak merusak lebar */
            font-size: 15px;
            transition: all 0.2s;
            background-color: #fbfbfb;
        }
        
        /* Efek Focus */
        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #006400;
            outline: none;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(0,100,0,0.1);
        }

        /* Group untuk input yang berdampingan ( Merk & Jumlah) */
        .form-row {
            display: flex;
            gap: 20px;
        }
        .form-row .form-group { flex: 1; }

        /* Tombol Simpan M */
        .btn-submit {
            background-color: #006400; 
            color: white;
            border: none;
            padding: 14px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(0,100,0,0.2);
        }
        .btn-submit:hover { 
            background-color: #004d00; /* Hijau lebih gelap */
            box-shadow: 0 6px 10px rgba(0,100,0,0.3);
        }
        .btn-submit:active {
            transform: translateY(1px);
        }
    </style>
</head>
<body>

<div class="main-header">
    <h1 style="text-align: center;">SISTEM INFORMASI INVENTARIS</h1>
    <p style="text-align: center;">Kantor Kejaksaan Negeri Klungkung</p>
</div>

<div class="container">
    <div class="nav-bar">
        <a href="data_produk.php" class="btn-lihat">Lihat Semua Data Produk</a>
    </div>

    <div class="card-form">
        <h2 style="text-align: center;">Input Barang Inventaris Baru</h2>
        
        <form action="proses_produk.php" method="POST">
            
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" placeholder="Misal: Printer Laser, Laptop Baris" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="merk">Merk</label>
                    <input type="text" id="merk" name="merk" placeholder="Misal: Epson, Lenovo">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" placeholder="0" min="1" required>
                </div>
            </div>

            <div class="form-group">
                <label for="kondisi">Kondisi Barang</label>
                <select id="kondisi" name="kondisi">
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="id_kategori" required>
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    
                    <?php 
                    while($row = mysqli_fetch_assoc($query_kategori)) {
                        echo '<option value="' . $row['id_kategori'] . '">' . $row['nama_kategori'] . '</option>';
                    }
                    ?>
                    </select>
            </div>

            <button type="submit" name="simpan" class="btn-submit">Simpan Barang Baru</button>
        </form>
    </div>
</div>

</body>
</html>