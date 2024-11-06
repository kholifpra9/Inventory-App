<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            [
                'nama_kategori' => 'Alat Tulis'
            ],
            [
                'nama_kategori' => 'Furnitur'
            ],
            [
                'nama_kategori' => 'Perlengkapan Mengajar'
            ],
            [
                'nama_kategori' => 'Perlengkapan Cetak'
            ],
            [
                'nama_kategori' => 'Elektronik'
            ],
            [
                'nama_kategori' => 'Literatur'
            ],
        ]);
    }
}
