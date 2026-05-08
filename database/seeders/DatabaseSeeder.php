<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Quốc Tuấn',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'email_verified_at' => now(),
        ]);

        $categories = [
            ['name' => 'Cửa Cổng Sắt', 'slug' => 'cua-cong-sat'],
            ['name' => 'Lan Can - Cầu Thang', 'slug' => 'lan-can-cau-thang'],
            ['name' => 'Mái Tôn - Khung Bảo Vệ', 'slug' => 'mai-ton-khung-bao-ve'],
            ['name' => 'Sắt Mỹ Thuật CNC', 'slug' => 'sat-my-thuat-cnc'],
        ];

        foreach ($categories as $cat) {
            $category = Category::create($cat);

            for ($i = 1; $i <= 2; $i++) {
                $title = $cat['name'] . ' mẫu số ' . $i;
                Project::create([
                    'category_id' => $category->id,
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'description' => 'Công trình thi công thực tế tại TP.HCM. Chất liệu sắt dày, sơn tĩnh điện chống rỉ sét.',
                    'image_path' => 'projects/demo.jpg',
                    'status' => true,
                ]);
            }
        }
    }
}
