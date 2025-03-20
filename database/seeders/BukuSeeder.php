<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'judul_buku' => 'Laravel for Beginners',
            'penulis' => 'John Doe',
            'penerbit' => 'TechPress',
            'description' => 'Buku tentang Laravel untuk pemula',
            'code_buku' => 'LARV123',
            'tahun_terbit' => 2023,
            'jumlah' => 10
        ]);
    }
}
