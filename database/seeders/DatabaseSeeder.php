<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Gọi các seeder trong danh sách để chạy lần lượt
        $this->call([
            BannerSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ContactSeeder::class,
            MenuSeeder::class,
            OrderSeeder::class, // Đảm bảo gọi OrderSeeder trước khi OrderdetailSeeder
            OrderdetailSeeder::class,
            PostSeeder::class,
            TopicSeeder::class,
            UserSeeder::class, // Thêm UserSeeder để tạo dữ liệu user mẫu
        ]);

        // Tạo một user mặc định để kiểm tra
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'), // Mã hóa mật khẩu mặc định
            'roles' => 'admin', // Đặt quyền là admin
        ]);
    }
}
