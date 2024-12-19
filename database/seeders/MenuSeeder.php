<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('menu')->insert([
                'name' => 'Menu Item ' . $i,
                'link' => '/menu-item-' . $i,
                'position' => $i % 2 == 0 ? 'mainmenu' : 'footermenu', // Chia vị trí giữa mainmenu và footermenu
                'table_id' => null, // Có thể để trống
                'type' => $i % 2 == 0 ? 'page' : 'category', // Loại là page hoặc category
                'parent_id' => $i > 5 ? rand(1, 5) : 0, // Nếu i > 5, gán ngẫu nhiên 1-5 làm parent_id
                'sort_order' => $i, // Thứ tự hiển thị
                'created_by' => 1,
                'updated_by' => null, // Chưa cập nhật
                'status' => rand(0, 1), // Trạng thái ngẫu nhiên: 0 - ẩn, 1 - hiện
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null, // Không bị xóa mềm
            ]);
        }
    }
}
