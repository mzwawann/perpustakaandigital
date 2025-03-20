<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat roles jika belum ada
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'petugas']);
        Role::firstOrCreate(['name' => 'user']);

        // Assign role ke user tertentu
        $admin = User::where('email', 'admin@example.com')->first();
        if ($admin) {
            $admin->assignRole('admin');
        }

        $petugas = User::where('email', 'petugas@example.com')->first();
        if ($petugas) {
            $petugas->assignRole('petugas');
        }

        $user = User::where('email', 'user@example.com')->first();
        if ($user) {
            $user->assignRole('user');
        }
    }
}
