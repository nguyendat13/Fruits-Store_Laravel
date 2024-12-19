<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('post')->insert([
                'topic_id' => rand(1, 5), // Gán topic_id từ 1 đến 5 (giả định)
                'title' => 'Bài viết ' . $i,
                'slug' => 'bai-viet-' . $i,
                'content' => '<p>Nội dung bài viết số ' . $i . '</p>',
                'description' => 'Mô tả ngắn gọn cho bài viết ' . $i,
                'thumbnail' => 'thumbnail-' . $i . '.jpg',
                'type' => $i % 2 == 0 ? 'post' : 'page', // Xen kẽ giữa bài viết và trang
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
