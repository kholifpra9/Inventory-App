<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['staf gudang', 'guru'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        $staff = User::create([
            
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            
        ]);
        $staff->assignRole('staf gudang');

        $guru = User::create([
            
                'name' => 'guru1',
                'email' => 'guru1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            
        ]);
        $guru->assignRole('guru');

        $guru2 = User::create([
            
            'name' => 'guru2',
            'email' => 'guru2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        
        ]);
        $guru2->assignRole('guru');

        $guru3 = User::create([
            
            'name' => 'guru3',
            'email' => 'guru3@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        
        ]);
        $guru3->assignRole('guru');
    }
}
