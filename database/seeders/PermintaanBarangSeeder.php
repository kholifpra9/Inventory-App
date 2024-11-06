<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermintaanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permintaan_barangs')->insert([
            [
                'barang_id' => '1',
                'jml_barang_permintaan' => '2',
                'Keterangan' => 'habis',
                'status' => 'belum diterima',
                'user_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'barang_id' => '1',
                'jml_barang_permintaan' => '2',
                'Keterangan' => 'habis',
                'status' => 'belum diterima',
                'user_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'barang_id' => '1',
                'jml_barang_permintaan' => '2',
                'Keterangan' => 'habis',
                'status' => 'belum diterima',
                'user_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
