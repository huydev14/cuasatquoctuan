<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cửa Cổng Sắt',
                'description' => 'Thi công cửa cổng sắt, cửa mặt tiền và cửa bảo vệ cho nhà ở, cửa hàng.',
            ],
            [
                'name' => 'Lan Can - Cầu Thang',
                'description' => 'Gia công lan can ban công, lan can cầu thang theo yêu cầu.',
            ],
            [
                'name' => 'Mái Tôn - Khung Bảo Vệ',
                'description' => 'Thi công mái che, mái tôn, khung bảo vệ và kết cấu phụ trợ.',
            ],
            [
                'name' => 'Sắt Mỹ Thuật CNC',
                'description' => 'Các mẫu sắt mỹ thuật, hoa văn CNC và chi tiết trang trí cao cấp.',
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::updateOrCreate(
                ['slug' => Str::slug($categoryData['name'])],
                [
                    'name' => $categoryData['name'],
                    'description' => $categoryData['description'],
                ]
            );
        }
    }
}
