<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $price_buy = rand(100, 500); // Giá mua giả định
            $price_sale = $price_buy + rand(50, 100); // Giá bán cao hơn giá mua
            $qty = rand(1, 100); // Số lượng sản phẩm

            DB::table('product')->insert([
                'category_id' => rand(1, 10), // Gán ngẫu nhiên category_id từ 1 đến 10
                'brand_id' => rand(1, 5), // Gán ngẫu nhiên brand_id từ 1 đến 5
                'name' => 'Sản phẩm ' . $i,
                'slug' => 'san-pham-' . $i,
                'content' => '<p>Nội dung sản phẩm số ' . $i . '</p>',
                'description' => 'Mô tả ngắn gọn cho sản phẩm ' . $i,
                'price_buy' => $price_buy,
                'price_sale' => $price_sale,
                'qty' => $qty,
                'detail' => 'Chi tiết sản phẩm ' . $i,
                'thumbnail' => 'product-' . $i . '.jpg',
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
