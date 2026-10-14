<?php

declare(strict_types=1);

class Produk
{
    public string $nama;
    public float $harga;
    public int $stok;

    public function __construct(string $nama, float $harga, int $stok)
    {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function totalNilai(): float
    {
        return $this->harga * $this->stok;
    }
}