<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('brand')->insert([
                'name' => 'Brand ' . $i,
                'slug' => 'brand-' . $i,
                'image' => 'brand-' . $i . '.png', // Tên file ảnh mẫu
                'description' => 'Mô tả cho thương hiệu ' . $i,
                'sort_order' => $i,
                'created_by' => 1,
                'updated_by' => null, // Nullable
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null, // Không bị xóa mềm

            ]);
        }
    }
}
