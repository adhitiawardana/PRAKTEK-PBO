<?php

declare(strict_types=1);

require_once 'Mahasiswa.php';
require_once 'Produk.php';

$fileCsv = 'data_mahasiswa.csv';
$daftarMahasiswa = [];

// Membaca file CSV
if (file_exists($fileCsv) && ($handle = fopen($fileCsv, 'r')) !== false) {
    // Deteksi tanda pemisah (koma atau titik koma)
    $firstLine = fgets($handle);
    $delimiter = (strpos($firstLine, ';') !== false) ? ';' : ',';
    rewind($handle);

    $rowCounter = 0;
    while (($data = fgetcsv($handle, 1000, $delimiter)) !== false) {
        $rowCounter++;

        // Melewati 4 baris pertama (Judul & Header dari Excel)
        if ($rowCounter <= 4) {
            continue;
        }

        $nim = trim($data[1] ?? '');
        $nama = trim($data[2] ?? '');
        $prodi = trim($data[3] ?? '');

        if (!empty($nim) && !empty($nama)) {
            // Contoh IPK bervariasi untuk menguji fungsi predikat()
            $sampleIpk = [3.85, 3.50, 3.25, 2.90, 3.95, 3.10];
            $ipk = $sampleIpk[count($daftarMahasiswa) % count($sampleIpk)];

            // Membuat Objek Mahasiswa
            $daftarMahasiswa[] = new Mahasiswa($nim, $nama, $prodi, $ipk);
        }
    }
    fclose($handle);
}

// 1. Tampilkan Data Mahasiswa dari Excel/CSV
echo "<h3>Data Mahasiswa PTI A (Total: " . count($daftarMahasiswa) . " Data)</h3>";
foreach ($daftarMahasiswa as $mhs) {
    echo $mhs->info() . "<br>";
}

// 2. Tampilkan Data Produk
$produk1 = new Produk('Laptop', 8500000.0, 5);
echo "<br><h3>Data Produk</h3>";
echo "Nama Produk: {$produk1->nama}<br>";
echo "Harga: Rp " . number_format($produk1->harga, 0, ',', '.') . "<br>";
echo "Stok: {$produk1->stok}<br>";
echo "Total Nilai Stok: Rp " . number_format($produk1->totalNilai(), 0, ',', '.') . "<br>";