<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo các danh mục chính (không có parent_id)
        for ($i = 1; $i <= 5; $i++) {
            DB::table('category')->insert([
                'name' => 'Category ' . $i,
                'slug' => 'category-' . $i,
                'image' => 'category-' . $i . '.png',
                'description' => 'Mô tả cho category ' . $i,
                'parent_id' => null, // Danh mục chính không có parent_id
                'sort_order' => $i,
                'created_by' => 1,
                'updated_by' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Tạo các danh mục con (có parent_id)
        for ($i = 6; $i <= 10; $i++) {
            DB::table('category')->insert([
                'name' => 'Subcategory ' . $i,
                'slug' => 'subcategory-' . $i,
                'image' => 'subcategory-' . $i . '.png',
                'description' => 'Mô tả cho subcategory ' . $i,
                'parent_id' => rand(1, 5), // Chọn ngẫu nhiên parent_id từ các danh mục chính
                'sort_order' => $i,
                'created_by' => 1,
                'updated_by' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null, // Không bị xóa mềm

            ]);
        }
    }
}
