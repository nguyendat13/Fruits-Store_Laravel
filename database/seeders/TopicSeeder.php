<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('topic')->insert([
                'name' => 'Chủ đề ' . $i,
                'slug' => 'chu-de-' . $i,
                'sort_order' => $i, // Thứ tự tăng dần
                'description' => 'Mô tả ngắn cho chủ đề ' . $i,
                'created_by' => 1,
                'updated_by' => null, // Chưa được cập nhật
                'status' => rand(0, 1), // Random trạng thái: 0 - ẩn, 1 - hiện
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null, // Không bị xóa mềm
            ]);
        }
    }
}
