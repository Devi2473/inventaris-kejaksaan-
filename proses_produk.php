<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama    = $_POST['nama_barang'];
    $merk    = $_POST['merk'];
    $jumlah  = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $id_kat  = $_POST['id_kategori'];

    // Query untuk menyimpan data produk
    $sql = "INSERT INTO produk (nama_barang, merk, jumlah, kondisi, id_kategori) 
            VALUES ('$nama', '$merk', '$jumlah', '$kondisi', '$id_kat')";
    
    $simpan = mysqli_query($koneksi, $sql);

    if ($simpan) {
        header("location:data_produk.php");
    } else {
        echo "Gagal menyimpan data barang.";
    }
}
?>