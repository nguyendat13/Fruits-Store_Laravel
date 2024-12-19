<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $price = rand(100, 1000); // Giá sản phẩm giả định
            $discount = rand(0, 50); // Giảm giá ngẫu nhiên
            $qty = rand(1, 5); // Số lượng từ 1 đến 5
            $amount = ($price - $discount) * $qty; // Tính tổng tiền

            DB::table('orderdetail')->insert([
                'order_id' => rand(1, 10), // Gán ngẫu nhiên order_id từ 1 đến 10
                'product_id' => rand(1, 50), // Gán ngẫu nhiên product_id từ 1 đến 50
                'price' => $price,
                'discount' => $discount,
                'qty' => $qty,
                'amount' => $amount,
            ]);
        }
    }
}
