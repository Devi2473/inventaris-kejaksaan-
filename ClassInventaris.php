<?php
/**
 * Program: Implementasi OOP Sistem Inventaris
 * Deskripsi: Bukti penerapan Interface, Inheritance, Polymorphism, dan Access Modifiers.
 */

//INTERFACE (Kontrak kerja)
interface OperasiDatabase {
    public function simpanData();
}

//PARENT CLASS (Mempunyai Properties & Access Modifiers)
class Barang {
    public $namaBarang;        // Bisa diakses siapa saja
    protected $stokBarang;     // Hanya bisa diakses kelas ini dan turunannya
    private $kodeRahasia;      // Hanya bisa diakses kelas ini saja (Encapsulation)

    public function __construct($nama, $stok) {
        $this->namaBarang = $nama;
        $this->stokBarang = $stok;
        $this->kodeRahasia = "KEJAKSAAN-2026";
    }

    //POLYMORPHISM (Metode yang akan di-override)
    public function tampilkanDetail() {
        return "Barang: " . $this->namaBarang;
    }
}

//INHERITANCE (Pewarisan sifat dari class Barang)
class BarangMasuk extends Barang implements OperasiDatabase {
    
    //OVERRIDING (Implementasi Polymorphism)
    public function tampilkanDetail() {
        return "Log Barang Masuk: " . $this->namaBarang . " | Jumlah: " . $this->stokBarang;
    }

    //IMPLEMENTASI INTERFACE
    public function simpanData() {
        return "Data " . $this->namaBarang . " berhasil disimpan ke sistem.";
    }

    //OVERLOADING (Simulasi sederhana dengan method dinamis)
    public function __call($name, $arguments) {
        return "Menjalankan perintah '$name' secara dinamis.";
    }
}
?>