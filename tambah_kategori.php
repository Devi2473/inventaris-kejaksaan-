<?php
// tambah_kategori.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori - Kejaksaan Klungkung</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .header { background-color: #006400; color: white; padding: 15px; }
        .form-container { margin-top: 20px; border: 1px solid #ddd; padding: 20px; width: 300px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>TAMBAH KATEGORI BARU</h2>
    </div>

    <div class="form-container">
        <form action="proses_kategori.php" method="POST">
            <label>Nama Kategori:</label><br>
            <input type="text" name="nama_kategori" required style="width: 100%; margin-bottom: 10px;">
            <br>
            <button type="submit" name="simpan" style="background-color: #006400; color: white; border: none; padding: 10px; cursor: pointer;">
                Simpan Kategori
            </button>
            <a href="index.php" style="text-decoration: none; font-size: 13px; margin-left: 10px;">Batal</a>
        </form>
    </div>
</body>
</html>