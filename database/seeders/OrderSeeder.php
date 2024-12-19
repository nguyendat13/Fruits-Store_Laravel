<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('order')->insert([
                'user_id' => rand(1, 10), // Gán ngẫu nhiên user_id từ 1 đến 10
                'name' => 'Customer ' . $i,
                'phone' => '012345678' . $i, // Số điện thoại giả
                'email' => 'customer' . $i . '@example.com',
                'address' => 'Địa chỉ số ' . $i,
                'created_by' => 1,
                'updated_by' => null, // Chưa có cập nhật
                'status' => rand(0, 1), // Random trạng thái: 0 - chưa xử lý, 1 - đã xử lý
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null, // Không bị xóa mềm
            ]);
        }
    }
}
