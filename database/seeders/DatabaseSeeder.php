<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProjectSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'Admin Quốc Tuấn',
            'password' => Hash::make('123'),
            'email_verified_at' => now(),
        ]);
        User::firstOrCreate([
            'email' => 'trgiahuy14@gmail.com',
        ], [
            'name' => 'Admin Gia Huy',
            'password' => Hash::make('123'),
            'email_verified_at' => now(),
        ]);

        $this->call([
            CategorySeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
