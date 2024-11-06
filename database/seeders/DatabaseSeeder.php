<?php

namespace Database\Seeders;

use App\Models\LaporanBarang;
use App\Models\PermintaanBarang;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
            BarangSeeder::class,
            LaporanBarangSeeder::class,
            PermintaanBarangSeeder::class,
        ]);
    }
}
