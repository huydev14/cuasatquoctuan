<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $imagePaths = [
            'assets/img/project-1.jpg',
            'assets/img/project-2.jpg',
            'assets/img/project-3.jpg',
        ];

        $projectTemplates = [
            [
                'category_slug' => 'cua-cong-sat',
                'title' => 'Cửa cổng sắt biệt thự hiện đại',
                'description' => 'Mẫu cổng sắt dày, sơn tĩnh điện, phù hợp nhà phố và biệt thự hiện đại.',
            ],
            [
                'category_slug' => 'cua-cong-sat',
                'title' => 'Cửa sắt mặt tiền nhà phố',
                'description' => 'Thiết kế an toàn, thông thoáng, tối ưu thẩm mỹ cho mặt tiền nhà phố.',
            ],
            [
                'category_slug' => 'lan-can-cau-thang',
                'title' => 'Lan can cầu thang sắt mỹ thuật',
                'description' => 'Lan can cầu thang kết hợp hoa văn đơn giản, tinh gọn và bền bỉ.',
            ],
            [
                'category_slug' => 'lan-can-cau-thang',
                'title' => 'Lan can ban công tối giản',
                'description' => 'Mẫu ban công tối giản, kết hợp màu sơn đen nhám sang trọng.',
            ],
            [
                'category_slug' => 'mai-ton-khung-bao-ve',
                'title' => 'Mái che sân trước nhà',
                'description' => 'Thi công mái che chống nắng mưa, kết cấu chắc chắn và bền lâu.',
            ],
            [
                'category_slug' => 'sat-my-thuat-cnc',
                'title' => 'Cửa sắt CNC hoa văn hiện đại',
                'description' => 'Mẫu cửa CNC nổi bật với họa tiết sắc nét và tính thẩm mỹ cao.',
            ],
        ];

        foreach ($projectTemplates as $template) {
            $category = Category::where('slug', $template['category_slug'])->first();

            if (! $category) {
                continue;
            }

            $title = $template['title'];
            Project::updateOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'category_id' => $category->id,
                    'title' => $title,
                    'description' => $template['description'],
                    'image_path' => $imagePaths[array_rand($imagePaths)],
                    'status' => true,
                ]
            );
        }
    }
}

