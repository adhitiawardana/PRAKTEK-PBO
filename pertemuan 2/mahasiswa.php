<?php

declare(strict_types=1);

class Mahasiswa
{
    public string $nim;
    public string $nama;
    public string $prodi;
    public float $ipk;

    public function __construct(string $nim, string $nama, string $prodi, float $ipk)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->ipk = $ipk;
    }

    public function predikat(): string
    {
        if ($this->ipk >= 3.75) {
            return 'Cumlaude';
        } elseif ($this->ipk >= 3.00) {
            return 'Sangat Memuaskan';
        }

        return 'Memuaskan';
    }

    public function info(): string
    {
        return "NIM: {$this->nim} | Nama: {$this->nama} | Prodi: {$this->prodi} | IPK: {$this->ipk} | Predikat: {$this->predikat()}";
    }
}